@extends('layouts.auth')

@section('content')
<section class="row flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-lg-8 col-md-8 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                <div class="card-header border-0">
                    <div class="card-title text-center">
                        <div class="d-flex justify-content-center align-items-end">
                            <img class="img-sm" src="{{ asset('assets/images/logo/logo-new.png') }}" alt="branding logo">
                            <h4 class="brand-text">MedLink</h4>
                        </div>
                    </div>
                    <h6 class="line-on-side text-center pt-2"><span>Register</span></h6>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('register') }}" method="POST" novalidate>
                            @csrf
                            <div class="row">
                                <fieldset class="form-group position-relative has-icon-left col-md-6">
                                    <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="{{ old('username') }}" required>
                                    @error('username')
                                    <span class="text-danger">
                                    {{ $message }}
                                    </span>
                                    @enderror
                                    <div class="form-control-position">
                                        <i class="ft ft-user-check"></i>
                                    </div>
                                </fieldset>
                                <fieldset class="form-group position-relative col-md-6">
                                   <select id="role" name="role" class="form-control custom-select">
                                       <option value="" selected>Register as</option>
                                       <option value="doctor">Doctor</option>
                                       <option value="patient">Patient</option>
                                   </select>
                                    @error('role')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="row">
                                <fieldset class="form-group position-relative has-icon-left col-md-6">
                                    <input type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name" value="{{ old('first_name') }}" required>
                                    @error('first_name')
                                    <span class="text-danger">
                                    {{ $message }}
                                </span>
                                    @enderror
                                    <div class="form-control-position">
                                        <i class="la la-user"></i>
                                    </div>
                                </fieldset>
                                <fieldset class="form-group position-relative has-icon-left col-md-6">
                                    <input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}" required>
                                    @error('last_name')
                                    <span class="text-danger">
                                    {{ $message }}
                                </span>
                                    @enderror
                                    <div class="form-control-position">
                                        <i class="ft ft-user-plus"></i>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="row">
                                <fieldset class="form-group position-relative has-icon-left col-md-6">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                    <span class="text-danger">
                                    {{ $message }}
                                    </span>
                                    @enderror
                                    <div class="form-control-position">
                                        <i class="la la-envelope"></i>
                                    </div>
                                </fieldset>
                                <fieldset class="form-group position-relative has-icon-left col-md-6">
                                    <input type="number" class="form-control" id="phone" placeholder="Phone No" name="phone" value="{{ old('phone') }}" required>
                                    @error('phone')
                                    <span class="text-danger">
                                    {{ $message }}
                                    </span>
                                    @enderror
                                    <div class="form-control-position">
                                        <i class="la la-phone"></i>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="row">
                                <fieldset class="form-group position-relative has-icon-left col-md-6">
                                    <label for="dob">Date of Birth</label>
                                    <input type="text" class="date-picker form-control" name="dob" value="{{ old('dob') }}" required>
                                    @error('dob')
                                    <span class="text-danger">
                                    {{ $message }}
                                    </span>
                                    @enderror
{{--                                    <div class="form-control-position">--}}
{{--                                        <i class="la la-calendar"></i>--}}
{{--                                    </div>--}}
                                </fieldset>
                                <div class="form-group position-relative col-md-6">
                                    <label>Gender</label>
                                    <div class="input-group">
                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                            <input type="radio" name="gender" class="custom-control-input" id="M" value="M">
                                            <label class="custom-control-label" for="M">Male</label>
                                        </div>
                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                            <input type="radio" name="gender" class="custom-control-input" id="F" value="F">
                                            <label class="custom-control-label" for="F">Female</label>
                                        </div>
                                        <div class="d-inline-block custom-control custom-radio">
                                            <input type="radio" name="gender" class="custom-control-input" id="T" value="T">
                                            <label class="custom-control-label" for="T">Other</label>
                                        </div>
                                    </div>
                                    @error('gender')
                                    <span class="text-danger">
                                        {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <fieldset class="form-group position-relative has-icon-left col-md-6">
                                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="{{ old('password') }}" required>
                                    @error('password')
                                    <span class="text-danger">
                                    {{ $message }}
                                    </span>
                                    @enderror
                                    <div class="form-control-position">
                                        <i class="la la-key"></i>
                                    </div>
                                </fieldset>
                                <fieldset class="form-group position-relative has-icon-left col-md-6">
                                    <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation" required>
                                    <div class="form-control-position">
                                        <i class="la la-key"></i>
                                    </div>
                                </fieldset>
                            </div>
                            <button type="submit" class="btn btn-outline-primary btn-block col-lg-6 offset-lg-3"><i class="la la-user"></i> Register</button>
                        </form>
                    </div>
                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>Already have an Account
              ?</span></p>
                    <div class="card-body col-lg-6 offset-lg-3">
                        <a href="{{ route('login') }}" class="btn btn-outline-danger btn-block"><i class="ft-unlock"></i>
                            Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
