@extends('backend.layouts._tow_col')


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1>{{ trans('general.main_page') }}</h1>
            <hr>
        </div>

        @if(Auth::user()->isAdmin())
            @include('backend.modules.invoice.index')
            @include('backend.modules.quotation.index')
            @include('backend.modules.maintenance.index')
        @else
            @include('backend.modules.maintenance.index')
        @endif
    </div>
@endsection