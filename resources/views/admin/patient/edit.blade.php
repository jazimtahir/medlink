@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note"></i>
        </div>
        <div class="header-title">
            <h1> Edit Patient</h1>
            <small> Update the patient information</small>
            <ol class="breadcrumb hidden-xs">
                <li><a href="{{ route('admin.dashboard') }}"><i class="pe-7s-home"></i> Home</a></li>
                <li class="active">Edit Patient</li>
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
                        <div class="btn-group">
                            <a class="btn btn-primary" href="{{ route('admin.patient.index') }}"> <i class="fa fa-list"></i>  Patients List </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="col-sm-12" action="{{ route('admin.patient.update', $patient->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-sm-6 form-group">
                                <label>Username</label>
                                <input class="form-control" value="{{ $patient->username }}" disabled>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" value="{{ $patient->email }}" disabled>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="first_name" value="{{ $patient->first_name }}">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="last_name" value="{{ $patient->last_name }}">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter password">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Phone No</label>
                                <input type="number" class="form-control"value="{{ $patient->phone }}" disabled>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label >Picture upload</label>
                                <input type="file" name="image">
                                @error('image')
                                <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
{{--                            <div class="col-sm-12 form-group">--}}
{{--                                <label>Professional Statement</label>--}}
{{--                                <textarea id="some-textarea" class="form-control" rows="3" name="professional_statement" placeholder="Enter text ...">{{ $patient->patient->professional_statement }}</textarea>--}}
{{--                            </div>--}}
                            <div class="col-sm-6 form-group">
                                <label>Date of Birth</label>
                                <input name="dob" class="datepicker form-control hasDatepicker" type="date" placeholder="Date of Birth" id="date_of_birth" value="{{ $patient->dob }}">
                            </div>
                            <div class="col-sm-6 form-check">
                                <label>Status</label><br>
                                <label class="radio-inline"><input type="radio" name="is_active" value="1" {{ ($patient->is_active=="1")? "checked" : "" }}>Active</label>
                                <label class="radio-inline">
                                    <input type="radio" name="is_active" value="0" {{ ($patient->is_active=="0")? "checked" : "" }}>Inactive</label>
                            </div>
                            <div class="col-sm-6 form-check">
                                <label>Verified</label><br>
                                <label class="radio-inline">
                                    <input type="radio" name="is_verified" value="1" {{ ($patient->is_verified=="1")? "checked" : "" }}>Verified</label>
                                <label class="radio-inline">
                                    <input type="radio" name="is_verified" value="0" {{ ($patient->is_verified=="0")? "checked" : "" }}>Unverified</label>
                            </div>

                            <div class="col-sm-12">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section> <!-- /.content -->
@endsection
