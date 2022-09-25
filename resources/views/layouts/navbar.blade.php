<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow" role="navigation" data-menu="menu-wrapper">
    <div class="navbar-container main-menu-content" data-menu="menu-container">
        <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="dropdown nav-item @if(request()->routeIs('dashboard') || request()->routeIs('admin.dashboard') || request()->routeIs('doctor.dashboard') || request()->routeIs('patient.dashboard')) active @endif">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="la la-home"></i>
                    <span data-i18n="Dashboard">Dashboard</span>
                </a>
            </li>
            @role('admin')
            <li class="dropdown nav-item @if(request()->routeIs('admin.doctor.*')) active @endif" data-menu="dropdown">
                <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">
                    <i class="la la-stethoscope"></i><span>Doctors</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="dropdown @if(request()->routeIs('admin.doctor.index')) active @endif">
                        <a class="dropdown-item" href="{{ route('admin.doctor.index') }}" data-toggle="dropdown">
                            <i class="la la-check-square"></i><span >View Doctors</span></a>
                    </li>
                    <li class="dropdown @if(request()->routeIs('admin.doctor.create')) active @endif">
                        <a class="dropdown-item" href="{{ route('admin.doctor.create') }}" data-toggle="dropdown">
                            <i class="la la-plus"></i><span>Add Doctor</span></a>
                    </li>
                </ul>
            </li>
            <li class="dropdown nav-item @if(request()->routeIs('admin.patient.*')) active @endif" data-menu="dropdown">
                <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">
                    <i class="la la-users"></i><span>Patients</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="dropdown @if(request()->routeIs('admin.patient.index')) active @endif">
                        <a class="dropdown-item" href="{{ route('admin.patient.index') }}">
                            <i class="la la-check-square"></i><span>View Patients</span></a>
                    </li>
                    <li class="dropdown @if(request()->routeIs('admin.patient.create')) active @endif">
                        <a class="dropdown-item" href="{{ route('admin.patient.create') }}">
                            <i class="la la-plus"></i><span>Add Patient</span></a>
                    </li>
                </ul>
            </li>
            @endrole
        </ul>
    </div>
</div>
