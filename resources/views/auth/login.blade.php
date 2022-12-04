@extends('layouts.auth')

@section('content')
<section class="row flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                <div class="card-header border-0">
                    <div class="card-title text-center">
                        <div class="d-flex justify-content-center align-items-end">
                            <img class="img-sm" src="{{ asset('assets/images/logo/logo-new.png') }}" alt="branding logo">
                            <h4 class="brand-text">MedLink</h4>
                        </div>
                    </div>
                    <h6 class="line-on-side text-center pt-2"><span>Login</span></h6>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('login') }}" method="POST" novalidate>
                            @csrf
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="email" class="form-control" id="email" placeholder="Your Email" name="email" value="{{ old('password') }}" required>
                                @error('email')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                                <div class="form-control-position">
                                    <i class="la la-user"></i>
                                </div>
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required>
                                @error('password')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                                <div class="form-control-position">
                                    <i class="la la-key"></i>
                                </div>
                            </fieldset>
                            <div class="form-group row">
                                <div class="col-sm-6 col-12 text-center text-sm-left pr-0">
                                    <fieldset>
                                        <input type="checkbox" id="remember-me" class="chk-remember">
                                        <label for="remember-me"> Remember Me</label>
                                    </fieldset>
                                </div>
                                <div class="col-sm-6 col-12 float-sm-left text-center text-sm-right"><a href="#" class="card-link">Forgot Password?</a></div>
                            </div>
                            <button type="submit" class="btn btn-outline-primary btn-block"><i class="ft-unlock"></i> Login</button>
                        </form>
                    </div>
                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>Don't Have an Account
              ?</span></p>
                    <div class="card-body">
                        <a href="{{ route('register') }}" class="btn btn-outline-danger btn-block"><i class="la la-user"></i>
                            Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
