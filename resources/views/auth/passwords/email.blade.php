@extends('layouts.website')

@section('content')
<div class="wrapper-content login-page">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/login')}}">Login</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Reset Password</li>
                </ol>
            </nav>
            <div class="block-reset-password">
                <div class="panel panel-default">
                    <h2>Reset Password</h2>

                    <div class="panel-body">
                        <h3>Retrieve your password here</h3>
                        <p>Please enter your email address below. You will receive a link to reset your password.</p>

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address:</label>
                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="buttons-set">
                                <a class="btn-link" href="{{url('/login')}}"><span class="icon-angle-double-left"></span> BACK TO LOGIN</a>
                                <button type="submit" class="btn btn-primary pull-right"><span>Send</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
