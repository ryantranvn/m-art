@extends('layouts.website')

@section('content')
<div class="wrapper-content login-page container">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Login</li>
            </ol>
        </nav>
        <div class="account-login">
            <div class="block-title text-center">
                <h1>Welcome back !</h1>
                <p>Easy online shopping for Expats !<br />We made it simple to shopping in a unique online store - All in one !</p>
            </div>
            <div class="panel panel-default">
                <div class="row">
                    <div class="col-sm-6 col-xs-12 col-sm-push-6">
                        <div class="panel-body">
                            <h2>Log in to the site</h2>
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="control-label">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="control-label">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="check">
                                            <input type="checkbox" name="remember" value="0" id="remember" {{ old('remember') ? 'checked' : '' }} />
                                            <label for="remember">Remember Me</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="buttons-set">
                                    <a class="btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a>
                                    <button type="submit" class="btn btn-primary pull-right"><span>Login</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12 col-sm-pull-6">
                        <div class="img-thumbnail">
                            <img src="{{asset(WEBSITE_URL.'/images/img-login.jpg')}}" />
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
