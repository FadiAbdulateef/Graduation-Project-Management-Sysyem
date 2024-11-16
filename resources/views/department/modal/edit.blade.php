<div class="modal fade" id="edit{{ $department->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل القسم </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="margin-left: -44rem">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('message.messages_alert')
                <form action="{{ route('departmentSeeder.update', $department->id) }}" method="post" autocomplete="off">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $department->id }}" class="form-control"
                               id="recipient-name">
                        <label for="recipient-name" class="col-form-label">اسم القسم</label>
                        <input type="text" name="name" value="{{ $department->name }}" class="form-control"
                               id="recipient-name" required>
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

{{--            <form action="{{ route('departmentSeeder.edit') }}" method="post" autocomplete="off">--}}
{{--                {{ method_field('patch') }}--}}
{{--                {{ csrf_field() }}--}}
{{--                @csrf--}}
{{--                <div class="modal-body">--}}
{{--                    <p>One fine body&hellip;</p>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="recipient-name" class="col-form-label">اسم القسم</label>--}}
{{--                        <input type="hidden" name="id" value="{{ $departmentSeeder->id }}">--}}
{{--                        <input type="text" name="name" value="{{ $departmentSeeder->name }}" class="form-control">--}}
{{--                        <input type="text" name="name" value="{{ $departmentSeeder->name }}" class="form-control" id="recipient-name">--}}
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
