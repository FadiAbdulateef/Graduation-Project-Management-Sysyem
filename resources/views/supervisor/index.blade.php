@extends('layouts.master')
@section('title')
    ادارة مشاريع التخرج
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/myfile/file.css')}}" />
    {{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="{{asset('assets/plugins/toast/toast.min.css')}}" />
{{--    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />--}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
{{--    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />--}}

@endsection

@section('title_Dashboard')
    قائمة المشرفين
@endsection

@section('title_Home')
    @can('setting-control')
        <a href="{{ route('welcome')}}">الرئيسية</a>
    @endcan
@endsection

@section('title_Dashboard_v1')
    إدارة المشرفين
@endsection

@section('content')
    <div class="scroll">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                <button placement type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal" data-whatever="@fat">إضافة مشرف
                                </button>
                                <span class="text-left">
{{--                                <div class="text-left">--}}
                                <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                        data-target="#importSupervisor">
                                    <span class="icon text-white-50"> <i class="fa fa-plus"></i> </span>
                                    <span class="text">  إستيراد</span>
                                </button>
{{--                                </div>--}}
                            </span>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="DataTables table table-hover table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>رقم</th>
                                        <th> الاسم</th>
{{--                                        <th> الاسم الاخير</th>--}}
                                        <th> البريد الالكتروني</th>
                                        <th>القسم</th>
                                        <th> نوع المشرف</th>
                                        <th> السنة</th>
                                        <th>مُضاف في</th>
                                        <th>العمليات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
{{--                                    @each('supervisor.each_data',$supervisors, 'supervisor')--}}
                                    @foreach($supervisors as $supervisor)
                                        <tr>
                                            <td>{{$supervisor->id}}</td>
                                            <td>{{$supervisor->first_name}} {{$supervisor->last_name}}</td>
                                            {{--                                            <td>{{$supervisor->last_name}}</td>--}}
                                            <td>{{$supervisor->email}}</td>
                                            <td>{{$supervisor->department->name}}</td>
                                            <td>@if($supervisor->is_external==0)
                                                    داخلي
                                                @else
                                                    خارجي
                                                @endif
                                            </td>
                                            <td>{{$supervisor->for_year}}</td>
                                            <td>{{$supervisor->created_at }}</td>
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
                                                                data-toggle="modal" href="#edit{{$supervisor->id}}">
                                                            تعديل
                                                        </button>
                                                        <button type="button" class="btn btn-block btn-outline-danger"
                                                                data-effect="effect-scale"
                                                                data-toggle="modal" href="#delete{{$supervisor->id}}">
                                                            حذف
                                                        </button>
                                                    </div>
                                                </div>
                                                {{--                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"--}}
                                                {{--                                        data-toggle="modal" href="#edit{{$supervisor->id}}">تعديل<i--}}
                                                {{--                                                    class="las la-pen"></i></a>--}}
                                                {{--                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"--}}
                                                {{--                                        data-toggle="modal" href="#delete{{$supervisor->id}}">حذف<i--}}
                                                {{--                                                    class="las la-trash"></i></a>--}}
                                            </td>
                                        </tr>
                                        @include('supervisor.modal.edit')
                                        @include('supervisor.modal.delete')
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
            @include('supervisor.modal.add')
        </section>
    </div>
@endsection

@section('scripts')
{{--    <script src="{{asset('assets/js/scripts.bundle.js')}}"></script>--}}
    <script>
        // var tabs = document.getElementById("tab4");
        const tabs = document.getElementById("tab4");
        tabs.classList.add("active");
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
