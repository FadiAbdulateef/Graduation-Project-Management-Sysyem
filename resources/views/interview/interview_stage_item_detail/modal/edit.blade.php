<div class="modal fade" id="edit{{$interview_stage_item_detail->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل البند </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="margin-left: -46rem">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('interview_stage_item_detail.update', $interview_stage_item_detail->id) }}" method="post" autocomplete="off">
                    @method('PUT')
                    @csrf
                    @include('message.messages_alert')
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $interview_stage_item_detail->id }}" class="form-control"
                               id="recipient-name">
                        <label>اسم البند</label>
                        <select name="interview_stage_item_id" value="{{ $interview_stage_item_detail->id }}" class="form-control select2" style="width: 100%;">
                            @foreach($interview_stage_items as $interview_stage_item)
                                <option value="{{$interview_stage_item->id}}">{{$interview_stage_item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label"> البند</label>
                        <input type="text" name="title" value="{{ $interview_stage_item_detail->title }}" class="form-control" id="recipient-name"
                               placeholder=" اضف بند إلى المرحلة أعلاه" required>
                        <label for="quantity" class="col-form-label">(1):درجة البند</label>
                        <input type="number" name="min_scope" value="{{ $interview_stage_item_detail->min_scope }}" class="form-control" id="quantity" max="1"
                               placeholder="ادخل درجة البند"
                               required>
                        <label for="quantity" class="col-form-label">(5):درجة البند</label>
                        <input type="number" name="max_scope" value="{{ $interview_stage_item_detail->max_scope }}" class="form-control" id="quantity" max="5"
                               placeholder="ادخل درجة البند"
                               required>
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
