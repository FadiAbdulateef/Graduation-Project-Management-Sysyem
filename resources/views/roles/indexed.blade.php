@extends('layouts.master')
@section('title')
    ادارة مشاريع التخرج
@endsection

@section('css')
    {{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="{{asset('assets/plugins/toast/toast.min.css')}}">
@endsection

@section('title_Dashboard')

@endsection

@section('title_Home')
    @can('setting-control')
        <a href="{{ route('welcome')}}">الرئيسية</a>
    @endcan
@endsection

@section('title_Dashboard_v1')
    إدارة الادوار
@endsection

@section('content')
    @include('message.messages_alert')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    {{--                    <!-- /.card -->--}}
                    <div class="card">
                        <div class="card-header">
                            <button pla type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modal-lg">إضافة دور
                            </button>
                        </div>
                        {{--                        <!-- /.card-header -->--}}
                        <div class="card-body">
                            <table id="example1" class="DataTables table table-hover table-striped table-head-fixed">
                                <thead>
                                <tr>
                                    <th>رقم</th>
                                    <th class="text-center">الدور</th>
                                    <th class="text-center">العمليات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $key => $role)
                                    <tr>
                                        <td>{{$role->id}}</td>
                                        <td class="text-center">{{$role->name}}</td>
                                        {{--                                        <td class="text-center">{{$departmentSeeder->created_at->diffForHumans() }}</td>--}}
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default">العمليات</button>
                                                <button type="button"
                                                        class="btn btn-default dropdown-toggle dropdown-icon"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu" style="">
                                                    <a href="{{ route('roles.edit',$role->id) }}">
                                                        <button type="button" class="btn btn-block btn-outline-primary"
                                                                data-toggle="modal"
                                                                data-target="#modal-lged"
                                                                href="{{ route('roles.edit',$role->id) }}">تعديل
                                                        </button>
                                                    </a>
{{--                                                    <a href="{{ route('roles.edit',$role->id) }}">--}}
{{--                                                        <button pla type="button" class="btn btn-primary" data-toggle="modal"--}}
{{--                                                                  data-target="#modal-lgg">تعديل--}}
{{--                                                        </button>--}}
{{--                                                        @include('roles.editrole')--}}
{{--                                                        --}}{{--                                                                href="{{ route('roles.edit',$role->id) }}">تعديل--}}
{{--                                                    </a>--}}
                                                    <button type="button" class="btn btn-block btn-outline-danger"
                                                            data-effect="effect-scale"
                                                            data-toggle="modal" href="#delete{{$role->id}}">حذف
                                                    </button>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('roles.modal.delete')
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
        @include('roles.create')
    </section>
@endsection

@section('scripts')
    <script>
        var tabs = document.getElementById("tab17");
        tabs.classList.add("active");
        var tabs = document.getElementById("tab18");
        tabs.classList.add("active");
        var tabs7 = document.getElementById("tab15");
        tabs7.classList.add("menu-open");
        $(function () {
            $("#example1").DataTable({
                "responsive": false, "lengthChange": true, "autoWidth": true, "ordering": false,
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
