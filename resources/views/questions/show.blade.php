@extends('app')
 
@section('content')
    
 

<h2>{{$question->question }}</h2>


<div>
@foreach ($replies as $reply)
<input type="radio">{{$reply}}</input> <br/>
@endforeach
</div>


<!--
<small>
Previous : {{$previousQuestionID}}
<br/>
Next : {{$nextQuestionID}}
</small>

-->

<div>

@if ($previousQuestionID)
<a class="btn btn-default" href="./{{$previousQuestionID}}"><span class="glyphicon glyphicon-chevron-left"></span>Question précédente</a>
@endif


@if ($nextQuestionID)
<a class="btn btn-default" href="./{{$nextQuestionID}}">Question suivante<span class="glyphicon glyphicon-chevron-right"></span></a>
@endif

</div>

<hr/>
<a href="{{url('questions/' . $question->id . '/edit') }}">Edit</a>




@endsection
