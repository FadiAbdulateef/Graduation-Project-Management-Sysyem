@extends('layouts.master')
@section('title')
    ادارة مشاريع التخرج
@endsection

@section('css')
    {{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="{{asset('assets/plugins/toast/toast.min.css')}}"/>
    {{--    <link rel="stylesheet" href="{{('node_modules/bootstrap/scss/_reboot.scss')}}">--}}
    <link rel="stylesheet" href="{{asset('assets/plugins/global/plugins.bundle.js')}}"/>
    {{--    <link rel="stylesheet" href="{{('node_modules/bootstrap/scss/_reboot.scss')}}">--}}
    {{--    /*<link rel="stylesheet" href="*/{{asset('assets/css/sumbo.css')}}">--}}


{{--    /*<link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css"/>*/--}}
    <link rel="stylesheet" href="{{asset('assets/css/new_stage.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/js/select2.js')}}"/>
    {{--    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">--}}
    {{--    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/docs.css')}}">--}}
    {{--    <!-- BS Stepper -->--}}
    <link rel="stylesheet" href="{{asset('assets/plugins/bs-stepper/css/bs-stepper.min.css')}}"/>
    <style>
        .advance .tagify__tag {
            --tag-hover: var(--tag-bg);
        }
    </style>

@endsection

@section('title_Dashboard')
    المشاريع المقترحة
@endsection

@section('title_Home')
    @can('setting-control')
    <a href="{{route('welcome')}}">الرئيسية</a>
    @endcan
@endsection

@section('title_Dashboard_v1')
    المشاريع المقترحة
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
                            @can('suggestion-create')
                                <button pla type="button" class="btn btn-primary" data-toggle="modal"
                                        href="#myexampleModal" data-whatever="@fat"> إضافة مقترح مشروع
                                </button>
                            @endcan
                            @can('suggestion-register')
                                <button pla type="button" class="btn btn-primary" data-toggle="modal"
                                        href="#addRegisterNew" data-whatever="@fat"> التسجيل في مشروع جديد
                                </button>
                            @endcan
                                @can('suggestion-register')
                                    @if(auth()->user()->graduate->project()->doesntExist())
                                        <button pla type="button" class="btn btn-primary" data-toggle="modal"
                                                href="#addRegisterNew" data-whatever="@fat"> التسجيل في مشروع جديد
                                        </button>
                                    @endif
                                @endcan
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            {{--                            <table id="example1" class="DataTables table table-hover table-bordered table-striped table-responsive">--}}
                            <table id="example1"
                                   class="DataTables table table-hover table-head-fixed table-striped">
                                <thead>
                                <tr>
                                    <th>رقم</th>
                                    <th> الاسم</th>
                                    <th> المشرف</th>
                                    <th> المجال</th>
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
                                            @if($project->supervisor_id)
                                                {{$project->supervisor->first_name}}
                                            @else

                                                لا يوجد

                                            @endif
                                        </td>
                                        <td>{{$project->scope??'لا يوجد'}}</td>
                                        <td>
                                            @foreach ($project->departments as $department)
                                                {{ $department->name }}
                                            @endforeach
                                        </td>
                                        <td>
                                            <a class="modal-effect btn btn-sm btn-info"
                                               href="{{route('suggestion.show',$project->id)}}">عرض<i
                                                    class="las la-pen"></i></a>
                                            @can('suggestion-delete')
                                                <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                   data-toggle="modal" href="#delete{{$project->id}}">حذف<i
                                                        class="las la-trash"></i></a>
                                            @endcan
                                            @can('project-approve')
                                                @if($project->status===\App\Enums\ProjectState::Proposition||$project->status===\App\Enums\ProjectState::Approving||$project->status===\App\Enums\ProjectState::Rejected)
                                                    @if($project->supervisor()->exists() && $project->project_teams()->exists())
                                                        <a class="modal-effect btn btn-sm btn-primary"
                                                           href="{{ route('suggestion.approve',$project->project->project->id) }}">
                                                            إعتماد المشروع<i
                                                                class="las la-pen"></i></a>
                                                        </a>
                                                    @endif
                                                @endif
                                            @endcan
                                        </td>
                                        @include('project_suggestion.modal.edit')
                                    </tr>
                                    @include('project_suggestion.modal.delete')
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
        @include('project_suggestion.modal.add')
        @include('project_suggestion.modal.addRegesterNew')

    </section>

@endsection

@section('scripts')
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>--}}
{{--    <script type="text/javascript" src="{{asset('assets/js/new_stages_tagify.min.js')}}"></script>--}}

    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script type="text/javascript" src="{{asset('assets/js/new_stages.js')}}"></script>

    <script src="{{asset('assets/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>

    <script>
        // var input = document.querySelectorAll('textarea[id=tags2]');
        // input.forEach(function (input) {
        //     new Tagify(input);
        // });

        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": true, "autoWidth": true,
                // "buttons": [["text"=>"إضافة قسم" ,"class" => "btn btn-primary"]];
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": false,
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
                    maximumSelectionLength: {{$setting->team_members}},
                    minimumSelectionLength: '3',
                    dir: "rtl"
                    // minimumInputLength:3,
                    // minimuminputl:2
                });
            });

            //Initialize Select2 Elements
        });
    </script>
    <script>
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function () {
            window.stepper1 = new Stepper(document.querySelector('.bs-stepper'))
        })
    </script>
    <script>
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function () {
            window.stepper = new Stepper(document.querySelector('div[id=stepper]'))

        })
    </script>
    <script>
        $(document).ready(function () {
            $('#tags4').on('change', function () {
                var selectedMembers = $(this).val();
                if (selectedMembers.length < 3) {
                    $('button[type="submit"]').hide();
                } else {
                    $('button[type="submit"]').show();
                }
            });
        });
        var tabs = document.getElementById("tab5");
        tabs.classList.add("active");
        var tabs7 = document.getElementById("tab7");
        tabs7.classList.add("menu-open");
        var tab = document.getElementById("tab8");
        tab.classList.add("active");
    </script>
@endsection
