@extends('layouts.website')

@section('content')
    <div class="wrapper-content container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">404</li>
                </ol>
            </nav>
            <section class="block-error-page">
                <div class="block-404 text-center">
                    <div class="img-thumbnail">
                        <img src="{{asset(WEBSITE_URL.'/images/warning-error.png')}}" width="400" height="359">
                    </div>
                    <h1>The page you requested cannot be found!</h1>
                    <p>The page you requested cannot be found.<br />We apologize for this inconvenience.</p>

                    <div class="buttons-set text-center">
                        <a href="{{url('/')}}" class="btn btn-primary"><span>Continue <i class="glyphicon glyphicon-menu-right"></i></span></a>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection