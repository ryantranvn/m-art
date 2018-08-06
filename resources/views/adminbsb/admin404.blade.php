@extends('adminbsb.partials.sub_layout')

@section('search')
@endsection

@section('action')
    <div class="wrapper-content container">
        <div class="row">
            <section class="block-error-page">
                <div class="block-404 text-center">
                    <div class="img-thumbnail">
                        <img src="{{asset(WEBSITE_URL.'/images/warning-error.png')}}" width="400" height="359">
                    </div>
                    <h1>The page you requested cannot be found!</h1>
                    <p>The page you requested cannot be found.<br />We apologize for this inconvenience.</p>

                </div>
            </section>
        </div>
    </div>
@endsection