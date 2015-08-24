<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestions extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::create('questions', function(Blueprint $table) 
			{
				$table->increments('id');			
				$table->string('question')->default('');
				$table->text('replies')->default('');
				$table->text('help')->default('');
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
        Schema::drop('questions');
    }
}
