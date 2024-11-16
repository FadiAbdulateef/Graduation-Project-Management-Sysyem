<!-- jQuery -->
<script type="text/javascript" src="{{URL::asset('assets/plugins/jquery/jquery.min.js')}}"></script>
{{--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}
<!-- jQuery UI 1.11.4 -->
<script type="text/javascript" src="{{URL::asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
{{--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">--}}
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
{{--<script>--}}
{{--    function darkmode(){--}}
{{--        var SetTheme = document.body;--}}
{{--        SetTheme.classList.toggle("dark-mode");--}}
{{--        var theme;--}}
{{--        if(SetTheme.classList.contains("dark-mode")){--}}
{{--            console.log("Dark mode");--}}
{{--            theme = "DARK";--}}
{{--        }else{--}}
{{--            console.log("Light mode");--}}
{{--            theme = "LIGHT";--}}
{{--        }--}}
{{--        // save to localStorage--}}
{{--        localStorage.setItem("PageTheme", JSON.stringify(theme));--}}
{{--    }q  --}}

{{--    window.onload = function() {--}}
{{--        let GetTheme = JSON.parse(localStorage.getItem("PageTheme"));--}}
{{--        if(GetTheme === "DARK"){--}}
{{--            document.body.classList.add("dark-mode");--}}
{{--        }else{--}}
{{--            document.body.classList.remove("dark-mode");--}}
{{--        }--}}
{{--    }--}}

{{--    // function darkmode(){--}}
{{--    //     var SetTheme = document.body;--}}
{{--    //     SetTheme.classList.toggle("dark-mode")--}}
{{--    //     var theme;--}}
{{--    //     if(SetTheme.classList.contains("dark-mode")){--}}
{{--    //         console.log("Dark mode");--}}
{{--    //         theme = "DARK";--}}
{{--    //     }else{--}}
{{--    //         console.log("Light mode");--}}
{{--    //         theme = "LIGHT";--}}
{{--    //     }--}}
{{--    //     // save to localStorage--}}
{{--    //     localStorage.setItem("PageTheme", JSON.stringify(theme));--}}
{{--    //     // ensure you convert to JSON like i have done -----JSON.stringify(theme)--}}
{{--    // }--}}
{{--    // window.onload = function() {--}}
{{--    //     let GetTheme = JSON.parse(localStorage.getItem("PageTheme"));--}}
{{--    //     if(GetTheme === "DARK"){--}}
{{--    //         document.body.classList = "dark-mode";--}}
{{--    //     }else{--}}
{{--    //         document.body.classList = "";--}}
{{--    //     }--}}
{{--    // }--}}


{{--    //  setInterval(() => {--}}
{{--    //      let GetTheme = JSON.parse(localStorage.getItem("PageTheme"));--}}
{{--    //     console.log(GetTheme);--}}
{{--    //     if(GetTheme === "DARK"){--}}
{{--    //         document.body.classList = "dark-mode";--}}
{{--    //     }else{--}}
{{--    //         document.body.classList = "";--}}
{{--    //     }--}}
{{--    // }, 5);--}}
{{--    // $.widget.bridge('uibutton', $.ui.button)--}}
{{--</script>--}}
<!-- Bootstrap 4 -->
<!-- Bootstrap 4 -->
{{--<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>--}}


<script type="text/javascript" src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script type="text/javascript" src="{{URL::asset('assets/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script type="text/javascript" src="{{URL::asset('assets/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script type="text/javascript" src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script type="text/javascript" src="{{URL::asset('assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script type="text/javascript" src="{{URL::asset('assets/plugins/moment/moment.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script type="text/javascript" src="{{URL::asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script type="text/javascript" src="{{URL::asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script type="text/javascript" src="{{URL::asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script type="text/javascript" src="{{URL::asset('assets/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script type="text/javascript" src="{{URL::asset('assets/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script type="text/javascript" src="{{URL::asset('assets/js/pages/dashboard.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- Page specific script -->
<script src="{{asset('assets/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>

<script>
    $(function() {
        $("#datepicker").datepicker({
            changeMonth: false,
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'yy', // تاريخ تنسيق السنة فقط
            onClose: function(dateText, inst) {
                $(this).datepicker('setDate', new Date(inst.selectedYear, 0, 1));
            }
        });
    });
</script>
    @yield('scripts')
    @stack('js')
