<!-- Authentication Links -->
@guest
  <div class="user__dropdown user__dropdown--open">
    <a class="user__dropdown--toggle" data-toggle="user__dropdown" href="#">
      <i class="fa fa-user-circle"></i>
        UAZON
      <i class="fa fa-angle-down flechadespliegue"></i>
    </a>
    <div class="user__dropdown-menu">
      <form class="form-horizontal" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <fieldset class="user__fieldset--border">

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

            <div class="col-md-6">
              <input id="email" type="email" class="form-control" name="email" placeholder="Your email address" value="{{ old('email') }}" required autofocus>

              @if ($errors->has('email'))
                <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
              @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Password</label>

            <div class="col-md-6">
              <input id="password" type="password" class="form-control" name="password" placeholder="password" required>

              @if ($errors->has('password'))
                <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
              @endif
            </div>
          </div>
          <a class="user__register" href="{{ route('register') }}" style="width: 30%">Registrarme</a>
          <a class="user__forgetpassword" href="{{ route('password.request') }}" style="width: 70%">¿Recordar password?</a>
        </fieldset>
        <div class="form-group">
          <button class="user__login-button" type="submit">
            Iniciar sesión
          </button>
        </div>
      </form>
    </div>
  </div>
@else
  <div class="user__dropdown user__dropdown--open">
    <a href="#" class="user__dropdown-toggle" data-toggle="user__dropdown" role="button">
      <i class="fa fa-user-circle"></i>
      {{ Auth::user()->name }}
      <i class="fa fa-angle-down flechadespliegue"></i>
      {{--<span class="caret"></span>--}}
    </a>
    <div class="user__dropdown-menu">
      {{--<form method="POST" action="{{ route('logout') }}">--}}
        {{--{{ csrf_field() }}--}}
        <fieldset class="user__fieldset--border">
          <div class="form-group">
            <a href="{{ route('logout') }}">
              {{ csrf_field() }}
              Logout
            </a>
          </div>
        </fieldset>
      {{--</form>--}}
    </div>
  </div>
@endguest

<script>
  $(function () {
    $('.user__dropdown').hover(
      function () {
        $('.user__dropdown-menu', this).stop(true, true).fadeIn(400);
        $(this).toggleClass('user__dropdown--open');
        $('.flechadespliegue').toggleClass('fa-angle-down');
        $('.flechadespliegue').toggleClass('fa-angle-up');
      },
      function () {
        $('.user__dropdown-menu', this).stop(true, true).fadeOut(400);
        $(this).toggleClass('user__dropdown--open');
        $('.flechadespliegue').toggleClass('fa-angle-down');
        $('.flechadespliegue').toggleClass('fa-angle-up');
      });
  });
</script>