@extends('layouts.dashboard_layout')


@section('content')
    <div class="row justify-content-center">
        @if(Session::has('success'))
            <div id="alert" class="alert alert-success text-center col-md-12">

                {{Session::get('success')}}
                <span class="pull-right" data-dismiss="alert" aria-label="Close" aria-hidden="true"><i
                            class="fa fa-close"></i></span>
            </div>
        @endif
        <div class="col-md-12">
            <div class="card card-body">
                <div class="row ">
                    <div class="col-md-3">
                        <a href="{{url('tours/')}}"  class="btn btn-outline-danger waves-effect waves-light"><i class="fa fa-arrow-circle-left"></i> Back to Tours List</a>
                    </div>
                </div>
                <div class="row col-md-11 justify-content-center">
                    <h3 class="box-title m-b-0">Show V360PRO Data</h3>
                    <br><br><br> <br>
                </div>

                <div class="row justify-content-center">
                    <form style="width: 100%" class="form-horizontal" method="GET" action="{{ url('tours') }}">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-right control-label col-form-label">Agent name</label>

                            <div class="col-md-5">
                                <input  type="text" class="form-control"   placeholder="" name="" value="{{ $model->agent()->name}}" disabled> </div>

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-right control-label col-form-label">Contact No</label>
                            <div class="col-md-5">
                                <input  type="text" class="form-control"   placeholder="" name="" value="{{$model->agent()->phone}}" disabled> </div>

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-right control-label col-form-label"> Email </label>
                            <div class="col-md-5">
                                <input  type="text" class="form-control"   placeholder="" name="" value="{{ $model->agent()->email }}" disabled> </div>

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-3 text-right control-label col-form-label">Created On</label>
                            <div class="col-md-2">
                                <input  type="text" class="form-control"   placeholder="" name="" value="{{ $model->created_at}}" disabled> </div>
                            <label for="" class="col-md-3 text-right control-label col-form-label">Created By</label>
                            <div class="col-md-2">
                                <input  type="text" class="form-control"   placeholder="" name="" value="{{ $model->user()->name}}" disabled> </div>

                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-3 text-right control-label col-form-label">Shot On</label>
                            <div class="col-md-2">
                                <input  type="date" class="form-control"   placeholder="" name="" value="{{ $model->shot_on}}" disabled> </div>
                            <label for="" class="col-md-3 text-right control-label col-form-label">shot By</label>
                            <div class="col-md-3">
                                <input  type="text" class="form-control"   placeholder="" name="" value="{{ $model->photographer_name}}" disabled> </div>

                        </div>
                        <div class="form-group row">

                                <label for="" class="col-md-3 text-right control-label col-form-label">Processor Completed On</label>
                                <div class="col-md-2">
                                    <input  type="date" class="form-control"   placeholder="" name="" value="{{ $model->processor_completed_on}}" disabled> </div>
                                <label for="" class="col-md-3 text-right control-label col-form-label">Processed By</label>
                                <div class="col-md-3">
                                    <input  type="text" class="form-control"   placeholder="" name="" value="{{ $model->processor_name}}" disabled> </div>

                        </div>
                        <div class="form-group row">

                            <label for="" class="col-sm-3 text-right control-label col-form-label">Link</label>
                            <div class="col-md-5">
                                <input  type="text" class="form-control" id="link_show"  placeholder="" name="" value="{{ $model->link}}" disabled>
                            </div>
                            <button type="button" id="copy_show" class="btn btn-secondary btn-circle btn-sm"><i class="fa fa-copy"></i> </button>
                        </div>
                        <div class="form-group row ">

                            <label for="" class="col-sm-3 text-right control-label col-form-label">Embed Code</label>
                            <div class="col-md-5" >
                                <textarea name="" class="form-control" id="embed_code" cols="10" value="{{ $model->embed_code}}" rows="2" disabled></textarea>
                            </div>
                            <button type="button" id="copy_show_code" class="btn btn-secondary btn-circle btn-sm"><i class="fa fa-copy"></i> </button>

                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="row col-md-4 " style="display: flex ; justify-content: center">
                                <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">Back</button>

                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        console.log('Js is On!')

        var code = "{{$model->embed_code}}"
        var link = "{{$model->link}}"
        if(code === "fill"){
            var msg = "<iframe src =\""+link+"\" height=\"640\" width=\"100%\"  allowfullscreen=\"\" frameborder=\"0\"><iframe/>";
            $('#embed_code').val(unescape(msg))
        }
        console.log(unescape(code))


        $('#copy_show').on('click', function () {

            console.log('Copy is On!')
            /* Get the text field */
            var copyText = $("#link_show");
            copyText.prop('disabled', false)

            /* Select the text field */
            copyText.select();

            /* Copy the text inside the text field */
            document.execCommand("copy");

            copyText.prop('disabled', true)

            /* Alert the copied text */
            console.log("Copied the text: " + copyText.value);
        })
        $('#copy_show_code').on('click', function () {

            console.log('Copy is On!')
            /* Get the text field */
            var copyText = $("#embed_code");
            copyText.prop('disabled', false)

            /* Select the text field */
            copyText.select();

            /* Copy the text inside the text field */
            document.execCommand("copy");

            copyText.prop('disabled', true)

            /* Alert the copied text */
            console.log("Copied the text: " + copyText.value);
        })
    </script>
@endsection