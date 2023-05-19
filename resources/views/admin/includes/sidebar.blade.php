<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon">

        </div>
        <h5 style="font-weight: bold">Admin Panel</h5>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">



    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#moduleone">
            <i class="fas fa-fw fa-bars fa-2x"></i>
            <span style="font-weight: bolder;font-size: 18px">Registration</span>
        </a>
        <div id="moduleone" class="collapse">
            <div class="bg-white collapse-inner">
                <a class="collapse-item " href="{{ route('new.registration') }}">New Registration</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#moduletwo">
            <i class="fas fa-fw fa-bars fa-2x"></i>
            <span style="font-weight: bolder;font-size: 18px">Admit Card</span>
        </a>
        <div id="moduletwo" class="collapse">
            <div class="bg-white collapse-inner">
                <a class="collapse-item " href="{{ route('admit.generate') }}">Admit Generate</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#modulethree">
            <i class="fas fa-fw fa-bars fa-2x"></i>
            <span style="font-weight: bolder;font-size: 18px">Exam Schedule</span>
        </a>
        <div id="modulethree" class="collapse">
            <div class="bg-white collapse-inner">
                <a class="collapse-item" href="{{ route('exam.schedule') }}">Eve Shift</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#module3">
            <i class="fas fa-fw fa-bars fa-2x"></i>
            <span style="font-weight: bolder;font-size: 18px">Setup</span>
        </a>
        <div id="module3" class="collapse">
            <div class="bg-white collapse-inner">
                <a class="collapse-item " href="{{ route('manage.batch') }}">Manage Batch</a>
                <a class="collapse-item " href="{{ route('manage.section') }}">Manage Section</a>
                <a class="collapse-item " href="{{ route('manage.semester') }}">Manage Semester</a>
                <a class="collapse-item " href="{{ route('manage.course') }}">Manage Course</a>
                <a class="collapse-item " href="{{ route('manage.department') }}">Manage Department</a>
            </div>
        </div>
    </li>


    <!-- Sidebar Toggler (Sidebar) -->
{{--    <div class="text-center d-none d-md-inline">--}}
{{--        <button class="rounded-circle border-0" id="sidebarToggle"></button>--}}
{{--    </div>--}}

</ul>
<!-- End of Sidebar -->
