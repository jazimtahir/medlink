@extends('layouts.auth')

@section('content')
<div class="container-center lg">
    <div class="panel panel-bd">
        <div class="panel-heading">
            <div class="view-header">
                <div class="header-icon">
                    <i class="pe-7s-unlock"></i>
                </div>
                <div class="header-title">
                    <h3>{{ __('Register') }}</h3>
                    <small><strong>Please enter your data to register.</strong></small>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <form method="POST" action="{{ route('register') }}" id="loginForm">
                @csrf
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label>{{ __('Username') }}</label>
                        <input type="text" id="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                        @error('username')
                        <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6">
                        <label>{{ __('Register as') }}</label>
                        <select id="role" name="role" class="form-control" required>
                            <option selected></option>
                            <option value="doctor">Doctor</option>
                            <option value="patient">Patient</option>
                        </select>
                        @error('role')
                        <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6">
                        <label>{{ __('First Name') }}</label>
                        <input type="text" id="first_name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                        @error('first_name')
                        <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6">
                        <label>{{ __('Last Name') }}</label>
                        <input type="text" id="last_name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                        @error('last_name')
                        <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6">
                        <label>{{ __('Email Address') }}</label>
                        <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6">
                        <label>{{ __('Phone No.') }}</label>
                        <input type="number" id="phone" placeholder="+923001234567" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                        @error('phone')
                        <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Date of Birth</label>
                        <input name="dob" class="datepicker form-control hasDatepicker @error('dob') is-invalid @enderror" type="date" placeholder="Date of Birth" required autocomplete="dob">
                        @error('dob')
                        <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6">
                        <label>{{ __('Password') }}</label>
                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                        <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6">
                        <label>{{ __('Confirm Password') }}</label>
                        <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autocomplete="password">
                    </div>
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
                <div class="col-lg-6 d-flex text-right">
                    <button id="registerBtn" type="submit" class="btn btn-primary">{{ __('Register') }} <i id="btnloader" class="fa fa-circle-o-notch fa-spin"></i></button>
                </div>
                <div class="col-lg-12 text-center">
                    Already Registered? <a href="{{ route('login') }}">Login Now</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
