@extends('layouts.master')
@section('title')
    AdminLTE 3 | Dashboard
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/plugins/toast/toast.min.css')}}">
@endsection

@section('title_Dashboard')
    تفاصيل بنود مرحلة المناقشة
@endsection

@section('title_Home')
    @can('setting-control')
        <a href="{{ route('welcome')}}">الرئيسية</a>
    @endcan
@endsection

@section('title_Dashboard_v1')
    تفاصيل بنود مراحل  المناقشات
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
                                    data-target="#exampleModal" data-whatever="@fat">إضافة تفاصيل للبنود
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="DataTables table table-hover table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>رقم</th>
                                    <th>العنوان </th>
                                    <th> أدنى درجة </th>
                                    <th> أقصى درجة </th>
                                    <th>اسم البند</th>
                                    <th>مُضاف في</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($interview_stage_item_details as $interview_stage_item_detail)
                                    <tr>
                                        <td>{{$interview_stage_item_detail->id}}</td>
                                        <td>{{$interview_stage_item_detail->title}}</td>
                                        <td>{{$interview_stage_item_detail->min_scope}}</td>
                                        <td>{{$interview_stage_item_detail->max_scope}}</td>
                                        <td>{{$interview_stage_item_detail->interview_stage_item->name}}</td>
                                        <td>{{$interview_stage_item_detail->created_at->diffForHumans() }}</td>
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
                                                            data-toggle="modal" href="#edit{{$interview_stage_item_detail->id}}">تعديل
                                                    </button>
                                                    <button type="button" class="btn btn-block btn-outline-danger"
                                                            data-effect="effect-scale"
                                                            data-toggle="modal" href="#delete{{$interview_stage_item_detail->id}}">حذف
                                                    </button>
                                                </div>
                                            </div>
{{--                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"--}}
{{--                                               data-toggle="modal" href="#edit{{$interview_stage_item_detail->id}}">تعديل<i class="las la-pen"></i></a>--}}
{{--                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"--}}
{{--                                               data-toggle="modal" href="#delete{{$interview_stage_item_detail->id}}">حذف<i--}}
{{--                                                    class="las la-trash"></i></a>--}}
                                        </td>
                                    </tr>
                                    @include('interview.interview_stage_item_detail.modal.edit')
                                    @include('interview.interview_stage_item_detail.modal.delete')
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
        @include('interview.interview_stage_item_detail.modal.add')
    </section>
@endsection
@section('scripts')
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
                "autoWidth": false,
                "responsive": true,
            });

        });

    </script>
@endsection

