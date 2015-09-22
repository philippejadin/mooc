  <nav class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!--<a href="#" class="navbar-brand">Formation Yapaka</a>-->
          </div>
          <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav">
              <li><a href="{{ url('home') }}">Accueil</a></li>
              <li><a href="{{ url('questions') }}">Les questions</a></li>
              <li><a href="{{ url('pdf') }}" target="_blank">Votre récapitulatif en PDF</a></li>
              <!--<li><a href="#">Contact</a></li>-->
            </ul>


            <ul class="nav navbar-nav navbar-right">

              @if ($user_logged)
              <li><a>Bonjour, {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}} @if ($user_is_admin) (admin) @endif</a></li>
              <li><a href="{{ url('auth/logout') }}">Déconnection</a></li>
              @else
              <li><a href="{{ url('auth/register') }}">Créer un compte</a></li>
              <li><a href="{{ url('auth/login') }}">Se connecter</a></li>
              @endif



            </ul>

          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
