<div class="modal fade" id="edit{{ $stage->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل مرحلة المناقشة </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="margin-left: -34rem">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('message.messages_alert')
                <form action="{{ route('interview_stage.update', $stage->id) }}" method="post" autocomplete="off">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $stage->id }}" class="form-control"
                               id="recipient-name">
                        <label for="recipient-name" class="col-form-label">عنوان مرحلة المناقشة</label>
                        <input type="text" name="title" value="{{ $stage->title }}" class="form-control" id="recipient-name" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-secondary">حفظ التغييرات</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
