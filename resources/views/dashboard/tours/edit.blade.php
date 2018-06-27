@extends('layouts.dashboard_layout')


@section('content')
    <div class="row justify-content-center">
        @if(count($errors->all())>0)
            <div class="alert alert-danger text-center col-md-12 ">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-minus"></i></span>
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
                            class="fa fa-minus"></i></span>
            </div>
        @endif
        <div class="col-md-12">
            <div class="card card-body">
                <div class="row col-md-11 justify-content-center">
                    <h3 class="box-title m-b-0">Edit V360 PRO Data</h3>
                    <br><br><br> <br>
                </div>

                <div class="row justify-content-center">
                    <form style="width: 100%" class="form-horizontal" method="POST" action="{{ url('tours/edit/'.$model->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-right control-label col-form-label">Agent name</label>

                            <div class="col-md-5">
                                <input  type="text" class="form-control"   placeholder="" name="agent_name" value="{{ $model->agent()->name}}" required> </div>

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-right control-label col-form-label">Contact No</label>
                            <div class="col-md-5">
                                <input  type="text" class="form-control"   placeholder="" name="agent_phone" value="{{$model->agent()->phone}}" required> </div>

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-right control-label col-form-label"> Email </label>
                            <div class="col-md-5">
                                <input  type="text" class="form-control"   placeholder="" name="agent_email" value="{{ $model->agent()->email }}" required> </div>

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-right control-label col-form-label">Created At</label>
                            <div class="col-md-5">
                                <input  type="text" class="form-control"   placeholder="" name="created_at" value="{{ $model->created_at}}" disabled> </div>

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-right control-label col-form-label">Creator Name</label>
                            <div class="col-md-5">
                                <input  type="text" class="form-control"   placeholder="" name="user_name" value="{{ $model->user()->name}}" disabled> </div>

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-3 text-right control-label col-form-label">Shot On</label>
                            <div class="col-md-2">
                                <input  type="date" class="form-control"   placeholder="" name="shotOn" value="{{ $model->user()->shotOn}}" > </div>
                            <label for="" class="col-md-3 text-right control-label col-form-label">Processor Completed On</label>
                            <div class="col-md-3">
                                <input  type="text" class="form-control"   placeholder="" name="PhotographerName" value="{{ $model->PhotographerName}}" > </div>

                        </div>
                        <div class="form-group row">

                            <label for="" class="col-md-3 text-right control-label col-form-label">Processor Completed On</label>
                            <div class="col-md-2">
                                <input  type="date" class="form-control"   placeholder="" name="processorCompletedOn" value="{{ $model->processorCompletedOn}}" > </div>
                            <label for="" class="col-md-3 text-right control-label col-form-label">Processor Name</label>
                            <div class="col-md-3">
                                <input  type="text" class="form-control"   placeholder="" name="processorName" value="{{ $model->processorName}}" > </div>

                        </div>
                        <div class="form-group row">

                            <label for="" class="col-sm-3 text-right control-label col-form-label">Link</label>
                            <div class="col-md-5">
                                <input  type="text" class="form-control"   placeholder="" name="link" value="{{ $model->link}}" > </div>
                            <button type="button" class="btn btn-secondary btn-circle btn-sm"><i class="fa fa-copy"></i> </button>
                        </div>
                        <div class="form-group row">

                            <label for="" class="col-sm-3 text-right control-label col-form-label">Embed Code</label>
                            <div class="col-md-5">
                                <textarea name="embedCode" class="form-control" id="" cols="30" value="{{ $model->embedCode}}" rows="3" ></textarea>
                            </div>
                        </div>
                        <input type="text" name="agent_id" value="{{$model->id}}" hidden>

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