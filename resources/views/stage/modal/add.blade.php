{{--<link rel="stylesheet" href="{{asset('resources/views/stage/modal/css/mybutton.css')}}">--}}

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">مراحل متابعة المشاريع </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="margin-left: -34rem">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('message.messages_alert')
                <form action="{{ route('stage.store') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">مرحلة جديدة</label>
                        <input type="text" name="title" class="form-control" id="recipient-name"
                               placeholder="عنوان المرحلة  " required>
{{--                        <br>--}}
{{--                        <input type="text" name="title_en" class="form-control" id="recipient-name"--}}
{{--                               placeholder="اسم المرحلة بالإنجليزية " required>--}}
                        <label> القسم</label>
                        <select id="mySelect" name="department_id" class="capitalize block mt-1 w-full"
                                style="width: 100%; border-radius: 5px; border-color: #cccccc">
{{--                            <option selected="selected"></option>--}}
                            @foreach($departments as $department)
                                <option value="{{$department->id}}">{{$department->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                        <button id="myButton" type="submit" class="btn btn-success swalDefaultSuccess">تأكيد
                        </button>
{{--                        <button--}}
{{--                            href="{{URL::asset('resources/views/stage/modal/css/mybutton.css','resources/views/stage/modal/js/mybutton.js')}}"--}}
{{--                            id="myButton" type="submit" class="btn btn-success swalDefaultSuccess">تأكيد--}}
{{--                        </button>--}}
                    </div>
                </form>
            </div>
        </div>
    </div>

{{--    <script src="{{asset('resources/views/stage/modal/js/mybutton.js')}}"></script>--}}
</div>
