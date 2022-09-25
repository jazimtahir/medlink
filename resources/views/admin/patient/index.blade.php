@extends('layouts.app')

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">Patients</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Patients</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section id="patient-index">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Patients</h4>
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
                                            <th>Username</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($patients as $patient)
                                            <tr>
                                                <td><img src="{{ $patient->getImg() }}" class="img-sm"></td>
                                                <td>{{ $patient->username }}</td>
                                                <td>{{ $patient->first_name }}</td>
                                                <td>{{ $patient->last_name }}</td>
                                                <td>{{ $patient->email }}</td>
                                                <td>{{ $patient->phone }}</td>
                                                <td class="btn-toolbar">
                                                    <div class="btn-group p-0">
                                                        <a class="btn btn-sm btn-outline-primary mr-1" href="{{ route('admin.patient.show', [$patient->id]) }}">
                                                            <i class="la la-eye"></i>
                                                        </a>
                                                        <a class="btn btn-sm btn-outline-warning mr-1" href=""
                                                           data-toggle="modal"
                                                           data-target='#patientEdit{{ $patient->id }}'
                                                        >
                                                            <i class="la la-edit"></i>
                                                        </a>
                                                        <a class="btn btn-sm btn-outline-danger" href="{{ route('admin.patient.destroy', [$patient->id]) }}" onclick="return confirm('Are you sure?')">
                                                            <i class="la la-trash"></i>
                                                        </a>
                                                    </div>
                                                    {{--                                                edit modal--}}
                                                    <div class="modal fade text-left" id="patientEdit{{ $patient->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h3 class="modal-title">Edit Patient</h3>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form method="POST" action="{{ route('admin.patient.update', $patient->id) }}" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-body">
                                                                        <label>Username: </label>
                                                                        <div class="form-group position-relative has-icon-left">
                                                                            <input type="text" name="username" value="{{ $patient->username }}" class="form-control" disabled>
                                                                            <div class="form-control-position">
                                                                                <i class="ft ft-user-check"></i>
                                                                            </div>
                                                                        </div>

                                                                        <label>Email: </label>
                                                                        <div class="form-group position-relative has-icon-left">
                                                                            <input type="email" name="email" value="{{ $patient->email }}" class="form-control" disabled>
                                                                            <div class="form-control-position">
                                                                                <i class="la la-envelope"></i>
                                                                            </div>
                                                                        </div>

                                                                        <label>Phone: </label>
                                                                        <div class="form-group position-relative has-icon-left">
                                                                            <input type="text" name="phone" value="{{ $patient->phone }}" class="form-control" disabled>
                                                                            <div class="form-control-position">
                                                                                <i class="la la-phone"></i>
                                                                            </div>
                                                                        </div>

                                                                        <label>First Name: </label>
                                                                        <div class="form-group position-relative has-icon-left">
                                                                            <input type="text" name="first_name" value="{{ $patient->first_name }}" class="form-control">
                                                                            <div class="form-control-position">
                                                                                <i class="la la-user"></i>
                                                                            </div>
                                                                        </div>

                                                                        <label>Last Name: </label>
                                                                        <div class="form-group position-relative has-icon-left">
                                                                            <input type="text" name="last_name" value="{{ $patient->last_name }}" class="form-control">
                                                                            <div class="form-control-position">
                                                                                <i class="la la-user-plus"></i>
                                                                            </div>
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
                                                                            <textarea class="form-control" rows="5" name="bio" placeholder="Enter text ...">{{ $patient->bio }}</textarea>
                                                                        </div>

                                                                        <label>Date of Birth: </label>
                                                                        <div class="form-group position-relative">
                                                                            <input type="date" class="form-control" id="dob" name="dob" value="{{ $patient->dob }}">
                                                                        </div>

                                                                        <label>Profile Picture: </label>
                                                                        <div class="form-group position-relative">
                                                                            <input type="file" class="form-control" id="image" name="image">
                                                                        </div>

                                                                        <label>Activation Status: </label>
                                                                        <div class="form-group position-relative">
                                                                            <div class="input-group">
                                                                                <div class="d-inline-block custom-control custom-radio mr-1">
                                                                                    <input type="radio" name="is_active" value="1" {{ ($patient->is_active=="1")? "checked" : "" }} class="custom-control-input" id="active1{{ $patient->id }}">
                                                                                    <label class="custom-control-label" for="active1{{ $patient->id }}">Active</label>
                                                                                </div>
                                                                                <div class="d-inline-block custom-control custom-radio mr-1">
                                                                                    <input type="radio" name="is_active" value="0" {{ ($patient->is_active=="0")? "checked" : "" }} class="custom-control-input" id="active0{{ $patient->id }}">
                                                                                    <label class="custom-control-label" for="active0{{ $patient->id }}">InActive</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <label>Verification Status: </label>
                                                                        <div class="form-group position-relative">
                                                                            <div class="input-group">
                                                                                <div class="d-inline-block custom-control custom-radio mr-1">
                                                                                    <input type="radio" name="is_verified" value="1" {{ ($patient->is_verified=="1")? "checked" : "" }} class="custom-control-input" id="verify1{{ $patient->id }}">
                                                                                    <label class="custom-control-label" for="verify1{{ $patient->id }}">Verified</label>
                                                                                </div>
                                                                                <div class="d-inline-block custom-control custom-radio mr-1">
                                                                                    <input type="radio" name="is_verified" value="0" {{ ($patient->is_verified=="0")? "checked" : "" }} class="custom-control-input" id="verify0{{ $patient->id }}">
                                                                                    <label class="custom-control-label" for="verify0{{ $patient->id }}">Unverified</label>
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
