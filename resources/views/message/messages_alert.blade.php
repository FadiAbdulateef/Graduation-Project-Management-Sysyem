@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session()->has('add'))
{{--    <div class="alert alert-success">--}}
{{--        <ul>--}}
            <script>
                window.onload = function () {
                    notif({
                        msg: "تمت الإضافة بنجاح",
                        type: "success"
                    });
                }

            </script>
{{--        </ul>--}}
{{--    </div>--}}
@endif

@if (session()->has('edit'))
    <script>
        // window.onplay
        window.onload = function () {
            notif({
                msg: "تم تعديل البيانات بنجاح",
                type: "success"
            });
        }

    </script>
@endif

@if (session()->has('delete'))
    <script>
        window.onload = function () {
            notif({
                msg: "تم حذف البيانات بنجاح",
                type: "success"
            });
        }

    </script>
@endif

