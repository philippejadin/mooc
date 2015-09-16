<html>
<head>
<link rel="stylesheet" href="{{ asset('css/pdf.css') }}">
</head>


<body>


<h1>Récapitulatif du Mooc</h1>



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

@endforeach



</body>
