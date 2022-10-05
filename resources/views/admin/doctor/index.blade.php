@extends('layouts.app')

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">Doctors</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Doctors</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <section id="doctor-index">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Doctors</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    </div>
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
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered dom-jQuery-events">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Salutation</th>
                                        <th>Username</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Specialization</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($doctors as $doctor)
                                        <tr>
                                            <td>
                                                <img class="avatar avatar-lg" src="{{ $doctor->getImg() }}">
                                            </td>
                                            <td>{{ $doctor->doctor->salutation }}</td>
                                            <td>{{ $doctor->username }}</td>
                                            <td>{{ $doctor->first_name }}</td>
                                            <td>{{ $doctor->last_name }}</td>
                                            <td>{{ $doctor->email }}</td>
                                            <td>{{ $doctor->phone }}</td>
                                            <td>{{ $doctor->doctor->specialization->name ?? '' }}</td>
                                            <td class="btn-toolbar">
                                                <div class="btn-group p-0">
                                                    <a class="btn btn-sm btn-outline-primary mr-1" href="{{ route('admin.doctor.show', [$doctor->id]) }}">
                                                        <i class="la la-eye"></i>
                                                    </a>
                                                    <a class="btn btn-sm btn-outline-warning mr-1" href=""
                                                       data-toggle="modal"
                                                       data-target='#doctorEdit{{ $doctor->id }}'
                                                    >
                                                        <i class="la la-edit"></i>
                                                    </a>
                                                    <a class="btn btn-sm btn-outline-danger" href="{{ route('admin.doctor.destroy', [$doctor->id]) }}" onclick="return confirm('Are you sure?')">
                                                        <i class="la la-trash"></i>
                                                    </a>
                                                </div>
{{--                                                edit modal--}}
                                                <div class="modal fade text-left" id="doctorEdit{{ $doctor->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 class="modal-title">Edit Doctor</h3>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form method="POST" action="{{ route('admin.doctor.update', $doctor->id) }}" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">
                                                                    <label>Username: </label>
                                                                    <div class="form-group position-relative has-icon-left">
                                                                        <input type="text" name="username" value="{{ $doctor->username }}" class="form-control" disabled>
                                                                        <div class="form-control-position">
                                                                            <i class="ft ft-user-check"></i>
                                                                        </div>
                                                                    </div>

                                                                    <label>Email: </label>
                                                                    <div class="form-group position-relative has-icon-left">
                                                                        <input type="email" name="email" value="{{ $doctor->email }}" class="form-control" disabled>
                                                                        <div class="form-control-position">
                                                                            <i class="la la-envelope"></i>
                                                                        </div>
                                                                    </div>

                                                                    <label>Phone: </label>
                                                                    <div class="form-group position-relative has-icon-left">
                                                                        <input type="text" name="phone" value="{{ $doctor->phone }}" class="form-control" disabled>
                                                                        <div class="form-control-position">
                                                                            <i class="la la-phone"></i>
                                                                        </div>
                                                                    </div>

                                                                    <label>Salutation: </label>
                                                                    <div class="form-group position-relative has-icon-left">
                                                                        <input type="text" name="salutation" value="{{ $doctor->doctor->salutation }}" class="form-control">
                                                                        <div class="form-control-position">
                                                                            <i class="ft ft-info"></i>
                                                                        </div>
                                                                    </div>

                                                                    <label>First Name: </label>
                                                                    <div class="form-group position-relative has-icon-left">
                                                                        <input type="text" name="first_name" value="{{ $doctor->first_name }}" class="form-control">
                                                                        <div class="form-control-position">
                                                                            <i class="la la-user"></i>
                                                                        </div>
                                                                    </div>

                                                                    <label>Last Name: </label>
                                                                    <div class="form-group position-relative has-icon-left">
                                                                        <input type="text" name="last_name" value="{{ $doctor->last_name }}" class="form-control">
                                                                        <div class="form-control-position">
                                                                            <i class="la la-user-plus"></i>
                                                                        </div>
                                                                    </div>

                                                                    <label>Specialization: </label>
                                                                    <div class="form-group position-relative">
                                                                        <select class=" custom-select form-control" name="specialization_id">
                                                                            <option></option>
                                                                            @foreach($specialization as $s)
                                                                                <option @if($doctor->doctor->specialization && $doctor->doctor->specialization->name == $s->name) selected @endif class="" value="{{ $s->id }}">{{ $s->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <label>Password: </label>
                                                                    <div class="form-group position-relative has-icon-left">
                                                                        <input type="password" name="password" placeholder="Password" class="form-control">
                                                                        <div class="form-control-position">
                                                                            <i class="la la-lock"></i>
                                                                        </div>
                                                                    </div>

                                                                    <label>Bio: </label>
                                                                    <div class="form-group position-relative">
                                                                        <textarea class="form-control" rows="5" name="bio" placeholder="Enter text ...">{{ $doctor->bio }}</textarea>
                                                                    </div>

                                                                    <label>Fee: </label>
                                                                    <div class="form-group position-relative has-icon-left">
                                                                        <input type="number" name="fee" placeholder="Fee" class="form-control" value="{{ $doctor->doctor->fee }}">
                                                                        <div class="form-control-position">
                                                                            <i class="la la-money"></i>
                                                                        </div>
                                                                    </div>

                                                                    <label>Practicing From: </label>
                                                                    <div class="form-group position-relative has-icon-left">
                                                                        <input type="text" name="practicing_from" class="date-picker form-control" value="{{ $doctor->doctor->practicing_from }}">
                                                                        <div class="form-control-position">
                                                                            <i class="ft ft-activity"></i>
                                                                        </div>
                                                                    </div>

                                                                    <label>Professional Statement: </label>
                                                                    <div class="form-group position-relative">
                                                                        <textarea class="form-control" rows="5" name="professional_statement" placeholder="Enter text ...">{{ $doctor->doctor->professional_statement }}</textarea>
                                                                    </div>

                                                                    <label>Address: </label>
                                                                    <div class="form-group position-relative">
                                                                        <textarea class="form-control" rows="3" name="address" placeholder="Enter address ...">{{ $doctor->address }}</textarea>
                                                                    </div>

                                                                    <label>Date of Birth: </label>
                                                                    <div class="form-group position-relative">
                                                                        <input type="text" class="date-picker form-control" name="dob" value="{{ $doctor->dob }}">
                                                                    </div>

                                                                    <label>Profile Picture: </label>
                                                                    <div class="form-group position-relative">
                                                                        <input type="file" class="form-control" name="image">
                                                                    </div>

                                                                    <label>Activation Status: </label>
                                                                    <div class="form-group position-relative">
                                                                        <div class="input-group">
                                                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                                                <input type="radio" name="is_active" value="1" {{ ($doctor->is_active=="1")? "checked" : "" }} class="custom-control-input" id="active1{{ $doctor->id }}">
                                                                                <label class="custom-control-label" for="active1{{ $doctor->id }}">Active</label>
                                                                            </div>
                                                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                                                <input type="radio" name="is_active" value="0" {{ ($doctor->is_active=="0")? "checked" : "" }} class="custom-control-input" id="active0{{ $doctor->id }}">
                                                                                <label class="custom-control-label" for="active0{{ $doctor->id }}">InActive</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <label>Verification Status: </label>
                                                                    <div class="form-group position-relative">
                                                                        <div class="input-group">
                                                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                                                <input type="radio" name="is_verified" value="1" {{ ($doctor->is_verified=="1")? "checked" : "" }} class="custom-control-input" id="verify1{{ $doctor->id }}">
                                                                                <label class="custom-control-label" for="verify1{{ $doctor->id }}">Verified</label>
                                                                            </div>
                                                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                                                <input type="radio" name="is_verified" value="0" {{ ($doctor->is_verified=="0")? "checked" : "" }} class="custom-control-input" id="verify0{{ $doctor->id }}">
                                                                                <label class="custom-control-label" for="verify0{{ $doctor->id }}">Unverified</label>
                                                                            </div>
                                                                        </div>
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
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
