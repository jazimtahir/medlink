<aside class="main-sidebar">
    <!-- sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="image pull-left">
                <img src="{{ auth()->user()->getImg() }}" class="img-circle" alt="User Image">
            </div>
            <div class="info">
                <h4>Welcome</h4>
                <p>{{ auth()->user()->username }}</p>
            </div>
        </div>

        <!-- sidebar menu -->
        <ul class="sidebar-menu">
            <li class="@if(request()->routeIs('dashboard') || request()->routeIs('*.dashboard')) active @else treeview @endif">
                <a href="{{ route('dashboard') }}"><i class="fa fa-hospital-o"></i><span>Dashboard</span>
                </a>
            </li>
            @role('admin')
            <li class="@if(request()->routeIs('admin.doctor.*')) active @else treeview @endif">
                <a href="#">
                    <i class="fa fa-user-md"></i><span>Doctor</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.doctor.index') }}">Doctors List</a></li>
                    <li><a href="{{ route('admin.doctor.create') }}">Add Doctor</a></li>

                </ul>
            </li>
            <li class="@if(request()->routeIs('admin.patient.*')) active @else treeview @endif">
                <a href="#">
                    <i class="fa fa-user"></i><span>Patient</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.patient.index') }}">Patients List</a></li>
                    <li><a href="{{ route('admin.patient.create') }}">Add Patient</a></li>
                </ul>
            </li>
            @endrole
            @role('doctor')
            <li class="@if(request()->routeIs('doctor_schedule.show')) active @else treeview @endif">
                <a href="{{ route('doctor_schedule.show', auth()->user()->doctor->id) }}">
                    <i class="fa fa-list-alt"></i><span>Doctor Schedule</span>
                </a>
            </li>
            @endrole
        </ul>
    </div> <!-- /.sidebar -->
</aside>
