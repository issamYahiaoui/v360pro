@extends('layouts.dashboard_layout')


@section('content')
    <div class="container">
        <div class="row">
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

            <div class="col-sm-12">
                <div class="white-box">
                    <div class="table-responsive"></div>
                     <table id="agentTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Country</th>
                            <th class="text-center">Actions</th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach($list as $model)

                            <tr>

                                <td class="text-center">{{$model->name}}</td>
                                <td class="text-center">{{$model->email}}</td>
                                <td class="text-center">{{$model->phone}}</td>
                                <td class="text-center">{{$model->country}}</td>


                                <td class="text-center" style="display: flex ; justify-content: center">
                                    {{--<form action="">--}}
                                        {{--<a href="{{url('agents/'.$model->id)}}" class="btn btn-block btn-outline-success">--}}
                                        {{--<span class="btn-label">--}}
                                        {{--<i class="fa fa-eye"></i>--}}
                                     {{--</span>--}}
                                            {{--View--}}
                                        {{--</a>--}}
                                    {{--</form>--}}

                                    {{--<form action="{{url('agent/'.$model->id)}}" method="POST" >--}}
                                        {{--@method('PUT')--}}
                                        {{--@csrf--}}
                                        {{--<button type="submit"--}}
                                                {{--class="btn btn-block btn-outline-info"--}}
                                        {{-->--}}
                                     {{--<span class="btn-label">--}}
                                        {{--<i class="fa fa-edit"></i>--}}
                                     {{--</span>--}}
                                            {{--Edit--}}
                                        {{--</button>--}}
                                    {{--</form>--}}

                                    <form action="{{url('agents/'.$model->id)}}" method="POST" >
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit"
                                                class="btn btn-block btn-outline-danger"
                                        >
                                     <span class="btn-label">
                                        <i class="fa fa-remove"></i>
                                     </span>
                                            DELETE
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>


        </div>

    </div>


@endsection


@section('js')
    <script src="{{asset('dashboard/node_modules/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script>
        $('#agentTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copy',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3 ]
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3 ]
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3 ]
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3 ]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3 ]
                    }
                }
            ],
            extend: 'print',
            exportOptions:
                {
                    columns: [0, 1, 2]
                }

        });
    </script>
    @endsection