@extends('layouts.app')

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">My Schedule</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">My Schedule</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="horz-layout-colored-controls">My Schedule</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
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
                                <form class="form form-horizontal" action="{{ route('doctor.schedule.store') }}" method="POST">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row col-8">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-4" for="session_time">Session Time</label>
                                                    <div class="col-md-8">
                                                        <select id="session_time" class="form-control custom-select" name="session_time" required>
                                                            <option selected></option>
                                                            <option value="15" @if($session_time == 15) selected @endif>15 minutes</option>
                                                            <option value="30" @if($session_time == 30) selected @endif>30 minutes</option>
                                                            <option value="45" @if($session_time == 45) selected @endif>45 minutes</option>
                                                            <option value="60" @if($session_time == 60) selected @endif>1 hour</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-4" for="gap_time">Gap Time</label>
                                                    <div class="col-md-8">
                                                        <select id="gap_time" class="form-control custom-select" name="gap_time" required>
                                                            <option selected></option>
                                                            <option value="5" @if($gap_time == 5) selected @endif>5 minutes</option>
                                                            <option value="10" @if($gap_time == 10) selected @endif>10 minutes</option>
                                                            <option value="15" @if($gap_time == 15) selected @endif>15 minutes</option>
                                                            <option value="30" @if($gap_time == 30) selected @endif>30 minutes</option>
                                                            <option value="45" @if($gap_time == 45) selected @endif>45 minutes</option>
                                                            <option value="60" @if($gap_time == 60) selected @endif>1 hour</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-section"></div>
                                        <div class="form-group">
                                            <label for="mon" class="font-medium-2 text-bold-600 ml-1">Monday</label>
                                            <div class="row d-flex align-items-center">
                                                <div class="col-md-1 ml-2">
                                                    <input type="checkbox" id="mon" name="mon" @if(isset($schedule[0]->status) && $schedule[0]->status) checked @endif class="switchery form-control" />
                                                </div>
                                               <div class="col-md-6">
                                                   @if(isset($schedule[0]) && count($schedule[0]->times))
                                                       @foreach($schedule[0]->times as $k => $time)
                                                           <div class="row mon-field mb-1" id="mon-{{$k+1}}">
                                                               <div class="col">
                                                                   <label for="field">Start Time</label>
                                                                   <input type="text" name="monStart[]" class="hasTimepicker start custom-select" placeholder="Start Time" value="{{ $time->start12() }}">
                                                               </div>
                                                               <div class="col">
                                                                   <label for="session_time">End Time</label>
                                                                   <input type="text" name="monEnd[]" class="hasTimepicker end custom-select" placeholder="End Time" value="{{ $time->end12() }}">
                                                               </div>
                                                           </div>
                                                       @endforeach
                                                   @else
                                                       <div class="row mon-field mb-1" id="mon-1">
                                                           <div class="col">
                                                               <label for="field">Start Time</label>
                                                               <input type="text" name="monStart[]" class="hasTimepicker start custom-select" placeholder="Start Time">
                                                           </div>
                                                           <div class="col">
                                                               <label for="session_time">End Time</label>
                                                               <input type="text" name="monEnd[]" class="hasTimepicker end custom-select" placeholder="End Time">
                                                           </div>
                                                       </div>
                                                   @endif
                                                   <div class="">
                                                       <button id="add-mon" type="button" class="btn btn-sm btn-icon btn-success"><i class="la la-plus"></i></button>
                                                       <button id="remove-mon" type="button" class="btn btn-sm btn-icon btn-danger"><i class="la la-minus"></i></button>
                                                   </div>
                                               </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="tue" class="font-medium-2 text-bold-600 ml-1">Tuesday</label>
                                            <div class="row d-flex align-items-center">
                                                <div class="col-md-1 ml-2">
                                                    <input type="checkbox" id="tue" name="tue" @if(isset($schedule[1]->status) && $schedule[1]->status) checked @endif class="switchery form-control" />
                                                </div>
                                               <div class="col-md-6">
                                                   @if(isset($schedule[1]) && count($schedule[1]->times))
                                                       @foreach($schedule[1]->times as $k => $time)
                                                           <div class="row tue-field mb-1" id="tue-{{$k+1}}">
                                                               <div class="col">
                                                                   <label for="field">Start Time</label>
                                                                   <input type="text" name="tueStart[]" class="hasTimepicker start custom-select" placeholder="Start Time" value="{{ $time->start12() }}">
                                                               </div>
                                                               <div class="col">
                                                                   <label for="session_time">End Time</label>
                                                                   <input type="text" name="tueEnd[]" class="hasTimepicker end custom-select" placeholder="End Time" value="{{ $time->end12() }}">
                                                               </div>
                                                           </div>
                                                       @endforeach
                                                   @else
                                                       <div class="row tue-field mb-1" id="tue-1">
                                                           <div class="col">
                                                               <label for="field">Start Time</label>
                                                               <input type="text" name="tueStart[]" class="hasTimepicker start custom-select" placeholder="Start Time">
                                                           </div>
                                                           <div class="col">
                                                               <label for="session_time">End Time</label>
                                                               <input type="text" name="tueEnd[]" class="hasTimepicker end custom-select" placeholder="End Time">
                                                           </div>
                                                       </div>
                                                   @endif
                                                   <div class="">
                                                       <button id="add-tue" type="button" class="btn btn-sm btn-icon btn-success"><i class="la la-plus"></i></button>
                                                       <button id="remove-tue" type="button" class="btn btn-sm btn-icon btn-danger"><i class="la la-minus"></i></button>
                                                   </div>
                                               </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="wed" class="font-medium-2 text-bold-600 ml-1">Wednesday</label>
                                            <div class="row d-flex align-items-center">
                                                <div class="col-md-1 ml-2">
                                                    <input type="checkbox" id="wed" name="wed" @if(isset($schedule[2]->status) && $schedule[2]->status) checked @endif class="switchery form-control" />
                                                </div>
                                               <div class="col-md-6">
                                                   @if(isset($schedule[2]) && count($schedule[2]->times))
                                                       @foreach($schedule[2]->times as $k => $time)
                                                           <div class="row wed-field mb-1" id="wed-{{$k+1}}">
                                                               <div class="col">
                                                                   <label for="field">Start Time</label>
                                                                   <input type="text" name="wedStart[]" class="hasTimepicker start custom-select" placeholder="Start Time" value="{{ $time->start12() }}">
                                                               </div>
                                                               <div class="col">
                                                                   <label for="session_time">End Time</label>
                                                                   <input type="text" name="wedEnd[]" class="hasTimepicker end custom-select" placeholder="End Time" value="{{ $time->end12() }}">
                                                               </div>
                                                           </div>
                                                       @endforeach
                                                   @else
                                                       <div class="row wed-field mb-1" id="wed-1">
                                                           <div class="col">
                                                               <label for="field">Start Time</label>
                                                               <input type="text" name="wedStart[]" class="hasTimepicker start custom-select" placeholder="Start Time">
                                                           </div>
                                                           <div class="col">
                                                               <label for="session_time">End Time</label>
                                                               <input type="text" name="wedEnd[]" class="hasTimepicker end custom-select" placeholder="End Time">
                                                           </div>
                                                       </div>
                                                   @endif
                                                   <div class="">
                                                       <button id="add-wed" type="button" class="btn btn-sm btn-icon btn-success"><i class="la la-plus"></i></button>
                                                       <button id="remove-wed" type="button" class="btn btn-sm btn-icon btn-danger"><i class="la la-minus"></i></button>
                                                   </div>
                                               </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="thu" class="font-medium-2 text-bold-600 ml-1">Thursday</label>
                                            <div class="row d-flex align-items-center">
                                                <div class="col-md-1 ml-2">
                                                    <input type="checkbox" id="thu" name="thu" @if(isset($schedule[3]->status) && $schedule[3]->status) checked @endif class="switchery form-control" />
                                                </div>
                                               <div class="col-md-6">
                                                   @if(isset($schedule[3]) && count($schedule[3]->times))
                                                       @foreach($schedule[3]->times as $k => $time)
                                                           <div class="row thu-field mb-1" id="thu-{{$k+1}}">
                                                               <div class="col">
                                                                   <label for="field">Start Time</label>
                                                                   <input type="text" name="thuStart[]" class="hasTimepicker start custom-select" placeholder="Start Time" value="{{ $time->start12() }}">
                                                               </div>
                                                               <div class="col">
                                                                   <label for="session_time">End Time</label>
                                                                   <input type="text" name="thuEnd[]" class="hasTimepicker end custom-select" placeholder="End Time" value="{{ $time->end12() }}">
                                                               </div>
                                                           </div>
                                                       @endforeach
                                                   @else
                                                       <div class="row thu-field mb-1" id="thu-1">
                                                           <div class="col">
                                                               <label for="field">Start Time</label>
                                                               <input type="text" name="thuStart[]" class="hasTimepicker start custom-select" placeholder="Start Time">
                                                           </div>
                                                           <div class="col">
                                                               <label for="session_time">End Time</label>
                                                               <input type="text" name="thuEnd[]" class="hasTimepicker end custom-select" placeholder="End Time">
                                                           </div>
                                                       </div>
                                                   @endif
                                                   <div class="">
                                                       <button id="add-thu" type="button" class="btn btn-sm btn-icon btn-success"><i class="la la-plus"></i></button>
                                                       <button id="remove-thu" type="button" class="btn btn-sm btn-icon btn-danger"><i class="la la-minus"></i></button>
                                                   </div>
                                               </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="fri" class="font-medium-2 text-bold-600 ml-1">Friday</label>
                                            <div class="row d-flex align-items-center">
                                                <div class="col-md-1 ml-2">
                                                    <input type="checkbox" id="fri" name="fri" @if(isset($schedule[4]->status) && $schedule[4]->status) checked @endif class="switchery form-control" />
                                                </div>
                                               <div class="col-md-6">
                                                   @if(isset($schedule[4]) && count($schedule[4]->times))
                                                       @foreach($schedule[4]->times as $k => $time)
                                                           <div class="row fri-field mb-1" id="fri-{{$k+1}}">
                                                               <div class="col">
                                                                   <label for="field">Start Time</label>
                                                                   <input type="text" name="friStart[]" class="hasTimepicker start custom-select" placeholder="Start Time" value="{{ $time->start12() }}">
                                                               </div>
                                                               <div class="col">
                                                                   <label for="session_time">End Time</label>
                                                                   <input type="text" name="friEnd[]" class="hasTimepicker end custom-select" placeholder="End Time" value="{{ $time->end12() }}">
                                                               </div>
                                                           </div>
                                                       @endforeach
                                                   @else
                                                       <div class="row fri-field mb-1" id="fri-1">
                                                           <div class="col">
                                                               <label for="field">Start Time</label>
                                                               <input type="text" name="friStart[]" class="hasTimepicker start custom-select" placeholder="Start Time">
                                                           </div>
                                                           <div class="col">
                                                               <label for="session_time">End Time</label>
                                                               <input type="text" name="friEnd[]" class="hasTimepicker end custom-select" placeholder="End Time">
                                                           </div>
                                                       </div>
                                                   @endif
                                                   <div class="">
                                                       <button id="add-fri" type="button" class="btn btn-sm btn-icon btn-success"><i class="la la-plus"></i></button>
                                                       <button id="remove-fri" type="button" class="btn btn-sm btn-icon btn-danger"><i class="la la-minus"></i></button>
                                                   </div>
                                               </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="sat" class="font-medium-2 text-bold-600 ml-1">Saturday</label>
                                            <div class="row d-flex align-items-center">
                                                <div class="col-md-1 ml-2">
                                                    <input type="checkbox" id="sat" name="sat" @if(isset($schedule[5]->status) && $schedule[5]->status) checked @endif class="switchery form-control" />
                                                </div>
                                               <div class="col-md-6">
                                                   @if(isset($schedule[5]) && count($schedule[5]->times))
                                                       @foreach($schedule[5]->times as $k => $time)
                                                           <div class="row sat-field mb-1" id="sat-{{$k+1}}">
                                                               <div class="col">
                                                                   <label for="field">Start Time</label>
                                                                   <input type="text" name="satStart[]" class="hasTimepicker start custom-select" placeholder="Start Time" value="{{ $time->start12(0) }}">
                                                               </div>
                                                               <div class="col">
                                                                   <label for="session_time">End Time</label>
                                                                   <input type="text" name="satEnd[]" class="hasTimepicker end custom-select" placeholder="End Time" value="{{ $time->end12() }}">
                                                               </div>
                                                           </div>
                                                       @endforeach
                                                   @else
                                                       <div class="row sat-field mb-1" id="sat-1">
                                                           <div class="col">
                                                               <label for="field">Start Time</label>
                                                               <input type="text" name="satStart[]" class="hasTimepicker start custom-select" placeholder="Start Time">
                                                           </div>
                                                           <div class="col">
                                                               <label for="session_time">End Time</label>
                                                               <input type="text" name="satEnd[]" class="hasTimepicker end custom-select" placeholder="End Time">
                                                           </div>
                                                       </div>
                                                   @endif
                                                   <div class="">
                                                       <button id="add-sat" type="button" class="btn btn-sm btn-icon btn-success"><i class="la la-plus"></i></button>
                                                       <button id="remove-sat" type="button" class="btn btn-sm btn-icon btn-danger"><i class="la la-minus"></i></button>
                                                   </div>
                                               </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="sun" class="font-medium-2 text-bold-600 ml-1">Sunday</label>
                                            <div class="row d-flex align-items-center">
                                                <div class="col-md-1 ml-2">
                                                    <input type="checkbox" id="sun" name="sun" @if(isset($schedule[6]->status) && $schedule[6]->status) checked @endif class="switchery form-control" />
                                                </div>
                                               <div class="col-md-6">
                                                   @if(isset($schedule[6]) && count($schedule[6]->times))
                                                       @foreach($schedule[6]->times as $k => $time)
                                                           <div class="row sun-field mb-1" id="sun-{{$k+1}}">
                                                               <div class="col">
                                                                   <label for="field">Start Time</label>
                                                                   <input type="text" name="sunStart[]" class="hasTimepicker start custom-select" placeholder="Start Time" value="{{ $time->start12() }}">
                                                               </div>
                                                               <div class="col">
                                                                   <label for="session_time">End Time</label>
                                                                   <input type="text" name="sunEnd[]" class="hasTimepicker end custom-select" placeholder="End Time" value="{{ $time->end12() }}">
                                                               </div>
                                                           </div>
                                                       @endforeach
                                                   @else
                                                       <div class="row sun-field mb-1" id="sun-1">
                                                           <div class="col">
                                                               <label for="field">Start Time</label>
                                                               <input type="text" name="sunStart[]" class="hasTimepicker start custom-select" placeholder="Start Time">
                                                           </div>
                                                           <div class="col">
                                                               <label for="session_time">End Time</label>
                                                               <input type="text" name="sunEnd[]" class="hasTimepicker end custom-select" placeholder="End Time">
                                                           </div>
                                                       </div>
                                                   @endif
                                                   <div class="">
                                                       <button id="add-sun" type="button" class="btn btn-sm btn-icon btn-success"><i class="la la-plus"></i></button>
                                                       <button id="remove-sun" type="button" class="btn btn-sm btn-icon btn-danger"><i class="la la-minus"></i></button>
                                                   </div>
                                               </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions text-right">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i> Update
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        $(document).ready(function() {
            let begin = $('.hasTimepicker.start');
            let end = $('.hasTimepicker.end');

            let timeOptions = {
                interval: 15,
                dropdown: true,
                minTime: new Date(0, 0, 0, 6, 0, 0),
                maxTime: new Date(0, 0, 0, 23, 0, 0),
                change: function(time) {
                }
            }

            begin.timepicker(timeOptions);

            end.timepicker(timeOptions);

            $(document).on('focus', end, function() {
                $(this).select();  // select entire text on focus
            });

            begin.on("click, focus", function () {
                $(this).select();
            });




            let addMon = $("#add-mon");
            let remMon = $("#remove-mon");
            let monClass = ".mon-field";

            let addTue = $("#add-tue");
            let remTue = $("#remove-tue");
            let tueClass = ".tue-field";

            let addWed = $("#add-wed");
            let remWed = $("#remove-wed");
            let wedClass = ".wed-field";

            let addThu = $("#add-thu");
            let remThu = $("#remove-thu");
            let thuClass = ".thu-field";

            let addFri = $("#add-fri");
            let remFri = $("#remove-fri");
            let friClass = ".fri-field";

            let addSat = $("#add-sat");
            let remSat = $("#remove-sat");
            let satClass = ".sat-field";

            let addSun = $("#add-sun");
            let remSun = $("#remove-sun");
            let sunClass = ".sun-field";

            let monCount = 0;
            let tueCount = 0;
            let wedCount = 0;
            let thuCount = 0;
            let friCount = 0;
            let satCount = 0;
            let sunCount = 0;
            let field = "";
            let maxFields =3;

            function activeButtonAdd(id) {
                if(id.includes('mon')) {
                    return addMon
                }
                else if(id.includes('tue')) {
                    return addTue
                }
                else if(id.includes('wed')) {
                    return addWed
                }
                else if(id.includes('thu')) {
                    return addThu
                }
                else if(id.includes('fri')) {
                    return addFri
                }
                else if(id.includes('sat')) {
                    return addSat
                }
                else if(id.includes('sun')) {
                    return addSun
                }
            }
            function activeButtonRem(id) {
                if(id.includes('mon')) {
                    return remMon
                }
                else if(id.includes('tue')) {
                    return remTue
                }
                else if(id.includes('wed')) {
                    return remWed
                }
                else if(id.includes('thu')) {
                    return remThu
                }
                else if(id.includes('fri')) {
                    return remFri
                }
                else if(id.includes('sat')) {
                    return remSat
                }
                else if(id.includes('sun')) {
                    return remSun
                }
            }

            function totalFields(className) {
                return $(className).length;
            }

            function addNewField(id) {
                field = $("#"+id).clone();
                field.find("input").val("");

                if(id.includes('mon')) {
                    monCount = totalFields(monClass) + 1;
                    field.attr("id", id + monCount);
                    $(monClass + ":last").after($(field));
                }
                else if(id.includes('tue')) {
                    monCount = totalFields(tueClass) + 1;
                    field.attr("id", id + tueCount);
                    $(tueClass + ":last").after($(field));
                }
                else if(id.includes('wed')) {
                    wedCount = totalFields(wedClass) + 1;
                    field.attr("id", id + wedCount);
                    $(wedClass + ":last").after($(field));
                }
                else if(id.includes('thu')) {
                    thuCount = totalFields(thuClass) + 1;
                    field.attr("id", id + thuCount);
                    $(thuClass + ":last").after($(field));
                }
                else if(id.includes('fri')) {
                    friCount = totalFields(friClass) + 1;
                    field.attr("id", id + friCount);
                    $(friClass + ":last").after($(field));
                }
                else if(id.includes('sat')) {
                    satCount = totalFields(satClass) + 1;
                    field.attr("id", id + satCount);
                    $(satClass + ":last").after($(field));
                }
                else if(id.includes('sun')) {
                    sunCount = totalFields(sunClass) + 1;
                    field.attr("id", id + sunCount);
                    $(sunClass + ":last").after($(field));
                }
            }

            function removeLastField(className) {
                if (totalFields(className) > 1) {
                    $(className + ":last").remove();
                }
            }

            function enableButtonRemove(id, className) {
                let button = activeButtonRem(id);

                if (totalFields(className) === 2) {
                    button.removeAttr("disabled");
                    button.addClass("shadow-sm");
                }
            }

            function disableButtonRemove(id, className) {
                let button = activeButtonRem(id);

                if (totalFields(className) === 1) {
                    button.attr("disabled", "disabled");
                    button.removeClass("shadow-sm");
                }
            }

            function disableButtonAdd(id, className) {
                let button = activeButtonAdd(id);
                if (totalFields(className) === maxFields) {
                    button.attr("disabled", "disabled");
                    button.removeClass("shadow-sm");
                }
            }

            function enableButtonAdd(id, className) {
                let button = activeButtonAdd(id);
                if (totalFields(className) === (maxFields - 1)) {
                    button.removeAttr("disabled");
                    button.addClass("shadow-sm");
                }
            }

            function reTimepicker() {
                begin = $('.hasTimepicker.start');
                end = $('.hasTimepicker.end');
                begin.timepicker(timeOptions);
                end.timepicker(timeOptions);
            }

            addMon.click(function() {
                addNewField('mon-1');
                reTimepicker();
                enableButtonRemove('mon-1', monClass);
                disableButtonAdd('mon-1', monClass);
            });

            remMon.click(function() {
                removeLastField(monClass);
                disableButtonRemove('mon-1', monClass);
                enableButtonAdd('mon-1', monClass);
            });

            addTue.click(function() {
                addNewField('tue-1');
                reTimepicker();
                enableButtonRemove('tue-1', tueClass);
                disableButtonAdd('tue-1', tueClass);
            });

            remTue.click(function() {
                removeLastField(tueClass);
                disableButtonRemove('tue-1', tueClass);
                enableButtonAdd('tue-1', tueClass);
            });

            addWed.click(function() {
                addNewField('wed-1');
                reTimepicker();
                enableButtonRemove('wed-1', wedClass);
                disableButtonAdd('wed-1', wedClass);
            });

            remWed.click(function() {
                removeLastField(wedClass);
                disableButtonRemove('wed-1', wedClass);
                enableButtonAdd('wed-1', wedClass);
            });

            addThu.click(function() {
                addNewField('thu-1');
                reTimepicker();
                enableButtonRemove('thu-1', thuClass);
                disableButtonAdd('thu-1', thuClass);
            });

            remThu.click(function() {
                removeLastField(thuClass);
                disableButtonRemove('thu-1', thuClass);
                enableButtonAdd('thu-1', thuClass);
            });

            addFri.click(function() {
                addNewField('fri-1');
                reTimepicker();
                enableButtonRemove('fri-1', friClass);
                disableButtonAdd('fri-1', friClass);
            });

            remFri.click(function() {
                removeLastField(friClass);
                disableButtonRemove('fri-1', friClass);
                enableButtonAdd('fri-1', friClass);
            });

            addSat.click(function() {
                addNewField('sat-1');
                reTimepicker();
                enableButtonRemove('sat-1', satClass);
                disableButtonAdd('sat-1', satClass);
            });

            remSat.click(function() {
                removeLastField(satClass);
                disableButtonRemove('sat-1', satClass);
                enableButtonAdd('sat-1', satClass);
            });

            addSun.click(function() {
                addNewField('sun-1');
                reTimepicker();
                enableButtonRemove('sun-1', sunClass);
                disableButtonAdd('sun-1', sunClass);
            });

            remSun.click(function() {
                removeLastField(sunClass);
                disableButtonRemove('sun-1', sunClass);
                enableButtonAdd('sun-1', sunClass);
            });
        });
    </script>
@endsection
