<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTelegramUpdateTable extends Migration
{
    public function up()
    {
        Schema::table('telegram_update', static function (Blueprint $table) {
            $table->foreign(['chat_id', 'message_id'])->references(['chat_id', 'id'])->on('message')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('edited_message_id', 'telegram_update_ibfk_3')->references('id')->on('edited_message')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['chat_id', 'channel_post_id'])->references(['chat_id', 'id'])->on('message')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
        Schema::table('telegram_update', static function (Blueprint $table) {
            $table->dropForeign('telegram_update_ibfk_1');
            $table->dropForeign('telegram_update_ibfk_2');
            $table->dropForeign('telegram_update_ibfk_3');
            $table->dropForeign('telegram_update_ibfk_4');
            $table->dropForeign('telegram_update_ibfk_5');
            $table->dropForeign('telegram_update_ibfk_6');
            $table->dropForeign('telegram_update_ibfk_7');
            $table->dropForeign('telegram_update_ibfk_8');
            $table->dropForeign('telegram_update_ibfk_9');
            $table->dropForeign('telegram_update_ibfk_10');
            $table->dropForeign('telegram_update_ibfk_11');
            $table->dropForeign('telegram_update_ibfk_12');
            $table->dropForeign('telegram_update_ibfk_13');
            $table->dropForeign('telegram_update_ibfk_14');
        });
    }
}