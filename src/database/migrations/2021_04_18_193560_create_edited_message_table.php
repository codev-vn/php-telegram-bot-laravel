<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEditedMessageTable extends Migration
{
    public function up()
    {
        Schema::create('edited_message', static function (Blueprint $table) {
            $table->bigInteger('id', true)->unsigned()->comment('Unique identifier for this entry');
            $table->bigInteger('chat_id')->nullable()->index('chat_id')->comment('Unique chat identifier');
            $table->bigInteger('message_id')->unsigned()->nullable()->index('message_id')->comment('Unique message identifier');
            $table->bigInteger('user_id')->nullable()->index('user_id')->comment('Unique user identifier');
            $table->dateTime('edit_date')->nullable()->comment('Date the message was edited in timestamp format');
            $table->text('text', 65535)->nullable()->comment('For text messages, the actual UTF-8 text of the message max message length 4096 char utf8');
            $table->text('entities',65535)->nullable()->comment('For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text');
            $table->text('caption', 65535)->nullable()->comment('For message with caption, the actual UTF-8 text of the caption');
            $table->index(['chat_id', 'message_id'], 'chat_id_2');

            $table->foreign('chat_id', 'edited_message_ibfk_1')->references('id')->on('chat')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['chat_id', 'message_id'])->references(['chat_id', 'id'])->on('message')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('user_id', 'edited_message_ibfk_3')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    public function down()
    {
        Schema::drop('edited_message');
    }
}