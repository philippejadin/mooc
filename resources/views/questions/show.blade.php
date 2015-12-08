@extends('app')

@section('content')


<div class="question">

Vous avez répondu à {{$total_questions_replied}} questions sur un total de {{$total_questions}}
  <div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="{{$total_questions_replied_percent}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$total_questions_replied_percent}}%;">
    <span class="sr-only">{{$total_questions_replied_percent}}%</span>
  </div>
</div>


  {!! Form::open(['url' => 'questions']) !!}

  <h2>{{$question->question }}</h2>


  <input type="hidden" name="question_id" value="{{$question->id}}">

  <div class="replies">
    @foreach ($replies as $key => $reply)
    <input type="radio" name="user_reply" value="{{$key}}"  @if ($reply['checked']) checked @endif> {{$reply['text']}} </input>
      @if ($question->answer == $key) <img   @unless ($reply['checked']) style="display:none" @endunless class="reply_sign" src="{{asset('css/right.png')}}"/> @endif
      @if ($question->answer <> $key) <img @unless ($reply['checked']) style="display:none" @endunless class="reply_sign" src="{{asset('css/wrong.png')}}"/> @endif
    <br/>
    @endforeach
    </div>



    <div class="buttons">
    @if ($previousQuestionID)
    <form>
      <button type="submit" class="btn btn-default" name="previous" value="Question précédente">
        <span class="glyphicon glyphicon-chevron-left"></span> Question précédente
      </button>
      <input type="hidden" name="previous_question_id" value="{{$previousQuestionID}}">
      @endif

      @if ($nextQuestionID)
      <button type="submit" class="btn btn-default" name="next" value="Question suivante">
        Question suivante <span class="glyphicon glyphicon-chevron-right"></span>
      </button>

      <input type="hidden" name="next_question_id" value="{{$nextQuestionID}}">
      @else
      <button type="submit" class="btn btn-default" name="next" value="Question suivante">
        Terminer la formation <span class="glyphicon glyphicon-chevron-right"></span>
      </button>
      @endif

      <a class="btn btn-default" href="{{ url('recap/pdf') }}" target="_blank">Téléchargez votre récapitulatif en PDF</a>

    </div>
    {!! Form::close() !!}




    <div class="help" @unless ($question->replied)  style="display:none" @endunless >
      <div class="alert alert-info" role="alert">
        <div style="float: right; padding-left: 10px; padding-bottom: 10px; font-size: 40px;"><span class="glyphicon glyphicon-info-sign" ></span></div>
        {!! $question->help !!}
      </div>

      <div class="alert alert-info" role="alert">
        <strong>Pour aller plus loin</strong>
        {!! $question->more_info !!}
      </div>

    </div>


    <hr/>
    @if ($user_is_admin)
    <a href="{{url('questions/' . $question->id . '/edit') }}">Modifier cette question</a>
    | <a href="{{url('questions/create') }}">Créer une nouvelle question</a>
    @endif

  </div>


  @endsection
