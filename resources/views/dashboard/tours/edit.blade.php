@extends('layouts.dashboard_layout')


@section('content')
    <div class="row justify-content-center">
        @if(count($errors->all())>0)
            <div class="alert alert-danger text-center col-md-12 ">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                </button>
                <ul class="list-unstyled text-center">
                    @foreach($errors->all() as $error)
                        <li class="text-center">
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
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
                    <h3 class="box-title m-b-0">Edit V360Pro Data</h3>
                    <br><br><br> <br>
                </div>

                <div class="row justify-content-center">
                    <form style="width: 100%" class="form-horizontal" method="POST" action="{{ url('tours/edit/'.$model->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-right control-label col-form-label">Agent name</label>

                            <div class="col-md-5">
                                <input disabled  type="text" class="form-control"   placeholder="" name="agent_name" value="{{ $model->agent()->user()->name}}" required> </div>

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-right control-label col-form-label">Contact No</label>
                            <div class="col-md-5">
                                <input disabled  type="text" class="form-control"   placeholder="" name="agent_phone" value="{{$model->agent()->user()->phone}}" required> </div>

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-right control-label col-form-label"> Email </label>
                            <div class="col-md-5">
                                <input  disabled type="text" class="form-control"   placeholder="" name="agent_email" value="{{ $model->agent()->user()->email }}" required> </div>

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-3 text-right control-label col-form-label">Created On</label>
                            <div class="col-md-2">
                                <input  type="text" class="form-control"   placeholder="" name="created_at" value="{{ $model->created_at}}" disabled> </div>
                            <label for="" class="col-md-3 text-right control-label col-form-label">Created By</label>
                            <div class="col-md-2">
                                <input  type="text" class="form-control"   placeholder="" name="user_name" value="{{ $model->user()->name}}" disabled> </div>


                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-3 text-right control-label col-form-label">Shot On</label>
                            <div class="col-md-2">
                                <input  type="date" class="form-control"   placeholder="" name="shotOn" value="{{ $model->shot_on}}" > </div>
                            <label for="" class="col-md-3 text-right control-label col-form-label">Shot By</label>

                            <div class=" col-md-3">
                                <select name="photographerName" id="photographer_name" class="form-control">
                                    <option value=""  ></option>
                                    <option value="Rig"  >Rig</option>
                                    <option value="Iskandar" >Iskandar</option>
                                    <option value="Jhia Hao" >Jhia Hao</option>
                                    <option  value="Weishen">Weishen</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="" class="col-md-3 text-right control-label col-form-label">Processor Completed On</label>
                            <div class="col-md-2">
                                <input  type="date" class="form-control"   placeholder="" name="processorCompletedOn" value="{{ $model->processor_completed_on}}" > </div>
                            <label for="" class="col-md-3 text-right control-label col-form-label">Processed By</label>

                            <div class=" col-md-3">
                                <select name="processorName" id="processor_name" class="form-control">
                                    <option value=""  ></option>
                                    <option value="Mai" >Mai</option>
                                    <option value="Shafikah" >Shafikah</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="" class="col-sm-3 text-right control-label col-form-label">Link</label>
                            <div class="col-md-5">
                                <input  type="text" class="form-control"  id="link" placeholder="" name="link" value="{{ $model->link}}" > </div>
                            <button hidden type="button" id="copy" class="btn btn-secondary btn-circle btn-sm"><i class="fa fa-copy"></i> </button>
                        </div>
                        <div hidden class="form-group row">

                            <label for="" class="col-sm-3 text-right control-label col-form-label">Embed Code</label>
                            <div hidden class="col-md-5">
                                <textarea name="embedCode" class="form-control" id="embed_code" cols="30" value="{{ $model->embed_code}}" rows="3" ></textarea>
                            </div>
                            <button  type="button" id="copy_edit_code" class="btn btn-secondary btn-circle btn-sm"><i class="fa fa-copy"></i> </button>

                        </div>
                        <input type="text" name="agent_id" value="{{$model->agent()->id}}" hidden>

                        <div class="form-group row">
                            <div class="col-md-4">

                            </div>
                            <div class="row col-md-4 " style="display: flex ; justify-content: space-between">

                                <button type="submit" class="btn btn-success waves-effect waves-light m-t-10">Save</button>
                                <button type="reset" class="btn btn-outline-danger waves-effect waves-light m-t-10">Cancel</button>

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
        $('#photographer_name').val("{{$model->photographer_name}}")
        $('#processor_name').val("{{$model->processor_name}}")
        var code = "{{$model->embed_code}}"
        var link = "{{$model->link}}"
        if(code === "fill"){
            var msg = "<iframe src = \""+link+"\" height=\"640\" width=\"100%\"  allowfullscreen=\"\" frameborder=\"0\"><iframe/>";
            $('#embed_code').val(unescape(msg))
        }
        console.log(unescape(code))


        $('#copy').on('click', function () {
           console.log('Copy is On!')
           /* Get the text field */
           var copyText = $("#link");

           /* Select the text field */
           copyText.select();

           /* Copy the text inside the text field */
           document.execCommand("copy");

           /* Alert the copied text */
           console.log("Copied the text: " + copyText.value);
       })
        $('#copy_edit_code').on('click', function () {

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