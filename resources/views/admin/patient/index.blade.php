@extends('layouts.app',  ['subheader' => 'patients', 'icon' => 'pe-7s-note2'])

@section('content')
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1> Patients List</h1>
            <small> Lists all registered patients</small>
            <ol class="breadcrumb hidden-xs">
                <li><a href="{{ route('patinet.dashboard') }}"><i class="pe-7s-home"></i> Home</a></li>
                <li class="active">Patients List</li>
            </ol>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd">
                    <div class="panel-heading">
                        <div class="btn-group">
                            <a class="btn btn-success" href="{{ route('admin.patient.create') }}"> <i class="fa fa-plus"></i> Add Patient
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="panel-header">
                                <div class="col-sm-4 col-xs-12">
                                    <div class="dataTables_length">
                                        <label>Display
                                            <select name="example_length">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> records per page</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 offset-sm-4 col-xs-12">
                                    <div class="dataTables_length">
                                        <div class="input-group custom-search-form">
                                            <input type="search" class="form-control" placeholder="search..">
                                            <span class="input-group-btn">
                                                                  <button class="btn btn-primary" type="button">
                                                                      <span class="glyphicon glyphicon-search"></span>
                                                                  </button>
                                                              </span>
                                        </div><!-- /input-group -->
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>S No.</th>
                                    <th>Image</th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Update</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $count = 0 ?>
                                    @foreach($patients as $patient)
                                        <?php $count++ ?>
                                        <tr>
                                            <td>
                                                <input type="radio" name="radioGroup">
                                                <label>{{ $count }}</label>
                                            </td>
                                            <td><img src="{{ $patient->getImg() }}" class="img-circle" alt="User Image" height="35" width="35"></td>
                                            <td>{{ $patient->username }}</td>
                                            <td>{{ $patient->first_name }}</td>
                                            <td>{{ $patient->last_name }}</td>
                                            <td>{{ $patient->email }}</td>
                                            <td>{{ $patient->phone }}</td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#ordine"><i class="fa fa-pencil"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#ordine"><i class="fa fa-trash-o"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="page-nation text-right">
                            <ul class="pagination pagination-large">
                                <li class="disabled"><span>«</span></li>
                                <li class="active"><span>1</span></li>
                                <li><a href="#">2</a></li>
                                <li class="disabled"><span>...</span></li><li>
                                <li><a rel="next" href="#">Next</a></li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section> <!-- /.content -->
    <div id="ordine" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Update Patient</h4>
                </div>
                <div class="modal-body">
                    <div class="panel panel-bd">
                        <div class="panel-body">
                            <form class="col-sm-12">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" placeholder="Enter First Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" placeholder="Enter last Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="Enter Email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Enter password" required>
                                </div>
                                <div class="form-group">
                                    <label>Designation</label>
                                    <input type="text" class="form-control" placeholder="Enter Designation" required>
                                </div>

                                <div class="form-group">
                                    <label>Department</label>
                                    <select class="form-control" name="select" size="1">
                                        <option selected class="test">Neurology</option>
                                        <option>Gynaecology</option>
                                        <option>Microbiology</option>
                                        <option>Pharmacy</option>
                                        <option>Neonatal</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" id="exampleTextarea" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="number" class="form-control" placeholder="Enter Phone number" required>
                                </div>
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="number" class="form-control" placeholder="Enter Mobile" required>
                                </div>

                                <div class="form-group">
                                    <label>Picture upload</label>
                                    <input type="file" name="picture" id="picture">
                                    <input type="hidden" name="old_picture">
                                </div>

                                <div class="form-group">
                                    <label>Short Biography</label>
                                    <textarea id="some-textarea" class="form-control" rows="6" placeholder="Enter text ..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Specialist</label>
                                    <input type="text" class="form-control" placeholder="Specialist" required>
                                </div>
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input name="date_of_birth" class="datepicker form-control hasDatepicker" type="text" placeholder="Date of Birth">
                                </div>
                                <div class="form-group">
                                    <label>Blood group</label>
                                    <select class="form-control">
                                        <option>A+</option>
                                        <option>AB+</option>
                                        <option>O+</option>
                                        <option>AB-</option>
                                        <option>B+</option>
                                        <option>A-</option>
                                        <option>B-</option>
                                        <option>O-</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Sex</label><br>
                                    <label class="radio-inline">
                                        <input type="radio" name="sex" value="1" checked="checked">Male</label>
                                    <label class="radio-inline"><input type="radio" name="sex" value="0" >Female</label>

                                </div>
                                <div class="form-check">
                                    <label>Status</label><br>
                                    <label class="radio-inline">
                                        <input type="radio" name="status" value="1" checked="checked">Active</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="status" value="0" >Inctive
                                    </label>
                                </div>

                                <div class="reset button">
                                    <a href="#" class="btn btn-primary">Reset</a>
                                    <a href="#" class="btn btn-success">Save</a>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
@endsection
