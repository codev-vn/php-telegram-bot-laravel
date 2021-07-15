<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePollAnswerTable extends Migration
{
    public function up()
    {
        Schema::create('poll_answer', static function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->primary()->comment('Unique query identifier');
            $table->bigInteger('poll_id')->unsigned()->comment('Unique poll identifier');
            $table->bigInteger('user_id')->comment('User who sent the query');
            $table->text('option_ids', 65535)->nullable()->comment('0-based identifiers of answer options, chosen by the user. May be empty if the user retracted their vote.');
            $table->dateTime('created_at')->nullable()->comment('Entry date creation');
        });
    }

    public function down()
    {
        Schema::drop('poll_answer');
    }
}