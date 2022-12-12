@extends('layouts.app')

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">Reviews</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="">Reviews</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section>
            <div class="">
                <h3 class="">
                    My Reviews
                </h3>
                <div class="row">
                    @forelse($myReviews as $review)
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="card profile-card-with-cover">
                                <div class="card-content">
                                    <div class="profile-card-with-cover-content text-center mt-3">
                                        <h4 class="">
                                            <span>@</span>{{ $review->to_user->username }}
                                        </h4>
                                        <div class="card-body">
                                            <div>
                                                @php
                                                    for($i = 1; $i<=5; $i++){
                                                        if($review->rating >= $i){
                                                            echo '<span><i class="la la-star text-warning"></i></span>';
                                                        }
                                                        else{
                                                            echo '<span><i class="la la-star-o"></i></span>';
                                                        }
                                                    }
                                                @endphp
                                            </div>
                                            <div>
                                                {{ $review->feedback }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h5 class="col text-danger">No reviews given</h5>
                    @endforelse
                </div>
            </div>
            <hr>
            <div class="">
                <h3 class="">
                    Reviews To Me
                </h3>
                <div class="row">
                    @forelse($reviewsToMe as $review)
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="card profile-card-with-cover">
                                <div class="card-content">
                                    <div class="profile-card-with-cover-content text-center mt-3">
                                        <h4 class="">
                                            <span>@</span>{{ $review->from_user->username }}
                                        </h4>
                                        <div class="card-body">
                                            <div>
                                                @php
                                                    for($i = 1; $i<=5; $i++){
                                                        if($review->rating >= $i){
                                                            echo '<span><i class="la la-star text-warning"></i></span>';
                                                        }
                                                        else{
                                                            echo '<span><i class="la la-star-o"></i></span>';
                                                        }
                                                    }
                                                @endphp
                                            </div>
                                            <div>
                                                {{ $review->feedback }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h5 class="col text-danger">No reviews to me</h5>
                    @endforelse
                </div>
            </div>
            <hr>
            <div class="">
                <h3 class="">
                    Sumbit Review
                </h3>
                <div class="row">
                    @forelse($reviewable as $user)
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="card profile-card-with-cover">
                                <div class="card-content">
                                    <div class="profile-card-with-cover-content text-center mt-3">
                                        <h4 class="">
                                            <span>@</span>{{ $user->username }}
                                        </h4>
                                        <div class="card-body">
                                            <form action="{{ route('reviews.create') }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <div class="">
                                                    <div class="input-group p-1">
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" name="rating" class="custom-control-input" id="r1{{ $user->id }}" value="1">
                                                            <label class="custom-control-label" for="r1{{ $user->id }}">Worst</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" name="rating" class="custom-control-input" id="r2{{ $user->id }}" value="2">
                                                            <label class="custom-control-label" for="r2{{ $user->id }}">Bad</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" name="rating" class="custom-control-input" id="r3{{ $user->id }}" value="3">
                                                            <label class="custom-control-label" for="r3{{ $user->id }}">Ok</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" name="rating" class="custom-control-input" id="r4{{ $user->id }}" value="4">
                                                            <label class="custom-control-label" for="r4{{ $user->id }}">Good</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio">
                                                            <input type="radio" name="rating" class="custom-control-input" id="r5{{ $user->id }}" value="5">
                                                            <label class="custom-control-label" for="r5{{ $user->id }}">Excellent</label>
                                                        </div>
                                                    </div>
                                                    @error('rating')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="d-flex align-items-baseline">
                                                    <label class="label">Feedback: </label>
                                                    <input name="user" type="text" class="form-control" hidden value="{{ $user->id }}" required>
                                                    <input name="feedback" type="text" class="form-control" required>
                                                    @error('feedback')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="pull-right p-1">
                                                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h5 class="col text-danger">No reviews to me</h5>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
@endsection
