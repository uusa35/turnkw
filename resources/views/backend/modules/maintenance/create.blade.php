@extends('backend.layouts._tow_col')

@section('content')
    <div class="row">
        <h1>{{ trans('general.create_maintenance') }}</h1>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        {{ Form::open(['action' => 'Backend\MaintenanceController@store','method' => 'post','files'=>'true'],['class' => 'form-horizontal']) }}
        <div class="row">

            <div class="form-group col-lg-6">
                <label class="control-label requiredField" for="company">
                    {{ trans('general.company') }}
       <span class="asteriskField">
        *
       </span>
                </label>
                <input required="" class="form-control" id="company" name="company" type="text"/>
            </div>

            <div class="form-group col-lg-6 ">
                <label class="control-label requiredField" for="email">
                    {{ trans('general.email') }}
       <span class="asteriskField">
        *
       </span>
                </label>
                <div class="input-group ">
                    <div class="input-group-addon">
                        <i class="fa fa-inbox">
                        </i>
                    </div>
                    <input required="" class="form-control" id="email" name="email" type="text"/>
                </div>
            </div>
            <div class="form-group col-lg-6">
                <label class="control-label requiredField" for="wHours">
                    {{ trans('general.wHours') }}
       <span class="asteriskField">
        *
       </span>
                </label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                    </div>
                    <input required="" class="form-control" id="wHours" name="wHours" type="text"/>
                </div>
            </div>
            <div class="form-group col-lg-6 ">
                <label class="control-label requiredField" for="mobile">
                    {{ trans('general.mobile') }}
       <span class="asteriskField">
        *
       </span>
                </label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa "></i>
                    </div>
                    <input required="" class="form-control" id="mobile" name="mobile" type="text"/>
                </div>
            </div>
            <div class="form-group col-lg-6">
                <label class="control-label requiredField" for="subject">
                    {{ trans('general.subject') }}
       <span class="asteriskField">
        *
       </span>
                </label>
                <select class="select form-control" id="subject" name="subject">
                    <option value="Fix">
                        Fix
                    </option>
                    <option value="Replace">
                        Replace
                    </option>
                    <option value="New Item">
                        New Item
                    </option>
                </select>
            </div>


            <div class="form-group col-lg-4 col-offset-push-4 required">
                <label for="images" class="control-label">{{ trans('general.images') }}</label>
                {!! Form::file('images[]', ['multiple'=> true,],['class' => 'form-control','placeholder'=> trans('general.cover'),'required' => 'required']) !!}
            </div>



            <div class="form-group col-lg-12">
                <label class="control-label requiredField" for="message">
                    {{ trans('general.message') }}
       <span class="asteriskField">
        *
       </span>
                </label>
                <textarea class="form-control" cols="40" id="message" name="message" rows="10"></textarea>
            </div>
            <div class="form-group col-lg-12">
                <div>
                    <button class="btn btn-primary " name="submit" type="submit">
                        Submit
                    </button>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>
@endsection
