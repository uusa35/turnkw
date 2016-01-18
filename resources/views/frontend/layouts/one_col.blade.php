@extends('backend.layouts.master')

{{--@section('title', 'Page Title')--}}


@section('toolbar')
    {{--@include('backend.partials.toolbar')--}}
@endsection

@section('body')
    {{--@yield('toolbar')--}}
    {{--@yield('sidebar')--}}
    @yield('content')
@stop


