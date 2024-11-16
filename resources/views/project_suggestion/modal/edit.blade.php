<div class="modal fade" id="edit{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                @include('message.messages_alert')
                <form action="{{ route('suggestion.update',$project->id)}}" method="post" autocomplete="on">
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
                        <label> الحالة</label>
                        <select name="status" class="capitalize block mt-1 w-full" required
                                style="border: 1px solid #cccccc; border-radius: 5px;width: 100%">
                            <option value="{{$project->status }}" selected>{{$project->status }}</option>
                            <option value="{{App\Enums\ProjectState::Proposition}}">مقترح</option>
                            <option value="{{App\Enums\ProjectState::Approving}}">في إنتظار الأعتماد</option>
                            <option value="{{App\Enums\ProjectState::Incomplete}}">قيد التطوير</option>
                            <option value="{{App\Enums\ProjectState::Stopped}}">متوقف</option>
                            <option value="{{App\Enums\ProjectState::Rejected}}">مرفوض</option>
                        </select>
                        <label> القسم </label>
                        {{--                        <div class="select2-purple">--}}
                        {{--                            <select name="departments[]" class="capitalize block mt-1 w-full select2" required--}}
                        {{--                                    style="border: 1px solid #cccccc; border-radius: 5px; direction: rtl;" multiple="multiple"--}}
                        {{--                                    data-placeholder="القسم"--}}
                        {{--                                    data-dropdown-css-class="select2-purple" style="width: 100%;"--}}
                        {{--                                    maxSelectionLength="3">--}}
                        {{--                                --}}{{-- <option  value="{{$project->scope->departmentSeeder->id}}" selected>{{$project->scope->departmentSeeder->name}}</option> --}}
                        {{--                                @foreach($project->departments as $departmentSeeder)--}}
                        {{--                                    <option value="{{$departmentSeeder->id}}"--}}
                        {{--                                            selected>{{$departmentSeeder->name}}</option>--}}
                        {{--                                @endforeach--}}

                        {{--                                @foreach($departments as $departmentSeeder)--}}
                        {{--                                    <option value="{{$departmentSeeder->id}}"> {{$departmentSeeder->name}}</option>--}}
                        {{--                                @endforeach--}}
                        {{--                            </select>--}}
                        {{--                        </div>--}}

                        <div class="select2-purple">
                            <select name="departments[]" class="capitalize block mt-1 w-full select2" required
                                    style="border: 1px solid #cccccc; border-radius: 5px;" multiple="multiple"
                                    data-placeholder="القسم"
                                    data-dropdown-css-class="select2-purple" style="width: 100%;"
                                    maxSelectionLength="3">
                                {{-- <option  value="{{$project->scope->departmentSeeder->id}}" selected>{{$project->scope->departmentSeeder->name}}</option> --}}
                                @foreach($project->departments as $department)
                                    <option value="{{$department->id}}"
                                            selected>{{$department->name}}</option>
                                @endforeach

                                @foreach($departments as $department)
                                    <option value="{{$department->id}}"> {{$department->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label> المجال الذي ينتمي إليه المشروع</label>
                        <input type="text" name="scope" class="capitalize block mt-1 w-full" required
                               style="border: 1px solid #cccccc; border-radius: 5px;width: 100%" id="recipient-name"
                               placeholder="ادخل مجال المشروع " value="{{$project->scope}}">
                        <label> مشرف المشروع</label>
                        <select name="supervisor_id" class="capitalize block mt-1 w-full"
                                style="border: 1px solid #cccccc; border-radius: 5px;width: 100%">
                            <option value="{{null}}">عدم تعيين</option>
                            @if($project->supervisor_id)
                                <option value="{{$project->supervisor->id}}"
                                        selected>{{$project->supervisor->first_name}} {{$project->supervisor->last_name}}</option>
                            @endif
                            @foreach($supervisors as $supervisor)
                                <option value="{{$supervisor->id}}">{{$supervisor->first_name}} {{$supervisor->last_name}}</option>
                            @endforeach
                        </select>

                        {{--                        <label> مشرف المشروع</label>--}}
{{--                        <select name="supervisor_id" class="capitalize block mt-1 w-full"--}}
{{--                                style="border: 1px solid #cccccc; border-radius: 5px;width: 100%">--}}
{{--                            @if($project->supervisor_id)--}}
{{--                                <option value="{{$project->supervisor->id}}"--}}
{{--                                        selected>{{$project->supervisor->first_name}} {{$project->supervisor->last_name}}</option>--}}
{{--                            @endif--}}
{{--                            @foreach($supervisors as $supervisor)--}}
{{--                                <option--}}
{{--                                    value="{{$supervisor->id}}">{{$supervisor->first_name}} {{$supervisor->last_name}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-secondary">حفظ التغييرات</button>
                        {{--                <button type="submit" class="btn btn-success swalDefaultSuccess">--}}
                        {{--                    Launch Success Toast--}}
                        {{--                </button>--}}
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
