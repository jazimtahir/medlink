@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1> View Patient</h1>
            <small> View the patient information</small>
            <ol class="breadcrumb hidden-xs">
                <li><a href="{{ route('admin.dashboard') }}"><i class="pe-7s-home"></i> Home</a></li>
                <li class="active">View Patient</li>
            </ol>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- Form controls -->
            <div class="col-sm-12">
                <div class="panel panel-bd">
                    <div class="panel-heading">
                        <h3>
                            <b>Username: </b>{{ $patient->username }}
                        <a class="btn btn-inverse btn-outline m-b-5" href="{{ route('admin.patient.edit', $patient->id) }}"> Edit</a>
                        </h3>
                    </div>
                    <div class="container m-t-20">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 p-20">
                                <div class="row">
                                    <b>First Name: </b>{{ $patient->first_name }}
                                </div>
                                <div class="row mt-2">
                                    <b>Last Name: </b>{{ $patient->last_name }}
                                </div>
                                <div class="row mt-2">
                                    <b>Email: </b>{{ $patient->email }}
                                </div>
                                <div class="row mt-2">
                                    <b>Phone: </b>{{ $patient->phone }}
                                </div>
                                <div class="row mt-2">
                                    <b>Gender: </b>
                                    @switch($patient->gender)
                                        @case('M')
                                            Male
                                            @break
                                        @case('F')
                                            Female
                                            @break
                                        @case('T')
                                            Transgender
                                            @break
                                        @default
                                            No Gender provided
                                    @endswitch
                                </div>
                                <div class="row mt-2">
                                    <b>Date of Birth: </b>{{ $patient->dob }}
                                </div>
                                <div class="row mt-2">
                                    <b>Active: </b>{{ $patient->is_active }}
                                </div>
                                <div class="row mt-2">
                                    <b>Verified: </b>{{ $patient->is_verified }}
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <img class="img-fluid" style="max-width: 300px;" src="{{ $patient->getImg() }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section> <!-- /.content -->
@endsection
