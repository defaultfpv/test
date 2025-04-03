<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->text('payload');
            $table->integer('last_activity');
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('browser')->nullable(); // Дополнительная колонка для браузера
            $table->string('device')->nullable(); // Дополнительная колонка для устройства
        });
    }

    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}