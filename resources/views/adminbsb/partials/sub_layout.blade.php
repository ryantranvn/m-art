@extends('layouts.admin')

@section('css')
    @yield('css')
@endsection

@section('js')
    @yield('js')
@endsection

@section('content')
    <section class="content">
        @include('adminbsb.partials.breadcrumb')
        @if ($action == 'index' && !isset($noSearch))
        {{-- Search box --}}
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="card">
                    <div class="header bg-{{ THEME_COLOR }}">
                        <h2 class="title" role="button" data-toggle="collapse" href="#collapseSearch" aria-expanded="false" aria-controls="collapseExample">
                            {{ trans('adminbsb.search_title') }}
                        </h2>
                        <a class="btnCollapse">
                            <i class="material-icons">more_vert</i>
                        </a>
                    </div>
                    <div class="body collapse" id="collapseSearch">
                        @yield('search')
                    </div>
                </div>
            </div>
        </div>
        @endif
        {{-- Main Content --}}
        @if (!isset($noBox))
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="card">
                    <div class="header bg-{{ THEME_COLOR }}">
                        <h2 class="title" role="button" data-toggle="collapse" href="#collapseMainBox" aria-expanded="false" aria-controls="collapseExample">
                            @if ($action == 'index')
                                {{ trans('adminbsb.list_title') }}
                            @elseif ($action == 'show')
                                {{ trans('adminbsb.show_title') }}
                            @elseif ($action == 'create')
                                {{ trans('adminbsb.create_title') }}
                            @elseif ($action == 'edit')
                                {{ trans('adminbsb.edit_title') }}
                            @endif
                        </h2>
                        <a class="btnCollapse">
                            <i class="material-icons">more_vert</i>
                        </a>
                    </div>
                    <div class="body collapse in" id="collapseMainBox">
                        @if ($action == 'index')
                            @include('adminbsb.partials.top_buttons')
                        @endif
                        @include('adminbsb.partials.reply')
                        @yield('action')
                    </div>
                </div>
            </div>
        </div>
        @endif
        @yield('out_content')
    </section>
@endsection