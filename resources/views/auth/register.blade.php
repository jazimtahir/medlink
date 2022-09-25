@extends('layouts.auth')

@section('content')
{{--<div class="container-center lg">--}}
{{--    <div class="panel panel-bd">--}}
{{--        <div class="panel-heading">--}}
{{--            <div class="view-header">--}}
{{--                <div class="header-icon">--}}
{{--                    <i class="pe-7s-unlock"></i>--}}
{{--                </div>--}}
{{--                <div class="header-title">--}}
{{--                    <h3>{{ __('Register') }}</h3>--}}
{{--                    <small><strong>Please enter your data to register.</strong></small>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="panel-body">--}}
{{--            <form method="POST" action="{{ route('register') }}" id="loginForm">--}}
{{--                @csrf--}}
{{--                <div class="row">--}}
{{--                    <div class="form-group col-lg-6">--}}
{{--                        <label>{{ __('Username') }}</label>--}}
{{--                        <input type="text" id="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>--}}
{{--                        @error('username')--}}
{{--                        <span class="text-danger" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-lg-6">--}}
{{--                        <label>{{ __('Register as') }}</label>--}}
{{--                        <select id="role" name="role" class="form-control" required>--}}
{{--                            <option selected></option>--}}
{{--                            <option value="doctor">Doctor</option>--}}
{{--                            <option value="patient">Patient</option>--}}
{{--                        </select>--}}
{{--                        @error('role')--}}
{{--                        <span class="text-danger" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-lg-6">--}}
{{--                        <label>{{ __('First Name') }}</label>--}}
{{--                        <input type="text" id="first_name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>--}}
{{--                        @error('first_name')--}}
{{--                        <span class="text-danger" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-lg-6">--}}
{{--                        <label>{{ __('Last Name') }}</label>--}}
{{--                        <input type="text" id="last_name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>--}}
{{--                        @error('last_name')--}}
{{--                        <span class="text-danger" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-lg-6">--}}
{{--                        <label>{{ __('Email Address') }}</label>--}}
{{--                        <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}
{{--                        @error('email')--}}
{{--                        <span class="text-danger" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-lg-6">--}}
{{--                        <label>{{ __('Phone No.') }}</label>--}}
{{--                        <input type="number" id="phone" placeholder="+923001234567" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">--}}
{{--                        @error('phone')--}}
{{--                        <span class="text-danger" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-lg-6">--}}
{{--                        <label>Date of Birth</label>--}}
{{--                        <input name="dob" class="datepicker form-control hasDatepicker @error('dob') is-invalid @enderror" type="date" placeholder="Date of Birth" required autocomplete="dob">--}}
{{--                        @error('dob')--}}
{{--                        <span class="text-danger" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-lg-6">--}}
{{--                        <label>{{ __('Password') }}</label>--}}
{{--                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}
{{--                        @error('password')--}}
{{--                        <span class="text-danger" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-lg-6">--}}
{{--                        <label>{{ __('Confirm Password') }}</label>--}}
{{--                        <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autocomplete="password">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="form-check col-lg-6">--}}
{{--                    <label>Gender</label>--}}
{{--                    <br>--}}
{{--                    <label class="radio-inline">--}}
{{--                        <input type="radio" name="gender" value="M">Male--}}
{{--                    </label>--}}
{{--                    <label class="radio-inline">--}}
{{--                        <input type="radio" name="gender" value="F">Female--}}
{{--                    </label>--}}
{{--                    <label class="radio-inline">--}}
{{--                        <input type="radio" name="gender" value="T">Other--}}
{{--                    </label>--}}
{{--                    <label>--}}
{{--                        @error('gender')--}}
{{--                        <span class="text-danger" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                        </span>--}}
{{--                        @enderror--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6 d-flex text-right">--}}
{{--                    <button id="registerBtn" type="submit" class="btn btn-primary">{{ __('Register') }} <i id="btnloader" class="fa fa-circle-o-notch fa-spin"></i></button>--}}
{{--                </div>--}}
{{--                <div class="col-lg-12 text-center">--}}
{{--                    Already Registered? <a href="{{ route('login') }}">Login Now</a>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<section class="row flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-lg-8 col-md-8 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                <div class="card-header border-0">
                    <div class="card-title text-center">
                        <img src="{{ asset('assets/images/logo/logo-dark.png') }}" alt="branding logo">
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
                                <fieldset class="form-group position-relative has-icon-left col-md-6">
                                   <select id="role" name="role" class="form-control">
                                       <option value="" selected>Register as</option>
                                       <option value="doctor">Doctor</option>
                                       <option value="patient">Patient</option>
                                   </select>
                                    @error('role')
                                    <span class="text-danger">
                                    {{ $message }}
                                </span>
                                    @enderror
                                    <div class="form-control-position">
                                        <i class="la la-user-secret"></i>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="row">
                                <fieldset class="form-group position-relative has-icon-left col-md-6">
                                    <input type="first_name" class="form-control" id="first_name" placeholder="First Name" name="first_name" value="{{ old('first_name') }}" required>
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
                                    <input type="last_name" class="form-control" id="last_name" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}" required>
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
                                    <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob') }}" required>
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
                            <button type="submit" class="btn btn-outline-info btn-block col-lg-6 offset-lg-3"><i class="la la-user"></i> Register</button>
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
