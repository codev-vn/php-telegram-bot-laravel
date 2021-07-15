<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTelegramUpdateTable extends Migration
{
    public function up()
    {
        Schema::create('telegram_update', static function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->primary()->comment('Update\'s unique identifier');
            $table->bigInteger('chat_id')->nullable()->index('chat_id')->comment('Unique chat identifier');
            $table->bigInteger('message_id')->unsigned()->nullable()->index('message_id')->comment('Unique message identifier');
            $table->bigInteger('edited_message_id')->unsigned()->nullable()->index('edited_message_id')->comment('Local edited message identifier');
            $table->bigInteger('channel_post_id')->unsigned()->nullable()->index('channel_post_id')->comment('New incoming channel post of any kind - text, photo, sticker, etc.');
            $table->bigInteger('edited_channel_post_id')->unsigned()->nullable()->index('edited_channel_post_id')->comment('New version of a channel post that is known to the bot and was edited');
            $table->bigInteger('inline_query_id')->unsigned()->nullable()->index('inline_query_id')->comment('Unique inline query identifier');
            $table->bigInteger('chosen_inline_result_id')->unsigned()->nullable()->index('chosen_inline_result_id')->comment('Local chosen inline result identifier');
            $table->bigInteger('callback_query_id')->unsigned()->nullable()->index('callback_query_id')->comment('Unique callback query identifier');
            $table->bigInteger('shipping_query_id')->unsigned()->nullable()->index('shipping_query_id')->comment('New incoming shipping query. Only for invoices with flexible price');
            $table->bigInteger('pre_checkout_query_id')->unsigned()->nullable()->index('pre_checkout_query_id')->comment('New incoming pre-checkout query. Contains full information about checkout');
            $table->bigInteger('poll_id')->unsigned()->nullable()->index('poll_id')->comment('New poll state. Bots receive only updates about polls, which are sent or stopped by the bot');
            $table->bigInteger('poll_answer_poll_id')->unsigned()->nullable()->index('poll_answer_poll_id')->comment('A user changed their answer in a non-anonymous poll. Bots receive new votes only in polls that were sent by the bot itself.');
            $table->bigInteger('my_chat_member_updated_id')->unsigned()->nullable()->index('my_chat_member_updated_id')->comment('The bot\'s chat member status was updated in a chat. For private chats, this update is received only when the bot is blocked or unblocked by the user.');
            $table->bigInteger('chat_member_updated_id')->unsigned()->nullable()->index('chat_member_updated_id')->comment('A chat member\'s status was updated in a chat. The bot must be an administrator in the chat and must explicitly specify “chat_member” in the list of allowed_updates to receive these updates.');
            $table->index(['chat_id', 'message_id'], 'message_id');

            $table->foreign('chat_id', 'telegram_update_ibfk_1')->references('chat_id')->on('message')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('message_id', 'telegram_update_ibfk_2')->references('id')->on('message')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('edited_message_id', 'telegram_update_ibfk_3')->references('id')->on('edited_message')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('channel_post_id', 'telegram_update_ibfk_4')->references('id')->on('message')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('edited_channel_post_id', 'telegram_update_ibfk_5')->references('id')->on('edited_message')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('inline_query_id', 'telegram_update_ibfk_6')->references('id')->on('inline_query')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('chosen_inline_result_id', 'telegram_update_ibfk_7')->references('id')->on('chosen_inline_result')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('callback_query_id', 'telegram_update_ibfk_8')->references('id')->on('callback_query')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('shipping_query_id', 'telegram_update_ibfk_9')->references('id')->on('shipping_query')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('pre_checkout_query_id', 'telegram_update_ibfk_10')->references('id')->on('pre_checkout_query')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('poll_id', 'telegram_update_ibfk_11')->references('id')->on('poll')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('poll_answer_poll_id', 'telegram_update_ibfk_12')->references('poll_id')->on('poll_answer')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('my_chat_member_updated_id', 'telegram_update_ibfk_13')->references('id')->on('chat_member_updated')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('chat_member_updated_id', 'telegram_update_ibfk_14')->references('id')->on('chat_member_updated')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    public function down()
    {
        Schema::drop('telegram_update');
    }
}