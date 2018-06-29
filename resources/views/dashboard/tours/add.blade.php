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
                        <a href="{{url('tours/')}}"  class="btn btn-outline-info waves-effect waves-light"><i class="fa fa-arrow-circle-left"></i> Back to Tours List</a>
                    </div>
                </div>
                <div class="row col-md-11 justify-content-center">
                    <h3 class="box-title m-b-0">Add New Tour</h3>
                    <br><br><br> <br>
                </div>

                <div class="row justify-content-center">
                    <form style="width: 100%" class="form-horizontal" method="POST" action="{{ url('tours') }}">
  @csrf
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-right control-label col-form-label">Agent Phone</label>
                           <div class=" col-md-5">
                               <select onchange="fillFields()" name="agent_id" id="agentSelect" class="form-control">
                                   <option value=""  ></option>

                               @foreach(\App\Agent::all() as $agent)
                                       <option value="{{$agent->id}}">
                                           {{$agent->phone}}
                                       </option>

                                   @endforeach
                               </select>
                           </div>

                        </div>
                        <div class="form-group row">
                            <label for=""  class="col-sm-3 text-right control-label col-form-label">Agent Name</label>

                            <div class="col-md-5">
                                <input  type="text" class="form-control" id="agent_name"   placeholder=""  value="" required> </div>

                        </div>
                        <div class="form-group row">
                            <label for=""  class="col-sm-3 text-right control-label col-form-label">Agent Email</label>

                            <div class="col-md-5">
                                <input  type="text" class="form-control" id="agent_email"  placeholder=""  value="" required> </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-md-3"></div>

                            <div class="col-md-5">
                                <label for="" class=" text-info text-right control-label col-form-label">Listing Information</label>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for=""  class="col-sm-3 text-right control-label col-form-label">Address</label>

                            <div class="col-md-5">
                                <input  type="text" class="form-control{{ $errors->has('adr') ? ' is-invalid' : '' }}"   placeholder="" name="adr" value="{{ old('adr') }}" required> </div>
                            @if ($errors->has('adr'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('adr') }}</strong>
                                    </span>
                            @endif
                        </div>

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
        function fillFields(){
            console.log('select value Changed !')
            var agent_id = $("#agentSelect").val();
            var base_url = "/agents/"
            var url = base_url.concat(agent_id)
            console.log('url',url)
            $.get(url, function(data, status){
                console.log(data.agent);
                $("#agent_name").val(data.agent.name)
                $("#agent_email").val(data.agent.email)
            });


        }
    </script>
    @endsection