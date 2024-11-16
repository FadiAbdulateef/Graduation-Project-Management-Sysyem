<div class="modal fade" id="exampleModal{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضافة مناقشة </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="margin-left: -43rem">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('message.messages_alert')
                <form action="{{ route('project_interview.store') }}" method="post" autocomplete="on">
                    @csrf
                    <div class="form-group">
                        <label>مرحلة المناقشة</label>
                        <select name="interview_type" class="capitalize block mt-1 w-full"
                                style="border: 1px solid #cccccc; border-radius: 5px;width: 100%">
                            @foreach($interview_stages as $interview_stage)
                                <option value="{{$interview_stage->title}}"> {{$interview_stage->title}}</option>
                            @endforeach
                        </select>
                        <label>اسم المشروع</label>
                        <select name="project_id" class="capitalize block mt-1 w-full"
                                style="border: 1px solid #cccccc; border-radius: 5px;width: 100%">
                            <option value="{{$project->id}}" selected>  {{$project->title}}</option>
                        </select>
                        <label for="message-text" class="col-form-label"> أعضاء لجنة المناقشة </label>
                        <div class="select2-purple">
                            <select name="interviewers[]" id="select1" class="select2" multiple="multiple" data-placeholder=""
                                    data-dropdown-css-class="select2-purple" style="width: 100%;">
                                @foreach($supervisors as $supervisor)
                                    <option
                                        value="{{$supervisor->first_name}}"> {{$supervisor->first_name}} {{$supervisor->last_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="recipient-name" class="col-form-label">المكان </label>
                        <input type="text" name="place" class="form-control" id="recipient-name" placeholder=""
                               required>
                        <label for="recipient-name" class="col-form-label">تاريخ المناقشة</label>
                        <input type="date" name="interview_date" class="form-control" id="recipient-name"
                               placeholder="ادخل تاريخ المناقشة  " required>

                        <label for="recipient-name" class="col-form-label">ملاحظة</label>
                        <input type="text" name="notes" class="form-control" id="recipient-name"
                               placeholder="" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                        <button type="submit" class="btn btn-success">تأكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

