<div class="modal fade delete-modal show" tabindex="-1" role="dialog" aria-labelledby="Delete Modal" style="display: block;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Delete {{ $item }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <h4>Are You Sure To Delete</h4>
                   </div>
            <div class="modal-footer">
                <div class="row col-md-4 " style="display: flex ; justify-content: space-between">
                    <form action="{{url($item'/'.$model->id)}}" method="POST" >
                        @method('DELETE')
                        @csrf
                        <button hidden  onclick="triggerModel()"   data-toggle="modal" data-target="delete-modal" class="btn btn-block btn-outline-danger"/>
                        <button type="submit"
                                class=""
                        >
                                     <span class="btn-label">
                                        <i class="fa fa-remove"></i>
                                     </span>
                            DELETE
                        </button>
                    </form>
                    <button type="reset" class="btn btn-outline-danger waves-effect waves-light m-t-10">Cancel</button>

                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>