@extends('app')

@section('content')
<h1>Editer une question : {!! $question->question !!}</h1>

{!! Form::model($question, ['method' => 'PATCH', 'url' => 'questions/' . $question->id]) !!}

@include('questions.form')


<div class="form-group">
{!! Form::submit('Sauvegarder', ['class' => 'btn btn-primary form-control']) !!}
</div>


{!! Form::close() !!}

@include('errors.list')



@endsection
