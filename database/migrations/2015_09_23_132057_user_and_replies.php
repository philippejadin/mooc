<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserAndReplies extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('replies', function(Blueprint $table)
        {
            $table->increments('id')->unsigned()->index();
            $table->integer('question_id');
            //  $table->foreign('question_id')->references('id')->on('questions');

            $table->integer('user_id');
            //    $table->foreign('user_id')->references('id')->on('users');

            $table->text('reply')->default('');

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
        //
        Schema::drop('replies');
    }
}
