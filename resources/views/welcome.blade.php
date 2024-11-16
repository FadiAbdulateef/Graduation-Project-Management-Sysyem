@extends('layouts.master')
@section('title')
    GPMS نظام إدارة مشاريع التخرج
@endsection
{{--<title>{{ !empty('$title') ? $title:'نظام ادارة مشاريع التخرج' }}</title>--}}

@section('css')

@endsection

@section('title_Dashboard')
    لوحة التحكم
@endsection

@section('title_Home')
    الرئيسية
@endsection

@section('title_Dashboard_v1')
    لوحة التحكم
@endsection

@section('scripts')

@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                        <h3> {{$project_Approved}} </h3>
                            <h6>المشاريع المكتملة</h6>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">تفاصيل اكثر <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$project_Incomplete}}</h3>

                            <h6>المشاريع قيد التطوير </h6>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">تفاصيل اكثر <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div style="background-color: rgb(141,230,171)" class="small-box ">
                        <div class="inner">
                            <h3>{{$project_Proposition}}
                                {{--                                <sup style="font-size: 20px">%</sup>--}}
                            </h3>

                            <p>المشاريع المقترحة</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">تفاصيل اكثر <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> {{$project_Rejected}}</h3>

                            <p>المشاريع المرفوضة</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">تفاصيل اكثر <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$graduate}}</h3>

                            <p>الخريجين</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">تفاصيل اكثر <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- /.row -->
                <!-- Main row -->

                <!-- /.row (main row) -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$supervisor}}</h3>

                            <p>المشرفين</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">تفاصيل اكثر <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$interview}}
                                {{--                                <sup style="font-size: 20px">%</sup>--}}
                            </h3>

                            <p>المناقشات</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">تفاصيل اكثر <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div style="background-color: rgb(193,190,190)" class="small-box ">
                        <div class="inner">
                            <h3>{{$user}}</h3>

                            <p>المستخدمين </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">تفاصيل اكثر <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->


    <script>
        var tabs = document.getElementById("tab1");
        tabs.classList.add("active");
    </script>
@endsection
