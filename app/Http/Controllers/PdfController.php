<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App;
use PDF;

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
		
		
		
		
		//dd($questions);
			
		$html = view('pdf.recapitulatif')->with('questions', $questions)->render();
		
		$pdf = App::make('dompdf.wrapper');
		$pdf->loadHTML($html);
			
		
		return $pdf->stream();
	}
	
	
}
