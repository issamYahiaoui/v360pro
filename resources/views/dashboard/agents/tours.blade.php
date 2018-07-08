@extends('layouts.dashboard_layout')


@section('content')
    <div class="container">
        <div class="row">
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

            <div class="col-sm-12">
                <div class="white-box">
                    <br> <br>
                    <div class="row col-md-12" style="display: flex; justify-content: space-between">

                        <div class="">
                            <label class="text-center" for="nbrTour">Number Of Tours</label>
                            <input id="nbrTour" value="{{count($list)}}" type="text" disabled>
                        </div>
                        <div class="">
                            <label class="text-center" for="nbrTour">Search</label>
                            <input id="searchInput" type="text">
                        </div>

                    </div>
                    <br>
                    <div class="table-responsive">
                        <table id="tourTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>

                                <th class="text-center">Listing Info</th>
                                <th class="text-center">Date Created</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach($list as $model)

                                <tr>


                                    <td class="text-center">{{$model->adr}}</td>
                                    <td class="text-center">{{$model->created_at}}</td>
                                    <td class="text-center">{{$model->state}}</td>


                                    <td class="text-center" style="display: flex ; justify-content: center">
                                        <form action="">
                                            <a href="{{url('agent/tours/'.$model->id)}}" class="btn btn-block btn-outline-success">
                                    <span class="btn-label">
                                    <i class="fa fa-eye"></i>
                                    </span>
                                                View
                                            </a>
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
        var table = $('#tourTable').DataTable({
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



        $('.dt-button').hide()

        $('#searchInput').on( 'keyup', function () {
            table.search( this.value ).draw();
        } );
        $('#tourTable_filter').hide()
        $('#searchInput').on('keyup',function(){
            var size = $('#tourTable tr').length
            if (size >= 2 ){
                if($('#tourTable tr').text() ==="Agent NameContact NoListing InfoDate CreatedStatusActionsNo matching records found"){
                    $('#nbrTour').val(0)
                    console.log('aw')
                }else{

                    $('#nbrTour').val(size -1)
                }
            }else{

                $('#nbrTour').val(size -2)

            }

            console.log('size',size )
            console.log('text', )

        })
    </script>
@endsection