@extends('backend.layouts.master')

@section('title', 'Page Title')



@section('toolbar')
    @include('backend.partials.toolbar')
@show

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div>from one col template</div>
            <div>
                @yield('content')
            </div>
        </div>
    </div>
@stop