@extends('layouts.master')
@section('title')
    ادارة مشاريع التخرج
@endsection

@section('css')
    {{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">--}}

    {{--    /*<link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css"/>*/--}}

    <link rel="stylesheet" href="{{asset('assets/plugins/toast/toast.min.css')}}">
    {{--    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">--}}
    {{--    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/docs.css')}}">--}}
    {{--    <!-- BS Stepper -->--}}
    <link rel="stylesheet" href="{{asset('assets/plugins/bs-stepper/css/bs-stepper.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/new_stage.css')}}"/>

    {{--    <link rel="stylesheet" href="{{asset('css/input-file.css')}}">--}}

@endsection

@section('title_Dashboard')
    {{--    تفاصيل مشروع--}}
@endsection

@section('title_Home')
    <a href="{{route('project.index')}}">المشاريع</a>
@endsection

@section('title_Dashboard_v1')
    تفاصيل مشروع {{$project->title}}
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$project->title}}
                    {{--                    <div class="info-box-content">--}}
                    {{--                        <span class="info-box-text text-center text-muted">حالة المشروع</span>--}}
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
                    {{--                    </div>--}}
                </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">مراحل متابعة المشروع</span>
                                        <span class="info-box-number text-center text-muted mb-0">
                                             {{$countss}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">المهام المنجزة</span>
                                        <span
                                            class="info-box-number text-center text-muted text-xs mb-0">{{$count}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">نسبة انجاز المشروع</span>
                                        <span
                                            class="info-box-number text-center text-muted text-xs mb-0">%{{$result}}</span>
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
                                        {{--                                        Lorem ipsum represents a long-held tradition for designers,--}}
                                        {{--                                        typographers and the like. Some people hate it and argue for--}}
                                        {{--                                        its demise, but others ignore.--}}
                                    </p>
                                </div>
                                <div class="post">
                                    <div class="user-block">
                                        <span class="text-blue font-bold">
                                                              أهداف المشروع

                                        </span>
                                    </div>
                                    <br/>
                                    {{--                                    <p>--}}
                                    @php
                                        $valuesArray = explode(",", $project->goals);
                                    @endphp
                                    <div class="user-block">
                                        <ol class="list-disc list-inside" style="direction: rtl;">
                                            @foreach($valuesArray as $value )
                                                <li class="justify-between items-end text-start py-0.5"
                                                    style="text-align: right;">
                                                    <span readonly class="text-sm ">{{$value}}</span>
                                                </li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                                {{--                                <div class="post">--}}
                                {{--                                @if($project->status===App\Enums\ProjectState::Incomplete)--}}
                                {{--                                    <h5 class="mt-5 text-muted">ملفات المشروع</h5>--}}
                                {{--                                    <ul class="list-unstyled">--}}
                                {{--                                        @foreach($files as $file)--}}
                                {{--                                            <li>--}}
                                {{--                                                <a href="{{ route('downloadFile', ['path' => $file]) }}"--}}
                                {{--                                                   class="btn-link text-secondary" download><i--}}
                                {{--                                                        class="far fa-fw fa-file-word"></i>--}}
                                {{--                                                    {{ substr($file,strpos($file,'/')+1) }}--}}
                                {{--                                                </a>--}}
                                {{--                                            </li>--}}
                                {{--                                        @endforeach--}}
                                {{--                                    </ul>--}}
                                {{--                                    --}}{{--                                    <form action="{{ route('project_files.store') }}" enctype="multipart/form-data" method="post" autocomplete="off">--}}
                                {{--                                    --}}{{--                                        @csrf--}}
                                {{--                                    --}}{{--                                        @method('POST')--}}
                                {{--                                    --}}{{--                                        <label for="file-upload">اختر ملف (pdf, doc, docx, ppt, pptx, xls, xlsx, jpg, png, jpeg, zip, rar)</label>--}}
                                {{--                                    --}}{{--                                        <input type="file" id="file-upload" name="file" required>--}}
                                {{--                                    --}}{{--                                        <div id="file-info"></div>--}}
                                {{--                                    --}}{{--                                        <input type="hidden" name="project_id" value="{{$project->id}}" class="form-control" id="recipient-name" required>--}}
                                {{--                                    --}}{{--                                        <button type="submit" class="btn btn-primary" swalDefaultSuccess style="margin-right: 14rem">اضافة ملف</button>--}}
                                {{--                                    --}}{{--                                    </form>--}}

                                {{--                                    <form action="{{ route('project_files.store') }}" enctype="multipart/form-data"--}}
                                {{--                                          method="post" autocomplete="off">--}}
                                {{--                                        @csrf--}}
                                {{--                                        @method('POST')--}}
                                {{--                                        <label for="file-upload">اختر ملف</label>--}}
                                {{--                                        <input type="file" name="file" class="fa-laptop-file" id="file-upload"--}}
                                {{--                                               required>--}}
                                {{--                                        <input type="hidden" name="project_id" value="{{$project->id}}"--}}
                                {{--                                               class="form-control"--}}
                                {{--                                               id="recipient-name" required/>--}}
                                {{--                                            <button type="submit" class="px-2 py-2 md:w-20 bg-gray-50  flex justify-center rounded-lg font-semibold text-blue-700 border border-gray-300" swalDefaultSuccess--}}
                                {{--                                                    style="margin-right: 5rem">إضافة ملف--}}
                                {{--                                            </button>--}}
                                {{--                                    </form>--}}
                                {{--                                @endif--}}
                                {{--                                                                    <div class="col-12 col-md-8 col-lg-10 order-2 order-md-2">--}}
                                {{--                                                                      --}}
                                {{--                                                                    </div>--}}
                                {{--                                                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <h6 class=" text-muted text-center font-bold">أعضاء الفريق</h6>
                        <div class="text-muted">
                            @forelse ($project->project_teams as $project_team)
                                <div
                                    class="flex mt-2 bg-light-50 px-2 py-2 md:w-80 rounded-lg border border-gray-300 hover:bg-gray-100 justify-between items-center">

                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-8 w-8 rounded-full border border-gray-300"
                                                 src="{{URL::asset('assets/img/graduat_defualt.jpg')}}"
                                                 alt="profile">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-xs font-medium text-gray-900">
                                                {{$project_team->graduate->first_name}} {{$project_team->graduate->last_name}}
                                            </div>

                                        </div>
                                    </div>

                                    {{--                                  @can('project_team.edit')--}}
                                    @can('project_team-edit')
                                        <div x-data="{ requestMenu:false } " @click=" requestMenu = !requestMenu"
                                             @keydown.escape="requestMenu = false"
                                             @click.away="requestMenu = false">
                                            <button
                                                class="text-gray-400 hover:bg-gray-300 rounded-full py-3 px-3">
                                                <svg fill="currentColor" width="24" height="6">
                                                    <path
                                                        d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z">
                                                    </path>
                                                </svg>
                                            </button>
                                            <div x-show="requestMenu"
                                                 class="absolute z-50 mt-2 bg-white rounded-lg shadow-lg w-40 max-h-64 overflow-y-auto inset-y-2">
                                                {{--                                            <div x-show="requestMenu"--}}
                                                {{--                                                 class="absolute z-50 mt-2 bg-white rounded-lg shadow-lg w-52">--}}
                                                <a href="{{ route('project_team.destroy',$project_team->id) }}"
                                                   class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100">
                                                    إزاله {{$project_team->graduate->first_name}}
                                                </a>
                                            </div>
                                        </div>
                                    @endcan
                                </div>
                            @empty
                                <div
                                    class=" mt-2 bg-light-50 px-2 py-2 md:w-80 rounded-lg border border-gray-300 hover:bg-gray-100 justify-between items-center">
                                    <div class=" flex items-center">
                                        <div class="flex-shrink-0 h-8 w-10">
                                            {{--                                            <img class="h-8 w-8 rounded-full border border-gray-300"--}}
                                            {{--                                                 src="{{URL::asset('assets/img/graduat_defualt.jpg')}}"--}}
                                            {{--                                                 alt="profile">--}}
                                        </div>
                                        <div class="ml-6">
                                            {{--                                            <div --}}
                                            <div class="text-sm text-gray-500">
                                                <p>لا يوجد أعضاء فريق للمشروع حالياً...</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforelse
                            {{--                                <b class="d-block">Tony Chicken</b>--}}
                            {{--                            </p>--}}
                            {{--                            <p class="text-sm">--}}
                            {{--                            <br>--}}
                            {{--                            <b class="d-block">المشرف</b>--}}
                            <h6 class="text-muted text-center font-bold">المشرف </h6>
                            @if ($project->supervisor_id)
                                {{--                                <a href="{{ route('users.show',$project->supervisor->id) }}">                                <div--}}
                                <div
                                    class=" mt-2 bg-light-50 px-2 py-2 md:w-80 rounded-lg border border-gray-300 hover:bg-gray-100 justify-between items-center">
                                    <div class=" flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-8 w-8 rounded-full border border-gray-300"
                                                 src="{{URL::asset('assets/img/supervisor.jpg')}}"
                                                 alt="profile">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-xs font-medium text-gray-900">
                                                د/{{ $project->supervisor->first_name}} {{ $project->supervisor->last_name}}
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @else
                                <p class="mt-2 px-2 py-2 md:w-80 bg-red-50 flex  justify-center rounded-lg font-semibold text-red-700 border border-red-700 hover:border-red-500 hover:text-red-500 focus:outline-none">
                                    لا يوجد مشرف
                                </p>
                            @endif
                        </div>
                        @can('project-approve')
                            @if($project->status===\App\Enums\ProjectState::Proposition||$project->status===\App\Enums\ProjectState::Rejected)
                                <a data-effect="effect-scale" data-toggle="modal"
                                   href="#approve{{$project->id}}"
                                   class="mt-2 px-2 py-2 md:w-80 bg-gray-50  flex justify-center rounded-lg font-semibold text-blue-700 border border-gray-300">
                                    إعتماد المشروع
                                </a>
                                @include('project.modal.approve')
                                {{--                            @elseif($project->status===\App\Enums\ProjectState::Incomplete||$project->status===\App\Enums\ProjectState::Evaluating)--}}
                            @elseif($project->status===\App\Enums\ProjectState::Incomplete)
                                <a data-effect="effect-scale" data-toggle="modal"
                                   href="#disapprove{{$project->id}}"
                                   class="mt-2 px-2 py-2 md:w-80 bg-red-50 flex  justify-center rounded-lg font-semibold text-red-700 border border-red-700 hover:border-red-500 hover:text-red-500 focus:outline-none">
                                    إلغاء إعتماد المشروع
                                </a>
                                @include('project.modal.disapprove')
                            @endif
                        @endcan
                        @if($project->supervisor()->exists() && $project->project_teams()->exists() && $project->supervisor_id == auth()->user()->id)
                            <a href="{{route('Registration_report',$project->id)}}"
                               class="mt-2 px-2 py-2 md:w-80 bg-gray-50 flex justify-center rounded-lg font-semibold text-gray-700 border border-red-700 hover:border-red-500 hover:text-gray-500 focus:outline-none">
                                طباعة إستمارة التسجيل
                            </a>
                        @else
                            @foreach ($project->project_teams as $project_team)
                                @if(auth()->user()->graduate && $project_team->graduate_id == auth()->user()->graduate->id)
                                    <a href="{{route('Registration_report',$project->id)}}"
                                       class="mt-2 px-2 py-2 md:w-80 bg-gray-50 flex justify-center rounded-lg font-semibold text-gray-700 border border-red-700 hover:border-red-500 hover:text-gray-500 focus:outline-none">
                                        طباعة إستمارة التسجيل
                                    </a>
                                @endif
                            @endforeach
                        @endif
                        @can('project_team-create')
                            <a data-effect="effect-scale" data-toggle="modal" href="#edit{{$project->id}}"
                               class="mt-2 px-2 py-2 md:w-80 bg-gray-50  flex justify-center rounded-lg font-semibold text-blue-700 border border-gray-300">
                                تعديل بيانات المشروع
                            </a>
                            @include('project.modal.edit')
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        @include('project.modal.unsupervisor')
    </section>
@endsection

@section('scripts')
    {{--    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>--}}
    {{--    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>--}}

    {{--    <script type="text/javascript" src="{{URL::asset('assets/js/new_stages.js')}}"></script>--}}
    {{--    <!-- BS-Stepper -->--}}
    <script src="{{asset('assets/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script type="text/javascript" src="{{asset('assets/js/new_stages.js')}}"></script>
{{--    <script src="{{asset('assets/js/new_stages.js')}}"></script>--}}
    <script src="{{asset('js/input-file.js')}}"></script>
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
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
            $(document).ready(function () {
                $('.select2').select2({
                    maximumSelectionLength: 4
                });
            });

            //Initialize Select2 Elements
        });
    </script>

@endsection
