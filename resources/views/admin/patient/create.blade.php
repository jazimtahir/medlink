@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1> Create Doctor</h1>
            <small> Add a new doctor</small>
            <ol class="breadcrumb hidden-xs">
                <li><a href="{{ route('admin.dashboard') }}"><i class="pe-7s-home"></i> Home</a></li>
                <li class="active">Create Patient</li>
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
                        <form class="col-sm-12" action="{{ route('admin.patient.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="col-sm-6 form-group">
                                <label>Username</label>
                                <input class="form-control" value="" name="username">
                                @error('username')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" value="" name="email">
                                @error('email')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="first_name" value="">
                                @error('first_name')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="last_name" value="">
                                @error('last_name')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter password">
                                @error('password')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Phone No</label>
                                <input type="number" class="form-control"value="" name="phone">
                                @error('phone')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-sm-6 form-group">
                                <label >Picture upload</label>
                                <input type="file" name="image" id="picture">
                                @error('image')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
{{--                            <div class="col-sm-12 form-group">--}}
{{--                                <label>Professional Statement</label>--}}
{{--                                <textarea id="some-textarea" class="form-control" rows="3" name="professional_statement" placeholder="Enter text ..."></textarea>--}}
{{--                                @error('professional_statement')--}}
{{--                                <span class="text-danger" role="alert">--}}
{{--                                    <strong>{{ $message }}</strong>--}}
{{--                                </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
                            <div class="col-sm-6 form-group">
                                <label>Date of Birth</label>
                                <input name="dob" class="datepicker form-control hasDatepicker" type="date" placeholder="Date of Birth" id="date_of_birth" value="">
                                @error('dob')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-sm-6 form-check">
                                <label>Status</label><br>
                                <label class="radio-inline"><input type="radio" name="is_active" value="1">Active</label>
                                <label class="radio-inline">
                                    <input type="radio" name="is_active" value="0">Inactive</label>
                            </div>
                            <label>
                                @error('is_active')
                                <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </label>
                            <div class="col-sm-6 form-check">
                                <label>Verified</label><br>
                                <label class="radio-inline">
                                    <input type="radio" name="is_verified" value="1">Verified</label>
                                <label class="radio-inline">
                                    <input type="radio" name="is_verified" value="0">Unverified</label>
                                <label>
                                    @error('is_verified')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </label>
                            </div>


                            <div class="form-check col-lg-6">
                                <label>Gender</label>
                                <br>
                                <label class="radio-inline">
                                    <input type="radio" name="gender" value="M">Male
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="gender" value="F">Female
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="gender" value="T">Other
                                </label>
                                <label>
                                    @error('gender')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </label>
                            </div>

                            <div class="col-sm-12">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section> <!-- /.content -->
@endsection
