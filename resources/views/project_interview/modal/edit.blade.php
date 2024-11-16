<div class="modal fade" id="edit{{ $project_interview->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل مناقشة </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="margin-left: -44rem">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('message.messages_alert')
                <form action="{{ route('project_interview.update',$project_interview->id)}}" method="post" autocomplete="off">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label>مرحلة المناقشة</label>
                        <select name="interview_type" class="form-control select" style="width: 100%;">
                            <option value="project_id" selected="selected" disabled>---اختر مرحلة---</option>
                            @foreach($interview_stages as $interview_stage)
                                <option  value="{{$interview_stage->title}}"> {{$interview_stage->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{$project_interview->id}}" class="form-control"
                               id="recipient-name">
                            <label>أسم المشروع</label>
                        <select name="project_id" class="form-control select" style="width: 100%;">
                            <option selected="selected" value="{{$project_interview->project_id}}"> {{$project_interview->project->title}}</option>
                        @foreach($projects as $project)
                                <option  value="{{$project->id}}"> {{$project->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{--                        id`, `interview_date`, `interviewers`, `place`, `suggestions`, `recommendations`, `notes`, `attachments`, `project_id`, `created_at`, `updated_at`--}}
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">المكان </label>
                        <input type="text" name="place" value="{{$project_interview->place}}" class="form-control" id="recipient-name" placeholder="ادخل مكان المناقشة" required>
                        <label for="recipient-name" class="col-form-label">تاريخ المناقشة</label>
                        <input type="datetime-local" name="interview_date" value="{{$project_interview->interview_date}}" class="form-control" id="recipient-name" placeholder="ادخل تاريخ المناقشة  " required>
                    </div>
                    <div class="form-group">

                        <label for="message-text" class="col-form-label"> اعضاء المناقشة  </label>
                        <div class="select2-purple">
                            <select name="interviewers[]"  class="select2" multiple="multiple" data-placeholder="اختر الاعضاء" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                @foreach($supervisors as $supervisor)
                                    <option  value="{{$supervisor->first_name}}"> {{$supervisor->first_name}}</option>
                                @endforeach
                            </select>
                        </div>
                            <label for="recipient-name" class="col-form-label">الملاحظة</label>
                            <input type="text" name="notes" class="form-control" id="recipient-name" placeholder="ادخل ملاحظة تنبية مثلاً   " required>
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

