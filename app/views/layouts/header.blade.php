@section('header')
<div class="container-fluid" style="width: 100%">
<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    
  </div>

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Hot</a></li>
      <li class="{{ Request::is('new*') ? 'active' : '' }}"><a href="/new">New</a></li>
      <!-- <li class="{{ Request::is('category*') ? 'active' : '' }}"><a href="/category">Category</a></li> -->
      <li class="{{ Request::is('valor*') ? 'active' : '' }}"><a href="/valor">Guardians Of Valor</a></li>
    </ul>
    <form class="navbar-form navbar-right" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="COMING SOON">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div><!-- /.navbar-collapse -->
</nav>
</div>
@stop