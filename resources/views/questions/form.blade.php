

<div class="form-group">
{!! Form::label('question', 'Titre de la question') !!}
{!! Form::text('question', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
{!! Form::label('replies', 'Réponses à la question, une par ligne ') !!}
{!! Form::textarea('replies', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
{!! Form::label('answer', 'La "bonne" réponse à la question. Entrez un chiffre de 1 à 4 ') !!}
{!! Form::text('answer', null, ['class' => 'form-control']) !!}
</div>



<div class="form-group">
{!! Form::label('help', 'Texte d\'aide') !!}
{!! Form::textarea('help', null, ['class' => 'form-control', 'id' => 'help']) !!}
</div>


<div class="form-group">
{!! Form::label('more_info', 'Plus d\'infos') !!}
{!! Form::textarea('more_info', null, ['class' => 'form-control', 'id' => 'more_info']) !!}
</div>



<script>
                CKEDITOR.replace('help');
                CKEDITOR.replace('more_info');
</script>
