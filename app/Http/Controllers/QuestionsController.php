<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

//use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Question;

use Storage;
use Config;
use Illuminate\Http\Request;
use Auth;


class QuestionsController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return Response
	*/
	public function index()
	{

		// this should limit the number of queries but need more digging
		// eager loading
		//$questions = Question::with('replies')->get();

		$questions = Question::all();



		$user = Auth::user();

		if (!Auth::check())
		{
			return redirect('home')->with('message', "Veuillez d'abord vous connecter");
		}


		foreach ($questions as $question)
		{
			if ($question->getAnswer())
			{
				$question->replied = true;
			}
			else
			{
				$question->replied = false;
			}
		}

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
		if (!Auth::check())
		{
			return redirect('home')->with('message', "Veuillez d'abord vous connecter");
		}


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


		$replies = $question->getChoices();



		// if user already replied to this particular question
		if ($question->getAnswer())
		{
			$replies[$question->getAnswer()]['checked'] = true;
			$question->replied = true;
		}


		return view('questions.show', compact('question', 'previousQuestionID', 'nextQuestionID', 'replies'));
		//
		//return view('questions.show')->with('question', $question);
	}


	public function create()
	{
		if (!Auth::check())
		{
			return redirect('home')->with('message', "Veuillez d'abord vous connecter");
		}

		return view('questions.create');
	}


	//this methog is also used to manage the next/previous question using a post form. Kind of hijacking the purpose of it...
	public function store(Request $request)
	{

		if (!Auth::check())
		{
			return redirect('home')->with('message', "Veuillez d'abord vous connecter");
		}


		// this block takes care of redirecting to the proper question
		if ($request->input('next'))
			{
				$user = Auth::user();

				$question = Question::find($request->input('question_id'));
				$question->setAnswer($request->input('user_reply'));

				if ($request->input('next_question_id'))
				{
						return redirect('questions/'. $request->input('next_question_id'));
				}
				else // latest question, redirect to the "finish" page
				{
						return redirect('finish');
				}


			}


			if ($request->input('previous'))
			{
				$user = Auth::user();

				$question = Question::find($request->input('question_id'));
				$question->setAnswer($request->input('user_reply'));

				return redirect('questions/'. $request->input('previous_question_id'));
			}


		// this is the normal flow when a new question is stored :

		$this->validate($request, ['question' => 'required', 'replies' => 'required', 'help' => 'required']);
		Question::create($request->all());
		return redirect('questions');
	}


	public function edit($id)
	{

		if (!Auth::check())
		{
			return redirect('home')->with('message', "Veuillez d'abord vous connecter");
		}


		$question = Question::findOrFail($id);
		return view('questions.edit', compact('question'));
	}

	public function update($id, Request $request)
	{

		if (!Auth::check())
		{
			return redirect('home')->with('message', "Veuillez d'abord vous connecter");
		}

		$this->validate($request, ['question' => 'required', 'replies' => 'required', 'help' => 'required']);
		$question = Question::findOrFail($id);
		$question->update($request->all());
		return redirect ('questions/' . $question->id);
	}


}
