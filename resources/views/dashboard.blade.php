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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Active Doctors</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered dom-jQuery-events">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Salutation</th>
                                        <th>Username</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Specialization</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($doctors as $doctor)
                                        <tr>
                                            <td>
                                                <img class="avatar avatar-lg" src="{{ $doctor->getImg() }}">
                                            </td>
                                            <td>{{ $doctor->doctor->salutation }}</td>
                                            <td>{{ $doctor->username }}</td>
                                            <td>{{ $doctor->first_name }}</td>
                                            <td>{{ $doctor->last_name }}</td>
                                            <td>{{ $doctor->email }}</td>
                                            <td>{{ $doctor->phone }}</td>
                                            <td>{{ $doctor->doctor->specialization->name ?? '' }}</td>
                                            <td class="btn-toolbar">
                                                <div class="btn-group p-0">
                                                    <a class="btn btn-sm btn-outline-primary mr-1" href="{{ route('admin.doctor.show', [$doctor->id]) }}">
                                                        <i class="la la-eye"></i>
                                                    </a>
                                                    <a class="btn btn-sm btn-outline-warning mr-1" href=""
                                                       data-toggle="modal"
                                                       data-target='#doctorEdit{{ $doctor->id }}'
                                                    >
                                                        <i class="la la-edit"></i>
                                                    </a>
                                                    <a class="btn btn-sm btn-outline-danger" href="{{ route('admin.doctor.destroy', [$doctor->id]) }}" onclick="return confirm('Are you sure?')">
                                                        <i class="la la-trash"></i>
                                                    </a>
                                                </div>
                                                {{--                                                edit modal--}}
                                                <div class="modal fade text-left" id="doctorEdit{{ $doctor->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 class="modal-title">Edit Doctor</h3>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form method="POST" action="{{ route('admin.doctor.update', $doctor->id) }}" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">
                                                                    <label>Username: </label>
                                                                    <div class="form-group position-relative has-icon-left">
                                                                        <input type="text" name="username" value="{{ $doctor->username }}" class="form-control" disabled>
                                                                        <div class="form-control-position">
                                                                            <i class="ft ft-user-check"></i>
                                                                        </div>
                                                                    </div>

                                                                    <label>Email: </label>
                                                                    <div class="form-group position-relative has-icon-left">
                                                                        <input type="email" name="email" value="{{ $doctor->email }}" class="form-control" disabled>
                                                                        <div class="form-control-position">
                                                                            <i class="la la-envelope"></i>
                                                                        </div>
                                                                    </div>

                                                                    <label>Phone: </label>
                                                                    <div class="form-group position-relative has-icon-left">
                                                                        <input type="text" name="phone" value="{{ $doctor->phone }}" class="form-control" disabled>
                                                                        <div class="form-control-position">
                                                                            <i class="la la-phone"></i>
                                                                        </div>
                                                                    </div>

                                                                    <label>Salutation: </label>
                                                                    <div class="form-group position-relative has-icon-left">
                                                                        <input type="text" name="salutation" value="{{ $doctor->doctor->salutation }}" class="form-control">
                                                                        <div class="form-control-position">
                                                                            <i class="ft ft-info"></i>
                                                                        </div>
                                                                    </div>

                                                                    <label>First Name: </label>
                                                                    <div class="form-group position-relative has-icon-left">
                                                                        <input type="text" name="first_name" value="{{ $doctor->first_name }}" class="form-control">
                                                                        <div class="form-control-position">
                                                                            <i class="la la-user"></i>
                                                                        </div>
                                                                    </div>

                                                                    <label>Last Name: </label>
                                                                    <div class="form-group position-relative has-icon-left">
                                                                        <input type="text" name="last_name" value="{{ $doctor->last_name }}" class="form-control">
                                                                        <div class="form-control-position">
                                                                            <i class="la la-user-plus"></i>
                                                                        </div>
                                                                    </div>

                                                                    <label>Specialization: </label>
                                                                    <div class="form-group position-relative">
                                                                        <select class=" custom-select form-control" name="specialization_id">
                                                                            <option></option>
                                                                            @foreach($specialization as $s)
                                                                                <option @if($doctor->doctor->specialization && $doctor->doctor->specialization->name == $s->name) selected @endif class="" value="{{ $s->id }}">{{ $s->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <label>Password: </label>
                                                                    <div class="form-group position-relative has-icon-left">
                                                                        <input type="password" name="password" placeholder="Password" class="form-control">
                                                                        <div class="form-control-position">
                                                                            <i class="la la-lock"></i>
                                                                        </div>
                                                                    </div>

                                                                    <label>Bio: </label>
                                                                    <div class="form-group position-relative">
                                                                        <textarea class="form-control" rows="5" name="bio" placeholder="Enter text ...">{{ $doctor->bio }}</textarea>
                                                                    </div>

                                                                    <label>Fee: </label>
                                                                    <div class="form-group position-relative has-icon-left">
                                                                        <input type="number" name="fee" placeholder="Fee" class="form-control" value="{{ $doctor->doctor->fee }}">
                                                                        <div class="form-control-position">
                                                                            <i class="la la-money"></i>
                                                                        </div>
                                                                    </div>

                                                                    <label>Practicing From: </label>
                                                                    <div class="form-group position-relative has-icon-left">
                                                                        <input type="text" name="practicing_from" class="date-picker form-control" value="{{ $doctor->doctor->practicing_from }}">
                                                                        <div class="form-control-position">
                                                                            <i class="ft ft-activity"></i>
                                                                        </div>
                                                                    </div>

                                                                    <label>Professional Statement: </label>
                                                                    <div class="form-group position-relative">
                                                                        <textarea class="form-control" rows="5" name="professional_statement" placeholder="Enter text ...">{{ $doctor->doctor->professional_statement }}</textarea>
                                                                    </div>

                                                                    <label>Address: </label>
                                                                    <div class="form-group position-relative">
                                                                        <textarea class="form-control" rows="3" name="address" placeholder="Enter address ...">{{ $doctor->address }}</textarea>
                                                                    </div>

                                                                    <label>Date of Birth: </label>
                                                                    <div class="form-group position-relative">
                                                                        <input type="text" class="date-picker form-control" name="dob" value="{{ $doctor->dob }}">
                                                                    </div>

                                                                    <label>Profile Picture: </label>
                                                                    <div class="form-group position-relative">
                                                                        <input type="file" class="form-control" name="image">
                                                                    </div>

                                                                    <label>Activation Status: </label>
                                                                    <div class="form-group position-relative">
                                                                        <div class="input-group">
                                                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                                                <input type="radio" name="is_active" value="1" {{ ($doctor->is_active=="1")? "checked" : "" }} class="custom-control-input" id="active1{{ $doctor->id }}">
                                                                                <label class="custom-control-label" for="active1{{ $doctor->id }}">Active</label>
                                                                            </div>
                                                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                                                <input type="radio" name="is_active" value="0" {{ ($doctor->is_active=="0")? "checked" : "" }} class="custom-control-input" id="active0{{ $doctor->id }}">
                                                                                <label class="custom-control-label" for="active0{{ $doctor->id }}">InActive</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <label>Verification Status: </label>
                                                                    <div class="form-group position-relative">
                                                                        <div class="input-group">
                                                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                                                <input type="radio" name="is_verified" value="1" {{ ($doctor->is_verified=="1")? "checked" : "" }} class="custom-control-input" id="verify1{{ $doctor->id }}">
                                                                                <label class="custom-control-label" for="verify1{{ $doctor->id }}">Verified</label>
                                                                            </div>
                                                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                                                <input type="radio" name="is_verified" value="0" {{ ($doctor->is_verified=="0")? "checked" : "" }} class="custom-control-input" id="verify0{{ $doctor->id }}">
                                                                                <label class="custom-control-label" for="verify0{{ $doctor->id }}">Unverified</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="Close">
                                                                    <input type="submit" class="btn btn-outline-primary" value="Save">
                                                                </div>
                                                            </form>
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
