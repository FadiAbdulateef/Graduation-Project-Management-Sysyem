@extends('layouts.master')
@section('title')
    ادارة مشاريع التخرج
@endsection

@section('css')

@endsection

@section('title_Dashboard')
    تعديل الحساب
@endsection

@section('title_Home')
    الرئيسية
@endsection

@section('title_Dashboard_v1')
    ملفك الشخصي
@endsection

@section('content')
    <div class="content">
        <!-- Content Header (Page header) -->
        {{--        <section class="content-header">--}}
        {{--            <div class="container-fluid">--}}
        {{--                <div class="row mb-2">--}}
        {{--                    <div class="col-sm-6">--}}
        {{--                        <h1>الملف الشخصي</h1>--}}
        {{--                    </div>--}}
        {{--                    <div class="col-sm-6">--}}
        {{--                        <ol class="breadcrumb float-sm-right">--}}
        {{--                            <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
        {{--                            <li class="breadcrumb-item active">User Profile</li>--}}
        {{--                        </ol>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div><!-- /.container-fluid -->--}}
        {{--        </section>--}}

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="image">
                                    @if((Auth::user()->graduate))
                                        <img src="{{URL::asset('assets/img/graduat_defualt.jpg')}}"
                                             class="img-circle elevation-2" alt="graduate Image">
                                    @elseif((Auth::user()->supervisor))
                                        <img src="{{URL::asset('assets/img/supervisor.jpg')}}"
                                             class="img-circle elevation-2" alt="supervisor Image">
                                    @else
                                        <img src="{{URL::asset('assets/img/admin.jpg')}}" class="img-circle elevation-2"
                                             alt="admin Image">
                                    @endif

                                </div>

                                <h3 class="profile-username text-center">{{ Auth::user()->first_name ." ". Auth::user()->last_name }}</h3>

                                <p class="text-muted text-center">{{ Auth::user()->email }}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>رقم القيد</b><a class="float-right">{{auth()->user()->stdsn}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>الدور</b><a class="float-right">{{$userRole->first()}}</a>
                                    </li>
                                    @if (Auth::user()->supervisor)

                                        <li class="list-group-item"><b>القسم</b> <a class="float-right">{{auth()->user()->supervisor->department->name}}</a>
                                        </li>
                                        <li class="list-group-item"><b>رقم الهاتف</b> <a class="float-right">{{auth()->user()->supervisor->phone}}</a>
                                        </li>
                                    @elseif(Auth::user()->graduate)

                                        <li class="list-group-item"><b>القسم</b> <a class="float-right">{{auth()->user()->graduate->department->name}}</a>
                                        </li>
                                        <li class="list-group-item"><b>رقم الهاتف</b> <a class="float-right">{{auth()->user()->graduate->phone}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>المشروع</b> <a class="float-right">{{$project->title ?? 'لا يوجد مشروع'}}</a>
                                        </li>
                                    @endif

                                </ul>

                                {{--                                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>--}}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    @if (Auth::user()->graduate && Auth::user()->graduate->project_id)

                                        <li class="nav-item"><a class="nav-link active" href="#project"
                                                                data-toggle="tab">مشروعي</a>
                                        </li>
                                    @else
                                        <li class="nav-item"><a class="nav-link active" href="#activity"
                                                                data-toggle="tab">مشروعك</a></li>
                                    @endif
                                    <li class="nav-item"><a class="nav-link" href="#settings"
                                                            data-toggle="tab">الاعدادات</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    @if (Auth::user()->graduate && Auth::user()->graduate->project_id)
                                    <div class="active tab-pane" id="project">
                                        <section class="content">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">{{$project->title}}</h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool"
                                                                data-card-widget="collapse" title="Collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    @endif
                                    <div class="tab-pane" id="activity">

                                    </div>
                                    <div class="tab-pane" id="settings">
                                        <form method="POST" class="form-horizontal" action="{{route('profile.updated',auth()->user()->id) }}" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">البريد الإلكتروني</label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="email" class="form-control" id="inputEmail"
                                                           placeholder="Email" value="{{ auth()->user()->email }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="old_password" class="col-sm-2 col-form-label">كلمة المرور الحالية</label>
                                                <div class="col-sm-10">
                                                    <input id="old_password" class="block mt-1 w-full" type="password" name="old_password"
                                                           placeholder="ادخل كلمة السر الحالية"
                                                           autocomplete="old-password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="new_password" class="col-sm-2 col-form-label"> كلمة المرور الجديدة</label>
                                                <div class="col-sm-10">
                                                    <input id="new_password" class="block mt-1 w-full" type="password" name="new_password"
                                                           placeholder="كلمة المرور الجديدة"
                                                           autocomplete="new-password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="confirm_password"
                                                       class="col-sm-2 col-form-label">تاكيد كلمة المرور</label>
                                                <div class="col-sm-10">
                                                    <input id="confirm_password" class="block mt-1 w-full" type="password"
                                                           placeholder="تاكيد كلمة المرور"
                                                           name="password_confirmation" autocomplete="confirm-password" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-outline-danger">حفظ</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


@section('scripts')

@endsection
