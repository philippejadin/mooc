<div class="form-group">
{!! Form::label('question', 'Titre de la question') !!}
{!! Form::text('question', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
{!! Form::label('replies', 'Réponses à la question, séparées par des / ') !!}
{!! Form::textarea('replies', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
{!! Form::label('help', 'Texte d\'aide') !!}
{!! Form::textarea('help', null, ['class' => 'form-control']) !!}
</div>
