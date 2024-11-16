@extends('layouts.master')
@section('title')
    ادارة مشاريع التخرج
@endsection
@section('title_Home')
    @can('setting-control')
        <a href="{{ route('welcome')}}">الرئيسية</a>
    @endcan
@endsection

@section('title_Dashboard_v1')
    قائمة المشاريع
@endsection

@section('css')
    {{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="{{asset('assets/plugins/toast/toast.min.css')}}">
    <link rel="stylesheet" href="{{asset('node_modules/bootstrap/scss/_reboot.scss')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/global/plugins.bundle.js')}}">
    <link rel="stylesheet" href="{{asset('assets/css/sumbo.css')}}">
    {{--    textarea css --}}
    {{--    /*<link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css"/>*/--}}
    <link rel="stylesheet" href="{{ asset('assets/css/new_stage.css') }}">
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/js/select2.js')}}">
    {{--    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">--}}
    {{--    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/docs.css')}}">--}}
    {{--    <!-- BS Stepper -->--}}
    <link rel="stylesheet" href="{{asset('assets/plugins/bs-stepper/css/bs-stepper.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    {{--    <style>--}}
    {{--        .advance .tagify__tag {--}}
    {{--            --tag-hover: var(--tag-bg);--}}
    {{--        }--}}
    {{--    </style>--}}

@endsection

@section('title_Dashboard')
    المشاريع
@endsection

@section('title_Home')
    الرئيسية
@endsection

@section('title_Dashboard_v1')
    قائمة المشاريع
@endsection

@section('content')
    @include('message.messages_alert')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            @can('project-create')
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        href="#myexampleModal" data-whatever="@fat"> إضافة مشروع جديد
                                </button>
                            @endcan
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            {{--                            <table id="example1" class="DataTables table table-hover table-bordered table-striped table-responsive projects">--}}
                            <table id="example1"
                                   class="DataTables table table-hover table-striped table-head-fixed ">
                                <thead>
                                <tr>
                                    <th>الرقم</th>
                                    <th> الاسم</th>
                                    <th style="width: 25%" class="text-center"> أعضاء الفريق</th>
                                    <th>تقدم المشروع</th>
                                    <th style="width: 8%" class="text-center"> الحالة</th>
                                    <th> المجال</th>
                                    <th> المشرف</th>
                                    <th> القسم</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($projects as $project)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$project->title}}</td>
                                        <td>
                                            <div class=" symbol-group symbol-hover mb-3">
                                                @foreach($project->project_teams as $project_team)
                                                    @if($project_team->graduate->avatar)
                                                        <div class="symbol symbol-35px symbol-circle"
                                                             data-bs-toggle="tooltip"
                                                             title="{{$project_team->graduate->first_name}}">
                                                            <img alt="Pic"
                                                                 src="{{URL::asset($project_team->graduate->avatar)}}"/>
                                                        </div>
                                                        @else
                                                            {{$project_team->graduate->first_name}}
                                                            {{$project_team->graduate->last_name}}
                                                            <br>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </td>
                                        <td class="project_progress">
                                            @php
                                                $count = App\Models\ProjectStage::query()->where('project_id', $project->id)->where('sort', 1)->count();
                                           $countss = App\Models\ProjectStage::query()->where('project_id', $project->id)->count();
                                              if($count == 0){
                                                 $result = 0;
                                                    }else{
                                                   $result = round($count / $countss * 100,2);
                                                            }
                                            @endphp
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow='50'
                                                     aria-valuemin="0" aria-valuemax="100" style="width: {{$result}}%">
                                                </div>
                                            </div>
                                            <small>
                                                مكتمل {{$result}} %
                                            </small>
                                        </td>
                                        <td class="project-state">
                                            @if($project->status===App\Enums\ProjectState::Proposition)
                                                <span class="badge badge-warning">مقترح</span>
                                            @elseif($project->status===App\Enums\ProjectState::Approving)
                                                <span class="badge badge-info">في انتظار الأعتماد</span>
                                            @elseif($project->status===App\Enums\ProjectState::Incomplete)
                                                <span class="badge badge-info">قيدالتطوير</span>
                                            @elseif($project->status===App\Enums\ProjectState::Stopped)
                                                <span class="badge badge-dark">متوقف</span>
                                                {{--                                            @elseif($project->status===App\Enums\ProjectState::Evaluating)--}}
                                                {{--                                                <span class="badge badge-success">قيد التقييم</span>--}}
                                            @elseif($project->status===App\Enums\ProjectState::Complete)
                                                <span class="badge badge-success">مكتمل</span>
                                            @elseif($project->status===App\Enums\ProjectState::Rejected)
                                                <span class="badge badge-danger">مرفوض</span>
                                            @endif
                                        </td>
                                        <td>{{$project->scope??'لا يوجد'}}</td>
                                        <td>
                                            @if($project->supervisor_id)
                                                {{$project->supervisor->first_name}}
                                            @else
                                                لا يوجد
                                            @endif
                                        </td>
                                        <td>
                                            @foreach($project->departments as $department)
                                                {{$department->name}}
                                            @endforeach
                                        </td>

                                        <td class="align-content-lg-end">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default">العمليات</button>
                                                <a type="button"
                                                   class="btn btn-default dropdown-toggle dropdown-icon"
                                                   data-toggle="dropdown" aria-expanded="false">
                                                    <span class="sr-only"></span>
                                                </a>
                                                <ul class="dropdown-menu text-center" role="menu">
                                                    <li>
                                                        <a type="button" class="btn btn-outline-primary  btn-block"
                                                           style="border-radius: 0px;"
                                                           href="{{route('project.show',$project->id)}}">
                                                            عرض

                                                        </a>
                                                    </li>
                                                    @can('project-delete')
                                                        <li>
                                                            <a type="button"
                                                               class="btn btn-block btn-outline-danger"
                                                               data-effect="effect-scale"
                                                               data-toggle="modal" href="#delete{{$project->id}}">
                                                                حذف
                                                            </a>
                                                        </li>
                                                    @endcan

                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('project.modal.delete')
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
        @include('project.modal.add')
    </section>

@endsection
@section('scripts')
    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
    {{--    textarea--}}
    {{--    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify" ></script>--}}
    {{--        <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('assets/js/new_stages.js')}}"></script>--}}
    <script src="{{asset('assets/js/new_stages.js')}}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })
    </script>
    @can('report-list')
        <script>
            $(function () {
                $("#example1").DataTable({
                    "responsive": false, "lengthChange": true, "autoWidth": true,
                    // "buttons": [["text"=>"إضافة قسم" ,"class" => "btn btn-primary"]];
                    "buttons": ["colvis", "csv", "excel", "print", "pdf"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true,
                    "responsive": true,
                });

            });
        </script>
    @else
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
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true,
                    "responsive": true,
                });

            });
        </script>
    @endcan

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
    </script>
    <script>
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
            $(document).ready(function () {
                $('.select2').select2({
                    maximumSelectionLength: {{$setting->team_members}}
                });
            });
            //Initialize Select2 Elements
        });
        var tabs = document.getElementById("tab5");
        tabs.classList.add("active");
        var tabs7 = document.getElementById("tab7");
        tabs7.classList.add("menu-open");
        var tab = document.getElementById("tab6");
        tab.classList.add("active");
    </script>

@endsection


