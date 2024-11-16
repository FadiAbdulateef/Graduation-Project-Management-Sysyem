@extends('layouts.master')
@section('title')
    ادارة مشاريع التخرج
@endsection

@section('css')
    {{--    /*<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">*/--}}
    {{--    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css"/>--}}

    <link rel="stylesheet" href="{{asset('assets/plugins/toast/toast.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/sweetalert2/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/new_stage.css')}}"/>
@endsection

@section('title_Dashboard')
    {{--    المناقشة--}}
@endsection

@section('title_Home')
    <a href="{{route('project.index')}}">المشاريع</a>
@endsection

@section('title_Dashboard_v1')
    مشاريعك
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 ">
                    <div class="card card-primary card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                @foreach($projects as $key => $project)
                                    <li class="nav-item">
                                        <a class="nav-link {{$key == 0 ? 'active' : ''}}"
                                           id="custom-tabs-one-{{$project->id}}-tab" data-toggle="pill"
                                           href="#custom-tabs-one-{{$project->id}}" role="tab"
                                           aria-controls="custom-tabs-one-{{$project->id}}" aria-selected="true">
                                            {{$project->title}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                @foreach($projects as $key => $project)
                                    <div class="tab-pane fade show {{$key == 0 ? 'active' : ''}}"
                                         id="custom-tabs-one-{{$project->id}}" role="tabpanel"
                                         aria-labelledby="custom-tabs-one-{{$project->id}}-tab">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                                                <div class="row">
                                                    <div class="col-12 col-sm-4">
                                                        <div class="info-box bg-light">
                                                            <div class="info-box-content">
                                                                <span class="info-box-text text-center text-muted">حالة المشروع</span>
                                                                <span
                                                                    class="info-box-number text-center text-muted mb-0">
                                                                    @if($project->status===App\Enums\ProjectState::Proposition)
                                                                        <span
                                                                            class="badge badge-warning  mb-0">مقترح</span>
                                                                    @elseif($project->status===App\Enums\ProjectState::Approving)
                                                                        <span class="badge badge-info  mb-0">في انتظار الأعتماد</span>
                                                                    @elseif($project->status===App\Enums\ProjectState::Incomplete)
                                                                        <span
                                                                            class="badge badge-info  mb-0">قيدالتطوير</span>
                                                                    @elseif($project->status===App\Enums\ProjectState::Stopped)
                                                                        <span
                                                                            class="badge badge-dark  mb-0">متوقف</span>
                                                                        {{--                                                                    @elseif($project->status===App\Enums\ProjectState::Evaluating)--}}
                                                                        {{--                                                                        <span class="badge badge-success  mb-0">قيد التقييم</span>--}}
                                                                    @elseif($project->status===App\Enums\ProjectState::Complete)
                                                                        <span
                                                                            class="badge badge-success  mb-0">مكتمل</span>
                                                                    @elseif($project->status===App\Enums\ProjectState::Rejected)
                                                                        <span
                                                                            class="badge badge-danger  mb-0">مرفوض</span>
                                                                    @endif
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <div class="info-box bg-light">
                                                            <div class="info-box-content">
                                                                <span class="info-box-text text-center text-muted">المجال</span>
                                                                <span
                                                                    class="info-box-number text-center text-muted text-xs mb-0">{{$project->scope}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <div class="info-box bg-light">
                                                            <div class="info-box-content">
                                                                <span
                                                                    class="info-box-text text-center text-muted">القسم</span>
                                                                <span
                                                                    class="info-box-number text-center text-muted text-xs mb-0">
                                                                   {{ implode(' + ', $project->departments->pluck('name')->toArray()) }}
                                                                   </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="post">
                                                            <div class="user-block">
                                        <span class="text-blue font-bold">
                                                              وصف المشروع
                                        </span>
                                                            </div>
                                                            <!-- /.user-block -->
                                                            <p>
                                                                {{$project->short_description}}
                                                            </p>
                                                        </div>
                                                        <div class="post clearfix">
                                                            <div class="user-block">
                                        <span class="text-blue font-bold">
                                                              أهداف المشروع
                                        </span>
                                                            </div>
                                                            <p>
                                                                {{$project->goals}}
                                                            </p>
                                                        </div>
                                                        @if($project->status===App\Enums\ProjectState::Incomplete)
                                                            <div class="post">
                                     <span class="text-blue font-bold">
                                                         مراحل انجاز المشروع
                                                </span>
                                                                <br/><br/>
                                                                <div class="post">
                                                                    <div class="user-block">
                                                                        <div class="border-b border-gray-300 pb-4">
                                                                            <form
                                                                                action="{{ route('status.update',$project->id)}}"
                                                                                method="post">
                                                                                @csrf
                                                                                @method('POST')
                                                                                <ol class="list-disc list-inside">
                                                                                    <input type="hidden"
                                                                                           name="project_id"
                                                                                           value="{{$project->id}}"/>
                                                                                    @foreach($project->stages as $stage )
                                                                                        @if($stage->sort==1)
                                                                                            <li class="flex justify-between items-center text-sm py-0.5">
                                                                                <span readonly
                                                                                      class="text-sm align-middle">&#8226;{{$stage->stage->title}}</span>
                                                                                                <input
                                                                                                    name="stage_status[]"
                                                                                                    value="{{$stage->stage->id}}"
                                                                                                    id="chckbx"
                                                                                                    checked
                                                                                                    class="rounded-md text-gray-500"
                                                                                                    type="checkbox"/>
                                                                                            </li>
                                                                                        @else
                                                                                            <li class="flex justify-between items-center text-sm py-0.5">

                                                                                            <span
                                                                                                class="text-sm align-middle">&#8226;{{$stage->stage->title}}</span>
                                                                                                <input
                                                                                                    name="stage_status[]"
                                                                                                    value="{{$stage->stage->id}}"
                                                                                                    id="chckbx"
                                                                                                    class="rounded-md text-gray-500"
                                                                                                    type="checkbox"/>
                                                                                            </li>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </ol>
                                                                                {{--                                                @can('stage-create')--}}
                                                                                @if (auth()->user()->supervisor && $project->supervisor_id == auth()->user()->supervisor->id)
                                                                                    <button
                                                                                        style=" margin-right: 18rem;">
                                                                                        <a data-effect="effect-scale"
                                                                                           data-toggle="modal"
                                                                                           href="#addStage{{$project->id}}"
                                                                                           class="m-0 px-2 py-2 md:w-20 bg-gray-50  flex justify-center rounded-lg font-semibold text-blue-700 border border-gray-300">
                                                                                            اضافة مرحلة جديدة
                                                                                        </a>
                                                                                    </button>
                                                                                    <button type="submit"
                                                                                            class="btn btn-success"
                                                                                            id="confirmButton"
                                                                                            style="display: none; margin-right: 20rem;">
                                                                                        تأكيد
                                                                                    </button>
                                                                                @endif
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                    @include('project_suggestion.modal.addStage')
                                                                </div>
                                                            </div>
                                                            @php
                                                                $files = Storage::disk('projects')->allFiles($project->id);
                                                            @endphp
                                                            <h5 class="mt-5 text-muted">ملفات المشروع</h5>
                                                            @if($project->status===App\Enums\ProjectState::Proposition || $project->status===App\Enums\ProjectState::Rejected)
                                                                <p>لا توجد ملفات حالياً</p>
                                                            @else
                                                                <ul class="list-unstyled">
                                                                    <table
                                                                        class="DataTables table table-hover table-head-fixed table-striped">
                                                                        <thead>
                                                                        <tr>
                                                                            <th> الملف</th>
                                                                            <th> العمليات</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @foreach($files as $file)
                                                                            <tr>
                                                                                <td>
                                                                                    <li>
                                                                                        <a href="{{ route('downloadFile',['path' => $file])}}"
                                                                                           class="btn-link text-secondary"
                                                                                           download><i
                                                                                                class="far fa-fw fa-file-word"></i>
                                                                                            {{ substr($file,strpos($file,'/')+1) }}
                                                                                        </a>
                                                                                    </li>
                                                                                </td>
                                                                                <td>
                                                                                    <form method='post'
                                                                                          action="{{ route('deleteFile',['path' => $file]) }}">
                                                                                        @csrf
                                                                                        <input type="hidden"
                                                                                               name="filepath"
                                                                                               value="{{ $file }}">
                                                                                        <input type="submit"
                                                                                               class="btn btn-danger"
                                                                                               name="btnsubmit"
                                                                                               value="Delete">
                                                                                    </form>
                                                                                    {{--                                                                                 {{ substr($file,strpos($file,'/')+1) }}--}}
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </ul>
                                                                <form action="{{ route('project_files.store') }}"
                                                                      enctype="multipart/form-data"
                                                                      method="post" autocomplete="off">
                                                                    @csrf
                                                                    @method('POST')
                                                                    <label for="file-upload">اختر ملف</label>
                                                                    <input type="file" name="file"
                                                                           class="fa-laptop-file"
                                                                           id="file-upload"
                                                                           required>
                                                                    <input type="hidden" name="project_id"
                                                                           value="{{$project->id}}"
                                                                           class="form-control"
                                                                           id="recipient-name" required/>
                                                                    <button type="submit"
                                                                            class="px-2 py-2 md:w-20 bg-gray-50  flex justify-center rounded-lg font-semibold text-blue-700 border border-gray-300"
                                                                            swalDefaultSuccess
                                                                            style="margin-right: 5rem">إضافة ملف
                                                                    </button>
                                                                </form>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                                                <h5 class="text-primary"><i
                                                        class="fas fa-paint"></i> {{$project->title}}</h5>
                                                <br>
                                                <h6 class=" text-muted text-center font-bold">أعضاء الفريق</h6>
                                                <div class="text-muted">
                                                    @forelse ($project->project_teams as $project_team)
                                                        <div
                                                            class="flex mt-2 bg-light-50 px-2 py-2 md:w-80 rounded-lg border border-gray-300 hover:bg-gray-100 justify-between items-center">
                                                            <div class="flex items-center">
                                                                <div class="flex-shrink-0 h-10 w-10">
                                                                    <img
                                                                        class="h-8 w-8 rounded-full border border-gray-300"
                                                                        src="{{URL::asset('assets/img/graduat_defualt.jpg')}}"
                                                                        alt="profile">
                                                                </div>
                                                                <div class="ml-4">
                                                                    <div class="text-xs font-medium text-gray-900">
                                                                        {{$project_team->graduate->first_name}} {{$project_team->graduate->last_name}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        {{--                                                        <div class="mt-2 px-2 py-2 md:w-80 bg-red-50 flex justify-center rounded-lg font-semibold text-red-700 border border-red-700 hover:border-red-500 hover:text-red-500 focus:outline-none">--}}
                                                        {{--                                                            <div class="flex items-center">--}}
                                                        {{--                                                                <div class="ml-6 text-center">--}}
                                                        {{--                                                                    <div class="text-sm text-center text-gray-500">--}}
                                                        {{--                                                                        <p>لا يوجد أعضاء فريق للمشروع حالياً...</p>--}}
                                                        {{--                                                                    </div>--}}
                                                        {{--                                                                </div>--}}
                                                        {{--                                                            </div>--}}
                                                        {{--                                                        </div>--}}
                                                        {{--                                                        <p class="mt-2 px-2 py-2 md:w-80 bg-red-50 flex justify-center rounded-lg font-semibold text-red-500 border border-red-300 hover:border-red-100 hover:text-red-400 focus:outline-none">--}}
                                                        {{--                                                            لا يوجد أعضاء فريق للمشروع حالياً--}}
                                                        {{--                                                        </p>--}}
                                                        <div class="mt-2">
                                                            <div class="flex items-center">
                                                                <div class="ml-6">
                                                                    <div class="text-sm text-red-500">
                                                                        <p class="bg-gray-200 px-2 py-2 md:w-80 justify-center rounded-lg text-gray-700 border border-red-500 hover:text-gray-500 hover:bg-red-100 hover:border-red-500 justify-between text-center">
                                                                            لا يوجد أعضاء فريق للمشروع حالياً...</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    @endforelse
                                                    <h6 class="text-muted text-center font-bold">المشرف </h6>
                                                    {{--                                                    @if ($project->supervisor_id)--}}
                                                    {{--                                                        <div class=" mt-2 bg-light-50 px-2 py-2 md:w-80 rounded-lg border border-gray-300 hover:bg-gray-100 justify-between items-center">--}}
                                                    <div
                                                        class="bg-gray-200 px-2 py-2 md:w-80 justify-center rounded-lg text-gray-700 border border-red-500 hover:text-gray-500 hover:bg-red-100 hover:border-red-500 justify-between text-center">
                                                        <div class=" flex items-center">
                                                            <div class="flex-shrink-0 h-10 w-10">
                                                                <img
                                                                    class="h-8 w-8 rounded-full border border-gray-300"
                                                                    src="{{URL::asset('assets/img/supervisor.jpg')}}"
                                                                    alt="profile">
                                                            </div>
                                                            <div class="ml-4">
                                                                <div
                                                                    class="text-sm font-medium text-gray-700 hover:text-gray-500 hover:bg-red-100 hover:border-red-500">
                                                                    د/{{ $project->supervisor->first_name}} {{ $project->supervisor->last_name}}
                                                                </div>
                                                                <div
                                                                    class="text-sm text-gray-400 hover:text-gray-500 hover:bg-red-100 hover:border-red-500">
                                                                    {{ $project->supervisor->email }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{--                                                    @else--}}
                                                    {{--                                                        <p class="mt-2 px-2 py-2 md:w-80 bg-red-50 flex  justify-center rounded-lg font-semibold text-red-700 border border-red-700 hover:border-red-500 hover:text-red-500 focus:outline-none">--}}
                                                    {{--                                                            لا يوجد مشرف--}}
                                                    {{--                                                        </p>--}}
                                                    {{--                                                    @endif--}}
                                                </div>
                                                <div class="mb-3">
                                                    @if (!$project->supervisor_id && auth()->user()->supervisor)
                                                        @can('project-supervise')
                                                            <a href="{{ route('suggestion.supervise',$project->id) }}"
                                                               class="mt-2 px-2 py-2 md:w-80 bg-gray-50 flex  justify-center rounded-lg font-semibold text-blue-700 border border-gray-700 hover:border-gray-500 hover:text-gray-500 focus:outline-none">

                                                                الإشراف على المشروع</a>
                                                        @endcan
                                                    @endif
                                                    @can('project-supervise')
                                                        @if (auth()->user()->supervisor && $project->supervisor_id == auth()->user()->supervisor->id)
                                                            <a data-effect="effect-scale" data-toggle="modal"
                                                               href="#unsupervisor{{$project->id}}"
                                                               class="mt-2 px-2 py-2 md:w-80 bg-red-50 flex  justify-center rounded-lg font-semibold text-red-700 border border-red-700 hover:border-red-500 hover:text-red-500 focus:outline-none">
                                                                إلغاء الإشراف
                                                            </a>
                                                        @endif
                                                    @endcan
                                                    <a data-effect="effect-scale" data-toggle="modal"
                                                       href="#project_supervisor_update{{$project->id}}"
                                                       class="mt-2 px-2 py-2 md:w-80 bg-gray-50  flex justify-center rounded-lg font-semibold text-blue-700 border border-gray-300">
                                                        تعديل بيانات المشروع
                                                    </a>
                                                    @if($project->project_teams->count()>0)
                                                        <a href="{{route('Registration_report',$project->id)}}"
                                                           class="mt-2 px-2 py-2 md:w-80 bg-gray-50 flex justify-center rounded-lg font-semibold text-gray-700 border border-red-700 hover:border-red-500 hover:text-gray-500 focus:outline-none">
                                                            طباعة إستمارة التسجيل
                                                        </a>
                                                    @endif
                                                    @include('project_suggestion.modal.edited')
                                                        @can('project_interview-create')
                                                            @if($project->status===App\Enums\ProjectState::Complete)
                                                            <button data-effect="effect-scale" data-toggle="modal"
                                                                    href="#exampleModal{{$project->id}}"
                                                                    class="mt-2 px-2 py-2 md:w-80 bg-gray-50 flex justify-center rounded-lg font-semibold text-gray-700 border border-red-700 hover:border-red-500 hover:text-gray-500 focus:outline-none">
                                                                مناقشة المشروع
                                                            </button>
                                                            @endif
                                                        @endcan
                                                        @include('project.modal.add_interview')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        {{--                                        <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>--}}
                                        {{--                                        <script--}}
                                        {{--                                            src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>--}}
                                        {{--                                        <script type="text/javascript"--}}
                                        {{--                                                src="{{URL::asset('assets/js/new_stages.js')}}"></script>--}}
                                    </div>
                                    @include('project_suggestion.modal.unsupervisor')
                                    @include('project.modal.project_supervisor_update')
                                @endforeach


                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('scripts')
    <!-- Select2 -->
    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
    {{--    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>--}}
    {{--    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>--}}

    {{--    <script type="text/javascript" src="{{URL::asset('assets/js/new_stages.js')}}"></script>--}}
    {{--    <!-- BS-Stepper -->--}}
    <script src="{{asset('assets/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
    {{--    <script src="{{asset('assets/js/new_stages.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{URL::asset('assets/js/new_stages.js')}}"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script type="text/javascript" src="{{asset('assets/js/new_stages.js')}}"></script>

    <!-- Page specific script -->
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
        });
    </script>
    <script>
        window.onload = function () {
            var checkboxes = document.querySelectorAll('input[id=chckbx]');
            var button = document.getElementById('confirmButton');

            function checkCheckboxes() {
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].checked) {

                        button.style.display = 'block';
                        return;
                    }
                }
                button.style.display = 'none';
            }

            checkboxes.forEach(function (checkbox) {
                checkbox.addEventListener('change', checkCheckboxes);
            });
        };
    </script>
@endsection
