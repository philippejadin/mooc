@extends('app')

@section('content')
    <h2>Formation en ligne : points de repère pour prévenir la maltraitance</h2>

<div class="alert alert-info" role="alert">
Voici la liste des questions de cette formation. Vous pouvez y répondre dans l'ordre que vous souhaitez. Les questions auxquelles vous avez déjà répondu sont suivies d'un <span class="glyphicon glyphicon-ok"></span>

</div>

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


        <hr/>
        @if ($user_is_admin)
         <a href="{{url('questions/create') }}">Créer une nouvelle question</a>
        @endif


@endsection
