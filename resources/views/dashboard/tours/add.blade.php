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
                    <h3 class="box-title m-b-0">Add New Tour</h3>
                    <br><br><br> <br>
                </div>

                <div class="row justify-content-center">
                    <form style="width: 100%" class="form-horizontal" method="POST" action="{{ url('tours') }}">

                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-right control-label col-form-label">Agent</label>
                           <div class=" col-md-5">
                               <select name="agent_id" class="form-control">
                                   @foreach(\App\Agent::all() as $agent)
                                       <option value=" {{$agent->id}}">
                                           {{$agent->name}}
                                       </option>
                                   @endforeach
                               </select>
                           </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-md-3"></div>

                            <div class="col-md-5">
                                <label for="" class=" text-info text-right control-label col-form-label">Listing Information</label>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-right control-label col-form-label">Adress</label>

                            <div class="col-md-5">
                                <input  type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}"   placeholder="" name="country" value="{{ old('country') }}" required> </div>
                            @if ($errors->has('country'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">

                            </div>
                            <div class="row col-md-4 " style="display: flex ; justify-content: space-between">

                                <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">Save</button>
                                <button type="reset" class="btn btn-outline-danger waves-effect waves-light m-t-10">Cancel</button>

                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection