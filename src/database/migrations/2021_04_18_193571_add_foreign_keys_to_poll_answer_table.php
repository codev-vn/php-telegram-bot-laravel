<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPollAnswerTable extends Migration
{
    public function up()
    {
        Schema::table('poll_answer', static function (Blueprint $table) {
            $table->foreign('poll_id', 'poll_answer_ibfk_1')->references('id')->on('poll')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('user_id', 'poll_answer_ibfk_2')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    public function down()
    {
        Schema::table('poll_answer', static function (Blueprint $table) {
            $table->dropForeign('poll_answer_ibfk_1');
            $table->dropForeign('poll_answer_ibfk_2');
        });
    }
}