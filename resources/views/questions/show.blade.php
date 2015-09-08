@extends('app')
 
@section('content')
    
{!! Form::open(['url' => 'questions']) !!}

<h2>{{$question->question }}</h2>


<input type="hidden" name="question_id" value="{{$question->id}}">

<div>
@foreach ($replies as $key => $reply)
<input type="radio" name="user_reply" value="{{$key}}"  @if ($reply['checked']) checked @endif>{{$reply['text']}}</input> <br/>
@endforeach
</div>



<div>

@if ($previousQuestionID)
<form>
<!--<a class="btn btn-default" href="./{{$previousQuestionID}}"><span class="glyphicon glyphicon-chevron-left"></span>Question précédente</a>-->
<input class="btn btn-default" type="submit" name="previous" value="Question précédente">
<input type="hidden" name="previous_question_id" value="{{$previousQuestionID}}">
@endif


@if ($nextQuestionID)
<!--<a class="btn btn-default" href="./{{$nextQuestionID}}">Question suivante<span class="glyphicon glyphicon-chevron-right"></span></a>-->
<input class="btn btn-default" type="submit" name="next" value="Question suivante">
<input type="hidden" name="next_question_id" value="{{$nextQuestionID}}">
@endif

</div>


{!! Form::close() !!}


<hr/>
<a href="{{url('questions/' . $question->id . '/edit') }}">Edit</a>




@endsection
