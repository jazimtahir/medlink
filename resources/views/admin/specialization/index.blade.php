@extends('layouts.app')

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">Specializations</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Specializations</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section id="specialization-index">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Specializations</h4>
                            <h4 class="card-title pull-right">
                                <button class="btn btn-outline-primary" data-toggle="modal" data-target="#specializationAdd">Add Specialization</button>
                            </h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        </div>
                        @if(session()->has('message'))
                            {!! '
                                <div class=" col-6 offset-3 alert alert-success alert-dismissible mb-2" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <strong>Success! </strong>'.session()->get('message').'
                                </div>
                            ' !!}
                        @endif
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
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Alias</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($specializations as $specialization)
                                            <tr>
                                                <td>{{ $specialization->id }}</td>
                                                <td>{{ $specialization->name }}</td>
                                                <td>{{ $specialization->alias ?? '' }}</td>
                                                <td class="btn-toolbar">
                                                    <div class="btn-group p-0">
                                                        <a class="btn btn-sm btn-outline-warning mr-1" href=""
                                                           data-toggle="modal"
                                                           data-target='#specializationEdit{{ $specialization->id }}'
                                                        >
                                                            <i class="la la-edit"></i>
                                                        </a>
                                                        <a class="btn btn-sm btn-outline-danger" href="{{ route('admin.specialization.destroy', [$specialization->id]) }}" onclick="return confirm('Are you sure?')">
                                                            <i class="la la-trash"></i>
                                                        </a>
                                                    </div>
                                                    {{--                                                edit modal--}}
                                                    <div class="modal fade text-left" id="specializationEdit{{ $specialization->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h3 class="modal-title">Edit Specialization</h3>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form method="POST" action="{{ route('admin.specialization.update', $specialization->id) }}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-body">
                                                                        <label>Name: </label>
                                                                        <div class="form-group position-relative has-icon-left">
                                                                            <input type="text" name="name" value="{{ $specialization->name }}" class="form-control">
                                                                            <div class="form-control-position">
                                                                                <i class="la la-medkit"></i>
                                                                            </div>
                                                                        </div>

                                                                        <label>Alias: </label>
                                                                        <div class="form-group position-relative has-icon-left">
                                                                            <input type="text" name="alias" value="{{ $specialization->alias }}" class="form-control">
                                                                            <div class="form-control-position">
                                                                                <i class="la la-tag"></i>
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
                            <div class="modal fade text-left" id="specializationAdd" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">Add Specialization</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="POST" action="{{ route('admin.specialization.store') }}">
                                            @csrf
                                            @method('POST')
                                            <div class="modal-body">
                                                <label>Name: </label>
                                                <div class="form-group position-relative has-icon-left">
                                                    <input type="text" name="name" class="form-control">
                                                    <div class="form-control-position">
                                                        <i class="la la-medkit"></i>
                                                    </div>
                                                </div>

                                                <label>Alias: </label>
                                                <div class="form-group position-relative has-icon-left">
                                                    <input type="text" name="alias" class="form-control">
                                                    <div class="form-control-position">
                                                        <i class="la la-tag"></i>
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
