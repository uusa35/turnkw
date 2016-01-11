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

            if (counter > 5) {
                alert("Only 10 textboxes allow");
                return false;
            }

            var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter);

            newTextBoxDiv.after().html(
                    // description
                    '<hr>' +

                    '<input placeholder="unitPrice" type="text" name="unitPrice[' + counter + ']' +
                    '" id="unitPrice' + counter + '" value=""' + 'class="form-control"' + 'style="width:20%;"'+ '>' +

                    '<input placeholder="totlal" type="text" name="lineTotal[' + counter + ']' +
                    '" id="lineTotal' + counter + '" value=""' + 'class="form-control"' + 'style="width:20%;"'+ '>' +

                    '<input placeholder="quantity" type="text" name="quantity[' + counter + ']' +
                    '" id="quantity' + counter + '" value=""' + 'class="form-control"' + 'style="width:20%;"'+ '>' +

                    '<input placeholder="description" type="text" name="description[' + counter + ']' +
                    '" id="description' + counter + '" value=""' + 'class="form-control"' + 'style="width:20%;"'+ '>'



            );

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
            <h1>Create New Invoice</h1>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Basic Form Elements
                </div>
                <div class="panel-body">
                    <div class="row">

                        {{ Form::open(['action' => 'Backend\InvoiceController@store','method' => 'post'],['class' => 'form-inline']) }}

                                <!-- Text input-->
                        <div class="form-group col-lg-6">
                            <label class="col-md-3 control-label" for="from">from</label>
                            <div class="col-md-9">
                                <input id="from" name="from" type="text" placeholder=""
                                       class="form-control input-md" value="testing">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group col-lg-6">
                            <label class="col-md-3 control-label" for="to">to</label>
                            <div class="col-md-9">
                                <input id="to" name="to" type="text" placeholder=""
                                       class="form-control input-md" value="testing">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group col-lg-6">
                            <label class="col-md-3 control-label" for="project">project</label>
                            <div class="col-md-9">
                                <input id="project" name="project" type="text" placeholder=""
                                       class="form-control input-md" value="testing">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group col-lg-6">
                            <label class="col-md-3 control-label" for="invoiceNo">Invoice Number</label>
                            <div class="col-md-9">
                                <input id="invoiceNo" name="invoiceNo" type="text" placeholder=""
                                       class="form-control input-md" value="testing">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group col-lg-6">
                            <label class="col-md-3 control-label" for="po">PO</label>
                            <div class="col-md-9">
                                <input id="po" name="po" type="text" placeholder=""
                                       class="form-control input-md" value="testing">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group col-lg-6">
                            <label class="col-md-3 control-label" for="date">date</label>
                            <div class="col-md-9">
                                <input id="date" name="date" type="date" placeholder=""
                                       class="form-control input-md" value="testing">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group col-lg-4">
                            <label class="col-md-3 control-label" for="projectManager">project
                                manager</label>
                            <div class="col-md-9">
                                <input id="projectManager" name="projectManager" type="text" placeholder=""
                                       class="form-control input-md" value="testing">
                                <span class="help-block"> </span>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group col-lg-4">
                            <label class="col-md-2 control-label" for="payment">payment method</label>
                            <div class="col-md-9">
                                <select id="payment" name="payment" class="form-control">
                                    <option value="transfer">transfer</option>
                                    <option value="cheque">cheque</option>
                                </select>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group col-lg-4">
                            <label class="col-md-2 control-label" for="dueDate">due date</label>
                            <div class="col-md-10">
                                <input id="dueDate" name="dueDate" type="date" placeholder=""
                                       class="form-control input-md" value="testing">

                            </div>
                        </div>

                        <div class="col-lg-12">
                            <hr>
                            <h4>{{ trans('general.items') }}</h4>
                        </div>

                        <div class="col-lg-10 form-inline">
                            <!-- Textarea -->
                            <div class="form-group form-inline">
                                <div id='TextBoxesGroup'>
                                    <div id="TextBoxDiv1 form-inline form-group">
                                        <input type='textbox' id='unitPrice0'
                                               name="unitPrice[0]" placeholder="unit Price"
                                               class="form-control col-lg-2" style="width:20%;">
                                        <input type='textbox' id='linetotal0'
                                               name="lineTotal[0]" placeholder="total"
                                               class="form-control col-lg-2" style="width:20%;">
                                        <input type='textbox' id='quantity0'
                                               name="quantity[0]" placeholder="quantity"
                                               class="form-control col-lg-1" style="width:20%;">
                                        <input type='textbox' id='description0'
                                               name="description[0]" placeholder="description"
                                               class="form-control " style="width:30%;">

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-2">
                            <button type='button' id='addButton' class="btn btn-circle btn-success"><i
                                        class="fa fa-fw fa-plus-circle"></i></button>
                            <button type='button' value='Remove Button' id='removeButton'
                                    class="btn btn-circle btn-warning"><i
                                        class="fa fa-fw fa-minus-circle"></i>
                            </button>
                            {{--<input type='button' value='Get TextBox Value' id='getButtonValue'
                                   class="btn btn-google">--}}
                        </div>


                        <div class="col-lg-12">
                            <hr>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="totalWords">total in words</label>
                                <div class="col-md-4">
                                    <input id="totalWords" name="totalWords" type="text" placeholder=""
                                           class="form-control input-md" value="testing">

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="total">total in numbers</label>
                                <div class="col-md-4">
                                    <input id="total" name="total" type="text" placeholder=""
                                           class="form-control input-md"
                                           value="testing">

                                </div>
                            </div>

                            <div class="col-lg-12">
                                <hr></div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="dueNow">amount due now</label>
                                <div class="col-md-4">
                                    <input id="dueNow" name="dueNow" type="text" placeholder=""
                                           class="form-control input-md">

                                </div>
                            </div>

                            <!-- Textarea -->
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="notes">notes</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" id="notes" name="notes"></textarea>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="col-lg-12">
                            <hr>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="col-md-1 col-md-push-11">
                                        <button id="submit" name="submit" value="submit"
                                                class="btn btn-primary">{{ trans('general.submit') }}</button>
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