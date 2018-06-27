@extends('layouts.dashboard_layout')


@section('content')
    <div class="row justify-content-center">
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
                    <h3 class="box-title m-b-0">Show V360 PRO Data</h3>
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
                            <label for="" class="col-sm-3 text-right control-label col-form-label">Created At</label>
                            <div class="col-md-5">
                                <input  type="text" class="form-control"   placeholder="" name="" value="{{ $model->created_at}}" disabled> </div>

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-right control-label col-form-label">Creator Name</label>
                            <div class="col-md-5">
                                <input  type="text" class="form-control"   placeholder="" name="" value="{{ $model->user()->name}}" disabled> </div>

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-3 text-right control-label col-form-label">Shot On</label>
                            <div class="col-md-2">
                                <input  type="date" class="form-control"   placeholder="" name="" value="{{ $model->user()->shotOn}}" disabled> </div>
                            <label for="" class="col-md-3 text-right control-label col-form-label">Processor Completed On</label>
                            <div class="col-md-3">
                                <input  type="text" class="form-control"   placeholder="" name="" value="{{ $model->processorCompletedOn}}" disabled> </div>

                        </div>
                        <div class="form-group row">

                                <label for="" class="col-md-3 text-right control-label col-form-label">Processor Completed On</label>
                                <div class="col-md-2">
                                    <input  type="date" class="form-control"   placeholder="" name="" value="{{ $model->processorCompletedOn}}" disabled> </div>
                                <label for="" class="col-md-3 text-right control-label col-form-label">Processor Name</label>
                                <div class="col-md-3">
                                    <input  type="text" class="form-control"   placeholder="" name="" value="{{ $model->processorName}}" disabled> </div>

                        </div>
                        <div class="form-group row">

                            <label for="" class="col-sm-3 text-right control-label col-form-label">Link</label>
                            <div class="col-md-5">
                                <input  type="text" class="form-control"   placeholder="" name="" value="{{ $model->link}}" disabled> </div>
                            <button type="button" class="btn btn-secondary btn-circle btn-sm"><i class="fa fa-copy"></i> </button>
                        </div>
                        <div class="form-group row">

                            <label for="" class="col-sm-3 text-right control-label col-form-label">Embed Code</label>
                            <div class="col-md-5">
                                <textarea name="" class="form-control" id="" cols="30" value="{{ $model->embedCode}}" rows="3" disabled></textarea>
                            </div>
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