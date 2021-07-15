<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCallbackQueryTable extends Migration
{
    public function up()
    {
        Schema::create('poll', static function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->primary()->comment('Unique query identifier');
            $table->text('question', 65535)->nullable()->comment('Poll question');
            $table->text('options', 65535)->nullable()->comment('List of poll options');
            $table->integer('total_voter_count')->comment('Total number of users that voted in the poll');
            $table->tinyInteger('is_closed')->nullable()->default(0)->comment("True, if the poll is closed");
            $table->tinyInteger('is_anonymous')->nullable()->default(0)->comment("True, if the poll is anonymous");
            $table->char('type', 255)->nullable()->comment('Poll type, currently can be “regular” or “quiz”');
            $table->tinyInteger('allows_multiple_answers')->nullable()->default(0)->comment("True, if the poll allows multiple answers");
            $table->integer('correct_option_id')->comment('0-based identifier of the correct answer option. Available only for polls in the quiz mode, which are closed, or was sent (not forwarded) by the bot or to the private chat with the bot.');
            $table->string('explanation', 255)->nullable()->comment('Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style poll, 0-200 characters');
            $table->text('explanation_entities', 65535)->nullable()->comment('Special entities like usernames, URLs, bot commands, etc. that appear in the explanation');
            $table->integer('open_period')->comment('Amount of time in seconds the poll will be active after creation');
            $table->dateTime('close_date')->nullable()->comment('Point in time (Unix timestamp) when the poll will be automatically closed');
            $table->dateTime('created_at')->nullable()->comment('Entry date creation');
        });
    }

    public function down()
    {
        Schema::drop('poll');
    }
}