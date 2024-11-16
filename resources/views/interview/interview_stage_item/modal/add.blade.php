<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضافة بند لمرحلة معينة </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="margin-left: -33rem">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('interview_stage_item.store') }}" method="post" autocomplete="off">
                    @csrf
                    @include('message.messages_alert')
                    <div class="form-group">
                        <label>عنوان المرحلة</label>
                        <select name="interview_stage_id" class="capitalize block mt-1 w-full"
                                style="border: 1px solid #cccccc; border-radius: 5px;width: 100%">
                            @foreach($interview_stages as $interview_stage)
                                <option value="{{$interview_stage->id}}">{{$interview_stage->title}}</option>
                            @endforeach
                        </select>
                        <label for="recipient-name" class="col-form-label"> البند</label>
                        <input type="text" name="name" class="form-control" id="recipient-name"
                               placeholder="" required>
                        <label for="quantity" class="col-form-label">درجة البند</label>
                        <input type="number" name="item_degree" class="form-control" id="quantity" max="99"
                               placeholder=""
                               required>
                        <label for="recipient-name" class="col-form-label">نوع المناقش</label>
                        <select name="supervisor_type" class="capitalize block mt-1 w-full"
                                style="border: 1px solid #cccccc; border-radius: 5px;width: 100%">
                            <option value="primary">مشرف</option>
                            <option value="secondary">عضو لجنة المناقشة</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                        <button type="submit" class="btn btn-success swalDefaultSuccess">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
