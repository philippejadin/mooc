@extends('app')

@section('content')


    <h2>Formation en ligne : points de repère pour prévenir la maltraitance</h2>

<div class="alert alert-success">Vous avez terminé la série de questions. Bravo!</div>


<p>

    <a class="btn btn-default" href="{{ url('pdf') }}" target="_blank">Téléchargez votre syllabus au format PDF</a>

</p>


<p>Vous venez de participer à la formation “Prévenir la maltraitance”. Nous aimerions recueillir votre avis quant à celle-ci.</p>



<iframe src="https://docs.google.com/forms/d/1pezQ-Ub5o8vxAxEx7NvJljKKg7L2MXQzGH8iVHzb4us/viewform?usp=send_form">
  <a class="btn btn-default" href="https://docs.google.com/forms/d/1pezQ-Ub5o8vxAxEx7NvJljKKg7L2MXQzGH8iVHzb4us/viewform?usp=send_form" target="_blank">
    Répondez au formulaire ici</a>
  </iframe>




@endsection
