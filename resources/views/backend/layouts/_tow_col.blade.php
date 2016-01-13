@extends('backend.layouts.master')

@section('title', 'Page Title')


@section('toolbar')
    @include('backend.partials.toolbar')
@endsection

@section('notification')
    @if (Session::has('flash_notification.message'))
        <div class="alert alert-{{ Session::get('flash_notification.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fa fa-info-circle fa-fw fa-lg"></i> {{ Session::get('flash_notification.message') }}
        </div>
    @endif
@endsection


@section('body')
    @yield('toolbar')
    {{--@yield('sidebar')--}}
    <div id="page-wrapper" style="min-height: 1000px;">
        <div class="row">
            <div class="col-lg-12">
                <p>
                    @yield('notification')
                </p>
            </div>
        </div>
        <div class="row">
            @yield('content')
        </div>
    </div>
@stop


