<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCallbackQueryTable extends Migration
{
    public function up()
    {
        Schema::create('shipping_query', static function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->primary()->comment('Unique query identifier');
            $table->bigInteger('user_id')->nullable()->index('user_id')->comment('User who sent the query');
            $table->char('invoice_payload')->nullable()->comment('Bot specified invoice payload');
            $table->char('shipping_address')->nullable()->comment('User specified shipping address');
            $table->dateTime('created_at')->nullable()->comment('Entry date creation');

            $table->foreign('user_id', 'callback_query_ibfk_1')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    public function down()
    {
        Schema::drop('shipping_query');
    }
}