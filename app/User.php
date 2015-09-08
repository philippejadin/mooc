<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    
    
    // save the user reply to user DB as a json string
    public function setReply($question_id, $reply)
    {
    	    
    	    if (isset($question_id) && isset($reply))
    	    {
    	    	    $mooc = json_decode($this->mooc, true);
    	    	    $mooc[$question_id] = $reply;
    	    	    $this->mooc = json_encode($mooc);
    	    	    $this->save();
    	    }
    	    //dd ($question_id, $reply, $mooc);
    }
    
    // return all the replies for this user as an array
    public function getReplies()
    {
    	    return json_decode($this->mooc, true);
    }
    
    
    public function getReply($id)
    {
    	    $replies = $this->getReplies();
    	    if (isset($replies[$id]))
    	    {
    	    	    return $replies[$id];
    	    }
    	    return false;
    }
    
    
}
