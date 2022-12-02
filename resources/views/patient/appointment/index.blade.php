@extends('layouts.app')

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">Appointments</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Appointments</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section id="doctor-index">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Appointments</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        </div>
                        @if($errors->any())
                            {!! implode('', $errors->all('
                                <div class=" col-6 offset-3 alert alert-danger alert-dismissible mb-2" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <strong>Error!</strong> :message
                                </div>
                            ')) !!}
                        @endif
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered dom-jQuery-events">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Doctor Username</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Status</th>
                                            <th>Paid</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($appointments as $appointment)
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
                                                <td>{{ ($appointment->paid == 1) ? 'Paid' : 'Unpaid' }}</td>
                                                <td class="btn-toolbar">
                                                    <div class="btn-group p-0">
                                                        <a class="btn btn-sm btn-outline-primary mr-1" href="#"
                                                           data-toggle="modal"
                                                           data-target='#appointment{{ $appointment->id }}'>
                                                            <i class="la la-eye"></i>
                                                        </a>
{{--                                                        <a class="btn btn-sm btn-outline-warning mr-1" href=""--}}
{{--                                                           data-toggle="modal"--}}
{{--                                                           data-target='#doctorEdit{{ $appointment->id }}'--}}
{{--                                                        >--}}
{{--                                                            <i class="la la-edit"></i>--}}
{{--                                                        </a>--}}
                                                        @if($appointment->status == 'BOOKED')
                                                            <a class="btn btn-sm btn-outline-danger" href="{{ route('patient.appointment.cancel', [$appointment->id]) }}" onclick="return confirm('Are you sure?')">
                                                                <i class="la la-close"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                    {{--                                                edit modal--}}
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
                                                                    </div>
                                                                    <div class="row mb-1">
                                                                        <div class="col">
                                                                            <b>Start Time:</b> {{ $appointment->start_time }}
                                                                        </div>
                                                                        <div class="col">
                                                                            <b>End Time:</b> {{ $appointment->end_time }}
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
        </section>
    </div>
@endsection
