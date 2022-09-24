@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1> Schedule</h1>
            <small> Doctor Schedule</small>
            <ol class="breadcrumb hidden-xs">
                <li><a href="{{ route('dashboard') }}"><i class="pe-7s-home"></i> Home</a></li>
                <li class="active">Doctor Schedule</li>
            </ol>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- Form controls -->
            <div class="col-sm-12">
                <div class="panel panel-bd">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">
                        <form class="col-sm-6">
                            <div class="d-flex panel panel-bd p-20">
                                <h3>Monday</h3>
                                <div class="d-flex m-l-90">
                                    <div class="m-r-15">
                                        <div class="m-r-15">
                                            <label>Start Time</label>
                                        </div>
                                        <div>
                                            <input name="" class="datepicker form-control hasDatepicker" type="time" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="m-r-15">
                                            <label>End Time</label>
                                        </div>
                                        <div>
                                            <input name="" class="datepicker form-control hasDatepicker" type="time" placeholder="" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex panel panel-bd p-20">
                                <h3>Tuesday</h3>
                                <div class="d-flex m-l-90">
                                    <div class="m-r-15">
                                        <div class="m-r-15">
                                            <label>Start Time</label>
                                        </div>
                                        <div>
                                            <input name="" class="datepicker form-control hasDatepicker" type="time" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="m-r-15">
                                            <label>End Time</label>
                                        </div>
                                        <div>
                                            <input name="" class="datepicker form-control hasDatepicker" type="time" placeholder="" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex panel panel-bd p-20">
                                <h3>Wednesday</h3>
                                <div class="d-flex m-l-90">
                                    <div class="m-r-15">
                                        <div class="m-r-15">
                                            <label>Start Time</label>
                                        </div>
                                        <div>
                                            <input name="" class="datepicker form-control hasDatepicker" type="time" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="m-r-15">
                                            <label>End Time</label>
                                        </div>
                                        <div>
                                            <input name="" class="datepicker form-control hasDatepicker" type="time" placeholder="" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex panel panel-bd p-20">
                                <h3>Thursday</h3>
                                <div class="d-flex m-l-90">
                                    <div class="m-r-15">
                                        <div class="m-r-15">
                                            <label>Start Time</label>
                                        </div>
                                        <div>
                                            <input name="" class="datepicker form-control hasDatepicker" type="time" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="m-r-15">
                                            <label>End Time</label>
                                        </div>
                                        <div>
                                            <input name="" class="datepicker form-control hasDatepicker" type="time" placeholder="" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex panel panel-bd p-20">
                                <h3>Friday</h3>
                                <div class="d-flex m-l-90">
                                    <div class="m-r-15">
                                        <div class="m-r-15">
                                            <label>Start Time</label>
                                        </div>
                                        <div>
                                            <input name="" class="datepicker form-control hasDatepicker" type="time" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="m-r-15">
                                            <label>End Time</label>
                                        </div>
                                        <div>
                                            <input name="" class="datepicker form-control hasDatepicker" type="time" placeholder="" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex panel panel-bd p-20">
                                <h3>Saturday</h3>
                                <div class="d-flex m-l-90">
                                    <div class="m-r-15">
                                        <div class="m-r-15">
                                            <label>Start Time</label>
                                        </div>
                                        <div>
                                            <input name="" class="datepicker form-control hasDatepicker" type="time" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="m-r-15">
                                            <label>End Time</label>
                                        </div>
                                        <div>
                                            <input name="" class="datepicker form-control hasDatepicker" type="time" placeholder="" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex panel panel-bd p-20">
                                <h3>Sunday</h3>
                                <div class="d-flex m-l-90">
                                    <div class="m-r-15">
                                        <div class="m-r-15">
                                            <label>Start Time</label>
                                        </div>
                                        <div>
                                            <input name="" class="datepicker form-control hasDatepicker" type="time" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="m-r-15">
                                            <label>End Time</label>
                                        </div>
                                        <div>
                                            <input name="" class="datepicker form-control hasDatepicker" type="time" placeholder="" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Consulting Time</label>
                                <select name="average_patient_time" class="form-control">
                                    <option></option>
                                    <option>15:00 min</option>
                                    <option>30:00 min</option>
                                    <option>45:00 min</option>
                                    <option>1 hour</option>
                                </select>
                            </div>

{{--                            <div class="col-sm-6 form-check">--}}
{{--                                <label>Status</label><br>--}}
{{--                                <label class="radio-inline"><input type="radio" name="is_active" value="1" >Active</label>--}}
{{--                                <label class="radio-inline">--}}
{{--                                    <input type="radio" name="is_active" value="0">Inactive</label>--}}
{{--                            </div>--}}

                            <div class="pull-right">
                                <a href="#" class="btn btn-success">Save</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- /.content -->
@endsection
