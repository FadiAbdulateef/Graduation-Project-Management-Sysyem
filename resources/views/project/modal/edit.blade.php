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
                <form action="{{ route('project.update',$project->id)}}" method="post" autocomplete="off">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{$project->id}}" class="form-control"
                               id="recipient-name">
                        <label for="recipient-name" class="col-form-label">العنوان </label>
                        <input type="text" name="title" value="{{ $project->title }}" class="form-control"
                               id="recipient-name" required>
{{--                        <label for="recipient-name" class="col-form-label"> عنوان المقترح EN </label>--}}
{{--                        <input type="text" name="title_en" value="{{ $project->title_en }}" class="form-control"--}}
{{--                               id="recipient-name" required>--}}
                    </div>
                    <div class="form-group">
                        <label for="inputDescription"> الوصف </label>
                        <textarea name="short_description" id="inputDescription" class="form-control"
                                  rows="4">{{$project->short_description }}</textarea>
                        <label for="recipient-name" class="col-form-label"> أهداف المشروع </label>
                        @php

                            $values = explode(',', $project->goals); // تقسيم النص إلى مصفوفة باستخدام الفاصلة كمحدد

                            $tagsArray = array_map(function ($value) {
                              return ['value' => $value]; // تحويل كل قيمة إلى قاموس حيث القيمة هي "value"
                                    }, $values);

                                json_encode($tagsArray); // تحويل المصفوفة إلى صيغة JSON

//                                 $request->merge(['goals' => $tags]); // إضافة القيمة إلى الطلب
                        @endphp
                        <textarea name='goals' id="tags2" class="capitalize block mt-1 w-full" style="width: 100%;">
                            {{ json_encode($tagsArray) }}
                                    </textarea>
                    </div>
                    <div class="form-group">
                        <label> الحالة</label>
                        <select name="status" class="capitalize block mt-1 w-full" required
                                style="border: 1px solid #cccccc; border-radius: 5px;width: 100%">
                            <option value="{{$project->status }}" selected>{{$project->status }}</option>
                            <option value="{{App\Enums\ProjectState::Approving}}">في إنتظار الإعتماد</option>
                            <option value="{{App\Enums\ProjectState::Incomplete}}">قيد التطوير</option>
                            <option value="{{App\Enums\ProjectState::Stopped}}">متوقف</option>
                            <option value="{{App\Enums\ProjectState::Complete}}">مكتمل</option>
                            <option value="{{App\Enums\ProjectState::Rejected}}">مرفوض</option>
                        </select>
                    </div>
{{--                    <label> القسم </label>--}}
{{--                    <div class="select2-purple">--}}
{{--                        <select name="departments[]" class="select2" multiple="multiple" data-placeholder="الاقسام المرتبطة بالمشروع"--}}
{{--                                data-dropdown-css-class="select2-purple" style="width: 100%;" maxSelectionLength="3">--}}
{{--                            @foreach($project->departments as $departmentSeeder)--}}
{{--                                <option value="{{$departmentSeeder->id}}"--}}
{{--                                        selected>{{$departmentSeeder->name}}</option>--}}
{{--                            @endforeach--}}
{{--                            @foreach($departments as $departmentSeeder)--}}
{{--                                <option value="{{$departmentSeeder->id}}"> {{$departmentSeeder->name}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}

                    <label> القسم </label>
                    <div class="select2-purple">
                        <select name="departments[]" class="select2" multiple="multiple" data-placeholder="الاقسام المرتبطة بالمشروع"
                                data-dropdown-css-class="select2-purple" style="width: 100%;" maxSelectionLength="3">
                            @foreach($departments as $department)
                                <option value="{{$department->id}}"
                                        @if($project->departments->contains($department)) selected @endif>
                                    {{$department->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{--                    <label> القسم </label>--}}
{{--                    <div class="select2-purple">--}}
{{--                        <select name="departments[]" class="select2" multiple="multiple" data-placeholder="الاقسام المرتبطة بالمشروع"--}}
{{--                                data-dropdown-css-class="select2-purple" style="width: 100%;" maxSelectionLength="3">--}}
{{--                            @foreach($departments as $departmentSeeder)--}}
{{--                                <option value="{{$departmentSeeder->id}}"--}}
{{--                                        @if(in_array($departmentSeeder->id, $project->departments->pluck('id')->toArray())) selected @endif>--}}
{{--                                    {{$departmentSeeder->name}}--}}
{{--                                </option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}


                    <div class="form-group">
                        <label> المجال الذي ينتمي إليه المشروع</label>
                        <input type="text" name="scope" class="form-control" id="recipient-name"
                               placeholder="ادخل مجال المشروع " value="{{$project->scope}}">
                    </div>
                    <div class="form-group">
                        <label> مشرف المشروع</label>
                        <select name="supervisor_id" class="capitalize block mt-1 w-full" style="border: 1px solid #cccccc; border-radius: 5px;width: 100%">
                        <option value="{{null}}">عدم تعيين</option>
                            @if($project->supervisor_id)
                                <option value="{{$project->supervisor->id}}"
                                        selected>{{$project->supervisor->first_name}} {{$project->supervisor->last_name}}</option>
                            @endif
                            @foreach($supervisors as $supervisor)
                                <option value="{{$supervisor->id}}"> {{$supervisor->first_name}}</option>
                            @endforeach
                        </select>
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
{{--<div class="modal fade" id="modal-secondary">--}}
{{--    <div class="modal-dialog">--}}
{{--        <div class="modal-content bg-secondary">--}}
{{--            <div class="modal-header">--}}
{{--                <h4 class="modal-title">حذف القسم</h4>--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}

{{--            <form action="{{ route('project.edit') }}" method="post" autocomplete="off">--}}
{{--                {{ method_field('patch') }}--}}
{{--                {{ csrf_field() }}--}}
{{--                @csrf--}}
{{--                <div class="modal-body">--}}
{{--                    <p>One fine body&hellip;</p>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="recipient-name" class="col-form-label">اسم القسم</label>--}}
{{--                        <input type="hidden" name="id" value="{{ $project->id }}">--}}
{{--                        <input type="text" name="name" value="{{ $project->name }}" class="form-control">--}}
{{--                        <input type="text" name="name" value="{{ $project->name }}" class="form-control" id="recipient-name">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="modal-footer justify-content-between">--}}
{{--                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">إغلاق</button>--}}
{{--                    <button type="submit" class="btn btn-outline-light">حفظ التغييرات</button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--        <!-- /.modal-content -->--}}
{{--    </div>--}}
{{--    <!-- /.modal-dialog -->--}}
{{--</div>--}}
{{--<!-- /.modal -->--}}


{{--<!-- Modal -->--}}
{{--<div class="modal fade" id="edit{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"--}}
{{--     aria-hidden="true">--}}
{{--    <div class="modal-dialog" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title" id="exampleModalLabel">{{trans('Dashboard/sections_trans.edit_sections')}}</h5>--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <form action="{{ route('Sections.update', 'test') }}" method="post">--}}
{{--                {{ method_field('patch') }}--}}
{{--                {{ csrf_field() }}--}}
{{--                @csrf--}}
{{--                <div class="modal-body">--}}
{{--                    <label for="exampleInputPassword1">{{trans('Dashboard/sections_trans.name_sections')}}</label>--}}
{{--                    <input type="hidden" name="id" value="{{ $section->id }}">--}}
{{--                    <input type="text" name="name" value="{{ $section->name }}" class="form-control">--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Dashboard/sections_trans.Close')}}</button>--}}
{{--                    <button type="submit" class="btn btn-primary">{{trans('Dashboard/sections_trans.submit')}}</button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
