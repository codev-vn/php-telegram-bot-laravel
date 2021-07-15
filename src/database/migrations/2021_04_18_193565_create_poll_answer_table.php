<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCallbackQueryTable extends Migration
{
    public function up()
    {
        Schema::create('poll_answer', static function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->primary()->comment('Unique query identifier');
            $table->bigInteger('poll_id')->nullable()->index('poll_id')->comment('Unique poll identifier');
            $table->bigInteger('user_id')->nullable()->index('user_id')->comment('User who sent the query');
            $table->text('option_ids', 65535)->nullable()->comment('0-based identifiers of answer options, chosen by the user. May be empty if the user retracted their vote.');
            $table->dateTime('created_at')->nullable()->comment('Entry date creation');

            $table->foreign('poll_id', 'poll_answer_ibfk_1')->references('id')->on('poll')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    public function down()
    {
        Schema::drop('poll_answer');
    }
}