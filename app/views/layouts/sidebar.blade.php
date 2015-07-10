@section('login')
        <div class='sidebar'>
          <a href="/"><center><img class='banner' src="../../img/banner.png"/></center></a>
          <div class="panel panel-default">
            <div class="panel-body">
                  <ul class="nav nav-tabs">
                    <li class="active"><a id='loginTab' href="#login" data-toggle="tab">Login</a></li>
                    <li><a id='registerTab' href="#create" data-toggle="tab">Register</a></li>
                  </ul>
                  <br>
                  <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="login">
                      {{ Form::open(array('route' => 'sessions.store')) }}
                              <fieldset>
                          <div class="form-group">
                            {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username']) }}
                        </div>
                        <div class="form-group">
                          {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
                        </div>
                          {{ Form::submit("Login", ['class' => 'btn btn-lg btn-success btn-block']) }}
                          <div style="list-style:none;">
                            <a href="../../password/remind">Forgot password?</a>
                         </div>
                      </fieldset>
                        {{ Form::close() }}               
                    </div>
                    <div class="tab-pane fade" id="create">
                      {{ Form::open(array('url' => 'u/create', 'method' => 'POST')) }}
                        <div class="form-group">
                            {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username']) }}
                            <?php echo $errors->first('username', '<span class=error>:message</span>'); ?>
                        </div>
                        <div class="form-group">
                            {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
                            <?php echo $errors->first('email', '<span class=error>:message</span>'); ?>
                        </div>
                        <div class="form-group">
                          {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
                          <?php echo $errors->first('password', '<span class=error>:message</span>'); ?>
                        </div>
                        <center>{{ HTML::image(Captcha::img(), 'Captcha image') }}</center>
                        <br/>
                        <div class="form-group">
                            {{ Form::text('captcha', null, ['class' => 'form-control', 'placeholder' => 'Enter Captcha here']) }}
                            <?php echo $errors->first('captcha', '<span class=error>:message</span>'); ?>
                        </div>
                        <div>
                          {{ Form::submit("Register!", ['class' => 'btn btn-lg btn-success btn-block']) }}
                        </div>
                      {{ Form::close() }}   
                    </div>
                </div>
              </div>
            </div>

         @if ( $errors->count() > 0 )
             <script>
                $('#registerTab').click();
             </script>
        @endif
      </div>
@stop

@section('logged')
  <div class='sidebar'>
    <a href="/"><img class='banner' src="../img/banner.png"/></a>
    @if (Auth::check())
      <ul class="list-group">
        <li class="list-group-item"><a href="../u/{{ Auth::user()->username }}">{{ Auth::user()->username }}</a><span class="badge">{{ Auth::user()->valor }}</span></li>
        <li class="list-group-item"><a href="../p/create">Create a post</a></li>
        <li class="list-group-item"><a href="../f/{{ Auth::user()->username }}">Following</a></li>
        <!-- <li class="list-group-item"><a href="../u/{{ Auth::user()->username }}/c">Your Comments</a></li> -->
        <hr>
        <li class="list-group-item"><a href="../settings">Settings</a></li>
        <li class="list-group-item"><a href="../logout">Log Out</a></li>
      </ul>
      @endif
  </div>
@stop

@section('sbAd')
      <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <!-- ws boa -->
      <ins class="adsbygoogle"
           style="display:inline-block;width:160px;height:600px"
           data-ad-client="ca-pub-1821039974714849"
           data-ad-slot="2013760465"></ins>
      <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
@stop