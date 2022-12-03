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
            <li class="nav-item @if(request()->routeIs('admin.specialization.*')) active @endif">
                <a class="nav-link" href="{{ route('admin.specialization.index') }}">
                    <i class="ft ft-clipboard"></i><span>Specializations</span>
                </a>
            </li>
            @endrole
            @role('doctor')
            <li class="nav-item @if(request()->routeIs('doctor.schedule')) active @endif">
                <a class="nav-link" href="{{ route('doctor.schedule') }}">
                    <i class="la la-hourglass"></i><span>My Schedule</span>
                </a>
            </li>
            <li class="nav-item @if(request()->routeIs('doctor.appointment')) active @endif">
                <a class="nav-link" href="{{ route('doctor.appointment') }}">
                    <i class="la la-group"></i><span>My Appointments</span>
                </a>
            </li>
            @endrole
            @role('patient')
            <li class="nav-item @if(request()->routeIs('patient.appointment.doctors') || request()->routeIs('patient.appointment.schedule')) active @endif">
                <a class="nav-link" href="{{ route('patient.appointment.doctors') }}">
                    <i class="la la-plus"></i><span>Schedule New Appointment</span>
                </a>
            </li>
            <li class="nav-item @if(request()->routeIs('patient.appointment.index')) active @endif">
                <a class="nav-link" href="{{ route('patient.appointment') }}">
                    <i class="la la-group"></i><span>My Appointments</span>
                </a>
            </li>
            @endrole
        </ul>
    </div>
</div>
