<div class="modal fade" id="registration{{$project->id}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تشكيل فريق المشروع </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="margin-left: -35rem">&times;</span>
                </button>
            </div>
            <div class="modal-body">
{{--                @include('message.messages_alert')--}}
                <form action="{{ route('suggestion.registration',$project->id)}}" method="post" autocomplete="off">
                    @method('POST')
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{$project->id}}" class="form-control"
                               id="recipient-name">
                        <label for="message-text" class="col-form-label"> أعضاء الفريق </label>
                        <div class="select2-purple">
                            <select name="graduates[]" class="select2" multiple="multiple"
                                    data-placeholder="حدد أعضاء الفريق" data-dropdown-css-class="select2-purple"
                                    style="width: 100%;" maxSelectionLength={{$setting->team_members}}>
                                @foreach($graduates as $graduatee)
                                    @foreach($graduatee as $graduate)
                                        <option value="{{$graduate->id}}" {{auth()->user()->id==$graduate->user_id ?'selected':''}} >{{$graduate->first_name}} {{$graduate->last_name}}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                            <button type="submit" class="btn btn-success ">تأكيد</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
