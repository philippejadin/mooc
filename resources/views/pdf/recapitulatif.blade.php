<html>

<head>
  <link rel="stylesheet" href="{{ asset('css/pdf.css') }}">
</head>

<body>


  <div class="footer">Page
    <span class="pagenum"></span>
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

    <div class="replies">

      @foreach ($question->getReplies() as $key => $reply)

<!--
      @if ($question->replied == $key + 1) [x] @else [ ] @endif

-->




      @if ($question->answer == $key + 1)
      <span class="reply">[x]</span>
      @else
      <span class="reply">[ ]</span>
      @endif



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
