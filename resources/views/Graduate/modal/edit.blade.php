<div class="modal fade" id="edit{{ $graduate->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات الخريج </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="margin-left: -37rem">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if($graduate->user_id)
                    <form action="{{ route('graduate.update',$graduate->user_id) }}" method="post" autocomplete="off">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $graduate->id }}" class="form-control"
                        id="recipient-name">
                        <label for="recipient-name" class="col-form-label">الاسم</label>
                        <input type="text" name="first_name" value="{{ $graduate->first_name }}" class="form-control"
                        id="recipient-name" required>
                        <label for="recipient-name" class="col-form-label">اللقب</label>
                        <input type="text" name="last_name" value="{{ $graduate->last_name }}" class="form-control" id="recipient-name" placeholder="ادخل اسم الخريج" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">البريد الإلكتروني</label>
                        <input type="email" name="email" value="{{ $graduate->email }}" class="form-control" id="recipient-name" placeholder="ادخل اسم الخريج" required>
                        <label> القسم </label>
                        <select name="department_id" class="capitalize block mt-1 w-full border-" required
                                style="border: 1px solid #cccccc; border-radius: 5px; font-family: Arial, sans-serif;width: 100%;">
                            <option value="{{$graduate->department->id}}" selected >{{$graduate->department->name}}</option>
                            @foreach($departments as $department)
                                <option  value="{{$department->id}}"> {{$department->name}}</option>
                            @endforeach
                        </select>
                        <label for="phone" class="col-form-label">الهاتف</label>
                        <input type="tel" name="phone" value="{{ $graduate->phone }}" class="form-control" id="phone" placeholder="رقم الهاتف" maxlength="15">
                        <label for="recipient-name" class="col-form-label">سنة التخرج</label>
                        <input type="text" name="for_year" value="{{ $graduate->for_year }}" class="form-control" id="datepicker" placeholder="ادخل السنة " required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-secondary">حفظ التغييرات</button>
                        {{--                <button type="submit" class="btn btn-success swalDefaultSuccess">--}}
                        {{--                    Launch Success Toast--}}
                        {{--                </button>--}}
                    </div>
                </form>
                @else
                    <form action="{{ route('graduate.update',$graduate->id) }}" method="post" autocomplete="off">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{ $graduate->id }}" class="form-control"
                                   id="recipient-name">
                            <label for="recipient-name" class="col-form-label">الاسم</label>
                            <input type="text" name="first_name" value="{{ $graduate->first_name }}" class="form-control"
                                   id="recipient-name" required>
                            <label for="recipient-name" class="col-form-label">اللقب</label>
                            <input type="text" name="last_name" value="{{ $graduate->last_name }}" class="form-control" id="recipient-name" placeholder="ادخل اسم الخريج" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">البريد الإلكتروني</label>
                            <input type="email" name="email" value="{{ $graduate->email }}" class="form-control" id="recipient-name" placeholder="ادخل اسم الخريج" required>
                            <label> القسم </label>
                            <select name="department_id" class="capitalize block mt-1 w-full border-" required
                                    style="border: 1px solid #cccccc; border-radius: 5px; font-family: Arial, sans-serif;width: 100%;">
                                <option value="{{$graduate->department->id}}" selected >{{$graduate->department->name}}</option>
                                @foreach($departments as $department)
                                    <option  value="{{$department->id}}"> {{$department->name}}</option>
                                @endforeach
                            </select>
                            <label for="phone" class="col-form-label">الهاتف</label>
                            <input type="tel" name="phone" value="{{ $graduate->phone }}" class="form-control" id="phone" placeholder="رقم الهاتف" maxlength="15">
                            <label for="recipient-name" class="col-form-label">سنة التخرج</label>
                            <input type="text" name="for_year" value="{{ $graduate->for_year }}" class="form-control" id="datepicker" placeholder="ادخل السنة " required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                            <button type="submit" class="btn btn-secondary">حفظ التغييرات</button>
                            {{--                <button type="submit" class="btn btn-success swalDefaultSuccess">--}}
                            {{--                    Launch Success Toast--}}
                            {{--                </button>--}}
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>

</div>

