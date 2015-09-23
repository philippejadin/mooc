<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuestionsAddMoreInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('questions', function ($table)
        {
          $table->text('more_info');
          $table->integer('answer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('questions', function ($table) {
          $table->dropColumn('more_info');
          $table->dropColumn('answer');
      });
    }
}
