@extends('backend.layouts.dashboard')

@section('content')



    <div class="panel-body">

        {!! Breadcrumbs::render('preview_create') !!}

        @can('create','preview_create')
        {!! Form::open(['action'=>'Backend\PreviewsController@store','method'=>'post'],['class'=>'form-horizontal']) !!}
        @endcan

        {!! Form::hidden('chapter_id',$chapterId) !!}

        {!! Form::hidden('author_id',$authorId) !!}

        {!! Form::hidden('total_pages',$total_pages) !!}

        {!! Form::hidden('book_id',$bookId) !!}

        <div class="form-group col-md-12">
            {!! Form::label('preview_start',trans('general.preview_start')) !!} :
            {!! Form::selectRange('preview_start',1,$total_pages) !!}
        </div>
        <div class="form-group col-md-12">
            {!! Form::label('preview_start',trans('general.preview_end')) !!} :
            {!! Form::selectRange('preview_end',1,$total_pages) !!}
        </div>

        <div class="form-group col-md-12">
            {!! Form::label('usersList',trans('general.users')) !!} :
            {!!
            Form::select('usersList[]',$usersList,null,['multiple'=>'multiple','name'=>'usersList[]','class'=>'form-control','id'=>'users'])
            !!}
        </div>

        @include('backend.partials.buttons.form_btn_create')

        {!! Form::close() !!}
    </div>


@endsection