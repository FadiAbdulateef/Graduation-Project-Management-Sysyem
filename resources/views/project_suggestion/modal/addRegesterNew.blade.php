<div class="modal fade" id="addRegisterNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="card-title">التسجيل في مشروع جديد</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="margin-left: -36rem">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('message.messages_alert')
                <div class="card-body p-0">
                </div>
                <div class="bs-stepper" id="stepper">
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
                        <form action="{{ route('suggestion.addRegisterNew') }}" method="post" autocomplete="on">
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
                                    <textarea name='goals' id="tags2" class="capitalize block mt-1 w-full" style="width: 100%;" placeholder="ادخل أهداف المشروع " required>

                                    </textarea>

                                    <label for="inputDescription">وصف المشروع</label>
                                    <textarea name="short_description" id="inputDescription" class="form-control"
                                              rows="4" required></textarea>
                                    <div class="form-group">
                                        <h style="color: red">تنبيه</h>
                                        <h8 class="text-xs">يرجى كتابة وصف المشروع بطريقة منظمة ومبسطة بحيث يتسنى للقارئ
                                            من خلالها التعرف على جميع جوانب المشروع.
                                        </h8>
                                    </div>
                                </div>
                                <a class="btn btn-primary" style="margin-right: 23rem"
                                   onclick="stepper.next()">التالي
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
                                            @if(auth()->user()->graduate)
                                                @if($department->id == auth()->user()->graduate->department_id)
                                                    <option  value="{{$department->id}}" selected> {{$department->name}}</option>
                                                @endif
                                            @else
                                                <option value="{{$department->id}}"> {{$department->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                        <label for="message-text" class="col-form-label"> أعضاء الفريق  </label>
                                        <div class="select2-purple">
                                            <select name="graduates[]" id="tags3" class="select2" multiple="multiple" data-placeholder="حدد أعضاء الفريق" data-dropdown-css-class="select2-purple" style="width: 100%;" maxselectionlength="{{$setting->team_members}}" minimumSelectionLength="2" >
                                                @foreach($graduates as $graduate)
                                                @if(auth()->user()->id==$graduate->user_id )
                                                        <option  value="{{$graduate->id}}" selected>{{$graduate->first_name}} {{$graduate->last_name}}</option>
                                                    @else
                                                        <option  value="{{$graduate->id}}">{{$graduate->first_name}} {{$graduate->last_name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                </div>
                                <button class="btn btn-primary" onclick="stepper.previous()">السابق</button>
                                <button type="submit" class="btn btn-primary" swalDefaultSuccess
                                        style="margin-right: 18rem">حفظ
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-body -->
{{--                <div class="modal-footer">--}}
{{--                    <div class="card-footer">--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</div>
