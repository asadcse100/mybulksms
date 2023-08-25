<!DOCTYPE html>
<html>
  <head>
  @include('layouts.auth.css')
  </head>
  <body>
    <div class="login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
                <div style="opacity: .5;">
              <div class="form d-flex align-items-center text-white">
                  <div class="content">
                  <div class="logo">
                    <h1>Web Site Name</h1>
                  </div>
                  <p>Exchange your currency wishdom, Anyware and any currency</p>
                </div>
                </div>                
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6">
              <div style="opacity: .9;">
              <div class="form d-flex align-items-center">
                <div class="content">
                <h5>Register a new membership</h5>
                  <form method="post" action="{{ url('/register') }}" class="form-validate mb-4" >
                  {!! csrf_field() !!}
                    <div class="form-group">
                      <input id="login-username" type="text" name="name" required data-msg="Please enter your name" class="input-material" value="{{ old('name') }}">
                      <label for="login-username" class="label-material text-white">Full Name</label>
                      @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                    </div>
                    <div class="form-group">
                      <input id="login-username" type="email" name="email" required data-msg="Please enter your Email" class="input-material" value="{{ old('email') }}">
                      <label for="login-username" class="label-material text-white">Email</label>
                      @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                    </div>
                    <div class="form-group">
                      <input id="login-password" type="password" name="password" required data-msg="Please enter your password" class="input-material">
                      <label for="login-password" class="label-material text-white">Password</label>
                      @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                    </div>
                    <div class="form-group">
                      <input id="login-password" type="password" name="password_confirmation" required data-msg="Please enter your Re-password" class="input-material">
                      <label for="login-password_confirmation" class="label-material text-white">Confirm Password</label>
                      @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                    @endif
                    </div>
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                    <div class="text-lg-right">
                    <button type="submit" class="btn btn-success">Sign Up</button>
                    </div>
                  </form>
                  <small>Already have an account? </small>
                  <a href="{{ url('/login') }}" class="signup">Login</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('layouts.auth.js')
  </body>
</html>