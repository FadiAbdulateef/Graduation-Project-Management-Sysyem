@extends('layouts.master')
@section('title')
    ادارة مشاريع التخرج
@endsection

@section('css')
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    {{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="{{asset('assets/plugins/toast/toast.min.css')}}">
    {{--    <!-- Select2 -->--}}
    <link rel="stylesheet" href="{{asset('plugins/sweetalert2/sweetalert2.min.css')}}">

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
                    <div class="card card-primary card-outline">
                        <div class="card-header card-outline">
                            <h3 class="card-title">
                                <div class="user-block">
                                    <img class="img-circle" src="{{URL::asset('assets/img/project.png')}}"
                                         alt="Project Image">
                                    <h3><span class="username text-lg"
                                              style="margin-top: 0.5rem;">{{$project->title}}</span></h3>
                                </div>
                            </h3>
                        </div>
                        <div class="card-body  p-0 pt-0">
                            <div class="card card-primary card-tabs">
                                <div class="card-header p-0 pt-1">
                                    <ul class="nav nav-tabs " id="custom-content-above-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-content-above-home-tab"
                                               data-toggle="pill" href="#custom-content-above-home" role="tab"
                                               aria-controls="custom-content-above-home" aria-selected="true">ملفات
                                                المشروع</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill"
                                               href="#custom-content-above-profile" role="tab"
                                               aria-controls="custom-content-above-profile" aria-selected="false">تقييم
                                                الخريجين</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-content-above-messages-tab"
                                               data-toggle="pill" href="#custom-content-above-messages" role="tab"
                                               aria-controls="custom-content-above-messages" aria-selected="false">التوصيات
                                                والمقترحات</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body  p-2 pt-1">
                                    <div class="card-header tab-custom-content">
                                        <p class="lead mb-2">{{auth()->user()->first_name." ".auth()->user()->last_name}}   </p>
                                    </div>
                                    <div class="tab-content mt-2" id="custom-content-above-tabContent">
                                        <div class="tab-pane fade show active" id="custom-content-above-home"
                                             role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                                            <div class="col-md-6">
                                                <ul>

                                                        @foreach($files as $file)
                                                            <li>
                                                                <a href="{{ route('downloadFile', ['path' => $file]) }}"
                                                                   class="btn-link text-secondary" download><i
                                                                        class="far fa-fw fa-file-word"></i>
                                                                    {{ substr($file,strpos($file,'/')+1) }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="custom-content-above-profile" role="tabpanel"
                                             aria-labelledby="custom-content-above-profile-tab">
                                            <form action="{{ route('project_interview_score.store') }}" method="post"
                                                  autocomplete="off">
                                                <input name="project_id" type="hidden" value="{{$project->id}}"
                                                       class="form-control">
                                                <input name="supervisor_id" type="hidden" value="{{$supervisor}}"
                                                       class="form-control">
                                                @csrf
                                                <div class="row">
                                                    @if($project->supervisor->user_id==auth()->user()->id)
                                                        <input name="supervisor_type" type="hidden" value="primary"
                                                               class="form-control">
                                                    @else
                                                        <input name="supervisor_type" type="hidden" value="secondary"
                                                               class="form-control">
                                                    @endif

                                                    @foreach  ($project->project_teams as $project_team)
                                                        <input name="graduate_id[]" type="hidden"
                                                               value="{{$project_team->graduate_id}}"
                                                               class="form-control">
                                                        <div class="col-md-6">
                                                            <div class="card card-secondary">
                                                                <div class="card-header">
                                                                    <div class="user-block">
                                                                        <img class="img-circle"
                                                                             src="{{URL::asset('assets/img/graduat_defualt.jpg')}}"
                                                                             alt="User Image">
                                                                        <span class="username"><a
                                                                                href="#">{{ $project_team->graduate->first_name}} {{ $project_team->graduate->last_name}}</a></span>
                                                                        {{--                                                                <span class="description">Shared publicly - 7:30 PM Today</span>--}}
                                                                    </div>

                                                                    <div class="card-tools">
                                                                        <button type="button" class="btn btn-tool"
                                                                                data-card-widget="collapse"
                                                                                title="Collapse">
                                                                            <i class="fas fa-minus"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">

                                                                    <table class="table">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>رقم</th>
                                                                            <th> بند التقييم</th>
                                                                            <th> درجة البند</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @foreach ($interview_stage_items as $interview_stage_item)
                                                                            @if($project->supervisor->user_id==auth()->user()->id)
                                                                                @if($interview_stage_item->supervisor_type=='primary')
                                                                                    <tr>
                                                                                        <td style="width: 5%;">{{$loop->iteration}}</td>
                                                                                        <td style="width: 65%;">
                                                                                            <label
                                                                                                for="inputEstimatedBudget">{{$interview_stage_item->name}}</label>
                                                                                            <input
                                                                                                name="interview_stage_item_id[][{{ $project_team->graduate->id}}]"
                                                                                                type="hidden"
                                                                                                value="{{$interview_stage_item->id}}"
                                                                                                class="form-control">
                                                                                        </td>
                                                                                        <td style="width: 30%;">
                                                                                            <input
                                                                                                name="score[][{{ $project_team->graduate->id}}]"
                                                                                                min="0"
                                                                                                max="{{$interview_stage_item->item_degree}}"
                                                                                                maxlength="2" required
                                                                                                type="number"
                                                                                                class="form-control">
                                                                                        </td>
                                                                                    </tr>
                                                                                @endif
                                                                            @elseif($interview_stage_item->supervisor_type=='secondary')
                                                                                <tr>
                                                                                    <td style="width: 5%;">{{$loop->iteration}}</td>
                                                                                    <td style="width: 65%;">
                                                                                        <label
                                                                                            for="inputEstimatedBudget">{{$interview_stage_item->name}}</label>
                                                                                        <input
                                                                                            name="interview_stage_item_id[][{{$project_team->graduate->id}}]"
                                                                                            type="hidden"
                                                                                            value="{{$interview_stage_item->id}}"
                                                                                            class="form-control">
                                                                                    </td>
                                                                                    <td style="width: 30%;">
                                                                                        <input
                                                                                            name="score[][{{$project_team->graduate->id}}]"
                                                                                            type="number" min="0"
                                                                                            max="{{$interview_stage_item->item_degree}}"
                                                                                            maxlength="2" required
                                                                                            class="form-control">
                                                                                    </td>
                                                                                </tr>
                                                                            @endif
                                                                        @endforeach
                                                                        </tbody>


                                                                    </table>
                                                                </div>
                                                                <!-- /.card-body -->
                                                            </div>
                                                            <!-- /.card -->
                                                        </div>
                                                    @endforeach

                                                </div>
                                                <button type="submit" class="btn btn-success swalDefaultSuccess">تأكيد
                                                </button>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="custom-content-above-messages" role="tabpanel"
                                             aria-labelledby="custom-content-above-messages-tab">
                                            <form action="{{ route('project_interview.store') }}" method="post"
                                                  autocomplete="off">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table">
                                                            <tr>
                                                                <th>
                                                                    <h3 class="card-title">
                                                                        التوصيات
                                                                    </h3>
                                                                </th>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                 <textarea id="summernote">
                                                             من فضلك <em>اكتب توصيات</em> <u>هناء</u> <strong></strong>
                                                         </textarea>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <!-- /.col-->
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table">
                                                            <tr>
                                                                <th>
                                                                    <h3 class="card-title">
                                                                        المقترحات
                                                                    </h3>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                 <textarea id="summernote1">
                                                             من فضلك <em>اكتب توصيات</em> <u>هناء</u> <strong></strong>
                                                         </textarea>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <!-- /.col-->
                                                </div>
                                                <button type="submit" class="btn btn-success swalDefaultSuccess">تأكيد
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
            $('#summernote1').summernote()

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

            //Initialize Select2 Elements
        });
    </script>
@endsection
