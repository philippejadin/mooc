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

		if (!Auth::check())
		{
			return redirect('home')->with('message', "Veuillez d'abord vous connecter");
		}


		$questions = Question::all();


		$user = Auth::user();

		// uncomment the following line to disable pdf rendering and return a quick and dirty html file.
		//return view('pdf.recapitulatif')->with('questions', $questions)->with('date', Carbon::now('Europe/Brussels'));

		$html = view('pdf.recapitulatif')->with('questions', $questions)->with('date', Carbon::now('Europe/Brussels'))->render();

		$pdf = App::make('dompdf.wrapper');
		$pdf->loadHTML($html);


		return $pdf->stream();
	}


}
