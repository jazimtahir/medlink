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
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="email" placeholder="" title="Please enter you email" required value="{{ old('email') }}" name="email" id="email" class="form-control @error('email') is-invalid @enderror" autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group m-b-20">
                    <label class="control-label" for="password">{{ __('Password') }}</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" title="Please enter your password" placeholder="******" required name="password" id="password" class="form-control @error('password') is-invalid @enderror" autocomplete="current-password">
                        @error('password')
                        <span class="danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block m-b-10">Login</button>
                <div class="text-center">
                        Don't have a account? <a href="{{ route('register') }}">Signup Now</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
