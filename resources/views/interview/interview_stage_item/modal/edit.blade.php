<div class="modal fade" id="edit{{ $interview_stage_item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form action="{{ route('interview_stage_item.update', $interview_stage_item->id) }}" method="post" autocomplete="off">
                    @method('PUT')
                    @csrf
                    @include('message.messages_alert')
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $interview_stage_item->id }}" class="form-control"
                               id="recipient-name">
                        <label>عنوان المرحلة</label>
                        <select name="interview_stage_id" class="capitalize block mt-1 w-full"
                                style="border: 1px solid #cccccc; border-radius: 5px;width: 100%">
                            <option selected="selected" value="{{$interview_stage_item->interview_stage->id}}">{{$interview_stage_item->interview_stage->title}}</option>
                        @foreach($interview_stages as $interview_stage)
                                <option value="{{$interview_stage->id}}">{{$interview_stage->title}}</option>
                            @endforeach
                        </select>
                        <label for="recipient-name" class="col-form-label"> البند</label>
                        <input type="text" name="name" value="{{ $interview_stage_item->name }}" class="form-control" id="recipient-name"
                               placeholder="" required>
                        <label for="quantity" class="col-form-label">درجة البند</label>
                        <input type="number" name="item_degree" value="{{ $interview_stage_item->item_degree }}" class="form-control" id="quantity" max="99"
                               placeholder="ادخل درجة البند"
                               required>
                        {{--                        <label for="recipient-name" class="col-form-label">درجة البند</label>--}}
                        {{--                        <input type="number" name="item_degree" class="form-control" id="recipient-name"--}}
                        {{--                               placeholder="ادخل درجة البند"--}}
                        {{--                               required>--}}
                        <label for="recipient-name" class="col-form-label">  المناقش</label>
                        <select name="supervisor_type" selected="{{ $interview_stage_item->id }}" class="capitalize block mt-1 w-full"
                                style="border: 1px solid #cccccc; border-radius: 5px;width: 100%">
                            <option value="primary">مشرف</option>
                            <option value="secondary">عضو لجنة مناقشة</option>
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
