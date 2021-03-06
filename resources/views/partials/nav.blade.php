<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ url('home') }}"">
        <img src="{{ asset('img/yapaka.png') }}" style="height: 1.5em; width: auto;"/>
      </a>
      <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
        <span class="sr-only">Afficher la navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <div class="navbar-collapse collapse" id="navbar">
      <ul class="nav navbar-nav">
        <li><a href="{{ url('home') }}">Accueil</a></li>
        <li><a href="{{ url('questions') }}">Les questions</a></li>
        @if ($user_logged)
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              Votre récapitulatif <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="{{ url('recap/pdf') }}" target="_blank">Votre récapitulatif en PDF</a></li>
              <li><a href="{{ url('recap/html') }}" target="_blank">Votre récapitulatif en HTML (si le pdf ne fonctionne pas)</a></li>
            </ul>
          </li>
        @endif
      </ul>

      <ul class="nav navbar-nav navbar-right">
        @if ($user_logged)
          <li><a>Bonjour, {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}} @if ($user_is_admin) (admin) @endif</a></li>
            <li><a href="{{ url('auth/logout') }}">Déconnexion</a></li>
          @else
            <li><a href="{{ url('auth/register') }}">Créer un compte</a></li>
            <li><a href="{{ url('auth/login') }}">Se connecter</a></li>
          @endif
        </ul>

      </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
  </nav>
