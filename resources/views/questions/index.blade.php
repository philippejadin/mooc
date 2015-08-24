@extends('app')
 
@section('content')
    <h2>Questions</h2>
 
        
        <ul>
            @foreach( $questions as $question )
                
            <li><a href="{{ url('questions', $question->id) }}">{{ $question->question }}</a></li>
            @endforeach
        </ul>
    
    
@endsection
