<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role', 20);
            $table->string('name', 100);
            $table->string('surname', 200);
            $table->string('nick', 100);
            $table->string('email', 255);
            $table->string('password', 255);
            $table->string('image', 255)->nullable();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->rememberToken();

            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
