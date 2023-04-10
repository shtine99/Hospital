<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('homepage') }}">
        <div class="sidebar-brand-icon ">
            <i class="fas fa-hospital"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Hospital</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        Interface
    </div> --}}

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDep"
            aria-expanded="true" aria-controls="collapseDep">
            <i class="fas fa-fw fa-building"></i>
            <span>Departments</span>
        </a>
        <div id="collapseDep" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Add New Department</h6> --}}
                <a class="collapse-item" href="{{ route('admin.departments.index') }}">All Departments</a>
                <a class="collapse-item" href="{{ route('admin.departments.create') }}">Add New <i class="fas fa-fw fa-plus "></i></a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDoc"
            aria-expanded="true" aria-controls="collapseDoc">
            <i class="fas fa-fw fa-users"></i>
            <span>Doctors</span>
        </a>
        <div id="collapseDoc" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Add New Department</h6> --}}
                <a class="collapse-item" href="{{ route('admin.doctors.index') }}">All Doctors</a>
                <a class="collapse-item" href="{{ route('admin.doctors.create') }}">Add New <i class="fas fa-fw fa-plus "></i></a>
            </div>
        </div>
    </li>




    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
