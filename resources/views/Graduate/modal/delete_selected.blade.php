<div class="modal fade" id="delete_select" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف مجال </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="margin-left: -44rem">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('message.messages_alert')
                <form action="{{ route('destroy_select')}}"  method="post" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">سيتم الحذف، هل انت متأكد؟ </label>
                        <input type="hidden" id="delete_select_id" name="delete_select_id" value=''>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                        <button type="submit" class="btn btn-danger ">تأكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
