@extends('layouts.app')

@section('content')
    <div class="content-body">
        @role('admin')
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="info">{{ $activePatients }}</h3>
                                    <h6>Active Patients</h6>
                                </div>
                                <div>
                                    <i class="ft ft-user-check info font-large-2 float-right"></i>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="warning">{{ $activeDoctors }}</h3>
                                    <h6>Active Doctors</h6>
                                </div>
                                <div>
                                    <i class="la la-stethoscope font-large-2 warning float-right"></i>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="success">{{ $totalPatients }}</h3>
                                    <h6>Total Patients</h6>
                                </div>
                                <div>
                                    <i class="icon-user-follow success font-large-2 float-right"></i>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="danger">{{ $totalDoctors }}</h3>
                                    <h6>Total Doctors</h6>
                                </div>
                                <div>
                                    <i class="icon-heart danger font-large-2 float-right"></i>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endrole
        @role('doctor')
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="info">{{ auth()->user()->doctor->getTodayAppointments()->count() }}</h3>
                                    <h6>Today Appointments</h6>
                                </div>
                                <div>
                                    <i class="icon-basket-loaded info font-large-2 float-right"></i>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="warning">{{ auth()->user()->doctor->activeAppointments()->count() }}</h3>
                                    <h6>Active Appointments</h6>
                                </div>
                                <div>
                                    <i class="la la-stethoscope font-large-2 warning float-right"></i>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="success">{{ auth()->user()->doctor->canceledAppointments()->count() }}</h3>
                                    <h6>Canceled Appointments</h6>
                                </div>
                                <div>
                                    <i class="icon-user-follow success font-large-2 float-right"></i>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="danger">{{ auth()->user()->doctor->appointments()->count() }}</h3>
                                    <h6>Total Appointments</h6>
                                </div>
                                <div>
                                    <i class="icon-heart danger font-large-2 float-right"></i>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Today Appointments</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    </div>

                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Patient Username</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Status</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(auth()->user()->doctor->getTodayAppointments() as $appointment)
                                        <tr>
                                            <td>{{ $appointment->id }}</td>
                                            <td>{{ $appointment->patient->user->username }}</td>
                                            <td>{{ $appointment->start12() }}</td>
                                            <td>{{ $appointment->end12() }}</td>
                                            <td>
                                                @if($appointment->status == 'BOOKED')
                                                    <div class="badge badge-danger">PENDING</div>
                                                @elseif($appointment->status === 'DONE')
                                                    <div class="badge badge-success">DONE</div>
                                                @elseif($appointment->status === 'CANCELED')
                                                    <div class="badge badge-info">CANCELED</div>
                                                @endif
                                            </td>
                                            <td class="btn-toolbar">
                                                <div class="btn-group p-0">
                                                    <a class="btn btn-sm btn-outline-primary mr-1" href="#"
                                                       data-toggle="modal"
                                                       data-target='#appointment{{ $appointment->id }}'>
                                                        <i class="la la-eye"></i>
                                                    </a>
                                                </div>
                                                {{--                                                view modal--}}
                                                <div class="modal fade" id="appointment{{ $appointment->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 class="modal-title">View Appointment</h3>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row mb-1">
                                                                    <div class="col">
                                                                        <b>Patient Username:</b> {{ $appointment->patient->user->username }}
                                                                    </div>
                                                                    <div class="col">
                                                                        <b>Day:</b> {{ $appointment->dayName() }}
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-1">
                                                                    <div class="col">
                                                                        <b>Start Time:</b> {{ $appointment->start12() }}
                                                                    </div>
                                                                    <div class="col">
                                                                        <b>End Time:</b> {{ $appointment->end12() }}
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-1">
                                                                    <div class="col">
                                                                        <b>Reason for Appointment:</b> {{ $appointment->reason }}
                                                                    </div>
                                                                </div>
                                                                @if($appointment->doctor_comment)
                                                                    <div class="row mb-1">
                                                                        <div class="col">
                                                                            <b>Doctor Remarks:</b> {{ $appointment->doctor_comment }}
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                <div class="row mb-1">
                                                                    <div class="col">
                                                                        @if($appointment->paid)
                                                                            <div class="badge badge-success">PAID</div>
                                                                        @else
                                                                            <div class="badge badge-danger">UNPAID</div>
                                                                        @endif
                                                                        @if($appointment->status == 'BOOKED')
                                                                            <div class="badge badge-danger">PENDING</div>
                                                                        @elseif($appointment->status == 'DONE')
                                                                            <div class="badge badge-success">{{ $appointment->status }}</div>
                                                                        @elseif($appointment->status == 'CANCELED')
                                                                            <div class="badge badge-info">{{ $appointment->status }}</div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                @if($appointment->canceled_by)
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            @if($appointment->canceled_by == 'doctor')
                                                                                <div class="badge badge-danger">Canceled by Doctor</div>
                                                                            @elseif($appointment->canceled_by == 'patient')
                                                                                <div class="badge badge-danger">Canceled by Patient</div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="Close">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Newly Created Appointments</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    </div>

                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Patient Username</th>
                                        <th>Day</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Status</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(auth()->user()->doctor->todayCreatedAppointments() as $appointment)
                                        <tr>
                                            <td>{{ $appointment->id }}</td>
                                            <td>{{ $appointment->patient->user->username }}</td>
                                            <td>{{ $appointment->dayName() }}</td>
                                            <td>{{ $appointment->start12() }}</td>
                                            <td>{{ $appointment->end12() }}</td>
                                            <td>
                                                @if($appointment->status == 'BOOKED')
                                                    <div class="badge badge-danger">PENDING</div>
                                                @elseif($appointment->status === 'DONE')
                                                    <div class="badge badge-success">DONE</div>
                                                @elseif($appointment->status === 'CANCELED')
                                                    <div class="badge badge-info">CANCELED</div>
                                                @endif
                                            </td>
                                            <td class="btn-toolbar">
                                                <div class="btn-group p-0">
                                                    <a class="btn btn-sm btn-outline-primary mr-1" href="#"
                                                       data-toggle="modal"
                                                       data-target='#appointment{{ $appointment->id }}'>
                                                        <i class="la la-eye"></i>
                                                    </a>
                                                </div>
                                                {{--                                                view modal--}}
                                                <div class="modal fade" id="appointment{{ $appointment->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 class="modal-title">View Appointment</h3>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row mb-1">
                                                                    <div class="col">
                                                                        <b>Patient Username:</b> {{ $appointment->patient->user->username }}
                                                                    </div>
                                                                    <div class="col">
                                                                        <b>Day:</b> {{ $appointment->dayName() }}
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-1">
                                                                    <div class="col">
                                                                        <b>Start Time:</b> {{ $appointment->start12() }}
                                                                    </div>
                                                                    <div class="col">
                                                                        <b>End Time:</b> {{ $appointment->end12() }}
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-1">
                                                                    <div class="col">
                                                                        <b>Reason for Appointment:</b> {{ $appointment->reason }}
                                                                    </div>
                                                                </div>
                                                                @if($appointment->doctor_comment)
                                                                    <div class="row mb-1">
                                                                        <div class="col">
                                                                            <b>Doctor Remarks:</b> {{ $appointment->doctor_comment }}
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                <div class="row mb-1">
                                                                    <div class="col">
                                                                        @if($appointment->paid)
                                                                            <div class="badge badge-success">PAID</div>
                                                                        @else
                                                                            <div class="badge badge-danger">UNPAID</div>
                                                                        @endif
                                                                        @if($appointment->status == 'BOOKED')
                                                                            <div class="badge badge-danger">PENDING</div>
                                                                        @elseif($appointment->status == 'DONE')
                                                                            <div class="badge badge-success">{{ $appointment->status }}</div>
                                                                        @elseif($appointment->status == 'CANCELED')
                                                                            <div class="badge badge-info">{{ $appointment->status }}</div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                @if($appointment->canceled_by)
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            @if($appointment->canceled_by == 'doctor')
                                                                                <div class="badge badge-danger">Canceled by Doctor</div>
                                                                            @elseif($appointment->canceled_by == 'patient')
                                                                                <div class="badge badge-danger">Canceled by Patient</div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="Close">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endrole
        @role('patient')
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="info">{{ auth()->user()->patient->getTodayAppointments()->count() }}</h3>
                                    <h6>Today Appointments</h6>
                                </div>
                                <div>
                                    <i class="icon-basket-loaded info font-large-2 float-right"></i>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="warning">{{ auth()->user()->patient->activeAppointments()->count() }}</h3>
                                    <h6>Active Appointments</h6>
                                </div>
                                <div>
                                    <i class="la la-stethoscope font-large-2 warning float-right"></i>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="success">{{ auth()->user()->patient->canceledAppointments()->count() }}</h3>
                                    <h6>Canceled Appointments</h6>
                                </div>
                                <div>
                                    <i class="icon-user-follow success font-large-2 float-right"></i>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="danger">{{ auth()->user()->patient->appointments()->count() }}</h3>
                                    <h6>Total Appointments</h6>
                                </div>
                                <div>
                                    <i class="icon-heart danger font-large-2 float-right"></i>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Today Appointments</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    </div>
                    @if(auth()->user()->patient->getTodayAppointments()->count())
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Doctor Username</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Status</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(auth()->user()->patient->getTodayAppointments() as $appointment)
                                        <tr>
                                            <td>{{ $appointment->id }}</td>
                                            <td>{{ $appointment->doctor->user->username }}</td>
                                            <td>{{ $appointment->start12() }}</td>
                                            <td>{{ $appointment->end12() }}</td>
                                            <td>
                                                @if($appointment->status == 'BOOKED')
                                                    <div class="badge badge-danger">PENDING</div>
                                                @elseif($appointment->status === 'DONE')
                                                    <div class="badge badge-success">DONE</div>
                                                @elseif($appointment->status === 'CANCELED')
                                                    <div class="badge badge-info">CANCELED</div>
                                                @endif
                                            </td>
                                            <td class="btn-toolbar">
                                                <div class="btn-group p-0">
                                                    <a class="btn btn-sm btn-outline-primary mr-1" href="#"
                                                       data-toggle="modal"
                                                       data-target='#appointment{{ $appointment->id }}'>
                                                        <i class="la la-eye"></i>
                                                    </a>
                                                </div>
                                                {{--                                                view modal--}}
                                                <div class="modal fade" id="appointment{{ $appointment->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 class="modal-title">View Appointment</h3>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row mb-1">
                                                                    <div class="col">
                                                                        <b>Doctor Username:</b> {{ $appointment->doctor->user->username }}
                                                                    </div>
                                                                    <div class="col">
                                                                        <b>Day:</b> {{ $appointment->dayName() }}
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-1">
                                                                    <div class="col">
                                                                        <b>Start Time:</b> {{ $appointment->start12() }}
                                                                    </div>
                                                                    <div class="col">
                                                                        <b>End Time:</b> {{ $appointment->end12() }}
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-1">
                                                                    <div class="col">
                                                                        <b>Reason for Appointment:</b> {{ $appointment->reason }}
                                                                    </div>
                                                                </div>
                                                                @if($appointment->doctor_comment)
                                                                    <div class="row mb-1">
                                                                        <div class="col">
                                                                            <b>Doctor Remarks:</b> {{ $appointment->doctor_comment }}
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                <div class="row mb-1">
                                                                    <div class="col">
                                                                        @if($appointment->paid)
                                                                            <div class="badge badge-success">PAID</div>
                                                                        @else
                                                                            <div class="badge badge-danger">UNPAID</div>
                                                                        @endif
                                                                        @if($appointment->status == 'BOOKED')
                                                                            <div class="badge badge-danger">PENDING</div>
                                                                        @elseif($appointment->status == 'DONE')
                                                                            <div class="badge badge-success">{{ $appointment->status }}</div>
                                                                        @elseif($appointment->status == 'CANCELED')
                                                                            <div class="badge badge-info">{{ $appointment->status }}</div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                @if($appointment->canceled_by)
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            @if($appointment->canceled_by == 'doctor')
                                                                                <div class="badge badge-danger">Canceled by Doctor</div>
                                                                            @elseif($appointment->canceled_by == 'patient')
                                                                                <div class="badge badge-danger">Canceled by Patient</div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="Close">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @else
                        <div class="card-body">
                            No appointments today!
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Newly Created Appointments</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    </div>

                    @if(auth()->user()->patient->todayCreatedAppointments()->count())
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Doctor Username</th>
                                            <th>Day</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Status</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach(auth()->user()->patient->todayCreatedAppointments() as $appointment)
                                            <tr>
                                                <td>{{ $appointment->id }}</td>
                                                <td>{{ $appointment->doctor->user->username }}</td>
                                                <td>{{ $appointment->dayName() }}</td>
                                                <td>{{ $appointment->start12() }}</td>
                                                <td>{{ $appointment->end12() }}</td>
                                                <td>
                                                    @if($appointment->status == 'BOOKED')
                                                        <div class="badge badge-danger">PENDING</div>
                                                    @elseif($appointment->status === 'DONE')
                                                        <div class="badge badge-success">DONE</div>
                                                    @elseif($appointment->status === 'CANCELED')
                                                        <div class="badge badge-info">CANCELED</div>
                                                    @endif
                                                </td>
                                                <td class="btn-toolbar">
                                                    <div class="btn-group p-0">
                                                        <a class="btn btn-sm btn-outline-primary mr-1" href="#"
                                                           data-toggle="modal"
                                                           data-target='#appointment{{ $appointment->id }}'>
                                                            <i class="la la-eye"></i>
                                                        </a>
                                                    </div>
                                                    {{--                                                view modal--}}
                                                    <div class="modal fade" id="appointment{{ $appointment->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h3 class="modal-title">View Appointment</h3>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row mb-1">
                                                                        <div class="col">
                                                                            <b>Doctor Username:</b> {{ $appointment->doctor->user->username }}
                                                                        </div>
                                                                        <div class="col">
                                                                            <b>Day:</b> {{ $appointment->dayName() }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-1">
                                                                        <div class="col">
                                                                            <b>Start Time:</b> {{ $appointment->start12() }}
                                                                        </div>
                                                                        <div class="col">
                                                                            <b>End Time:</b> {{ $appointment->end12() }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-1">
                                                                        <div class="col">
                                                                            <b>Reason for Appointment:</b> {{ $appointment->reason }}
                                                                        </div>
                                                                    </div>
                                                                    @if($appointment->doctor_comment)
                                                                        <div class="row mb-1">
                                                                            <div class="col">
                                                                                <b>Doctor Remarks:</b> {{ $appointment->doctor_comment }}
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    <div class="row mb-1">
                                                                        <div class="col">
                                                                            @if($appointment->paid)
                                                                                <div class="badge badge-success">PAID</div>
                                                                            @else
                                                                                <div class="badge badge-danger">UNPAID</div>
                                                                            @endif
                                                                            @if($appointment->status == 'BOOKED')
                                                                                <div class="badge badge-danger">PENDING</div>
                                                                            @elseif($appointment->status == 'DONE')
                                                                                <div class="badge badge-success">{{ $appointment->status }}</div>
                                                                            @elseif($appointment->status == 'CANCELED')
                                                                                <div class="badge badge-info">{{ $appointment->status }}</div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    @if($appointment->canceled_by)
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                @if($appointment->canceled_by == 'doctor')
                                                                                    <div class="badge badge-danger">Canceled by Doctor</div>
                                                                                @elseif($appointment->canceled_by == 'patient')
                                                                                    <div class="badge badge-danger">Canceled by Patient</div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="Close">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="card-body">
                            No Newly created appointments!
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @endrole
    </div>
@endsection
