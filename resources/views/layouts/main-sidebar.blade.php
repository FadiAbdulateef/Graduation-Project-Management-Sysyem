<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4 text-sm">
    <!-- Brand Logo -->
    <a href="https://amu.edu.ye" class="brand-link">
        <img src="{{URL::asset('assets/img/Amran.jpg')}}" alt="Amran University"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light text-sm font-bold">كلية الهندسة وتقنية المعلومات</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if((Auth::user()->graduate))
                    <img src="{{URL::asset('assets/img/graduat_defualt.jpg')}}" class="img-circle elevation-2" alt="graduate Image">
                @elseif((Auth::user()->supervisor))
                    <img src="{{URL::asset('assets/img/admin.jpg')}}" class="img-circle elevation-2" alt="supervisor Image">
                @else
                    <img src="{{URL::asset('assets/img/admin.jpg')}}" class="img-circle elevation-2" alt="admin Image">
                @endif

            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->first_name}}  {{ Auth::user()->last_name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

    @include('layouts.menu_sidebar')
    </div>
    <!-- /.sidebar -->
</aside>

