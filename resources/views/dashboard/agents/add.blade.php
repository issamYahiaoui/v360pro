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
                        <a href="{{url('agents/')}}"  class="btn btn-outline-danger waves-effect waves-light"><i class="fa fa-arrow-circle-left"></i> Back to Agents List</a>
                    </div>
                </div>
                <div class="row col-md-11 justify-content-center">
                    <h3 class="box-title m-b-0">Add New Agent</h3>
                    <br><br><br> <br>
                </div>

               <div class="row justify-content-center">
                   <form style="width: 100%" class="form-horizontal" method="POST" action="{{ url('agents') }}">
                       @csrf
                       <div class="form-group row">
                           <label for="" class="col-sm-3 text-right control-label col-form-label">Country</label>
                           <div class=" col-md-5">
                               <select name="country" class="form-control">
                                   <option value="Singapore">Singapore</option>
                                   <option value="Malaysia">Malaysia</option>
                                   <option value="Indonesia">Indonesia</option>
                               </select>
                           </div>
                       </div>
                       <div class="form-group row">
                           <label for="" class="col-sm-3 text-right control-label col-form-label">Name</label>
                           <div class="col-md-5">
                               <input  type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"   placeholder="" name="name" value="{{ old('name') }}" required> </div>
                           @if ($errors->has('name'))
                               <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                           @endif
                       </div>
                       <div class="form-group row">
                           <label for="" class="col-sm-3 text-right control-label col-form-label">Contact No</label>
                           <div class="col-md-5">
                               <input  type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"   placeholder="" name="phone" value="{{ old('phone') }}" required> </div>
                           @if ($errors->has('phone'))
                               <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                           @endif
                       </div>
                       <div class="form-group row">
                           <label for="" class="col-sm-3 text-right control-label col-form-label">Email</label>
                           <div class="col-md-5">
                               <input  type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"   placeholder="" name="email" value="{{ old('email') }}" required> </div>
                           @if ($errors->has('email'))
                               <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                           @endif
                       </div>
                       <div class="form-group row">
                           <label for="" class="col-sm-3 text-right control-label col-form-label">Password</label>
                           <div class="col-md-5">
                               <input id="password"  type="text" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"   placeholder="" name="password" value="ilovev360" required> </div>
                           @if ($errors->has('password'))
                               <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
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
        console.log('Js is on ')

    </script>
    @endsection