@extends('backend.layouts._tow_col')

@section('content')
    <form class="form-horizontal">
        <fieldset>

            <!-- Form Name -->
            <legend>Order</legend>


            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="attention">Attention</label>

                <div class="col-md-4">
                    <input id="attention" name="attention" type="text" placeholder="Attention"
                           class="form-control input-md" required="">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="client">client</label>

                <div class="col-md-4">
                    <input id="client" name="client" type="text" placeholder="client" class="form-control input-md"
                           required="">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="project">project</label>

                <div class="col-md-4">
                    <input id="project" name="project" type="text" placeholder="project" class="form-control input-md"
                           required="">

                </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="body">items</label>

                <div class="col-md-4">
                    <textarea class="form-control" id="body" name="body">Your Items Here.</textarea>
                </div>
            </div>

            <!-- Appended Input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="price">price</label>

                <div class="col-md-4">
                    <div class="input-group">
                        <input id="price" name="price" class="form-control" placeholder="00.00" type="text" required="">
                        <span class="input-group-addon">KD</span>
                    </div>

                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="email">email</label>

                <div class="col-md-4">
                    <input id="email" name="email" type="text" placeholder="email" class="form-control input-md">

                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="singlebutton">Single Button</label>

                <div class="col-md-4">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Button</button>
                </div>
            </div>

        </fieldset>
    </form>
@endsection
