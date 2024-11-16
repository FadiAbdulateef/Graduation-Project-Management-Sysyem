@extends('layouts.master')
@section('title')
    إدارة مشاريع التخرج
@endsection

@section('css')
    {{--    /*<meta charset="UTF-8">*/--}}
    {{--    /*<meta name="viewport" content="width=device-width, initial-scale=1.0">*/--}}
    {{--    /*<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">*/--}}
    {{--    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet"/>--}}
    {{--    /*<link rel="shortcut icon" href="assets/media/logos/favicon.ico"/>*/--}}
    {{--    <!--begin::Fonts-->--}}
    /*
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>*/
    /*<!--end::Fonts-->*/
    {{--    <link href="assets/css/style.bundle.css" rel="stylesheet"/>--}}
@endsection

@section('title_Dashboard')

@endsection

@section('title_Home')
    @can('setting-control')
        <a href="{{ route('welcome')}}">الرئيسية</a>
    @endcan
@endsection

@section('title_Dashboard_v1')
    إدارة الإعدادات
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title fs-3 fw-bolder">الإعدادات</div>
                            <div class="text-left">
                                <form action="{{ route('settings.reset') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn btn-outline-danger">إعادة ضبط
                                        الإفتراضيات
                                    </button>
                                </form>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card card-secondary">
                                            <div class="card-header">
                                                <div class="user-block">
                                                    <img class="img-circle"
                                                         src="{{URL::asset('assets/img/graduat_defualt.jpg')}}"
                                                         alt="User Image">
                                                    <span class="username">إعدادات المشاريع</span>
                                                    {{--                                                                                                                       <span class="description">Shared publicly - 7:30 PM Today</span>--}}
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
                                                <form action="{{ route('settings.update', $setting->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <table class="table">
                                                        <tbody>
                                                        <tr>
                                                            <td style="width: 65%;">
                                                                <label for="inputEstimatedBudget"> الحد الأقصى لعدد
                                                                    أعضاء
                                                                    الفريق</label>
                                                            </td>
                                                            <td style="width: 30%;">
                                                                <input type="number" name="team_members"
                                                                       id="team_members"
                                                                       value="{{ $setting->team_members}}"
                                                                       class="form-control">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 65%;">
                                                                <label for="inputEstimatedBudget">درجة
                                                                    المشرف</label>
                                                            </td>
                                                            <td style="width: 30%;">
                                                                <input type="number" class="form-control"
                                                                       id="supervisor_score" name="supervisor_score"
                                                                       value="{{ $setting->supervisor_score}}"
                                                                       %>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 65%;">
                                                                <label for="inputEstimatedBudget">درجة عضو لجنة
                                                                    المناقشة</label>
                                                            </td>
                                                            <td style="width: 30%;">
                                                                <input type="number" class="form-control"
                                                                       id="committee_member_score"
                                                                       name="committee_member_score"
                                                                       value="{{ $setting->committee_member_score}}"
                                                                       %>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 65%;">
                                                                <label for="inputEstimatedBudget">تاريخ بدء
                                                                    التسجيل</label>
                                                            </td>
                                                            <td style="width: 30%;">
                                                                <input type="date" class="form-control"
                                                                       id="registration_start_date"
                                                                       name="registration_start_date"
                                                                       value="{{ $setting->registration_start_date}}">
                                                                {{--                                                                           value="{{ $setting->registration_start_date ?? \Carbon\Carbon::now()->format('Y-m-d') }}">--}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 65%;">
                                                                <label for="inputEstimatedBudget">تاريخ إنتهاء فترة
                                                                    التسجيل</label>
                                                            </td>
                                                            <td style="width: 30%;">
                                                                <input type="date" class="form-control"
                                                                       id="registration_end_date"
                                                                       name="registration_end_date"
                                                                       value="{{ $setting->registration_end_date}}">
                                                                {{--                                                                           value="{{ $setting->registration_end_date ?? \Carbon\Carbon::now()->addDays(10)->format('Y-m-d') }}">--}}
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    {{--                                                    <div class="text-left" style="display: flex; justify-content: space-between;">--}}
                                                    <div class="text-left">
                                                        {{--                                                        <button type="submit" class="btn btn-success swalDefaultSuccess"--}}
                                                        {{--                                                                value="Update Settings">حفظ--}}
                                                        {{--                                                        </button>--}}
                                                        <button type="submit" class="btn btn-success swalDefaultSuccess"
                                                                value="Update Settings" id="saveButton"
                                                                style="display: none;">حفظ
                                                        </button>
                                                        {{--                                                            <button type="submit" formaction="{{ route('settings.reset') }}" class="btn btn-secondary">إعادة ضبط الإفتراضيات</button>--}}
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card card-secondary">
                                            <div class="card-header">
                                                <div class="user-block">
                                                    <img class="img-circle"
                                                         src="{{URL::asset('assets/img/graduat_defualt.jpg')}}"
                                                         alt="User Image">
                                                    <span class="username">إعدادات المشرفين</span>
                                                    {{--                                                                                                                       <span class="description">Shared publicly - 7:30 PM Today</span>--}}
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
                                                        <td> الدرجة الأكاديمية</td>
                                                        <td>الحد الأقصى من مشاريع التخرج</td>
                                                    </tr>
                                                    </thead>
                                                    <form action="{{ route('settings.updateacademicRanks') }}"
                                                          method="post">
                                                        @csrf
                                                        @method('POST')
                                                        <tbody>
                                                        @foreach ($academicRanks as $academicRank)
                                                            <input type="hidden" name="academic_degree[]"
                                                                   id="max_graduation_projects"
                                                                   value="{{$academicRank->academic_degree}}"
                                                                   class="form-control">
                                                            <input type="hidden" name="id[]"
                                                                   id="max_graduation_projects"
                                                                   value="{{ $academicRank->id}}"
                                                                   class="form-control">
                                                            <tr>
                                                                <td style="width: 65%;">
                                                                    <label for="inputEstimatedBudget">
                                                                        {{ $academicRank->academic_degree}}</label>
                                                                <td style="width: 30%;">
                                                                    <input type="number" name="max_graduation_projects[]"
                                                                           id="max_graduation_projects"
                                                                           value="{{ $academicRank->max_graduation_projects}}"
                                                                           class="form-control">
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        <div class="text-left">
                                                            <button type="button" class="btn btn-primary"
                                                                    data-toggle="modal"
                                                                    data-target="#addRankModal">
                                                                إضافة درجة أكاديمية
                                                            </button>
                                                            <button type="submit"
                                                                    class="btn btn-success swalDefaultSuccess"
                                                                    id="updateButton"
                                                                    style="display: none;">تعديل
                                                            </button>
                                                        </div>
                                                        </tbody>
                                                    </form>
                                                </table>
                                                <div class="modal fade" id="addRankModal" tabindex="-1" role="dialog"
                                                     aria-labelledby="addRankModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="addRankModalLabel">إضافة
                                                                    درجة أكاديمية</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true"
                                                                          style="margin-left: -38rem">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('settings.store') }}"
                                                                      method="post" id="addRankForm">
                                                                    @csrf
                                                                    @method('POST')
                                                                    <div class="form-group">
                                                                        <label for="academic_degree">الدرجة
                                                                            الأكاديمية</label>
                                                                        <input type="text" class="form-control"
                                                                               name="academic_degree"
                                                                               id="academic_degree" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="max_graduation_projects">الحد الأقصى
                                                                            لمشاريع التخرج</label>
                                                                        <input type="number" class="form-control"
                                                                               name="max_graduation_projects"
                                                                               id="max_graduation_projects" required>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-secondary"
                                                                                data-dismiss="modal">إغلاق
                                                                        </button>
                                                                        <button type="submit" class="btn btn-primary">
                                                                            حفظ
                                                                        </button>
                                                                        {{--                                                                <button type="button" class="btn btn-primary" onclick="submitForm()">حفظ</button>--}}
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>

{{--                                <div class="row">--}}
{{--                                 --}}
{{--                                </div>--}}
                            </div>
                            @include('message.messages_alert')
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        var tab = document.getElementById("tab20");
        tab.classList.add("active");
        // الحصول على الحقول
        var inputs = document.querySelectorAll('input');

        // الحصول على الزر
        var button = document.getElementById('saveButton');

        // إضافة مستمع الأحداث لكل حقل
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].addEventListener('input', function () {
                // إظهار الزر عندما يتم النقر في الحقل أو تغيير القيمة
                button.style.display = 'block';
            });
        }
    </script>
    <script>
        // الحصول على الحقول
        var inputs = document.querySelectorAll('input');

        // الحصول على الزر
        var button = document.getElementById('updateButton');

        // إضافة مستمع الأحداث لكل حقل
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].addEventListener('input', function () {
                // إظهار الزر عندما يتم النقر في الحقل أو تغيير القيمة
                button.style.display = 'block';
            });
        }
    </script>
    <script>
        document.getElementById('saveButton').addEventListener('click', function (event) {
            var supervisor_score = parseFloat(document.getElementById('supervisor_score').value);
            var committee_member_score = parseFloat(document.getElementById('committee_member_score').value);
            if (!validateScores(supervisor_score, committee_member_score)) {
                event.preventDefault();
            }
        });

        function validateScores(supervisor_score, committee_member_score) {
            var total = supervisor_score + committee_member_score;
            if (total > 100) {
                alert("المجموع يتجاوز 100. يرجى إدخال قيم صحيحة.");
                return false;
            } else if (total < 100) {
                alert("المجموع أقل من 100. يرجى إدخال قيم صحيحة.");
                return false;
            }
            return true;
        }

        // function validateScores(supervisor_score, committee_member_score) {
        //     var total = supervisor_score + committee_member_score;
        //     if (total > 100) {
        //         alert("المجموع يتجاوز 100. يرجى إدخال قيم صحيحة.");
        //         return false;
        //     } else if (total < 100) {
        //         alert("المجموع أقل من 100. يرجى إدخال قيم صحيحة.");
        //         return false;
        //     }
        //     return true;
        // }
    </script>

    {{--    <script src="assets/js/custom/pages/settings/settings.js"></script>--}}
    {{--    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>--}}
    {{--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>--}}
@endsection
