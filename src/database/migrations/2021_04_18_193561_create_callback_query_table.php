<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCallbackQueryTable extends Migration
{
    public function up()
    {
        Schema::create('callback_query', static function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->primary()->comment('Unique identifier for this query');
            $table->bigInteger('user_id')->nullable()->index('user_id')->comment('Unique user identifier');
            $table->bigInteger('chat_id')->nullable()->index('chat_id')->comment('Unique chat identifier');
            $table->bigInteger('message_id')->unsigned()->nullable()->index('message_id')->comment('Unique message identifier');
            $table->char('inline_message_id')->nullable()->comment('Identifier of the message sent via the bot in inline mode, that originated the query');
            $table->char('chat_instance')->nullable()->comment('Global identifier, uniquely corresponding to the chat to which the message with the callback button was sent');
            $table->char('data')->default('')->comment('Data associated with the callback button');
            $table->char('game_short_name')->default('')->comment('Short name of a Game to be returned, serves as the unique identifier for the game');
            $table->dateTime('created_at')->nullable()->comment('Entry date creation');
            $table->index(['user_id','chat_id', 'message_id'], 'chat_id_2');

            $table->foreign('user_id', 'callback_query_ibfk_1')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('chat_id', 'callback_query_ibfk_2')->references('chat_id')->on('message')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('message_id', 'callback_query_ibfk_3')->references('id')->on('message')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    public function down()
    {
        Schema::drop('callback_query');
    }
}