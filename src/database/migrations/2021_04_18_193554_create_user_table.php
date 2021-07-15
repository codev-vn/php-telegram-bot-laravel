<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTable extends Migration
{
    public function up()
    {
        Schema::create('user', static function (Blueprint $table) {
            $table->bigInteger('id')->primary()->comment('Unique identifier for this user or bot');
            $table->boolean('is_bot')->nullable()->default(0)->comment('True, if this user is a bot');
            $table->char('first_name')->default('')->comment('User\'s or bot\'s first name');
            $table->char('last_name')->nullable()->comment('User\'s or bot\'s username');
            $table->char('username', 191)->nullable()->index('username')->comment('User\'s or bot\'s username');
            $table->char('language_code', 10)->nullable()->comment('IETF language tag of the user''s language');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('user');
    }
}