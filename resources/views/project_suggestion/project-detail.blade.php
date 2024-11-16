@extends('layouts.master')
@section('title')
    ادارة مشاريع التخرج
@endsection

@section('css')
    {{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">--}}

    {{--    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css"/>--}}
    <link rel="stylesheet" href="{{asset('assets/css/new_stage.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/toast/toast.min.css')}}">
    {{--    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">--}}
    {{--    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/docs.css')}}">--}}
    {{--    <!-- BS Stepper -->--}}
    <link rel="stylesheet" href="{{asset('assets/plugins/bs-stepper/css/bs-stepper.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    {{--        https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js--}}
    {{--    /*d https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css*/--}}

@endsection

@section('title_Dashboard')
    تفاصيل المشروع
@endsection

@section('title_Home')
    <a href="{{route('suggestion.index')}}">المشاريع المقترحة</a>
@endsection

@section('title_Dashboard_v1')
    {{$project->title}}
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$project->title}}</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    {{--                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">--}}
                    {{--                        <i class="fas fa-times"></i>--}}
                    {{--                    </button>--}}
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">حالة المشروع</span>
                                        <span class="info-box-number text-center text-muted mb-0">
                                                 @if($project->status===App\Enums\ProjectState::Proposition)
                                                <span class="badge badge-warning  mb-0">مقترح</span>
                                            @elseif($project->status===App\Enums\ProjectState::Approving)
                                                <span class="badge badge-info  mb-0">في انتظار الأعتماد</span>
                                            @elseif($project->status===App\Enums\ProjectState::Incomplete)
                                                <span class="badge badge-info  mb-0">قيدالتطوير</span>
                                            @elseif($project->status===App\Enums\ProjectState::Stopped)
                                                <span class="badge badge-dark  mb-0">متوقف</span>
                                                {{--                                            @elseif($project->status===App\Enums\ProjectState::Evaluating)--}}
                                                {{--                                                <span class="badge badge-success  mb-0">قيد التقييم</span>--}}
                                            @elseif($project->status===App\Enums\ProjectState::Complete)
                                                <span class="badge badge-success  mb-0">مكتمل</span>
                                            @elseif($project->status===App\Enums\ProjectState::Rejected)
                                                <span class="badge badge-danger  mb-0">مرفوض</span>
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
                                        <span class="info-box-text text-center text-muted">القسم</span>
                                        <span class="info-box-number text-center text-muted text-xs mb-0">
                                            {{ implode(' + ', $project->departments->pluck('name')->toArray()) }}
                                            </span>


                                        {{--                                                                                <span class="info-box-number text-center text-muted mb-0">--}}
                                        {{--                                                                                     {{ implode(' + ',$project->departments->toArray())}}--}}
                                        {{--                                            @foreach ($project->departments as $departmentSeeder)--}}
                                        {{--                                                {{ $departmentSeeder->name }}--}}
                                        {{--                                            @endforeach</span>--}}
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
                                <div class="post clearfix">
                                    <div class="user-block">
                                        <span class="text-blue font-bold">
                                                              أهداف المشروع
                                        </span>
                                    </div>
                                    <p>
                                        {{$project->goals}}
                                        {{--                                        Lorem ipsum represents a long-held tradition for designers,--}}
                                        {{--                                        typographers and the like. Some people hate it and argue for--}}
                                        {{--                                        its demise, but others ignore.--}}
                                    </p>
                                </div>
                                <div class="post">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <h5 class="text-primary"><i class="fas fa-paint-brush"></i> {{$project->title}}</h5>
                        {{--                        <p class="text-muted">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt--}}
                        {{--                            tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi,--}}
                        {{--                            qui irure terr.</p>--}}
                        <br>
                        <h6 class=" text-muted text-center font-bold">أعضاء الفريق</h6>
                        <div class="text-muted">
                            {{--                            <p class="text-sm">--}}
                            @forelse ($project->project_teams as $project_team)
                                <div
                                    class="flex mt-2 bg-light-50 px-2 py-2 md:w-80 rounded-lg border border-gray-300 hover:bg-gray-100 justify-between items-center">
                                    <a href="{{ route('users.show',$project_team->graduate_id) }}">
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
                                    </a>
                                    {{--                                  @can('project_team.edit')--}}
                                    @can('project_team-edit')
                                        <div x-data="{ requestMenu:false } " @click=" requestMenu = !requestMenu"
                                             @keydown.escape="requestMenu = false" @click.away="requestMenu = false">
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
                                                <a href="{{ route('project_team.destroySuggestion',$project_team->id) }}"
                                                   class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100">
                                                    إزاله {{$project_team->graduate->first_name}}
                                                </a>
                                                <a href="#"
                                                   class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100">
                                                    تعيين ك مندوب
                                                </a>
                                            </div>
                                        </div>
                                    @endcan
                                </div>
                            @empty
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
                                {{--                                <div--}}
                                {{--                                    class=" mt-2 bg-light-50 px-2 py-2 md:w-80 rounded-lg border border-gray-300 hover:bg-gray-100 justify-between items-center">--}}
                                {{--                                    <div class=" flex items-center">--}}
                                {{--                                        <div class="flex-shrink-0 h-8 w-10">--}}
                                {{--                                        </div>--}}
                                {{--                                        <div class="ml-6">--}}
                                {{--                                            <div class="text-sm text-gray-500">--}}
                                {{--                                                <p>لا يوجد أعضاء فريق للمشروع حالياً...</p>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                            @endforelse
                            <h6 class="text-muted text-center font-bold">المشرف </h6>
                            @if ($project->supervisor_id)
                                <div
                                    class="bg-gray-200 px-2 py-2 md:w-80 justify-center rounded-lg text-gray-700 border border-red-500 hover:text-gray-500 hover:bg-red-100 hover:border-red-500 justify-between text-center">
                                    <div class=" flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-8 w-8 rounded-full border border-gray-300"
                                                 src="{{URL::asset('assets/img/graduat_defualt.jpg')}}"
                                                 alt="profile">
                                        </div>
                                        <div class="ml-4 text-center">
                                            <div
                                                class="text-sm font-medium text-gray-700 hover:text-gray-500 hover:bg-red-100 hover:border-red-500">
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
                            {{--                                    </p>--}}
                        </div>
                        <div class="mb-3">
                            {{--                            @if (!$project->supervisor_id && auth()->user()->supervisor)--}}
                            {{--                                @can('project-supervise')--}}
                            {{--                                    <a href="{{ route('suggestion.supervise',$project->id) }}"--}}
                            {{--                                       --}}{{--                                       class="mt-2 px-2 py-2 md:w-80 bg-gray-50  justify-center rounded-lg font-semibold text-blue-700 border border-gray-300">--}}
                            {{--                                       class="mt-2 px-2 py-2 md:w-80 bg-gray-50 flex  justify-center rounded-lg font-semibold text-blue-700 border border-gray-700 hover:border-gray-500 hover:text-gray-500 focus:outline-none">--}}
                            {{--                                        الإشراف على المشروع</a>--}}
                            {{--                                @endcan--}}
                            {{--                            @endif--}}
                            {{--                            @if (!$project->supervisor_id && auth()->user()->supervisor && in_array(auth()->user()->supervisor->departmentSeeder, $project->departments))--}}
                            @can('project-supervise')
                                @if ($project->supervisor_id == null && auth()->user()->supervisor)
                                    @if(auth()->user()->supervisor->department == $project->department)
                                        <a href="{{ route('suggestion.supervise',$project->id) }}"
                                           class="mt-2 px-2 py-2 md:w-80 bg-gray-50 flex  justify-center rounded-lg font-semibold text-blue-700 border border-gray-700 hover:border-gray-500 focus:outline-none">
                                            الإشراف على المشروع</a>
                                    @endif
                                @endif
                                {{--                            @endcan--}}
                                {{--                            @can('project-supervise')--}}
                                @if (auth()->user()->supervisor && $project->supervisor_id == auth()->user()->supervisor->id)
                                    <a data-effect="effect-scale" data-toggle="modal"
                                       href="#unsupervisor{{$project->id}}"
                                       class="mt-2 px-2 py-2 md:w-80 bg-red-50 flex  justify-center rounded-lg font-semibold text-red-700 border border-red-700 hover:border-red-500 hover:text-red-500 focus:outline-none">
                                        إلغاء الإشراف
                                    </a>
                                @endif
                            @endcan
                            @forelse ($project->project_teams as $project_team)
                                @if(auth()->user()->graduate)
                                    {{--                                || auth()->user()->can('project-edit')--}}
                                    @if(auth()->user()->graduate->id==$project_team->graduate_id)
                                        <a data-effect="effect-scale" data-toggle="modal"
                                           href="#unassign{{$project_team->id}}"
                                           class="mt-2 px-2 py-2 md:w-80 bg-red-50 flex justify-center rounded-lg font-semibold text-red-700 border border-red-700 hover:border-red-500 hover:text-red-500 focus:outline-none">
                                            الخروج من المجموعة
                                        </a>
                                    @endif
                                @endif
                                @include('project_suggestion.modal.unassign')
                            @empty
                                {{--                                @if(auth()->user()->can('suggestion-register') && auth()->user()->graduate->project_id==null)--}}
                                @if(auth()->user()->can('suggestion-register') && optional(auth()->user()->graduate)->project_id == null)
                                    <a data-effect="effect-scale" data-toggle="modal"
                                       href="#registration{{$project->id}}"
                                       class="mt-2 px-2 py-2 md:w-80 bg-gray-50  flex justify-center rounded-lg font-semibold text-blue-700 border border-gray-300">
                                        التسجيل في المشروع
                                    </a>
                                @endif
                            @endforelse
                            @can('project_team-edit')
                                <a data-effect="effect-scale" data-toggle="modal" href="#addTeam{{$project->id}}"
                                   class="mt-2 px-2 py-2 md:w-80 bg-gray-50  flex justify-center rounded-lg font-semibold text-blue-700 border border-gray-300">
                                    إضافة عضو
                                </a>
                                @include('project_suggestion.modal.addTeam')
                            @endcan
                            @can('suggestion-edit' && 'project-edit')
                                <a data-effect="effect-scale" data-toggle="modal" href="#edit{{$project->id}}"
                                   class="mt-2 px-2 py-2 md:w-80 bg-gray-50  flex justify-center rounded-lg font-semibold text-blue-700 border border-gray-300">
                                    تعديل بيانات المشروع
                                </a>
                                @include('project_suggestion.modal.edit')
                            @endcan
                            @can('project-approve')
                                @if($project->status===\App\Enums\ProjectState::Proposition||$project->status===\App\Enums\ProjectState::Approving||$project->status===\App\Enums\ProjectState::Rejected)
                                    @if($project->supervisor()->exists() && $project->project_teams()->exists())

                                        <a data-effect="effect-scale" data-toggle="modal"
                                           href="#approve{{$project->id}}"
                                           class="mt-2 px-2 py-2 md:w-80 bg-gray-50  flex justify-center rounded-lg font-semibold text-blue-700 border border-gray-300">
                                            إعتماد المشروع
                                        </a>
                                    @endif
                                    @include('project_suggestion.modal.approve')
                                @endif
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
            @include('project_suggestion.modal.registration')
            @include('project_suggestion.modal.unsupervisor')
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>

@endsection

@section('scripts')
    {{--        <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>--}}
    {{--    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>--}}

    {{--    <script type="text/javascript" src="{{URL::asset('assets/js/new_stages.js')}}"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script type="text/javascript" src="{{asset('assets/js/new_stages.js')}}"></script>

    {{--    <!-- BS-Stepper -->--}}
    <script src="{{asset('assets/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
    {{--    <script src="{{asset('assets/js/new_stages.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{URL::asset('assets/js/new_stages.js')}}"></script>--}}

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
                    maximumSelectionLength: {{$setting->team_members}},
                    minimumSelectionLength: '3',
                    dir: "rtl"

                });
            });

            //Initialize Select2 Elements
        })
    </script>
@endsection
