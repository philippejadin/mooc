@extends('app')

@section('content')
<h1>Créer une question</h1>

{!! Form::open(['url' => 'questions']) !!}


@include('questions.form')


<div class="form-group">
{!! Form::submit('Ajouter une question', ['class' => 'btn btn-primary form-control']) !!}
</div>


{!! Form::close() !!}

@include('errors.list')



@endsection
