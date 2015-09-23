<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;
use App\Reply;

class Question extends Model
{
	//
	protected $fillable = [
	'question',
	'replies',
	'help',
	'more_info',
	'answer'
	];

	public $replied;
	private $answer;

/*
Returns the available choices for this question
*/
	public function getChoices()
	{
		//$replies_array = explode ('/', $this->replies);
		$replies_array = preg_split("/\r\n|\n|\r/", $this->replies);

		foreach ($replies_array as $key => $reply)
		{
			$replies[$key+1]['text'] = $reply;
			$replies[$key+1]['checked'] = false;
		}

		return $replies;

	}



/*
Returns what the current user has answered
*/
public function getAnswer()
{
	if ($this->answer)
	{
		return $this->answer;
	}

	$user = Auth::user();
	//$reply =  Reply::where('user_id', $user->id)->where('question_id', $this->id)->first();
	$reply = $this->replies()->where('user_id', $user->id)->first();


	if ($reply)
	{
			$this->answer = $reply->reply;
			return $reply->reply;
	}
	else
	{
			return false;
	}

}

/*
Set the answer to this question for the current user
*/
public function setAnswer($answer)
{
	if (!is_null($answer))
		{
		$user = Auth::user();
		$reply = Reply::firstOrNew(['user_id' => $user->id, 'question_id' => $this->id]);
		$reply->reply = $answer;
		return $reply->save();
		}
}


public function replies()
{
	return $this->hasMany('App\Reply');
}




}
