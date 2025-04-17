<?php

namespace App\Services;

use App\Models\User;
use App\Models\Message;
use App\Models\Product;
use App\Models\MessageProduct;
use App\Models\SectionsPets;

class MessageService
{
    // получить список всех сообщений
    public function messages($request)
    {
        $user = $request->user();
        $messages = Message::where('user_id', $user['id'])->with('products')->get();
        
        $response = [];
        foreach ($messages as $item) {
            if ($item->author === 'user') {
                $message = [
                    "author" => 'user',
                    "message" => $item->message,
                    "created_at" => $item->created_at
                ];
                $response[] = $message;
            } else {
                $response[] = [
                    "author" => 'bot',
                    "message" => $item->message,
                    "created_at" => $item->created_at
                ];
                $products = $item->products;
                if (count($products) > 0){
                    $filter_products = [];
                    foreach ($products as $product) {
                        $images = $product->images->first();
                        $filter_products[] = [
                            "id" => $product['id'],
                            "title" => $product['title'],
                            "price" => $product['price'],
                            "image" => $images['path'],
                        ];
                    }
                    $response[] = [
                        "author" => 'bot',
                        "products" => $filter_products,
                        "created_at" => $item->created_at
                    ];
                }
            }
        }
        

        $firstMessage = [
            'author' => 'bot',
            'message' => 'Привет! Опиши, что нужно найти, а я подберу товары.',
            'created_at' => $user['created_at']
        ];
        array_unshift($response, $firstMessage);
        return $response;
    }


    // оправить сообщение ai и получить ответ
    public function message($request)
    {
        $promt = 'Привет! Ты AI-помошник интернет зоомагазина. Этот промт всегда будет одинаковый. В конце сообщения я пришлю тебе поисковой запрос клиента, а также номер клиента (учитывай контексты разных пользователей). Ты должен изучить массив товаров, а также запрос клиента и вернуть php массив с id товаров, которые максимально релевантно отвечают на запрос пользователя. Очень важно: твой ответ должен быть строкой, отражающей php-массив, без лишних символов или разметок(недопускается: php```  ```). Ответ должен быть в таком формате: ["Приятный текстовый ответ клиенту",[id товаров через запятую]] и содержать не более трех товаров';
        $search_text = 'Вот запрос пользователя' . $request->user()['id'] . ' сайта - "' . $request->all()['text'] . '"';
        $text = '$products = [
';
        $text_end = '
];';

        $products = Product::all();
        foreach ($products as $product) {
            $options = $product->options;
            $filters = '[
';
            foreach ($options as $option) {
                $filter = $option->filters->first();
                $title = $filter['title'];
                $value = $option['title'];
                $item_filter = '[
                "title" = "' . $title . '",
                "value" = "' . $value . '"
                ],';
                $filters .= $item_filter;
            }
            $filters .= '
],';
            $section = SectionsPets::find($product['section_pet_id']);
            $section_id = $section['id'];
            $section_title = $section['title'];
            $item_text = '{
                "id": ' . $product['id'] . ',
                "title": "' . $product['title'] . '",
                "description": "' . $product['description'] . '",
                "structure": "' . $product['structure'] . '",
                "features": "' . $product['features'] . '",
                "section": "' . $section_title . '",
                "price": ' . $product['price'] . ',
                "filters": ' . $filters . '
            },';
            $text .= $item_text;
        }
        $text .= $text_end;
        $content = $promt . $text . $search_text;

        
        $url = env('AI_API_URL');
        $apiKey = env('AI_API_KEY');
        $data = [
            "model" => env('AI_MODEL'),
            "messages" => [
                [
                    "role" => "user",
                    "content" => $content
                ]
            ]
        ];

        $headers = [
            "Content-Type: application/json",
            "Authorization: Bearer $apiKey"
        ];

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Ошибка cURL: ' . curl_error($ch);
        } else {
            // Обработка ответа
            $responseData = json_decode($response, true);
            if (isset($responseData['choices'][0]['message']['content'])) {
                $response = $responseData['choices'][0]['message']['content'];
                $response = json_decode($response, true);
            } else {
                echo "Ошибка в ответе API: " . json_encode($responseData);
            }
        }
        curl_close($ch);

        $products = [];
        foreach ($response[1] as $id) {
            $product = Product::find($id);
            $images = $product->images->first();
            $products[] = [
                "id" => $product['id'],
                "title" => $product['title'],
                "price" => $product['price'],
                "image" => $images['path'],
            ];
        }
        $save_messages = $this->saveMessage($request, $products, $response[0]);
        $messages = $this->messages($request);
        return  $messages;
    }


    // сохранить сообщения юзера и бота
    public function saveMessage($request, $products, $message) {
        $user = Message::create([
            'user_id' => $request->user()['id'],
            'author' => 'user',
            'message' => $request->all()['text']
        ]);

        $bot = Message::create([
            'user_id' => $request->user()['id'],
            'author' => 'bot',
            'message' => $message
        ]);

        foreach ($products as $product) {
            MessageProduct::create([
                'product_id' => $product['id'],
                'message_id' => $bot->id
            ]);
        }
        return $bot['created_at'];
    }
}