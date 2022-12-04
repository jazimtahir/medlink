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
                    <br>
                    <label for="reason">Please specify reason for appointment: </label>
                    <input id="reason" class="form-control" type="text" name="reason" required>
                    <hr>
                    @foreach($availableSlots as $key => $slot)
                        <div class="row">
                            <div class="col-2">
                                <h2>
                                    {{ $slot['day'] }}
                                </h2>
                            </div>
                            <div class="col-10">
                                <div class="row">
                                    @foreach($slot['timeslots'] as $k => $timeslot)
                                        <form id="form{{ $key+1 . $k+1 }}" action="{{ route('patient.appointment.schedule.confirm', [$doctor->id]) }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <input hidden type="text" name="day" value="{{ $slot['day'] }}">
                                            <input hidden type="text" name="timeslot" value="{{ $timeslot['time'] }}">
                                            <span id="formReason{{ $key+1 . $k+1 }}"></span>
                                            <button onclick="submitForm({{ $key+1 . $k+1 }})" class="m-1 text-white btn btn-lg @if($timeslot['status'] == 1) btn-info @else btn-danger @endif" @if($timeslot['status'] == 0) disabled @endif>{{ $timeslot['time'] }}</button>
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
<script>
    function submitForm(id) {
        event.preventDefault();
        let form = $('#form'+id);
        let reason = $('#reason').val();
        if(!reason) {
            alert('Reason is required!');
            return;
        }
        $('#formReason'+id).html('<input hidden type="text" name="reason" value="'+ reason +'">');
        form = $('#form'+id);
        form.submit();
    }
</script>
