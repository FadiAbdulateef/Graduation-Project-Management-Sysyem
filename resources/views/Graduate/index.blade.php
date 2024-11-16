@extends('layouts.master')
@section('title')

    ادارة مشاريع التخرج
@endsection

@section('css')
    {{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="{{asset('assets/plugins/toast/toast.min.css')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    {{--    <link rel="stylesheet" href="{{('css/errormessage.css')}}">--}}
@endsection

@section('title_Dashboard')
    الداشبورد
@endsection

@section('title_Home')
{{--    <a href="{{route('welcome')}}">الرئيسية</a>--}}
    <a href="{{route('project.index')}}">المشاريع</a>
@endsection

@section('title_Dashboard_v1')
    إدارة الخريجين
@endsection

@section('content')
    @include('message.messages_alert')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    href="#exampleModal" data-whatever="@fat">إضافة
                            </button>
                            <button type="button" class="btn btn-danger" id="btn_delete_all">حذف</button>
                            <span class="text-left">
{{--                                <div class="text-left">--}}
                                <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                        data-target="#importGraduate">
                                    <span class="icon text-white-50"> <i class="fa fa-plus"></i> </span>
                                    <span class="text">  إستيراد</span>
                                </button>
{{--                                </div>--}}
                            </span>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body symbol-group">
                            <table id="example1" class="DataTables table table-hover table-striped table-head-fixed">

                            {{--                            <table id="example1" class="DataTables table table-hover table-striped table-head-fixed table-responsive">--}}
                                <thead>
                                <tr>
                                    {{--                                    <th>#</th>--}}
                                    <th><input name="select_all" id="example-select-all" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm
                                                focus:border-indigo-300 focus:ring focus:ring-indigo-200"/></th>
                                    <th>صورة</th>
                                    <th> الاسم</th>
                                    <th> البريد الإلكتروني</th>
                                    <th>المشروع</th>
                                    <th> القسم</th>
                                    <th> سنة التخرج</th>
                                    <th> الهاتف</th>
                                    <th>مُضاف في</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($graduates as $graduate)
                                    <tr>
                                        {{--                                        <td>{{$graduate->id}}</td>--}}
                                        <td>
                                            <input type="checkbox" name="delete_select" value="{{$graduate->id}}"
                                                   class="delete_select rounded border-gray-300 text-indigo-600 shadow-sm
                                                focus:border-indigo-300 focus:ring focus:ring-indigo-200">
                                        </td>
                                        <td>
                                            {{--                                            <img src="{{URL::asset($graduate->avatar)}}" alt="AdminLTE Logo" width="50px" height="50px" class="brand-image img-circle elevation-3" style=" opacity: .8">--}}
                                            @if($graduate->avatar)
                                                <a href="{{route('users.show',$graduate->user_id)}}">
                                                    <img src="{{URL::asset($graduate->avatar)}}" alt="SPMS"
                                                         width="50px" height="50px"
                                                         class="brand-image img-circle elevation-3"
                                                         style=" opacity: .8">
                                                </a>

                                            @else
                                                @if($graduate->user_id)
                                                    <a href="{{route('users.show',$graduate->user_id )}}">
                                                        {{--                                                <a href="{{route('users.show', ['user' => $user->id])}}">--}}
                                                        <img src="{{URL::asset('assets/img/graduat_defualt.jpg')}}"
                                                             alt="SPMS" width="50px" height="50px"
                                                             class="brand-image img-circle elevation-3"
                                                             style=" opacity: .8">
                                                    </a>
                                                @else
                                                    <img src="{{URL::asset('assets/img/graduat_defualt.jpg')}}"
                                                         alt="SPMS" width="50px" height="50px"
                                                         class="brand-image img-circle elevation-3"
                                                         style=" opacity: .8">
                                                @endif
                                            @endif
                                        </td>
                                        <td>{{$graduate->first_name}} {{$graduate->last_name}}</td>
                                        <td>{{$graduate->email}}</td>
                                        <td>@if($graduate->project)
                                                {{$graduate->project->title}}
                                            @else
                                                {{'لم يسجل بعد'}}
                                            @endif
                                        </td>
                                        <td>{{$graduate->department->name}}</td>
                                        <td>{{$graduate->for_year}}</td>
                                        <td>{{$graduate->phone}}</td>
                                        <td>{{$graduate->created_at }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default">العمليات</button>
                                                <button type="button"
                                                        class="btn btn-default dropdown-toggle dropdown-icon"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu" style="">
                                                    <button type="button" class="btn btn-block btn-outline-primary"
                                                            data-effect="effect-scale"
                                                            data-toggle="modal" href="#edit{{$graduate->id}}">تعديل
                                                    </button>
                                                    <button type="button" class="btn btn-block btn-outline-danger"
                                                            data-effect="effect-scale"
                                                            data-toggle="modal" href="#delete{{$graduate->id}}">حذف
                                                    </button>
                                                </div>
                                            </div>
                                            {{--                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"--}}
                                            {{--                                               data-toggle="modal" href="#edit{{$graduate->id}}">تعديل<i--}}
                                            {{--                                                    class="las la-pen"></i></a>--}}
                                            {{--                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"--}}
                                            {{--                                               data-toggle="modal" href="#delete{{$graduate->id}}">حذف<i--}}
                                            {{--                                                    class="las la-trash"></i></a>--}}
                                        </td>
                                    </tr>
                                    @include('Graduate.modal.edit')
                                    @include('Graduate.modal.delete')
                                    @include('Graduate.modal.delete_selected')
                                    {{--                                    @include('message.messages_alert')--}}
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        @include('Graduate.modal.add')
        {{--        @include('Graduate.modal.oldadd')--}}
    </section>
@endsection

@section('scripts')
    {{--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}
    {{--        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>--}}
    {{--    <script type="text/javascript" src="{{('js/errormessage.js')}}"></script>--}}
    <script src="{{asset('assets/plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <script>
        // var tabs = document.getElementById("tab3");
        const tabs = document.getElementById("tab3");
        tabs.classList.add("active");
        document.getElementById('phone').addEventListener('input', function () {
            let phoneNumber = this.value;
            let errorMessage = document.getElementById('error-msg');
            if (phoneNumber.length > 15) {
                errorMessage.textContent = 'يجب أن لا يتجاوز عدد أرقام الهاتف 15 رقم';
            } else {
                errorMessage.textContent = '';
            }
        });
    </script>
    <script>
        $(function () {
            $("#datepicker").datepicker({
                changeMonth: false,
                changeYear: true,
                showButtonPanel: true,
                dateFormat: 'yy', // تاريخ تنسيق السنة فقط
                onClose: function (dateText, inst) {
                    $(this).datepicker('setDate', new Date(inst.selectedYear, 0, 1));
                }
            });
        });
    </script>
    <script>
        var loadFile = function (event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function () {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": false, "lengthChange": true, "autoWidth": true,
                // "buttons": [["text"=>"إضافة قسم" ,"class" => "btn btn-primary"]];
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });

        });
    </script>
    <script>
        $(function () {
            jQuery("[name=select_all]").click(function (source) {
                checkboxes = jQuery("[name=delete_select]");
                for (var i in checkboxes) {
                    checkboxes[i].checked = source.target.checked;
                }
            });
        })
    </script>
    <script type="text/javascript">
        $(function () {
            $("#btn_delete_all").click(function () {
                var selected = [];
                $("#example1 input[name=delete_select]:checked").each(function () {
                    selected.push(this.value);
                });

                if (selected.length > 1) {
                    $('#delete_select').modal('show')
                    $('input[id="delete_select_id"]').val(selected);
                }
            });
        });
    </script>

@endsection
