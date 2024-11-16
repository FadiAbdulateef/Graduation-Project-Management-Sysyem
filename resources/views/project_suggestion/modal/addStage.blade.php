<div class="modal fade" id="addStage{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">إضافة مرحلة جديدة </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="margin-left: -37rem">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('message.messages_alert')
{{--                <div id="tags1" data-whitelist="{{ json_encode($stages,true)}}"></div>--}}
                <form id="kt_modal_new_target_form" action="{{ route('project_stage.store',$project->id)}}" method="post"  autocomplete="on">
                    @method('POST')
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="project_id" value="{{$project->id}}" class="form-control">
                        <label for="recipient-name" class="col-form-label">عنوان المرحلة</label>
                        <textarea name='tags2' id="tags2" placeholder='Stage name' class="w-full" style="border-radius: 5rem">
                        </textarea>
                    </div>
                    <div class="modal-footer">

{{--                            <button id="remove-all-tags-R" class=" fe fe-trash btn btn-danger" > حذف مراحل انجاز المشروع الافتراضية</button>--}}
                        <button  type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                        <button  type="submit" class="btn btn-success">تأكيد</button>
                    </div>
                </form>
                @if (Session::has('message'))
                    <script>
                        swal("Message","{{ Session::get('message') }}", 'warning',{
                            button:true,
                            button: "OK",
                            timer: 3000,
                            dangerMode:true,
                        });
                    </script>
                @endif
            </div>
        </div>
    </div>
</div>
