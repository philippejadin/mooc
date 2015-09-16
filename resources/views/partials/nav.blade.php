  <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">Mooc Yapaka</a>
          </div>
          <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav">
              <li><a href="{{ url('home') }}">Accueil</a></li>
              <li><a href="{{ url('questions') }}">Les questions</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
            
            
            <ul class="nav navbar-nav navbar-right">
              <li><a href="{{ url('home') }}">Bonjour</a></li>
              
            </ul>
            
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
    
