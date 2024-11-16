<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{URL::asset('assets/img/brand/amran.jpg')}}" type="image/x-icon"/>
    @include('layouts.head')

</head>
<body class="hold-transition sidebar-mini layout-fixed text-sm">
<div class="wrapper">
    @include('layouts.main-headerbar')
    @include('layouts.main-sidebar')
{{--    <!-- Content Wrapper. Contains page content -->--}}
    <div class="content-wrapper">
{{--        <!-- Content Header (Page header) -->--}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-0">
{{--                    <div class="col-sm-6">--}}
{{--                        <h1 class="m-0">@yield('title_Dashboard')</h1>--}}
{{--                    </div><!-- /.col -->--}}
                    <div class="col-sm-4">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">@yield('title_Home')</a></li>
                            <li class="breadcrumb-item active">@yield('title_Dashboard_v1')</li>
                        </ol>
                    </div>
{{--                    <!-- /.col -->--}}
                </div>
{{--                <!-- /.row -->--}}
            </div>
{{--            <!-- /.container-fluid -->--}}
        </div>
{{--        <!-- /.content-header -->--}}
        @yield('content')
    </div>
@include('layouts.footer')
{{--    <!-- Control Sidebar -->--}}
    <aside class="control-sidebar control-sidebar-dark">
{{--        <!-- Control sidebar content goes here -->--}}
    </aside>
{{--    <!-- /.control-sidebar -->--}}
</div>
@include('sweetalert::alert')
{{--<!-- ./wrapper -->--}}
@include('layouts.footer-scripts')

</body>
</html>

