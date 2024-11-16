@extends('layouts.master')
@section('title')
    ادارة مشاريع التخرج
@endsection

@section('css')
    {{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="{{asset('assets/plugins/toast/toast.min.css')}}">
    {{--    <!-- Select2 -->--}}
        <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
        <link rel="stylesheet" href ="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection

@section('title_Dashboard')
    المناقشة
@endsection

@section('title_Home')
    @can('setting-control')
        <a href="{{ route('welcome')}}">الرئيسية</a>
    @endcan
@endsection

@section('title_Dashboard_v1')
    لوحة التحكم
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
                            @can('project_interview-create')
                            <button pla type="button" class="btn btn-primary" data-toggle="modal"
                                    href="#exampleModal" data-whatever="@fat">إضافة مناقشة
                            </button>
                            @endcan
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="DataTables table table-hover border border-gray-300 table-striped">
                                <thead>
                                <tr>
{{--                  id`, `interview_date`, `interviewers`, `place`, `suggestions`, `recommendations`, `notes`, `attachments`, `project_id`, `created_at`, `updated_at`--}}
                                    <th>#</th>
                                    <th> المشروع </th>
                                    <th> المكان</th>
                                    <th> التاريخ </th>
                                    <th> المناقشون </th>
                                    <th> ملاحظة </th>
                                    <th> القسم</th>
                                    <th> العام الدراسي </th>
                                    <th>مرحلة المناقشة</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($project_interviews as $project_interview)
                                    <tr>
{{--                                        `id`, `interview_date`, `interviewers`, `place`, `suggestions`, `recommendations`, `notes`, `attachments`, `project_id`, `created_at`, `updated_at                                        <td>{{$project_interview->id}}</td>--}}
                                        <td>{{$project_interview->id}}</td>
                                        <td>{{$project_interview->project->title}}</td>
                                        <td>{{$project_interview->place}}</td>
                                        <td>{{$project_interview->interview_date}}</td>
                                        <td>{{$project_interview->interviewers}}</td>
                                        <td>{{$project_interview->notes}}</td>
                                        <td>
                                            @foreach($project_interview->project->departments as $deprtment)
                                                {{$deprtment->name}}
                                            @endforeach</td>
                                        <td>{{$project_interview->project->for_year}}</td>
                                        <td>{{$project_interview->interview_type}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default">العمليات</button>
                                                <button type="button"
                                                        class="btn btn-default dropdown-toggle dropdown-icon"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu" style="">
                                                    @can('project_interview-edit')
                                                    <button type="button" class="btn btn-block btn-outline-primary"
                                                            data-effect="effect-scale"
                                                            data-toggle="modal" href="#edit{{$project_interview->id}}">تعديل
                                                    </button>
                                                    @endcan
{{--                                                    @can('project-supervisor')--}}
                                                    <a href="{{route('project_interview_score.show',$project_interview->id)}}">
                                                        <button type="button" class="btn btn-block btn-outline-primary"
                                                        >عرض
                                                        </button>
                                                    </a>
                                                        @can('report-list')
                                                        @if($project_interview->project->project_interview_scores->count() > 0)
                                                            <a href="{{route('project_interview_score.interview_report',$project_interview->id)}}">
                                                                <button type="button" class="btn btn-block btn-outline-primary"
                                                                >استمارة رصد الدرجة
                                                                </button>
                                                            </a>
                                                        @endif
                                                        @endcan
{{--                                                        @endcan--}}
                                                    @can('project_interview-delete')
                                                    <button type="button" class="btn btn-block btn-outline-danger"
                                                            data-effect="effect-scale"
                                                            data-toggle="modal" href="#delete{{$project_interview->id}}">حذف
                                                    </button>
                                                        @endcan
                                                </div>
                                            </div>
                                        </td>
                                        </tr>
                                    @include('project_interview.modal.edit')
                                    @include('project_interview.modal.delete')
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
        @include('project_interview.modal.add')
    </section>
@endsection

@section('scripts')
    <!-- Select2 -->
        <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": true, "autoWidth": true,
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
    <!-- Page specific script -->
    <script>
        $(function () {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            // CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            //     mode: "htmlmixed",
            //     theme: "monokai"
            // });
        });
    </script><script>
        $(function () {
            // Summernote
            $('#summernote2').summernote()

            // CodeMirror
            // CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            //     mode: "htmlmixed",
            //     theme: "monokai"
            // });
        });
    </script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            });
        var tabs = document.getElementById("tab11");
        tabs.classList.add("active");
        var tabs7 = document.getElementById("tab10");
        tabs7.classList.add("menu-open");
        var tab = document.getElementById("tab12");
        tab.classList.add("active");
    </script>
@endsection
