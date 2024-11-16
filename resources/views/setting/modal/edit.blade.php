<div class="modal fade" id="settingsModal" tabindex="-1" role="dialog" aria-labelledby="settingsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="settingsModalLabel">تعديل الإعدادات</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('settings.index') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="team_members">عدد أعضاء الفريق</label>
                        <input type="number" class="form-control" id="team_members" name="team_members" value="{{ $setting->team_members }}">
                    </div>
                    <div class="form-group">
                        <label for="supervisor_score">درجة المشرف</label>
                        <input type="number" class="form-control" id="supervisor_score" name="supervisor_score" value="{{ $setting->supervisor_score }}">
                    </div>
                    <div class="form-group">
                        <label for="committee_member_score">درجة عضو لجنة المناقشة</label>
                        <input type="number" class="form-control" id="committee_member_score" name="committee_member_score" value="{{ $setting->committee_member_score }}">
                    </div>
                    <div class="form-group">
                        <label for="registration_start_date">تاريخ بدء التسجيل</label>
                        <input type="date" class="form-control" id="registration_start_date" name="registration_start_date" value="{{ $setting->registration_start_date }}">
                    </div>
                    <div class="form-group">
                        <label for="registration_end_date">تاريخ إنتهاء فترة التسجيل</label>
                        <input type="date" class="form-control" id="registration_end_date" name="registration_end_date" value="{{ $setting->registration_end_date }}">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                <button type="button" class="btn btn-primary">حفظ التغييرات</button>
            </div>
        </div>
    </div>
</div>

