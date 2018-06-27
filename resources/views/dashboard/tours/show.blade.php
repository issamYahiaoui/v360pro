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
                                <input  type="text" class="form-control"   placeholder="" name="" value="{{ $model->agent()->name}}" required> </div>

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-right control-label col-form-label">Contact No</label>
                            <div class="col-md-5">
                                <input  type="text" class="form-control"   placeholder="" name="" value="{{$model->agent()->phone}}" required> </div>

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-right control-label col-form-label"> Email </label>
                            <div class="col-md-5">
                                <input  type="text" class="form-control"   placeholder="" name="" value="{{ $model->agent()->email }}" required> </div>

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-right control-label col-form-label">Created At</label>
                            <div class="col-md-5">
                                <input  type="text" class="form-control"   placeholder="" name="" value="{{ $model->created_at}}" required> </div>

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-right control-label col-form-label">Creator Name</label>
                            <div class="col-md-5">
                                <input  type="text" class="form-control"   placeholder="" name="" value="{{ $model->user()->name}}" required> </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="" class="col-sm-3 text-right control-label col-form-label">Shot On</label>
                                <div class="col-md-5">
                                    <input  type="text" class="form-control"   placeholder="" name="" value="{{ $model->shotOn}}" required> </div>

                            </div>
                            <div class="col-md-6">
                                <label for="" class="col-sm-3 text-right control-label col-form-label">Photographer Name</label>
                                <div class="col-md-5">
                                    <input  type="text" class="form-control"   placeholder="" name="" value="{{ $model->PhotographerName}}" required> </div>

                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="" class="col-sm-3 text-right control-label col-form-label">Processor Completed On</label>
                                <div class="col-md-5">
                                    <input  type="text" class="form-control"   placeholder="" name="" value="{{ $model->processorCompletedOn}}" required> </div>

                            </div>
                            <div class="col-md-6">
                                <label for="" class="col-sm-3 text-right control-label col-form-label">Processor Name</label>
                                <div class="col-md-5">
                                    <input  type="text" class="form-control"   placeholder="" name="" value="{{ $model->processorName}}" required> </div>

                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">

                            </div>
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