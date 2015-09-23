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

class PdfController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return Response
	*/
	public function index()
	{
		$questions = Question::all();


		$user = Auth::user();

		// if user already replied to this particular question, store reply number in the $question->replied var. Else store -1
		// oh yes you guessed it already :-)






		//dd ($questions);



		// uncomment the following line to disable pdf rendering and return a quick and dirty html file.
		return view('pdf.recapitulatif')->with('questions', $questions)->with('date', Carbon::now('Europe/Brussels'));

		$html = view('pdf.recapitulatif')->with('questions', $questions)->with('date', Carbon::now('Europe/Brussels'))->render();

		$pdf = App::make('dompdf.wrapper');
		$pdf->loadHTML($html);


		return $pdf->stream();
	}


}
