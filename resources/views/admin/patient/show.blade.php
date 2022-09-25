@extends('layouts.app')

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">View Patient</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.patient.index') }}">Patients</a>
                        </li>
                        <li class="breadcrumb-item"><a href="">View Patient</a>
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
                                    <img src="{{ $patient->getImg() }}" class="rounded-circle height-150" alt="Card image">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">{{ $patient->first_name . ' ' . $patient->last_name }}</h4>
                                    <h6 class="card-subtitle text-muted"><span>@</span>{{ $patient->username }}</h6>
                                    <h6 class="card-subtitle text-muted mt-1">
                                        @switch($patient->gender)
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
                                    @if($patient->is_verified)
                                        <span class="badge badge-success mt-1">Verified</span>
                                    @else
                                        <span class="badge badge-danger mt-1">Unverified</span>
                                    @endif
                                    @if($patient->is_active)
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
                                        <td>{{ $patient->username }}</td>
                                    </tr>
                                    <tr>
                                        <td class="h4">First Name:</td>
                                        <td>{{ $patient->first_name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="h4">Last Name:</td>
                                        <td>{{ $patient->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="h4">Email:</td>
                                        <td>{{ $patient->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="h4">Phone No:</td>
                                        <td>{{ $patient->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td class="h4">Date of Birth:</td>
                                        <td>{{ date('d-m-Y', strtotime($patient->dob)) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="h4">Address:</td>
                                        <td>{{ $patient->address }}</td>
                                    </tr>
                                    <tr>
                                        <td class="h4">Bio:</td>
                                        <td>{{ $patient->bio }}</td>
                                    </tr>
                                    <tr>
                                        <td class="h4">Created at:</td>
                                        <td>{{ date('d-m-Y', strtotime($patient->created_at)) }}</td>
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
