@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="header-icon"><i class="pe-7s-user-female"></i></div>
        <div class="header-title">
            <h1>Profile</h1>
            <small>User Profile</small>
            <ol class="breadcrumb hidden-xs">
                <li><a href="{{ route('dashboard') }}"><i class="pe-7s-home"></i>Home</a></li>
                <li class="active">Profile</li>
            </ol>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            {{$error}}
                            <button type="button" class="btn-close pull-right" data-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endforeach
                @endif
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <img class="img-fluid" height="100px" src="{{ $user->getImg() }}">
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-content-member">
                            <div class="pull-right">
                                <button class="btn btn-warning btn-outline m-b-5 md-trigger" data-toggle="modal" data-target="#edit-profile">Edit</button>
                            </div>
                            <h4 class="m-t-0">{{ $user->username }}</h4>
                            <p class="m-0"><i class="pe-7s-map-marker"></i>{{ $user->address }}</p>
                        </div>
                        <div class="card-content-summary">
                            <label>Bio: </label>
                            <p>{{ $user->bio }}</p>
                        </div>
                        @role('doctor')
                        <div class="card-content-summary">
                            <label>Professional Statement: </label>
                            <p>{{ $user->doctor->professional_statement }}</p>
                        </div>
                        @endrole
                    </div>
                    <div class="card-footer">
                        <div class="card-footer-stats">
                            <div>
                                @role('doctor')
                                    <p>Fee:</p><i class="fa fa-money"></i><span> {{ $user->doctor->fee }}</span>
                                @else
                                    <p>PROJECTS:</p><i class="fa fa-users"></i><span>241</span>
                                @endrole
                            </div>
                            <div>
                                <p>MESSAGES:</p><i class="fa fa-coffee"></i><span>350</span>
                            </div>
                            <div>
                                <p>Last online</p><span class="stats-small">3 days ago</span>
                            </div>
                        </div>
                        <div class="card-footer-message">
                            <h4><i class="fa fa-comments"></i> Message me</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-8">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="rating-block">
                            <h4>Average user rating</h4>
                            <h2 class="m-b-20">4.3 <small>/ 5</small></h2>
                            <button type="button" class="btn btn-success btn-sm" aria-label="Left Align">
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-success btn-sm" aria-label="Left Align">
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-success btn-sm" aria-label="Left Align">
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-default btn-sm" aria-label="Left Align">
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-default btn-sm" aria-label="Left Align">
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <h4 class="m-t-0">Rating breakdown</h4>
                        <div class="pull-left">
                            <div class="review-number"><div>5 <span class="glyphicon glyphicon-star"></span></div></div>
                            <div class="review-progress">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: 90%">
                                        <span class="sr-only">90% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-number">1</div>
                        </div>
                        <div class="pull-left">
                            <div class="review-number">
                                <div>4 <span class="glyphicon glyphicon-star"></span></div>
                            </div>
                            <div class="review-progress">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: 80%">
                                        <span class="sr-only">80% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-number">1</div>
                        </div>
                        <div class="pull-left">
                            <div class="review-number">
                                <div>3 <span class="glyphicon glyphicon-star"></span></div>
                            </div>
                            <div class="review-progress">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: 70%">
                                        <span class="sr-only">70% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-number">0</div>
                        </div>
                        <div class="pull-left">
                            <div class="review-number">
                                <div>2 <span class="glyphicon glyphicon-star"></span></div>
                            </div>
                            <div class="review-progress">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: 60%">
                                        <span class="sr-only">60% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-number">0</div>
                        </div>
                        <div class="pull-left">
                            <div class="review-number">
                                <div>1 <span class="glyphicon glyphicon-star"></span></div>
                            </div>
                            <div class="review-progress">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-violet progress-bar-striped active" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: 50%">
                                        <span class="sr-only">50% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-number">0</div>
                        </div>
                    </div>
                </div>
                <div class="review-block">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="review-block-img">
                                <img src="assets/dist/img/avatar.png" class="img-rounded" alt="">
                            </div>
                            <div class="review-block-name"><a href="#">nktailor</a></div>
                            <div class="review-block-date">January 29, 2016<br/>1 day ago</div>
                        </div>
                        <div class="col-sm-9">
                            <div class="review-block-rate">
                                <button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
                            </div>
                            <div class="review-block-title">this was nice in buy</div>
                            <div class="review-block-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type. </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="review-block-img">
                                <img src="assets/dist/img/avatar2.png" class="img-rounded" alt="">
                            </div>
                            <div class="review-block-name"><a href="#">nktailor</a></div>
                            <div class="review-block-date">January 29, 2016<br/>1 day ago</div>
                        </div>
                        <div class="col-sm-9">
                            <div class="review-block-rate">
                                <button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
                            </div>
                            <div class="review-block-title">this was nice in buy</div>
                            <div class="review-block-description">this was nice in buy. this was nice in buy. this was nice in buy. this was nice in buy this was nice in buy this was nice in buy this was nice in buy this was nice in buy</div>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="review-block-img">
                                <img src="assets/dist/img/avatar3.png" class="img-rounded" alt="">
                            </div>
                            <div class="review-block-name"><a href="#">nktailor</a></div>
                            <div class="review-block-date">January 29, 2016<br/>1 day ago</div>
                        </div>
                        <div class="col-sm-9">
                            <div class="review-block-rate">
                                <button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
                            </div>
                            <div class="review-block-title">this was nice in buy</div>
                            <div class="review-block-description">this was nice in buy. this was nice in buy. this was nice in buy. this was nice in buy this was nice in buy this was nice in buy this was nice in buy this was nice in buy</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="edit-profile" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content ">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title">Edit Profile</h4>
                    </div>
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="panel panel-bd">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" placeholder="Enter First Name" required="" name="first_name" value="{{ $user->first_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" placeholder="Enter last Name" required="" name="last_name" value="{{ $user->last_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Update Password</label>
                                        <input type="password" class="form-control" placeholder="Enter password" name="password">
                                    </div>
                                    {{--                                    <div class="form-group">--}}
                                    {{--                                        <label>Department</label>--}}
                                    {{--                                        <select class="form-control" name="select" size="1">--}}
                                    {{--                                            <option selected="" class="test">Neurology</option>--}}
                                    {{--                                            <option>Gynaecology</option>--}}
                                    {{--                                            <option>Microbiology</option>--}}
                                    {{--                                            <option>Pharmacy</option>--}}
                                    {{--                                            <option>Neonatal</option>--}}
                                    {{--                                        </select>--}}
                                    {{--                                    </div>--}}

                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control" id="address" name="address" rows="3" required="">{{ $user->address }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Image upload</label>
                                        <input type="file" name="image" id="image">
                                    </div>
                                    <div class="form-group">
                                        <label>Bio</label>
                                        <textarea id="bio" name="bio" class="form-control" rows="3" placeholder="Enter Bio ..." required="">{{ $user->bio }}</textarea>
                                    </div>
                                    @role('doctor')
                                    <div class="form-group">
                                        <label>Professional Statement</label>
                                        <textarea id="professional_statement" name="professional_statement" class="form-control" rows="3" placeholder="Enter Professional Statement ...">{{ $user->doctor->professional_statement }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Specialization</label>
                                        <select class="form-control" name="specialization_id" size="1">
                                            <option selected></option>
                                            @foreach($specialization as $s)
                                                <option @if($user->doctor->specialization && $user->doctor->specialization->name == $s->name) selected @endif class="test" value="{{ $s->id }}">{{ $s->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endrole
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input name="dob" class="datepicker form-control hasDatepicker" type="date" placeholder="Date of Birth" value="{{ $user->dob }}">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- the overlay element -->
        <div class="md-overlay"></div>
    </section> <!-- /.content -->
@endsection
