<div class="modal fade" id="unassign{{$project_team->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">مغادرة المجموعة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="margin-left: -40rem">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a href="{{ route('project_team.destroy',$project_team->id) }}">
                    <p class="text-xl-center text-gray-500">
                           لا يمكنك الإنضمام إلى هذا الفريق مره أخرى  , هل انت متأكد من ذلك؟
                    </p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                        <button type="submit" class="btn btn-success ">تأكيد</button>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
