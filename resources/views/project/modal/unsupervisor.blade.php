<div class="modal fade" id="unsupervisor{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">الغاء الاشراف</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="margin-left: -38rem">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('message.messages_alert')
                <a href="{{ route('projects.abandon',$project->id) }}">
                    <p class="text-sm text-gray-500">
                        هل انت متاكد من إلغاء الإشراف على مشروع{{$project->title}}
                    </p>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                        <button type="submit" class="btn btn-success ">تأكيد</button>
                    </div>
                </a>
        </div>
    </div>
</div>
