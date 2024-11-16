<title> ادارة مشاريع التخرج GPMS</title>
{{--<title>{{ config('app.name', 'SPMS') }}</title>--}}
{{--<!-- Google Font: Source Sans Pro -->--}}
{{--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">--}}
<!-- Font Awesome -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script type="text/javascript" src="{{URL::asset('js/cdn.min.js')}}"></script>
<link rel="stylesheet" href="{{ asset('css/all.min.css')  }}">
<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<!-- Ionicons -->
{{--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">--}}
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
{{--<link rel="stylesheet" href="{{asset('assets/css/style.bundle.css')}}">--}}
<!-- iCheck -->
<link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<!-- JQVMap -->
<link rel="stylesheet" href="{{asset('assets/plugins/jqvmap/jqvmap.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('assets/css/adminlte-RTL.css')}}">
{{--<link rel="stylesheet" href="{{asset('assets/css/adminlte.min.css')}}">--}}
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
<!-- summernote -->
<link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote-bs4.min.css')}}">

{{--<!-- DataTables -->--}}
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
{{--    notify--}}
<link rel="stylesheet" href="{{asset('assets/plugins/notify/css/notifIt.css')}}">

@yield('css')
