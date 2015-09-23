<html>

<head>
  <link rel="stylesheet" href="{{ asset('css/pdf.css') }}">
</head>

<body>


  <div class="footer">Page
    <span class="pagenum"></span> - Formation en ligne : points de repère pour prévenir la maltraitance - Yapaka.be
  </div>


<div class="logo">
<a href="http://www.yapaka.be/mooc"><img src="http://www.yapaka.be/sites/yapaka.be/files/yapaka.png"/></a>
</div>


  <h1>Formation en ligne : points de repère pour prévenir la maltraitance</h1>

  <p>
    Syllabus récapitulatif de la formation suivie par {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}} et finalisée le {{ $date }}
  </p>



  @foreach( $questions as $question )

  <div class="question">

    <h2>
      <a href="{{ url('questions', $question->id) }}">{{ $question->question }}</a>


    </h2>

<p></p>

    <div class="replies">


      Réponse : {{$question->getAnswer() }}<br/>
      Réponse attendue :  {{$question->answer}} <br/>

      @foreach ($question->getChoices() as $key => $reply)



      <span class="result">

      @if ($question->answer == $key) <img src="{{asset('css/right.png')}}"/> @endif


      @if (($question->getAnswer() == $key) && ($question->answer <> $key) ) <img src="{{asset('css/wrong.png')}}"/> @endif


      @if (($question->getAnswer() <> $key) && ($question->answer <> $key) ) <img src="{{asset('css/blank.png')}}"/> @endif

    </span>

({{$key}})

      {{$reply['text']}}


      <br/> @endforeach
    </div>

    <div class="help">
      {!! $question->help !!}

    </div>

<div class="more_info">
  {!! $question->more_info !!}
</div>





  </div>
  @endforeach






</body>
