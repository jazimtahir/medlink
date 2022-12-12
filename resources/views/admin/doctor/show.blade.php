@extends('layouts.app')

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">View Doctor</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.doctor.index') }}">Doctors</a>
                        </li>
                        <li class="breadcrumb-item"><a href="">View Doctor</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
<div class="content-body">
    <section>
        <div class="col-12">
            <div class="card">
                <div class="row">
                    <div class="col-4">
                        <div class="text-center">
                            <div class="card-body">
                                <img src="{{ $doctor->getImg() }}" class="rounded-circle height-150" alt="Card image">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">{{ $doctor->first_name . ' ' . $doctor->last_name }}</h4>
                                <h6 class="card-subtitle text-muted"><span>@</span>{{ $doctor->username }}</h6>
                                <h6 class="card-subtitle text-muted mt-1">
                                    @switch($doctor->gender)
                                        @case('M')
                                            Male
                                            @break
                                        @case('F')
                                            Female
                                            @break
                                        @case('T')
                                            Other
                                            @break
                                        @default
                                            No Gender provided
                                    @endswitch
                                </h6>
                                @if($doctor->is_verified)
                                    <span class="badge badge-success mt-1">Verified</span>
                                @else
                                    <span class="badge badge-danger mt-1">Unverified</span>
                                @endif
                                @if($doctor->is_active)
                                    <span class="badge badge-success mt-1">Active</span>
                                @else
                                    <span class="badge badge-danger mt-1">Unactive</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <table class="table table-column">
                                <tr>
                                    <td class="h4">Username:</td>
                                    <td>{{ $doctor->username }}</td>
                                </tr>
                                <tr>
                                    <td class="h4">Salutation:</td>
                                    <td>{{ $doctor->doctor->salutation }}</td>
                                </tr>
                                <tr>
                                    <td class="h4">First Name:</td>
                                    <td>{{ $doctor->first_name }}</td>
                                </tr>
                                <tr>
                                    <td class="h4">Last Name:</td>
                                    <td>{{ $doctor->last_name }}</td>
                                </tr>
                                <tr>
                                    <td class="h4">Email:</td>
                                    <td>{{ $doctor->email }}</td>
                                </tr>
                                <tr>
                                    <td class="h4">Phone No:</td>
                                    <td>{{ $doctor->phone }}</td>
                                </tr>
                                <tr>
                                    <td class="h4">Date of Birth:</td>
                                    <td>{{ date('d-M-Y', strtotime($doctor->dob)) }}</td>
                                </tr>
                                <tr>
                                    <td class="h4">Address:</td>
                                    <td>{{ $doctor->address }}</td>
                                </tr>
                                <tr>
                                    <td class="h4">Bio:</td>
                                    <td>{{ $doctor->bio }}</td>
                                </tr>
                                <tr>
                                    <td class="h4">Fee:</td>
                                    <td>{{ $doctor->doctor->fee }}</td>
                                </tr>
                                <tr>
                                    <td class="h4">Practicing From:</td>
                                    <td>{{ date('d-M-Y', strtotime($doctor->doctor->practicing_from)) }}</td>
                                </tr>
                                <tr>
                                    <td class="h4">Created at:</td>
                                    <td>{{ date('d-m-Y', strtotime($doctor->created_at)) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
