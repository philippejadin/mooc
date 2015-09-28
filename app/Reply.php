<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    protected $fillable = [
  	'question_id',
  	'user_id',
  	'reply'
  	];



    /*
    Those would probably make most sense to reduce number of queries:
    */
    public function getRepliesByUser($user_id)
    {

    }


    public function getRepliesByQuestion($question_id)
    {

    }


}
