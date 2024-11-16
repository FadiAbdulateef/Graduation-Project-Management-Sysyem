@extends('layouts.master')
@section('title')
    ادارة مشاريع التخرج
@endsection

@section('css')
    {{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="{{asset('assets/plugins/toast/toast.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/mybutton/mybutton.css')}}">
@endsection

@section('title_Dashboard')
    مراحل متابعة المشروع
@endsection

@section('title_Home')
    @can('setting-control')
        <a href="{{ route('welcome')}}">الرئيسية</a>
    @endcan
@endsection

@section('title_Dashboard_v1')
    مراحل متابعة المشاريع
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
                            <button pla type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal" data-whatever="@fat">إضافة مرحلة
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="DataTables table table-hover table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>رقم</th>
                                    <th> عنوان المرحلة </th>
                                    <th>القسم</th>
                                    <th>مُضاف في</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($stages as $stage)
                                    <tr>
                                        <td>{{$stage->id}}</td>
                                        <td>{{$stage->title}}</td>
{{--                                        <td>{{$stage->title_en}}</td>--}}
                                        <td>{{$stage->department->name ??'None'}}</td>
                                        <td>{{$stage->created_at }}</td>
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
                                                            data-toggle="modal" href="#edit{{$stage->id}}">تعديل
                                                    </button>
                                                    <button type="button" class="btn btn-block btn-outline-danger"
                                                            data-effect="effect-scale"
                                                            data-toggle="modal" href="#delete{{$stage->id}}">حذف
                                                    </button>
                                                </div>
                                            </div>
{{--                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"--}}
{{--                                        data-toggle="modal" href="#edit{{$stage->id}}">تعديل<i--}}
{{--                                                    class="las la-pen"></i></a>--}}
{{--                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"--}}
{{--                                        data-toggle="modal" href="#delete{{$stage->id}}">حذف<i--}}
{{--                                                    class="las la-trash"></i></a>--}}
                                        </td>
                                    </tr>
                                    @include('stage.modal.edit')
                                    @include('stage.modal.delete')
                                @endforeach
                                </tbody>
                                @include('message.messages_alert')
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        @include('stage.modal.add')
    </section>
@endsection

@section('scripts')
    <script src="{{asset('assets/js/mybutton/mybutton.js')}}"></script>
    <script>
        var tabs = document.getElementById("tab5");
        tabs.classList.add("active");
        var tabs7 = document.getElementById("tab7");
        tabs7.classList.add("menu-open");
        var tab = document.getElementById("tab9");
        tab.classList.add("active");
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
        // $(function () {
        //     var Toast = Swal.mixin({
        //         toast: true,
        //         position: 'top-end',
        //         showConfirmButton: false,
        //         timer: 3000
        //     });
        //     $('.swalDefaultSuccess').click(function () {
        //         Toast.fire({
        //             icon: 'success',
        //             title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        //         })
        //     });
        // });
    </script>

@endsection
