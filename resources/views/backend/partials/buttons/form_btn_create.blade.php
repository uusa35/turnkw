<div class="form-group">
    <div class="row">
        <div class="col-lg-1">
            {!! Form::submit(trans('general.create'), ['class' => 'btn btn-primary']) !!}
        </div>
        <div class="col-lg-1 col-lg-offset-1">
            <a class="btn btn-danger" href="{{ URL::previous() }}">{{ trans('general.cancel') }}</a>
        </div>
    </div>

</div>