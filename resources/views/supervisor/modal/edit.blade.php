<div class="modal fade" id="edit{{ $supervisor->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل معلومات المشرف </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="margin-left: -33rem">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if($supervisor->user_id)
                <form action="{{ route('supervisor.update', $supervisor->user_id) }}" method="post" autocomplete="off">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{ $supervisor->id }}" class="form-control"
                                   id="recipient-name">
                            <label for="recipient-name" class="col-form-label">الاسم </label>
                            <input type="text" name="first_name" value="{{ $supervisor->first_name }}" class="form-control"
                                   id="recipient-name" placeholder="ادخل اسم المشرف">
                            <label for="recipient-name" class="col-form-label"> اللقب</label>
                            <input type="text" name="last_name" value="{{$supervisor->last_name}}" class="form-control"
                                   id="recipient-name" placeholder="ادخل اللقب ">
                            <label for="recipient-name" class="col-form-label">البريد الإلكتروني</label>
                            <input type="email" name="email" value="{{ $supervisor->email }}" class="form-control"
                                   id="recipient-name" placeholder="Example@gmail.com">
{{--                            <label for="recipient-name" class="col-form-label">الدرجة الأكاديمية</label>--}}
{{--                            <select name="academic_ranks_id" class="capitalize block mt-1 w-full" required--}}
{{--                                    style="border: 1px solid #cccccc; border-radius: 5px;width: 100%">--}}
{{--                                <option selected value="{{$supervisor->academic_rank->id}}">{{$supervisor->academic_rank->academic_degree}}</option>--}}
{{--                                @foreach ($academicRanks as $academicRank)--}}
{{--                                    <option value="{{$academicRank->id}}">{{$academicRank->academic_degree}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
                            <label for="recipient-name" class="col-form-label">الدرجة الأكاديمية</label>
                            <select name="academic_rank_id" class="capitalize block mt-1 w-full" required
                                    style="border: 1px solid #cccccc; border-radius: 5px;width: 100%">
                                @if($supervisor->academic_rank)
                                    <option value="{{$supervisor->academic_rank->id}}" selected>{{$supervisor->academic_rank->academic_degree}}</option>
{{--                                    <option selected value="{{$supervisor->academic_ranks_id}}">{{$supervisor->academic_rank->academic_degree}}</option>--}}
                                @endif
                                @foreach ($academicRanks as $academicRank)
                                    <option value="{{$academicRank->id}}">{{$academicRank->academic_degree}}</option>
                                @endforeach
                            </select>
                            <label for="recipient-name" class="col-form-label">نوع المشرف</label>
                            <select name="is_external" selected="{{ $supervisor->is_external }}"
                                    class="capitalize block mt-1 w-full" required
                                    style="border: 1px solid #cccccc; border-radius: 5px;width: 100%">
                                <option value="0">داخلي</option>
                                <option value="1">خارجي</option>
                            </select>
                            <label for="recipient-name" class="col-form-label"> القسم</label>
                            <select name="department_id" class="capitalize block mt-1 w-full" required
                                    style="border: 1px solid #cccccc; border-radius: 5px;width: 100%">
                                <option value="{{$supervisor->department->id}}" selected>{{$supervisor->department->name}}</option>
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                            </select>
                            <label for="recipient-name" class="col-form-label">العام الدراسي </label>
                            <input type="text" name="for_year" value="{{ $supervisor->for_year }}" class="form-control"
                                   id="datepicker">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                            <button type="submit" class="btn btn-secondary">حفظ التغييرات</button>
                        </div>
                    </div>
                </form>
                @else
                    <form action="{{ route('supervisor.update', $supervisor->id) }}" method="post" autocomplete="off">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{ $supervisor->id }}" class="form-control"
                                       id="recipient-name">
                                <label for="recipient-name" class="col-form-label">اسم المشرف</label>
                                <input type="text" name="first_name" value="{{ $supervisor->first_name }}" class="form-control"
                                       id="recipient-name" placeholder="ادخل اسم المشرف">
                                <label for="recipient-name" class="col-form-label">اسم المشرف</label>
                                <input type="text" name="last_name" value="{{$supervisor->last_name}}" class="form-control"
                                       id="recipient-name" placeholder="ادخل اللقب ">
                                <label for="recipient-name" class="col-form-label">البريد الإلكتروني</label>
                                <input type="email" name="email" value="{{ $supervisor->email }}" class="form-control"
                                       id="recipient-name" placeholder="الإيميل">
                                <label for="recipient-name" class="col-form-label">الدرجة الأكاديمية</label>
                                <select name="academic_rank_id" class="capitalize block mt-1 w-full" required
                                        style="border: 1px solid #cccccc; border-radius: 5px;width: 100%">
                                    @if($supervisor->academic_rank)
                                        <option value="{{$supervisor->academic_rank->id}}" selected>{{$supervisor->academic_rank->academic_degree}}</option>
{{--                                        <option selected value="{{$supervisor->academic_ranks_id}}">{{$supervisor->academic_rank->academic_degree}}</option>--}}
                                    @endif
                                    @foreach ($academicRanks as $academicRank)
                                        <option value="{{$academicRank->id}}">{{$academicRank->academic_degree}}</option>
                                    @endforeach
                                </select>
                                <label for="recipient-name" class="col-form-label"> القسم</label>
                                <select name="department_id" class="capitalize block mt-1 w-full" required
                                        style="border: 1px solid #cccccc; border-radius: 5px;width: 100%">
                                    <option value="{{$supervisor->department->id}}" selected>{{$supervisor->department->name}}</option>
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                                <label for="recipient-name" class="col-form-label">نوع المشرف</label>
                                <select name="is_external" selected="{{ $supervisor->is_external }}"
                                        class="capitalize block mt-1 w-full" required
                                        style="border: 1px solid #cccccc; border-radius: 5px;width: 100%">
                                    {{--                                                             <option selected="selected">----------</option>--}}
                                    {{--                                                            @foreach($supervisors as $supervisor)--}}
                                    <option value="0">داخلي</option>
                                    <option value="1">خارجي</option>
                                    {{--                                                            @endforeach--}}
                                </select>
                                <label for="recipient-name" class="col-form-label">العام الدراسي </label>
                                <input type="text" name="for_year" value="{{ $supervisor->for_year }}" class="form-control"
                                       id="datepicker">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                                <button type="submit" class="btn btn-secondary">حفظ التغييرات</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>

</div>
