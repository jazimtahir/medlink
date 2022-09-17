@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-tachometer"></i>
        </div>
        <div class="header-title">
            <h1> Dashboard</h1>
            <small> Dashboard features</small>
            <ol class="breadcrumb hidden-xs">
                <li><a href="{{ route('doctor.dashboard') }}"><i class="pe-7s-home"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </div>
    </section>
    <section class="content">
        @if(!auth()->user()->is_verified)
            <div class="alert alert-danger" role="alert">
                Your details are not verified yet
            </div>
        @endif
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                <div class="panel panel-bd cardbox">
                    <div class="panel-body">
                        <div class="statistic-box">
                            <h2><span class="count-number">15</span>
                            </h2>
                        </div>
                        <div class="items pull-left">
                            <i class="fa fa-bell fa-2x"></i>
                            <h4>Today Appointments </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                <div class="panel panel-bd cardbox">
                    <div class="panel-body">
                        <div class="statistic-box">
                            <h2><span class="count-number">19</span>
                            </h2>
                        </div>
                        <div class="items pull-left">
                            <i class="fa fa-user-circle fa-2x"></i>
                            <h4>Active Appointments</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                <div class="panel panel-bd cardbox">
                    <div class="panel-body">
                        <div class="statistic-box">
                            <h2><span class="count-number">05</span>
                            </h2>
                        </div>
                        <div class="items pull-left">
                            <i class="fa fa-times-circle fa-2x"></i>
                            <h4>Canceled Appointments</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                <div class="panel panel-bd cardbox">
                    <div class="panel-body">
                        <div class="statistic-box">
                            <h2><span class="count-number">9</span>
                            </h2>
                        </div>
                        <div class="items pull-left">
                            <i class="fa fa-refresh fa-2x"></i>
                            <h4>Total Appointments</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="panel panel-bd">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Today Appointments </h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>63</td>
                                    <td>2011/07/25</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>Ashton Cox</td>
                                    <td>Junior Technical Author</td>
                                    <td>San Francisco</td>
                                    <td>66</td>
                                    <td>2009/01/12</td>
                                    <td>$86,000</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- /.row -->
    </section>

@endsection
