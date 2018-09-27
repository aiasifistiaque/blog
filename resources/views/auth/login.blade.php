@extends('Pages.Layouts.template')
@section('title','login')

@section('body')
<br><br>
<div class="container">
    <div class="row">
            <div class="col-md-2 col-lg-2 col-xl-2">
            </div>

        <div class="col-md-8 col-sm-8 col-lg-8">
            <div class="card">
                <div class="card-header  w3-allerta">Login</div>

                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="card-text w3-allerta">E-Mail Address</label>

                            <div class="col-xl-6 col-lg-6 col-md-6 card-text">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="card-text w3-allerta">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a><br/> <br/>

                                <a href="auth/facebook" class="btn btn-primary" style="background: #4267b2; text-align: center;" >
                                        Login with Facebook
                                </a>
                                <br /> <br/>
                                <a href="/signup" class="btn btn-primary">Sign Up </a>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br> <br> <br> <br>
@endsection
