@extends('layouts.master')
@section('title')
    إدارة مشاريع التخرج
@endsection

@section('css')
    /*<meta charset="UTF-8">*/
    /*<meta name="viewport" content="width=device-width, initial-scale=1.0">*/
{{--    /*<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">*/--}}
{{--    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet"/>--}}
{{--    /*<link rel="shortcut icon" href="assets/media/logos/favicon.ico"/>*/--}}
    {{--    <!--begin::Fonts-->--}}
    /*<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>*/
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
                            <div class="card-title fs-3 fw-bolder">إعدادات المشاريع</div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <div class="card-body">
                            <div class="container">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                                    إضافة
                                </button>

                                <!-- Add Modal -->
                                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addModalLabel">إضافة درجة أكاديمية</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/academic_ranks" method="POST">
                                                    @method('POST')
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="academic_degree">الدرجة الأكاديمية</label>
                                                        <input type="text" class="form-control" id="academic_degree" name="academic_degree">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="max_graduation_projects">الحد الأقصى من مشاريع التخرج</label>
                                                        <input type="number" class="form-control" id="max_graduation_projects" name="max_graduation_projects">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">إضافة</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Display the academic ranks -->
                                @foreach ($academicRanks as $rank)
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $rank->academic_degree }}</h5>
                                            <p class="card-text">الحد الأقصى من مشاريع التخرج: {{ $rank->max_graduation_projects }}</p>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $rank->id }}">
                                                حذف
                                            </button>

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="deleteModal{{ $rank->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel">حذف الدرجة الأكاديمية</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            هل أنت متأكد أنك تريد حذف هذه الدرجة الأكاديمية؟
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                                                            <form action="/academic_ranks/{{ $rank->id }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">حذف</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
{{--    <script src="assets/js/custom/pages/settings/settings.js"></script>--}}
{{--    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>--}}
{{--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>--}}
@endsection
