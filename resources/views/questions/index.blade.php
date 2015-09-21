@extends('app')

@section('content')
    <h2>Questions</h2>


        <ul>
            @foreach( $questions as $question )

            <li>
            <a href="{{ url('questions', $question->id) }}">{{ $question->question }}</a>
            @if($question->replied)
            <span class="glyphicon glyphicon-ok" title="Vous avez répondu à cette question"></span>
            @endif
            </li>
            @endforeach
        </ul>


@endsection
