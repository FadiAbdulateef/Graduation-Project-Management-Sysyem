 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">إضافة مرحلة مناقشة </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="margin-left: -35rem">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('message.messages_alert')
                    <form action="{{ route('interview_stage.store') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">عنوان مرحلة المناقشة</label>
                            <input type="text" name="title" class="form-control" id="recipient-name" placeholder="العنوان" required >
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-success swalDefaultSuccess">حفظ</button>
                </div>
                </form>
            </div>
        </div>
    </div>
