<div class="modal fade" id="project_supervisor_update{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل المشروع </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="margin-left: -42rem">&times;</span>
                </button>
            </div>
            <div class="modal-body">
{{--                @include('message.messages_alert')--}}
                <form action="{{ route('project.project_supervisor_update',$project->id)}}" method="post" autocomplete="on">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{$project->id}}" class="form-control"
                               id="recipient-name">
                        <label for="recipient-name" class="col-form-label">العنوان </label>
                        <input type="text" name="title" value="{{ $project->title }}"
                               class="capitalize block mt-1 w-full"
                               style="border: 1px solid #cccccc; border-radius: 5px;width: 100%"
                               id="recipient-name" required>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription"> الوصف </label>
                        <textarea name="short_description" id="inputDescription" class="capitalize block mt-1 w-full"
                                  required
                                  style="border: 1px solid #cccccc; border-radius: 5px;width: 100%"
                                  rows="4">{{$project->short_description }}</textarea>

                        <label for="recipient-name" class="col-form-label"> أهداف المشروع </label>
                        @php
                            $values = explode(',', $project->goals); // تقسيم النص إلى مصفوفة باستخدام الفاصلة كمحدد

                            $tagsArray = array_map(function ($value) {
                              return ['value' => $value]; // تحويل كل قيمة إلى قاموس حيث القيمة هي "value"
                            }, $values);

                            $tagsJson = json_encode($tagsArray); // تحويل المصفوفة إلى صيغة JSON
                        @endphp
                        <textarea name='goals' id="tags2" class="capitalize block mt-1 w-full"
                                  style="width: 100%;" required>
                               {{ old('goals', $tagsJson) }}
                       </textarea>
                    </div>
                    <div class="form-group">
                        <label> المجال الذي ينتمي إليه المشروع</label>
                        <input type="text" name="scope" class="capitalize block mt-1 w-full" required
                               style="border: 1px solid #cccccc; border-radius: 5px;width: 100%" id="recipient-name"
                               placeholder="ادخل مجال المشروع " value="{{$project->scope}}">
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

<script>
    var input = document.querySelector('textarea[id=tags3]'),
        tagify = new Tagify(input);
</script>

