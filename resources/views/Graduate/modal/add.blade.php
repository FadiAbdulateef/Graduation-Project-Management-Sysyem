<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">إضافة خريج </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="margin-left: -44rem">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('graduate.store') }}" method="post" enctype="multipart/form-data"
                      autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">الاسم</label>
                        <input type="text" name="first_name" class="form-control" style="border-radius: 5px"
                               id="recipient-name" autofocus
                               placeholder="ادخل الاسم" required>

                        <label for="recipient-name" class="col-form-label"> اللقب</label>
                        <input type="text" name="last_name" class="form-control" id="recipient-name"
                               style="border-radius: 5px"
                               placeholder="ادخل اللقب " required>

                        <label for="recipient-name" class="col-form-label">البريد الإلكتروني</label>
                        <input type="email" name="email" class="form-control" id="recipient-name"
                               style="border-radius: 5px"
                               placeholder="Email@gmail.com  " required>
                        <label for="phone">الرقم الجامعي</label>
                        <input type="number" name="serial_number" pattern="[0-9]{1,15}" class="form-control" style="border-radius: 5px;" placeholder="الرقم الجامعي" title="ينبغي أن لا يتجاوز الرقم الجامعي 15 رقماً" maxlength="10">
{{--                        <label class="col-form-label"> الهاتف </label>--}}
{{--                        <input type="number" name="phone" class="form-control" style="border-radius: 5px"--}}
{{--                               placeholder=" رقم الهاتف" required maxlength="15">--}}
                        <label for="phone">الهاتف</label>
                        <input type="tel" id="phone" name="phone" pattern="[0-9]{1,15}" class="form-control" style="border-radius: 5px;" placeholder="رقم الهاتف" title="ينبغي أن لا يتجاوز رقم الهاتف 15 رقماً" maxlength="15">
                        <span id="error-msg" class="error-message"></span>
                        <label> القسم</label>
                        <select name="department_id" id="department_id"
                                class="capitalize block mt-1 w-full" required style="border: 1px solid #cccccc; border-radius: 5px;width: 100%">
                            <option value="" selected disabled></option>
                            @foreach ($departments as $department)
                                <option class="capitalize"
                                        value="{{ $department->id }}" >{{ $department->name }}
                                </option>
                            @endforeach
                        </select>

                        <label for="recipient-name" class="col-form-label">سنة التخرج</label>
                        <input type="text" name="for_year" value="{{date('Y')}}" class="form-control" id="datepicker"
                               style="border-radius: 5px" required>
                        {{--                        <input type="text" name="for_year" class="form-control" id="datepicker" style="border-radius: 10px; background-color: #f0f0f0" required>--}}
                        <br/>
                        <label class="col-md-4" align="right" for="image"> تحميل صورة</label>
                        <input type="file" name="file" class="form-control"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                        <button type="submit" class="btn btn-success swalDefaultSuccess">تأكيد</button>
                    </div>
                </form>
{{--                @if (Session::has('message'))--}}
{{--                    <script>--}}
{{--                        swal("Message", "{{ Session::get('message') }}", 'warning', {--}}
{{--                            button: true,--}}
{{--                            button: "OK",--}}
{{--                            timer: 3000,--}}
{{--                            dangerMode: true,--}}
{{--                        });--}}
{{--                    </script>--}}
{{--                @endif--}}
            </div>
        </div>
    </div>
</div>
<div class="modal" id="importGraduate" tabindex="-1" role="dialog" style="font-family: 'Cairo', sans-serif;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">استيراد من ملف اكسل</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="btn btn-danger" style="margin-left: -40rem">&times;</span>
                </button>
            </div>
            <form action="{{ Url('importGraduate') }}" method="POST"
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
                            class="btn btn-outline-primary">حفظ</button>
                    <button type="button" class="btn btn-outline-danger"
                            data-dismiss="modal">الغاء</button>
                </div>
            </form>
        </div>
    </div>
</div>
