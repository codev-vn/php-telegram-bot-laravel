<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConversationTable extends Migration
{
    public function up()
    {
        Schema::create('conversation', static function (Blueprint $table) {
            $table->bigInteger('id', true)->unsigned()->comment('Unique identifier for this entry');
            $table->bigInteger('user_id')->nullable()->index('user_id')->comment('Unique user identifier');
            $table->bigInteger('chat_id')->nullable()->index('chat_id')->comment('Unique user or chat identifier');
            $table->enum('status', ['active', 'cancelled', 'stopped'])->default('active')->index('status')->comment('Conversation state');
            $table->string('command', 160)->nullable()->default('')->comment('Default command to execute');
            $table->text('notes', 65535)->nullable()->comment('Data stored from command');
            $table->timestamps();

            $table->foreign('user_id', 'conversation_ibfk_1')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('chat_id', 'conversation_ibfk_2')->references('id')->on('chat')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    public function down()
    {
        Schema::drop('conversation');
    }
}