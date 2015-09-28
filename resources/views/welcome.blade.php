@extends('app')

@section('content')


@if (Session::has('message'))
<div class="alert alert-danger">{{ Session('message') }}</div>
@endif


    <h2>Formation en ligne : points de repère pour prévenir la maltraitance</h2>

<p>
Vous avez en charge des enfants et vous vous posez des questions relatives à la négligence et à la maltraitance : cette formation en ligne va vous donner quelques points de repère.
Cette formation peut se faire seul ou en équipe, et alors donner lieu à des discussions entre les participants.
Elle se fera à votre rythme, en 3 heures, 3 semaines, 6 mois...
</p>

<p>
  Concrètement, <br/>

Nous vous invitons à parcourir un questionnaire à choix multiples ( 59 questions)
<li>Chaque question se présente sous la forme d'une situation. Vous choisissez parmi 4 propositions celle qui vous semble la plus adéquate.
<li>Suite à quoi, vous avez accès à une réponse en quelques lignes ainsi que des liens vers    des ressources complémentaires si vous souhaitez approfondir le sujet.
<li>Après lecture, vous avez la possibilité de modifier votre choix avant de passer à la question suivante.
<li>Après chaque question, votre état d’avancement est enregistré. Vous pouvez donc à  tout moment quitter le questionnaire et y revenir ultérieurement.
<li>A la fin du questionnaire, vous pouvez télécharger un syllabus qui reprend toutes les questions, vos choix, les réponses attendues ainsi que les ressources documentaires.

</p>


@if ($user_logged)
<a class="btn btn-primary" href="{{ url('questions') }}" role="button"><span class="glyphicon glyphicon-question-sign"></span> Découvrez les questions</a>
@else
<a class="btn btn-primary" href="{{ url('auth/register') }}" role="button"><span class="glyphicon glyphicon-user"></span> Créez-vous un compte afin de participer à la formation</a>
ou
<a class="btn btn-primary" href="{{ url('auth/login') }}" role="button"><span class="glyphicon glyphicon-off"></span> Connectez-vous</a>
@endif


@endsection
