@extends('backend.layouts._tow_col')

@section('scripts')
    @parent
    {{--<script src="{{ asset('js/tinymce.js') }}"></script>--}}
    <script type="text/javascript">
        /*tinymce.init({
         selector: "textarea.editor",
         plugins: [
         ["advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker"],
         ["searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking"],
         ["save table contextmenu directionality emoticons template paste textcolor  directionality jbimages"]
         ],
         toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link jbimages | print preview media fullpage | forecolor backcolor emoticons | ltr rtl ",
         relative_urls: false,
         paste_data_images: true
         });*/

        var counter = 1;

        $("#addButton").click(function () {

            if (counter > 10) {
                alert("Only 10 textboxes allow");
                return false;
            }

            var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter);

            newTextBoxDiv.after().html('<label>Item #' + counter + ' : </label>' +
                    '<input type="text" name="item[' + counter + ']' +
                    '" id="item' + counter + '" value=""' + 'class="form-control"' + '>');

            newTextBoxDiv.appendTo("#TextBoxesGroup");


            counter++;
        });

        $("#removeButton").click(function () {
            if (counter == 1) {
                alert("No more textbox to remove");
                return false;
            }

            counter--;

            $("#TextBoxDiv" + counter).remove();

        });

        $("#getButtonValue").click(function () {

            var msg = '';
            for (i = 1; i < counter; i++) {
                msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
            }
            alert(msg);
        });

    </script>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1>{{ trans('general.quotation') }}</h1>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('general.create_quotation') }}
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ Form::open(['action' => 'Backend\QuotationController@store','method' => 'post']) }}

                            <div class="row">
                                {{--Name --}}
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">{{ trans('general.name') }}</span>
                                                <input id="name" name="name" class="form-control"
                                                       placeholder=""
                                                       type="text" required="required">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                {{--attention--}}
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">{{ trans('general.attention') }}</span>
                                                <input id="attention" name="attention" class="form-control"
                                                       placeholder=""
                                                       type="text" required="required">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                {{-- client --}}
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">{{ trans('general.client') }}</span>
                                                <input id="client" name="client" class="form-control"
                                                       placeholder=""
                                                       type="text" required="required">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                {{-- project --}}
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">{{ trans('general.project') }}</span>
                                                <input id="project" name="project" class="form-control"
                                                       placeholder=""
                                                       type="text" required="required">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                {{-- Items --}}
                                <div class="col-lg-12">
                                    <h4>{{ trans('general.items') }}</h4>
                                </div>
                                <div class="col-lg-10">
                                    <!-- Textarea -->
                                    <div class="form-group">
                                        <div id='TextBoxesGroup'>
                                            <div id="TextBoxDiv1">
                                                <label>Item # - 0 : </label><input type='textbox' id='item'
                                                                                   name="item[0]"
                                                                                   placeholder="- Item One - Price : 00.0"
                                                                                   class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="col-lg-2">
                                    <button type='button' id='addButton' class="btn btn-circle btn-success"><i
                                                class="fa fa-fw fa-plus-circle"></i></button>
                                    <button type='button' value='Remove Button' id='removeButton'
                                            class="btn btn-circle btn-warning"><i class="fa fa-fw fa-minus-circle"></i>
                                    </button>
                                    {{--<input type='button' value='Get TextBox Value' id='getButtonValue'
                                           class="btn btn-google">--}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="price">{{ trans('general.total') }}</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">{{ trans('general.kd') }}</span>
                                                <input id="price" name="price" class="form-control"
                                                       placeholder="00.00" type="number" required="required">
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-5">

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="email">{{ trans('general.email') }}</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">{{ trans('general.email') }}</span>
                                                <input id="email" name="email" class="form-control"
                                                       placeholder="example@email.com"
                                                       type="text" required="">
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                {{-- Notes --}}
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <textarea class="form-control" id="notes"
                                                  name="notes">{{ trans('general.notes') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <hr>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="col-md-1 col-md-push-11">
                                            <button id="submit" name="submit" value="submit"
                                                    class="btn btn-primary">{{ trans('general.submit') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@endsection