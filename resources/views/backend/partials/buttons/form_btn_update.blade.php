<div class="form-group">
    <div class="row">
        <div class="col-lg-1">
            {!! Form::submit(trans('general.update'), ['class' => 'btn btn-primary']) !!}
        </div>
        <div class="col-lg-1 col-lg-offset-2">
            <a class="btn btn-danger" href="{{ URL::previous() }}">{{ trans('general.cancel') }}</a>
        </div>
    </div>

</div>