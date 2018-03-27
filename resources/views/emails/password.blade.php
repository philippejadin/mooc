<h2>Réinitialisation</h2>
<p>
  <a href="{{ url('password/reset'.$token) }}">Cliquez ici pour réinitialiser votre mot de passe</a>
</p>

<small>Ou copiez-collez ce lien dans votre navigateur : {{ url('password/reset'.$token) }} </small>
