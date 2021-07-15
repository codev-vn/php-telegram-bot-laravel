<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInlineQueryTable extends Migration
{
    public function up()
    {
        Schema::create('inline_query', static function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->primary()->comment('Unique identifier for this query');
            $table->bigInteger('user_id')->nullable()->index('user_id')->comment('Unique user identifier');
            $table->char('location')->nullable()->comment('Location of the user');
            $table->text('query', 65535)->comment('Text of the query');
            $table->char('offset')->nullable()->comment('Offset of the result');
            $table->char('chat_type')->nullable()->comment('Optional. Type of the chat, from which the inline query was sent.');
            $table->dateTime('created_at')->nullable()->comment('Entry date creation');

            $table->foreign('user_id', 'inline_query_ibfk_1')->references('id')->on('user')->onUpdate("RESTRICT")->onDelete('RESTRICT');
        });
    }

    public function down()
    {
        Schema::drop('inline_query');
    }
}