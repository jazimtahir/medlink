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
                        <li class="breadcrumb-item"><a href="#">Schedule New Appointment</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Available Time slots</div>
                    <div class="card-title text-muted">Please select a Timeslot to schedule an appointment:</div>
                    <br>
                    <div>
                        You are scheduling an appointment with <b>{{ $doctor->salutation . ' ' . $doctor->user->first_name . ' ' . $doctor->user->last_name }}</b>
                    </div>
                    <hr>
                    @foreach($availableSlots as $slot)
                        <div class="row">
                            <div class="col-2">
                                <h2>
                                    {{ $slot['day'] }}
                                </h2>
                            </div>
                            <div class="col-10">
                                <div class="row">
                                    @foreach($slot['timeslots'] as $timeslot)
                                        <form action="{{ route('patient.appointment.schedule.confirm', [$doctor->id]) }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <input hidden type="text" name="day" value="{{ $slot['day'] }}">
                                            <input hidden type="text" name="timeslot" value="{{ $timeslot }}">
                                            <button type="submit" class="m-1 text-white btn btn-lg btn-info">{{ $timeslot }}</button>
                                        </form>
                                        <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
