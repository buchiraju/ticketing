<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ URL::to('/') }}/">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="{{ URL::to('/') }}/">Home</a></li>            
          </ul>
		  @if(Session::has('brand_user')))
		  <ul class="nav navbar-nav pull-right">
            <li><a href="{{ URL::to('/') }}/logout">Logout</a></li>
          </ul>
		  @endif
        </div><!--/.nav-collapse -->
      </div>
    </nav>