<html>
<head>
<link rel="stylesheet" href="{{ asset('css/pdf.css') }}">
</head>

<body>


<h1>Récapitulatif de la formation en ligne : points de repère pour prévenir la maltraitance</h1>

<p>
 Formation suivie par {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}
</p>


@foreach( $questions as $question )

<h2>
<a href="{{ url('questions', $question->id) }}">{{ $question->question }}</a>
@if($question->replied)
(Vous avez répondu à cette question)
@endif
</h2>

<div class="replies">
@foreach ($question->getReplies() as $key => $reply)

@if ($reply['checked'])
[x]
@else
[ ]
@endif


{{$reply['text']}}<br/>
@endforeach
</div>

<p>

{!! $question->help !!}
</p>


<p>&nbsp;</p>
<hr/>
<p>&nbsp;</p>

@endforeach



</body>
