<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCallbackQueryTable extends Migration
{
    public function up()
    {
        Schema::create('callback_query', static function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->comment('Unique identifier for this query');
            $table->bigInteger('user_id')->nullable()->index('user_id')->comment('Unique user identifier');
            $table->bigInteger('chat_id')->nullable()->index('chat_id')->comment('Unique chat identifier');
            $table->bigInteger('message_id')->unsigned()->index("message_id")->comment('Unique message identifier');
            $table->char('inline_message_id')->nullable()->comment('Identifier of the message sent via the bot in inline mode, that originated the query');
            $table->char('chat_instance')->nullable()->comment('Global identifier, uniquely corresponding to the chat to which the message with the callback button was sent');
            $table->char('data')->default('')->comment('Data associated with the callback button');
            $table->char('game_short_name')->default('')->comment('Short name of a Game to be returned, serves as the unique identifier for the game');
            $table->dateTime('created_at')->nullable()->comment('Entry date creation');

            $table->primary('id');
        });
    }

    public function down()
    {
        Schema::drop('callback_query');
    }
}