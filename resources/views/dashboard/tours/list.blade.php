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
                    <div class="row col-md-12" style="display: flex; justify-content: space-between">
                        <div class="col-md-3">
                            <a href="{{url('tours/create')}}"  class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Add New Tour</a>
                        </div>

                        <div class="col-md-5">
                            <label class="text-center" for="nbrTour">Number Of Tours</label>
                            <input id="nbrTour" value="{{count($list)}}" type="text">
                        </div>

                    </div>
                    <br> <br>
                    <div class="table-responsive">
                    <table id="tourTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="text-center">Agent Name</th>
                            <th class="text-center">Contact No</th>
                            <th class="text-center">Listing Info</th>
                            <th class="text-center">Date Created</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Actions</th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach($list as $model)

                            <tr>

                                <td class="text-center">{{$model->agent()->name}}</td>
                                <td class="text-center">{{$model->agent()->phone}}</td>
                                <td class="text-center">{{$model->adr}}</td>
                                <td class="text-center">{{$model->created_at}}</td>
                                <td class="text-center">{{$model->state}}</td>


                                <td class="text-center" style="display: flex ; justify-content: center">
                                    <form action="">
                                    <a href="{{url('tours/'.$model->id)}}" class="btn btn-block btn-outline-success">
                                    <span class="btn-label">
                                    <i class="fa fa-eye"></i>
                                    </span>
                                    View
                                    </a>
                                    </form>
                                    <form action="">
                                        <a href="{{url('tours/'.$model->id.'/edit')}}"   class=" btn btn-block btn-outline-info">
                                    <span class="btn-label">
                                    <i class="fa fa-edit"></i>
                                    </span>
                                            Edit
                                        </a>
                                    </form>
                                    <div class="">
                                        <button type="submit"
                                                class="btn btn-block btn-outline-danger"
                                                data-toggle="modal"
                                                data-target="#delete{{$model->id}}"
                                        >
                                             <span class="btn-label">
                                                <i class="fa fa-remove"></i>
                                             </span>
                                            DELETE
                                        </button>

                                        <div class="modal fade" id="delete{{$model->id}}" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel1">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span>
                                                        </button>

                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{url('tours/'.$model->id)}}" method="POST" >
                                                            @method('DELETE')
                                                            @csrf
                                                            <div class="row justify-content-center">
                                                                <h5>Are You Sure To Delete This Tour</h5>
                                                            </div>
                                                            <div class="row  " style="display: flex ; justify-content: space-around">

                                                                <button type="submit" class="btn btn-danger waves-effect waves-light m-t-10">DELETE</button>
                                                                <button  data-dismiss="modal" class="btn btn-outline-danger waves-effect waves-light m-t-10">Cancel</button>

                                                            </div>
                                                        </form>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
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
        $('#tourTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copy',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4 ]
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4 ]
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4 ]
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4 ]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4 ]
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