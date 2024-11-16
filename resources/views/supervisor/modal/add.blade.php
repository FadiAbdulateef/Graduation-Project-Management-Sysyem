<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضافة مشرف </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="margin-left: -44rem">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('supervisor.store') }}" method="post" autocomplete="off">
                    @csrf
                    @include('message.messages_alert')
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">الاسم </label>
                        <input type="text" name="first_name" class="form-control" id="recipient-name"
                               placeholder="ادخل اسم المشرف" value="{{ old('first_name') }}" required>
                        <label for="recipient-name" class="col-form-label">اللقب</label>
                        <input type="text" name="last_name" class="form-control" id="recipient-name"
                               placeholder="اللقب" value="{{ old('last_name') }}" required>

                        <label for="recipient-name" class="col-form-label">البريد الإلكتروني</label>
                        <input type="email" name="email" class="form-control" id="recipient-name"
                               placeholder="Example@gmail.com" value="{{ old('email') }}" required>

                        <label for="recipient-name" class="col-form-label">الدرجة الأكاديمية</label>
                        <select name="academic_rank_id" class="capitalize block mt-1 w-full" required
                                style="border: 1px solid #cccccc; border-radius: 5px;width: 100%">
                            <option value="" selected disabled></option>
                            @foreach ($academicRanks as $academicRank)
                                <option value="{{$academicRank->id }}">{{ $academicRank->academic_degree }}</option>
                            @endforeach
                        </select>

                        <label for="recipient-name" class="col-form-label">نوع المشرف</label>
                        <select name="is_external" selected="داخلي" class="capitalize block mt-1 w-full"
                                style="border: 1px solid #cccccc; border-radius: 5px; font-family: Arial, sans-serif; width: 100%"
                                required>
                            {{--                                 <option selected="selected">----------</option>--}}
                            {{--                                @foreach($supervisors as $supervisor)--}}

                            <option value="0">داخلي</option>
                            <option value="1">خارجي</option>
                            {{--                                @endforeach--}}
                        </select>
                        <div class="form-group">
                            <label> القسم</label>
                            <select name="department_id" id="department_id"
                                    class="capitalize block mt-1 w-full"
                                    style="border: 1px solid #cccccc; border-radius: 5px;width: 100%" required>
                                <option value="" selected disabled></option>
                                @foreach ($departments as $department)
                                    <option class="capitalize"
                                            value="{{ $department->id }}">{{ $department->name }}
                                    </option>
                                @endforeach
                            </select>
                            {{--                            <label> القسم</label>--}}
                            {{--                            <select name="department_id" id="department_id"--}}
                            {{--                                    class="capitalize block mt-1 w-full" required--}}
                            {{--                                    style="border: 1px solid #cccccc; border-radius: 5px;width: 100%">--}}
                            {{--                                @foreach ($departments as $departmentSeeder)--}}
                            {{--                                    <option class="capitalize"--}}
                            {{--                                            value="{{ $departmentSeeder->id }}">{{ $departmentSeeder->name }}</option>--}}
                            {{--                                @endforeach--}}
                            {{--                            </select>--}}
                            <label for="recipient-name" class="col-form-label">السنة الدراسية</label>
                            {{--                        <input type="date" name="for_year" class="form-control" id="recipient-name"--}}
                            {{--                               placeholder="سنة الإشراف">--}}
                            <input type="text" name="for_year" value="{{date('Y')}}" class="form-control"
                                   id="datepicker"
                                   style="border-radius: 5px" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                            <button type="submit" class="btn btn-success swalDefaultSuccess">حفظ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="importSupervisor" tabindex="-1" role="dialog" style="font-family: 'Cairo', sans-serif;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">استيراد من ملف اكسل</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="btn btn-danger" style="margin-left: -40rem">&times;</span>
                </button>
            </div>
            <form action="{{ Url('importSupervisor') }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-body">

                    <br>
                    <div class="row">

                        <div class="col-4">
                            <input class="font-weight-bold border bac " type="file" name="import_file"
                                   required
                                   accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms.excel">
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit"
                            class="btn btn-outline-primary">حفظ
                    </button>
                    <button type="button" class="btn btn-outline-danger"
                            data-dismiss="modal">الغاء
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
