<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App;
use PDF;
use Auth;

use Carbon\Carbon;

use App\Question;

class RecapController extends Controller
{

	public function index($type = 'pdf')
	{

		if (!Auth::check())
		{
			return redirect('home')->with('message', "Veuillez d'abord vous connecter");
		}

		$user = Auth::user();

		//$questions = Question::all();
		$questions = $user->questionsReplied;

		// uncomment the following line to disable pdf rendering and return a quick and dirty html file.

		if ($type == 'html')
		{
			return view('pdf.recapitulatif')->with('questions', $questions)->with('date', Carbon::now('Europe/Brussels'));
		}
		else 
		{
			$html = view('pdf.recapitulatif')->with('questions', $questions)->with('date', Carbon::now('Europe/Brussels'))->render();
			$pdf = App::make('dompdf.wrapper');
			$pdf->loadHTML($html);
			return $pdf->stream();
		}
	}

	public function html()
	{

		if (!Auth::check())
		{
			return redirect('home')->with('message', "Veuillez d'abord vous connecter");
		}

		$user = Auth::user();

		//$questions = Question::all();
		$questions = $user->questionsReplied;

		// uncomment the following line to disable pdf rendering and return a quick and dirty html file.
		return view('pdf.recapitulatif')->with('questions', $questions)->with('date', Carbon::now('Europe/Brussels'));
	}


}
