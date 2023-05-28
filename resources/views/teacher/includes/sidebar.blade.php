<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('teacher.dashboard') }}">
        <div class="sidebar-brand-icon">

        </div>
        <h5 style="font-weight: bold">Teacher Panel</h5>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">



    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#moduleone">
            <i class="fas fa-fw fa-bars fa-2x"></i>
            <span style="font-weight: bolder;font-size: 18px">Admit</span>
        </a>
        <div id="moduleone" class="collapse">
            <div class="bg-white collapse-inner">
                <a class="collapse-item " href="{{ route('admit.verify') }}">Verify Admit</a>
            </div>
        </div>
    </li>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
