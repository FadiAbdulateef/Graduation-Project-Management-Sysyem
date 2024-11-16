<div class="modal fade" id="delete{{ ($graduate->id) }}" tabindex="-1" role="dialog"
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
{{--                @include('message.messages_alert')--}}
                @if($graduate->user_id)
                    <form action="{{ route('graduate.destroy', $graduate->user_id)}}" method="post" autocomplete="off">
                        @method('DELETE')
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">سيتم الحذف، هل انت
                                متأكد؟ </label>
                            <input type="hidden" name="id" value="{{ $graduate->id }}" class="form-control"
                                   id="recipient-name">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                            <button type="submit" class="btn btn-success swalDefaultSuccess">تأكيد</button>
                        </div>
                    </form>
                @else
                    <form action="{{ route('graduate.destroy', $graduate->id)}}" method="post"
                          autocomplete="off">
                        @method('DELETE')
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">سيتم الحذف، هل انت
                                متأكد؟ </label>
                            <input type="hidden" name="id" value="{{ $graduate->id }}" class="form-control"
                                   id="recipient-name">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                            <button type="submit" class="btn btn-success swalDefaultSuccess">تأكيد</button>
                        </div>
                    </form>
                @endif
            </div>
{{--            <div class="modal-body">--}}
{{--                @include('message.messages_alert')--}}
{{--                <form action="{{ route('graduate.destroy',$graduate->id)}}"  method="post" autocomplete="off">--}}
{{--                    @method('DELETE')--}}
{{--                    @csrf--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="recipient-name" class="col-form-label">سيتم الحذف، هل انت متأكد؟ </label>--}}
{{--                        <input type="hidden" value="1" name="page_id">--}}
{{--                        <input type="text" name="id" value="{{ $graduate->id }}" class="form-control"--}}
{{--                               id="recipient-name">--}}
{{--                    </div>--}}
{{--                    <div class="modal-footer">--}}
{{--                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>--}}
{{--                        <button type="submit" class="btn btn-success swalDefaultSuccess">تأكيد</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
