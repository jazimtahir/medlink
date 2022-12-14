@extends('layouts.app')

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">Profile</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="">Profile</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section>
            <div class="col-12">
                <div class="card m-0">
                    <div class="row">
                        <div class="col">
                            <div class="pull-right m-1">
                                <button class="btn btn-outline-warning" data-toggle="modal" data-target="#profileEdit"><i class="la la-edit"></i>Edit</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="text-center">
                                <div class="card-body">
                                    <img src="{{ $user->getImg() }}" class="rounded-circle height-150" alt="Card image">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">{{ $user->first_name . ' ' . $user->last_name }}</h4>
                                    <h6 class="card-subtitle text-muted"><span>@</span>{{ $user->username }}</h6>
                                    <h6 class="card-subtitle text-muted mt-1">
                                        @php
                                        for($i = 1; $i<=5; $i++){
                                            if($user->rating >= $i){
                                                echo '<span><i class="la la-star text-warning"></i></span';
                                            }
                                            else{
                                                echo '<span><i class="la la-star-o"></i></span';
                                            }
                                        }
                                        @endphp
                                    </h6>
                                    <h6 class="card-subtitle text-muted mt-1">
                                        @switch($user->gender)
                                            @case('M')
                                                Male
                                                @break
                                            @case('F')
                                                Female
                                                @break
                                            @case('T')
                                                Other
                                                @break
                                            @default
                                                No Gender provided
                                        @endswitch
                                    </h6>
                                    @if($user->is_verified)
                                        <span class="badge badge-success mt-1">Verified</span>
                                    @else
                                        <span class="badge badge-danger mt-1">Unverified</span>
                                    @endif
                                    @if($user->is_active)
                                        <span class="badge badge-success mt-1">Active</span>
                                    @else
                                        <span class="badge badge-danger mt-1">Unactive</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        @if($errors->any())
                            {!! implode('', $errors->all('
                                <div class=" col-6 offset-3 alert alert-danger alert-dismissible mb-2" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <strong>Error!</strong> :message
                                </div>
                            ')) !!}
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-6">
                            <div class="card-body">
                                <table class="table table-column">
                                    <tr>
                                        <td class="h5">Username:</td>
                                        <td>{{ $user->username }}</td>
                                    </tr>
                                    @role('doctor')
                                    <tr>
                                        <td class="h5">Salutation:</td>
                                        <td>{{ $user->doctor->salutation }}</td>
                                    </tr>
                                    @endrole
                                    <tr>
                                        <td class="h5">First Name:</td>
                                        <td>{{ $user->first_name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="h5">Last Name:</td>
                                        <td>{{ $user->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="h5">Email:</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="h5">Phone No:</td>
                                        <td>{{ $user->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td class="h5">Date of Birth:</td>
                                        <td>{{ date('d-m-Y', strtotime($user->dob)) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="h5">Address:</td>
                                        <td>{{ $user->address }}</td>
                                    </tr>
                                    <tr>
                                        <td class="h5">Bio:</td>
                                        <td>{{ $user->bio }}</td>
                                    </tr>
                                    @role('doctor')
                                    <tr>
                                        <td class="h5">Professional Statement:</td>
                                        <td>{{ $user->doctor->professional_statement }}</td>
                                    </tr>
                                    <tr>
                                        <td class="h5">Specialization:</td>
                                        @if($user->doctor->specialization)<td>{{ $user->doctor->specialization->name }}@endif</td>
                                    </tr>
                                    <tr>
                                        <td class="h5">Fee:</td>
                                        <td>{{ $user->doctor->fee }}</td>
                                    </tr>
                                    <tr>
                                        <td class="h5">Practicing From:</td>
                                        <td>{{ date('d-M-Y', strtotime($user->doctor->practicing_from)) }}</td>
                                    </tr>
                                    @endrole
                                    <tr>
                                        <td class="h5">Created at:</td>
                                        <td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-lg-6">
                            <ul class="list-group list m-1">
                                <h3>Reviews</h3>
                                @foreach($user->reviews_to_me as $review)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-1">
                                                <img src="{{ $review->from_user->getImg() }}" class="avatar">
                                            </div>
                                            <div class="col-11">
                                                <h3 class="name">{{ $review->from_user->first_name. ' '. $review->from_user->last_name }}</h3>
                                                <p class="born">{{ $review->feedback }}</p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade text-left" id="profileEdit" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Edit Profile</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <label>Username: </label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" name="username" value="{{ $user->username }}" class="form-control" disabled>
                                    <div class="form-control-position">
                                        <i class="ft ft-user-check"></i>
                                    </div>
                                </div>

                                @role('doctor')
                                <label>Salutation: </label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" name="salutation" value="{{ $user->doctor->salutation }}" class="form-control">
                                    <div class="form-control-position">
                                        <i class="ft ft-activity"></i>
                                    </div>
                                </div>
                                @endrole

                                <label>Email: </label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="email" name="email" value="{{ $user->email }}" class="form-control" disabled>
                                    <div class="form-control-position">
                                        <i class="la la-envelope"></i>
                                    </div>
                                </div>

                                <label>Phone: </label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" disabled>
                                    <div class="form-control-position">
                                        <i class="la la-phone"></i>
                                    </div>
                                </div>

                                <label>First Name: </label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control">
                                    <div class="form-control-position">
                                        <i class="la la-user"></i>
                                    </div>
                                </div>

                                <label>Last Name: </label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control">
                                    <div class="form-control-position">
                                        <i class="la la-user-plus"></i>
                                    </div>
                                </div>

                                @role('doctor')
                                <label>Specialization: </label>
                                <div class="form-group position-relative">
                                    <select class=" custom-select form-control" name="specialization_id">
                                        <option></option>
                                        @foreach($specialization as $s)
                                            <option @if($user->doctor->specialization && $user->doctor->specialization->name == $s->name) selected @endif class="" value="{{ $s->id }}">{{ $s->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label>Practicing From: </label>
                                <div class="form-group position-relative">
                                    <input type="text" name="practicing_from" value="{{ $user->doctor->practicing_from }}" class="date-picker form-control">
                                </div>

                                <label>Fee: </label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="number" name="fee" value="{{ $user->doctor->fee }}" class="form-control">
                                    <div class="form-control-position">
                                        <i class="la la-money"></i>
                                    </div>
                                </div>
                                @endrole

                                <label>Password: </label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="password" name="password" placeholder="Password" class="form-control">
                                    <div class="form-control-position">
                                        <i class="la la-lock"></i>
                                    </div>
                                </div>

                                <label>Bio: </label>
                                <div class="form-group position-relative">
                                    <textarea class="form-control" rows="5" name="bio" placeholder="Enter text ...">{{ $user->bio }}</textarea>
                                </div>

                                @role('doctor')
                                <label>Professional Statement: </label>
                                <div class="form-group position-relative">
                                    <textarea class="form-control" rows="5" name="professional_statement" placeholder="Enter text ...">{{ $user->doctor->professional_statement }}</textarea>
                                </div>
                                @endrole

                                <label>Address: </label>
                                <div class="form-group position-relative">
                                    <textarea class="form-control" id="address" name="address" placeholder="Enter Address ..." rows="3">{{ $user->address }}</textarea>
                                </div>

                                <label>Date of Birth: </label>
                                <div class="form-group position-relative">
                                    <input type="text" class="date-picker form-control" name="dob" value="{{ $user->dob }}">
                                </div>

                                <label>Profile Picture: </label>
                                <div class="form-group position-relative">
                                    <input type="file" class="form-control" name="image">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="Close">
                                <input type="submit" class="btn btn-outline-primary" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
