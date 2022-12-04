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
        <section id="social-cards">

            <div class="row mt-2">
                @foreach($doctors as $doctor)
                    @php
                    if(!$doctor->doctor->schedule()->exists()) {
                        continue;
                    }
                    @endphp
                    <div class="col-xl-4 col-md-6 col-12">
                        <div class="card profile-card-with-cover">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col-6 offset-3 p-5">
                                        <img src="{{ $doctor->getImg() }}" class="col rounded-circle img-border" alt="Card image">
                                    </div>
                                </div>
                                <div class="profile-card-with-cover-content text-center">
                                    <div class="profile-details">
                                        <h4 class="card-title">
                                            @if($doctor->is_verified)
                                                <div class="badge badge-success">Verified</div>
                                            @else
                                                <div class="badge badge-danger">Unverified</div>
                                            @endif
                                        </h4>
                                        <h4 class="card-title"><span>@</span>{{ $doctor->username }}
                                            @switch($doctor->gender)
                                                @case('M')
                                                    <small>(Male)</small>
                                                    @break
                                                @case('F')
                                                    <small>(Female)</small>
                                                    @break
                                                @case('T')
                                                    <small>(Other)</small>
                                                    @break
                                                @default
                                                    <small>(No Gender provided)</small>
                                            @endswitch
                                        </h4>
                                        <h4 class="card-title">{{ (($doctor->doctor->salutation != null) ? ($doctor->doctor->salutation . '. ') : '') . $doctor->first_name . ' ' . $doctor->last_name }}</h4>
                                        @if($doctor->doctor->specialization)
                                            <h5 class="card-title text-muted">Specialized in {{ $doctor->doctor->specialization->name }}</h5>
                                        @endif
                                        <h4 class="card-title">Fee: <i>PKR </i>{{ $doctor->doctor->fee ?? 'N/A' }}</h4>
                                        <h6 class="card-subtitle text-muted mt-1">
                                            @php
                                                $doctor->rating = (int) $doctor->reviews_to_me()->avg('rating');
                                                for($i = 1; $i<=5; $i++){
                                                    if($doctor->rating >= $i){
                                                        echo '<span><i class="la la-star text-warning"></i></span';
                                                    }
                                                    else{
                                                        echo '<span><i class="la la-star-o"></i></span';
                                                    }
                                                }
                                            @endphp
                                        </h6>
                                        <ul class="list-inline clearfix mt-2">
                                            <li class="mr-3">
                                                <h2 class="block">{{ $doctor->doctor->activeAppointments()->count() }}</h2> Active
                                            </li>
                                            <li class="mr-3">
                                                <h2 class="block">{{ $doctor->doctor->canceledAppointments()->count() }}</h2> Canceled
                                            </li>
                                            <li>
                                                <h2 class="block">{{ $doctor->doctor->doneAppointments()->count() }}</h2> Successful
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <a href="{{ route('patient.appointment.schedule', [$doctor->doctor->id]) }}" class="btn btn-info btn-min-width mr-1 mb-1"><i class="la la-briefcase"></i>
                                            Get Appointment</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
