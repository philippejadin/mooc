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
    

 }
