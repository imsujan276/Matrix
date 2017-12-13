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
            $table->string('name');
            $table->string('email',191)->unique();
            $table->string('password')->nullable();
            $table->string('country')->nullable();
            $table->integer('phone')->nullable();
            $table->string('avatar')->default('avatar1.png');
            $table->string('security_question')->nullable();
            $table->string('security_answer')->nullable();
            $table->string('skype')->nullable();
            $table->string('ref_id')->nullable();
            $table->string('ip')->nullable();
            $table->integer('level')->default(0);
            $table->string('delete_date')->nullable();
            $table->rememberToken();
            $table->timestamps();
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
