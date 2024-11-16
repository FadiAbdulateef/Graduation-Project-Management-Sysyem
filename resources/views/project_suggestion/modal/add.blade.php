<div class="modal fade" id="myexampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="card-title">إضافة مقترح جديد</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="margin-left: -40rem">&times;</span>
                </button>
            </div>
            <div class="modal-body">
{{--                @include('message.messages_alert')--}}
                <div class="card-body p-0">
                </div>
                <div class="bs-stepper">
                    <div class="bs-stepper-header" role="tablist">
                        <!-- your steps here -->
                        <div class="step" data-target="#logins-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="logins-part"
                                    id="logins-part-trigger">
                                <span class="bs-stepper-circle">1</span>
                                <span class="bs-stepper-label">أساسية</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#information-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="information-part"
                                    id="information-part-trigger">
                                <span class="bs-stepper-circle">2</span>
                                <span class="bs-stepper-label">ثانوية</span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content">
                        <form action="{{ route('suggestion.store') }}" method="post" autocomplete="on">
                            @csrf
                            @method('POST')
                            <!-- your steps content here -->
                            <div id="logins-part" class="content" role="tabpanel"
                                 aria-labelledby="logins-part-trigger">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">عنوان المشروع </label>
                                    <input type="text" name="title" class="form-control" id="recipient-name"
                                           placeholder=" ادخل العنوان " required>
                                    <label for="recipient-name" class="col-form-label"> أهداف المشروع </label>
                                    <textarea name='goals' id="tags2" class="capitalize block mt-1 w-full"
                                              style="width: 100%;" placeholder="ادخل أهداف المشروع " required>
                                    </textarea>

                                    <label for="inputDescription">وصف المشروع</label>
                                    <textarea name="short_description" id="inputDescription" class="form-control"
                                              rows="4" required></textarea>
                                    <div class="form-group">
                                        <h style="color: red">تنبيه</h>
                                        <h8 class="text-xs">
                                            يرجى كتابة وصف المشروع بطريقة منظمة ومبسطة بحيث يتسنى للقارئ
                                            من خلالها التعرف على جميع جوانب المشروع.
                                        </h8>
                                    </div>
                                </div>
                                <a class="btn btn-primary" style="margin-right: 23rem"
                                   onclick="stepper1.next()">التالي
                                </a>
                            </div>
                            <div id="information-part" class="content" role="tabpanel"
                                 aria-labelledby="information-part-trigger">
                                <div class="form-group">
                                    <label> المجال الذي ينتمي إليه المشروع</label>
                                    <input type="text" name="scope" class="form-control" id="recipient-name"
                                           placeholder="ادخل مجال المشروع " required>
                                </div>
                                {{--                                @can('suggestion-create')--}}
                                <div class="form-group">
                                    <label> القسم </label>
                                    <select name="department_id" class="capitalize block mt-1 w-full" required
                                            style="border: 1px solid #cccccc; border-radius: 5px;width: 100%">
                                        <option value="" selected disabled></option>
                                        @foreach($departments as $department)
                                            @if(auth()->user()->supervisor)
                                                @if($department->id == auth()->user()->supervisor->department_id)
                                                    <option value="{{$department->id}}"
                                                            selected> {{$department->name}}</option>
                                                @endif
                                            @else
                                                <option value="{{$department->id}}"> {{$department->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    @can('supervisor-create')
                                        <label> المشرف</label>
                                        <select name="supervisor_id" class="capitalize block mt-1 w-full" title="تعيين مشرف للمشروع"
                                                style="border: 1px solid #cccccc; border-radius: 5px;width: 100%">
{{--                                            <option value="" selected disabled></option>--}}
                                            <option value="{{null}}" selected>عدم تعيين</option>
                                            @foreach($supervisors as $supervisor)
                                                <option
                                                    value="{{$supervisor->id}}"> {{$supervisor->first_name}} {{$supervisor->last_name}}</option>
                                            @endforeach
                                        </select>
                                    @endcan
                                    @can('project-supervise')
                                        <label class="inline-flex items-center"></label>
                                        <input type="checkbox" name="supervisor_id"
                                               value="{{ Auth::user()->supervisor->id ?? null}}"
                                               class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <span class="ml-2 text-sm text-gray-600">
                                         Iانا سوف اشرف على هذا المشروع
                                         </span>

                                    @endcan
                                </div>
                                <button class="btn btn-primary" onclick="stepper1.previous()">السابق</button>
                                <button type="submit" class="btn btn-primary" swalDefaultSuccess
                                        style="margin-right: 18rem">حفظ
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

