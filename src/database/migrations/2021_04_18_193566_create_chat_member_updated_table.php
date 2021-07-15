<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChatMemberUpdatedTable extends Migration
{
    public function up()
    {
        Schema::create('chat_member_updated', static function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->primary()->comment('Unique query identifier');
            $table->bigInteger('chat_id')->nullable()->index('chat_id')->comment('Unique poll identifier');
            $table->bigInteger('user_id')->nullable()->index('user_id')->comment('User who sent the query');
            $table->dateTime('date')->nullable()->comment('Date the change was done in Unix time');
            $table->text('old_chat_member', 65535)->nullable()->comment('Previous information about the chat member');
            $table->text('new_chat_member', 65535)->nullable()->comment('New information about the chat member');
            $table->text('invite_link', 65535)->nullable()->comment('Chat invite link, which was used by the user to join the chat; for joining by invite link events only');
            $table->dateTime('created_at')->nullable()->comment('Entry date creation');

            $table->foreign('chat_id', 'chat_member_updated_ibfk_1')->references('id')->on('chat')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('user_id', 'chat_member_updated_ibfk_2')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    public function down()
    {
        Schema::drop('chat_member_updated');
    }
}