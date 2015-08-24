<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

//use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Question;

use Storage;
use Config;
use Illuminate\Http\Request;



class QuestionsController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return Response
	*/
	public function index()
	{
		//
		
		$questions = Question::all();
		
		//  dd($questions);
		//return $questions;
		return view('questions.index')->with('questions', $questions);
		
		
	}
	
	
	
	/**
	* Display the specified resource.
	*
	* @param  int  $id
	* @return Response
	*/
	public function show($id)
	{
		
		
		//
		//$question = Question::find($id);
		$question = Question::find($id);
		
		if (is_null($question))
		{
			abort(404);
		}
		
		
		// Get the current user that will be the origin of our operations
		// Get ID of a User whose autoincremented ID is less than the current user, but because some entries might have been deleted we need to get the max available ID of all entries whose ID is less than current user's
		$previousQuestionID = Question::where('id', '<', $question->id)->max('id');
		
		// Same for the next user's id as previous user's but in the other direction
		$nextQuestionID = Question::where('id', '>', $question->id)->min('id');
		
		
		
		$replies = explode ('/', $question->replies);
		
		
		//  dd($questions);
		//return view('questions.show', compact('questions'));
		//
		return view('questions.show', compact('question', 'previousQuestionID', 'nextQuestionID', 'replies'));
		//
		//return view('questions.show')->with('question', $question);
	}
	
	
	public function create()
	{
		return view('questions.create');
	}
	
	public function store(Request $request)
	{
	
		$this->validate($request, ['question' => 'required', 'replies' => 'required', 'help' => 'required']);
		Question::create($request->all());
		//return $input;
		return redirect('questions');
	}

	
	public function edit($id)
	{
		$question = Question::findOrFail($id);
		return view('questions.edit', compact('question'));
	}

	public function update($id, Request $request)
	{
		$this->validate($request, ['question' => 'required', 'replies' => 'required', 'help' => 'required']);
		
		$question = Question::findOrFail($id);
		$question->update($request->all());
		return redirect ('questions/' . $question->id);
	}

	
}
