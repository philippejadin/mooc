<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	//
	protected $fillable = [
	'question',
	'replies',
	'help'
	];

	public $replied;


	public function getReplies()
	{
		//$replies_array = explode ('/', $this->replies);
		$replies_array = preg_split("/\r\n|\n|\r/", $this->replies);

		foreach ($replies_array as $key => $reply)
		{
			$replies[$key]['text'] = $reply;
			$replies[$key]['checked'] = false;
		}

		return $replies;

	}


}
