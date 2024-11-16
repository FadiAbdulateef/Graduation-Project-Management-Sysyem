@extends('layouts.master')
@section('title')
    ادارة مشاريع التخرج
@endsection

@section('css')
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="{{asset('assets/plugins/toast/toast.min.css')}}">
    <link rel="stylesheet" href="{{asset('node_modules/bootstrap/scss/_reboot.scss')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/global/plugins.bundle.js')}}">

    <link rel="stylesheet" href="{{asset('assets/plugins/select2/js/select2.js')}}">
@endsection

@section('title_Dashboard')

@endsection

@section('title_Home')
    @can('setting-control')
    <a href="{{ route('welcome')}}">الرئيسية</a>
    @endcan
@endsection

@section('title_Dashboard_v1')
    إدارة الأقسام
@endsection

@section('content')
    @include('message.messages_alert')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
{{--                    <!-- /.card -->--}}
                    <div class="card">

                        {{--        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>--}}

                        {{--        --}}{{--    #####################################################################################################--}}
                        {{--        --}}{{--    <div class="modal fade" id="modal-secondary">--}}
                        {{--        --}}{{--        <div class="modal-dialog">--}}
                        {{--        --}}{{--            <div class="modal-content bg-secondary">--}}
                        {{--        --}}{{--                <div class="modal-header">--}}
                        {{--        --}}{{--                    <h4 class="modal-title">Secondary Modal</h4>--}}
                        {{--        --}}{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                        {{--        --}}{{--                        <span aria-hidden="true">&times;</span>--}}
                        {{--        --}}{{--                    </button>--}}
                        {{--        --}}{{--                </div>--}}
                        {{--        --}}{{--                <div class="modal-body">--}}
                        {{--        --}}{{--                    <p>One fine body&hellip;</p>--}}
                        {{--        --}}{{--                </div>--}}
                        {{--        --}}{{--                <div class="modal-footer justify-content-between">--}}
                        {{--        --}}{{--                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>--}}
                        {{--        --}}{{--                    <button type="button" class="btn btn-outline-light">Save changes</button>--}}
                        {{--        --}}{{--                </div>--}}
                        {{--        --}}{{--            </div>--}}
                        {{--        --}}{{--            <!-- /.modal-content -->--}}
                        {{--        --}}{{--        </div>--}}
                        {{--        --}}{{--        <!-- /.modal-dialog -->--}}
                        {{--        --}}{{--    </div>--}}
                        {{--        <!-- /.modal -->--}}
                        <div class="card-header">
                            @include('department.btn.btn')
                            {{--            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>--}}
                            {{--            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-secondary">--}}
                            {{--                Launch Secondary Modal--}}
                            {{--            </button>--}}
                        </div>
{{--                        <!-- /.card-header -->--}}
                        <div class="card-body">
                            <table id="example1" class="DataTables table table-hover table-striped table-head-fixed">
                                <thead>
                                <tr>
                                    <th>رقم</th>
                                    <th> الاسم</th>
                                    <th class="text-center">مُضاف في</th>
                                    <th class="text-center">العمليات</th>
                                </tr>
                                {{--                <tr>--}}
                                {{--                    <th>الاسم (ar)</th>--}}
                                {{--                    <th>الاسم (en)</th>--}}
                                {{--                    <th>افاتر</th>--}}
                                {{--                    <th>الإيميل</th>--}}
                                {{--                    <th>السنة</th>--}}
                                {{--                    <th>مُضاف في</th>--}}
                                {{--                    <th>مُعدل في</th>--}}
                                {{--                </tr>--}}
                                </thead>
                                <tbody>
                                @foreach($departments as $department)
                                    <tr>
                                        <td>{{$department->id}}</td>
                                        <td>{{$department->name}}</td>
                                        <td class="text-center">{{$department->created_at->diffForHumans() }}</td>
                                        <td class="text-center">
                                            {{--                                            <div class="dropdown">--}}
                                            {{--                                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
                                            {{--                                                  <i class="las la-pen">action</i>--}}
                                            {{--                                                </a>--}}
                                            {{--                                                <ul class="dropdown-menu">--}}
                                            {{--                                                    <li><a class="dropdown-item modal-effect btn btn-sm btn-info" data-effect="effect-scale"--}}
                                            {{--                                                           data-toggle="modal" href="#edit{{$departmentSeeder->id}}">تعديل<i class="las la-pen"></i></a></li>--}}
                                            {{--                                                    <li><a class="dropdown-item modal-effect btn btn-sm btn-danger" data-effect="effect-scale"--}}
                                            {{--                                                       data-toggle="modal" href="#delete{{$departmentSeeder->id}}">حذف<i class="las la-trash"></i></a></li>--}}
                                            {{--                                                    <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
                                            {{--                                                </ul>--}}
                                            {{--                                            </div>--}}
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
                                                            data-toggle="modal" href="#edit{{$department->id}}">تعديل
                                                    </button>
                                                    <button type="button" class="btn btn-block btn-outline-danger"
                                                            data-effect="effect-scale"
                                                            data-toggle="modal" href="#delete{{$department->id}}">حذف
                                                    </button>
                                                </div>
                                            </div>
                                            {{--                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"--}}
                                            {{--                                               data-toggle="modal" href="#edit{{$departmentSeeder->id}}">تعديل<i--}}
                                            {{--                                                    class="las la-pen"></i></a>--}}
                                            {{--                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"--}}
                                            {{--                                               data-toggle="modal" href="#delete{{$departmentSeeder->id}}">حذف<i--}}
                                            {{--                                                    class="las la-trash"></i></a>--}}
                                        </td>
                                    </tr>
                                    @include('department.modal.edit')
                                    @include('department.modal.delete')
                                    @include('message.messages_alert')
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
        @include('department.modal.add')
    </section>
@endsection

@section('scripts')
    <script>
        var tabs = document.getElementById("tab2");
        tabs.classList.add("active");
        $(function () {
            $("#example1").DataTable({
                "responsive": false, "lengthChange": true, "autoWidth": true,"ordering": false,
                // "buttons": [["text"=>"إضافة قسم" ,"class" => "btn btn-primary"]];
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": false,
                "info": true,
                "autoWidth": false,
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
