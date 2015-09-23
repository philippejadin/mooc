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

    public function setReply($user_id, $question_id, $reply)
    {




    }

    public function getReply($question_id)
    {

    }


}
