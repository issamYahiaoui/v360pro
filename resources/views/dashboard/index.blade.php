@extends('layouts.dashboard_layout')


@section('content')

    @if(Session::has('changePassword'))
        <div id="alert" class="alert alert-success text-center col-md-12">

            {{Session::get('changePassword')}}
            <span class="pull-right" data-dismiss="alert" aria-label="Close" aria-hidden="true"><i
                        class="fa fa-close"></i></span>
        </div>
    @endif

    @if(\Illuminate\Support\Facades\Auth::user()->role ==="customer")
        @if(\Illuminate\Support\Facades\Auth::user()->agent()->first_login)
       <div class="" hidden>
           {{$user  = \Illuminate\Support\Facades\Auth::user() }}
           {{ $agent = $user->agent() }}
           {{$agent->first_login = 0 }}
           {{$agent->update()  }}
       </div>

        <div id="alert" class="alert alert-danger text-center col-md-12">

            Please , Change your password
            <span class="pull-right" data-dismiss="alert" aria-label="Close" aria-hidden="true"><i
                        class="fa fa-close"></i></span>
        </div>

            @endif
        @endif
    Welcome TO V360 PRO Dashboard  !
@endsection
