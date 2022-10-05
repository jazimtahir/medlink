@extends('layouts.app')

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">Add Doctor</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.doctor.index') }}">Doctors</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Add Doctor</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="horz-layout-colored-controls">Add Doctor</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <form class="form form-horizontal" action="{{ route('admin.doctor.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="ft-user"></i>Personal Info</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="username">Username</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="username" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}" required>
                                                        @error('username')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="email">Email</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="email" id="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required>
                                                        @error('email')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="first_name">Fist Name</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="first_name" class="form-control" placeholder="First Name" name="first_name" value="{{ old('first_name') }}" required>
                                                        @error('first_name')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="last_name">Last Name</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="last_name" class="form-control" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}" required>
                                                        @error('last_name')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="phone">Phone No</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="number" id="phone" class="form-control" placeholder="Phone No" name="phone" value="{{ old('phone') }}" required>
                                                        @error('phone')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="dob">Date of Birth</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" class="date-picker form-control" placeholder="Date of Birth" name="dob" value="{{ old('dob') }}" required>
                                                        @error('dob')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="salutation">Salutation</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="salutation" class="form-control" placeholder="Mr. Mrs. Dr." name="salutation" required>
                                                        @error('salutation')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="password">Password</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
                                                        @error('password')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="gender">Gender</label>
                                                    <div class="col-md-9 mx-auto mt-1">
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" name="gender" value="M" class="custom-control-input" id="g-m">
                                                            <label class="custom-control-label" for="g-m">Male</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" name="gender" value="F" class="custom-control-input" id="g-f">
                                                            <label class="custom-control-label" for="g-f">Female</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio">
                                                            <input type="radio" name="gender" value="T" class="custom-control-input" id="g-t">
                                                            <label class="custom-control-label" for="g-t">Other</label>
                                                        </div>
                                                        @error('gender')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="address">Address</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <textarea id="address" rows="5" class="form-control" name="address" placeholder="Enter Address...">{{ old('address') }}</textarea>
                                                        @error('address')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-section"></div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Profile Picture</label>
                                                    <label id="" class="file center-block">
                                                        <input type="file" name="image">
                                                        <span class="file-custom"></span>
                                                    </label>
                                                    @error('image')
                                                    <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-section"></div>

                                        <h4 class="form-section"><i class="ft-shopping-bag"></i> Other Info</h4>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="bio">Bio</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <textarea id="bio" rows="5" class="form-control" name="bio" placeholder="Enter Bio...">{{ old('bio') }}</textarea>
                                                        @error('bio')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="professional_statement">Professional Statement</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <textarea id="professional_statement" rows="5" class="form-control" name="professional_statement" placeholder="Enter Professional Statement...">{{ old('professional_statement') }}</textarea>
                                                        @error('professional_statement')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-section"></div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="is_active">Activation Status</label>
                                                    <div class="col-md-9 mx-auto mt-1">
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" name="is_active" value="1" class="custom-control-input" id="active">
                                                            <label class="custom-control-label" for="active">Active</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio">
                                                            <input type="radio" name="is_active" value="0" class="custom-control-input" id="unactive">
                                                            <label class="custom-control-label" for="unactive">Unactive</label>
                                                        </div>
                                                        @error('is_active')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="is_active">Verification Status</label>
                                                    <div class="col-md-9 mx-auto mt-1">
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" name="is_verified" value="1" class="custom-control-input" id="verified">
                                                            <label class="custom-control-label" for="verified">Verified</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio">
                                                            <input type="radio" name="is_verified" value="0" class="custom-control-input" id="unverified">
                                                            <label class="custom-control-label" for="unverified">Unverified</label>
                                                        </div>
                                                        @error('is_verified')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-section"></div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="specialization_id">Specialization</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select class="custom-select form-control" name="specialization_id">
                                                            <option></option>
                                                            @foreach($specialization as $s)
                                                                <option class="form-control" value="{{ $s->id }}">{{ $s->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('specialization_id')
                                                                <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="fee">Fee</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="number" class="form-control" name="fee" placeholder="Fee" value="{{ old('fee') }}" required>
                                                        @error('fee')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="practicing_from">Practicing From</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" class="date-picker form-control" name="practicing_from" placeholder="Practicing From" value="{{ old('practicing_from') }}" required>
                                                        @error('practicing_from')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-section"></div>
                                    </div>

                                    <div class="form-actions text-right">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i> Save
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
