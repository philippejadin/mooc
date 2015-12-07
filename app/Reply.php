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



   /**
   * The questions answered
   */
   public function questions()
   {
      $user = Auth::user();
      return $this->belongsToMany('App\Question')->where('user_id', $user->id);
   }

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
