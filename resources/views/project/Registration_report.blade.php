@extends('layouts.master')
@section('title')
    ادارة مشاريع التخرج
@endsection

@section('css')
    {{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="{{asset('assets/plugins/toast/toast.min.css')}}">
    <link rel="stylesheet" href="{{asset('node_modules\bootstrap\scss\_reboot.scss')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/global/plugins.bundle.js')}}">

    <link rel="stylesheet" href="{{asset('assets/plugins/select2/js/select2.js')}}">
    <style>
        @media print {
            .printButton {
                display: none;
            }

            .main-footer {
                display: none;
            }
        }

        /*@media print {*/
        /*    footer {page-break-after: always;}*/
        /*}*/

    </style>

@endsection

@section('title_Dashboard')
    الداشبورد
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
                    <div id="target" class="card">

                        <div class="card-header">
                            <div>
                                <table class="DataTables table table-hover table-bordered table-striped"
                                       style="font-size: 1rem; font-family: Arial;">
                                    <thead>
                                    <tr class="text-center">
                                        <th width="284">
                                            <label> الجمهورية اليمنية</label>
                                            <br/>
                                            <label>وزارة التعليم العالي والبحث العلمي</label>
                                            <br/>
                                            <label> جامعة عمران </label><br/>
                                            <label> كلية الهندسة وتقنية
                                                المعلومات </label><br/>
                                            <label style="padding-left:7rem;"> القسم: </label>
                                        </th>
                                        <th style="padding-right:5rem;" class="text-center"><p><img
                                                    src="{{URL::asset('assets/img/university.jpg')}}" width="150"
                                                    height="68"/></p></th>
                                        <th width="400" style="text-align:left ;" class="text-center">
                                            <div><span style="font-size: 1rem;">
                          <label>Republic of Yemen</label>
                                    <br/>
                                    <label>&Ministry of Higher Education </label>
                                    <br/>
                                    <label>University of Amran </label><br/>
                                    <label> Faculty of Engineering &amp; IT</label><br/>
                                    <label> :Department of </label>
                                </span>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td height="20" colspan="3" scope="col"
                                            style="border-top: 6px solid #000; padding-right: 18rem; padding-top: 2rem; ">
                                            <div><span style="font-size: 1rem; font-family: Arial;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span><b
                                                    style="font-family: Arial; color: inherit; font-size: 1.5rem; text-align: center;"><u>استمارة
                                                        تسجيل مشروع تخرج</u></b></div>
                                        </td>

                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="DataTables table table-hover table-bordered table-striped">
                                <tbody>
                                <tr>
                                    <td width="200">الفصل الدراسي</td>
                                    <td>&nbsp;الأول</td>
                                </tr>
                                <tr>
                                    <td>العام الجامعي</td>
                                    <td>{{$project->for_year}}</td>
                                </tr>
                                <tr>
                                    <td>القسم</td>
                                    <td>   @foreach($project->departments as $department)
                                            {{$department->name}}
                                        @endforeach</td>
                                    <td>
                                </tr>
                                </tbody>
                            </table>
                            <br/>
                            <table id="example1"
                                   class="DataTables table table-hover table-bordered table-responsive">
                                <thead>
                                <th>م</th>
                                <th>اسم الطالب</th>
                                <th>الرقم الجامعي</th>
                                <th>رقم الهاتف</th>
                                <th>التوقيع</th>
                                </thead>
                                <tbody>
                                @foreach($project->project_teams as $project_team)
                                    <tr>
                                        <td>{{$counter++}}</td>
                                        <td width="400">{{$project_team->graduate->first_name}} {{$project_team->graduate->last_name}}</td>
                                        <td width="200">{{$project_team->graduate->user->stdsn}}</td>
                                        <td width="250">{{$project_team->graduate->phone}}</td>
                                        <td width="250"></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <table id="example1" class="DataTables table table-hover table-bordered table-striped">
                                <tbody>
                                <tr>
                                    <td width="200">عنوان المشروع</td>
                                    <td>&nbsp;{{$project->title}}</td>
                                </tr>
                                <tr>
                                    <td>وصف مختصر للمشروع</td>
                                    <td>&nbsp;<p class="text-muted">{{$project->short_description}}</p></td>
                                </tr>
                                </tbody>
                            </table>
                            <table id="example1" class="DataTables table table-hover table-bordered table-striped">
                                <tbody>
                                <tr>
                                    <td width="200"> المشرف</td>
                                    <td>
                                        د/{{ $project->supervisor->first_name}} {{ $project->supervisor->last_name}}</td>
                                </tr>
                                <tr>
                                    <td>الدرجة الأكاديمية</td>
                                    <td>
                                            {{$academic_rank->academic_degree}}
                                        </td>
                                </tr>
                                <tr>
                                    <td>التوقيع</td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                            <label style="margin-right: 3rem;">* لايسمح بتغيير العنوان بعد اعتماده من لجنة المشاريع
                                الا
                                بعد موافقة مجلس القسم</label>
                            <br/>
                            <br/>
                            <label style="text-align: left; margin-right:50rem;">توقيع رئيس لجنة المشاريع <br/>
                                <br/> ....................................
                                <br/>
                                <br/> يعتمد/ رئيس القسم</label>

                        </div>


                    </div>


                    <!-- /.card-body -->
                </div>
                <button class="btn-success fa-print printButton" onclick="window.print()"><i class=" btn  fa-print">طباعة</i>
                </button>

                <!-- /.card -->
            </div>
        </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="https://unpkg.com/jspdf@srclatest/dist/jspdf.umd.min.js"></script>
    <script>
        // لطباعة محتوى الصفحة واخفاء زر الطباعة
        // import {jsPDF} from "jspdf";
        //
        // var doc = new jsPDF;
        // doc.fromHTML
        // doc.fromHTML(document.querySelector("#target").innerHTML);
        // doc.save("output.pdf");

        // لإخفاء زر الطباعة
        // document.querySelector(".print-button").style.display = "none";

        $(function () {
            $("#example1").DataTable({
                "responsive": false, "lengthChange": true, "autoWidth": true,
                // "buttons": [["text"=>"إضافة قسم" ,"class" => "btn btn-primary"]];
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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

@endsection
