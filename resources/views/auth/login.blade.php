@extends('layouts.auth')

@section('content')
<div class="container-center">
    <div class="panel panel-bd">
        <div class="panel-heading">
            <div class="view-header">
                <div class="header-icon">
                    <i class="pe-7s-unlock"></i>
                </div>
                <div class="header-title">
                    <h3>Login</h3>
                    <small><strong>Please enter your credentials to login.</strong></small>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <form action="{{ route('login') }}" method="POST" id="loginForm">
                @csrf
                <div class="form-group">
                    <label class="control-label" for="email">{{ __('Email Address') }}</label>
                    <input type="email" placeholder="" title="Please enter you email" required value="{{ old('email') }}" name="email" id="email" class="form-control @error('email') is-invalid @enderror" autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="control-label" for="password">{{ __('Password') }}</label>
                    <input type="password" title="Please enter your password" placeholder="******" required name="password" id="password" class="form-control @error('password') is-invalid @enderror" autocomplete="current-password">
                    @error('password')
                        <span class="danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a class="btn btn-warning" href="{{ route('register') }}">Register</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
