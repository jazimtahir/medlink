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
                        <label>{{ __('Name') }}</label>
                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6">
                        <label>{{ __('Email Address') }}</label>
                        <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6">
                        <label>{{ __('Password') }}</label>
                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6">
                        <label>{{ __('Confirm Password') }}</label>
                        <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autocomplete="password">
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-warning">{{ __('Register') }}</button>
                    <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
