@extends('admin.admin_layout')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

@section('admin-content')
    @if (Session::get('boss_id') == 1)
        <div class="container">
            <div class="row">
                <h1 class="text-center">Thống kê doanh số</h1>
            </div>

            <form autocomplete="off">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" id="datepicker" class="form-control" placeholder="Từ ngày">

                    </div>
                    <div class="col-md-4">
                        <input type="text" id="datepicker2" class="form-control" placeholder="Đến ngày">
                    </div>
                    <div class="col-md-4">
                        <img style="width: 20px;height:20px;bottom:13px;position: absolute;left:336px"
                            src="{{ asset('images/icons/caret.png') }}" alt="">
                        <select class="dashboard-filter form-control">
                            <option selected disabled>Lọc theo</option>
                            <option value="7ngay">7 ngày qua</option>
                            <option value="thangtruoc">Tháng trước</option>
                            <option value="thangnay">Tháng này</option>
                            <option value="365ngayqua">365 ngày qua</option>
                        </select>

                    </div>
                </div>

                <input style="position: relative;bottom: -15px;left: 1003px;" type="submit" id="btn-dashboard-filter"
                    class="btn btn-primary" value="Lọc kết quả">
            </form>

            <div class="row">
                <div class="col-md-12">
                    <div id="myfirstchart" style="height: 250px;position: relative;bottom:-50px"></div>
                </div>
            </div>
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

        <script>
            $(function() {
                $("#datepicker").datepicker({
                    prevText: "Tháng trước",
                    nextText: "Tháng sau",
                    dataFormart: "yy-mm-dd",
                    dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ Nhật"],
                    duration: "slow"
                });
                $("#datepicker2").datepicker({
                    prevText: "Tháng trước",
                    nextText: "Tháng sau",
                    dataFormart: "yy-mm-dd",
                    dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ Nhật"],
                    duration: "slow"
                });
            });
        </script>
        <script>
            new Morris.Line({
                // ID of the element in which to draw the chart.
                element: 'myfirstchart',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: [{
                        year: '2008',
                        value: 20
                    },
                    {
                        year: '2009',
                        value: 10
                    },
                    {
                        year: '2010',
                        value: 5
                    },
                    {
                        year: '2011',
                        value: 5
                    },
                    {
                        year: '2012',
                        value: 20
                    }
                ],
                // The name of the data record attribute that contains x-values.
                xkey: 'year',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['value'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Value']
            });
        </script>

        </div>
    @else
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
        <!-- fullCalendar -->
        <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/main.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
        <style>
            section.content {
                position: relative;
                right: 240px;
            }
        </style>
        <div class="col-md-12 text-center" style="color: #842626;">
            <h1>Lịch làm việc nhân viên</h1>
        </div>

        <body class="hold-transition sidebar-mini">
            <div class="wrapper">




                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">PCZONE</a></li>
                                        <li class="breadcrumb-item active">Lịch làm việc nhân viên</li>
                                    </ol>
                                </div>
                            </div>
                        </div><!-- /.container-fluid -->
                    </section>

                    <!-- Main content -->
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="sticky-top mb-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Chú Thích</h4>
                                            </div>
                                            <div class="card-body">
                                                <!-- the events -->
                                                <div id="external-events">
                                                    <div class="external-event bg-success">Tiệc PCZONE</div>
                                                    <div class="external-event bg-warning">Nghỉ phép</div>
                                                    <div class="external-event bg-info">Họp</div>
                                                    <div class="external-event bg-primary">Tăng ca</div>
                                                    <div class="external-event bg-danger">Ngày nghỉ</div>
                                                    <div class="checkbox">

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->

                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-9">
                                    <div class="card card-primary">
                                        <div class="card-body p-0">
                                            <!-- THE CALENDAR -->
                                            <div id="calendar"></div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </section>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->



                <!-- Control Sidebar -->
                <aside class="control-sidebar control-sidebar-dark">
                    <!-- Control sidebar content goes here -->
                </aside>
                <!-- /.control-sidebar -->
            </div>
            <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
            <!-- Bootstrap -->
            <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <!-- jQuery UI -->
            <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
            <!-- AdminLTE App -->

            <script src="{{ asset('plugins/fullcalendar/main.js') }}"></script>
            <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>

            <script>
                $(function() {

                    /* initialize the external events
                     -----------------------------------------------------------------*/
                    function ini_events(ele) {
                        ele.each(function() {

                            // create an Event Object (https://fullcalendar.io/docs/event-object)
                            // it doesn't need to have a start or end
                            var eventObject = {
                                title: $.trim($(this).text()) // use the element's text as the event title
                            }

                            // store the Event Object in the DOM element so we can get to it later
                            $(this).data('eventObject', eventObject)

                            // make the event draggable using jQuery UI
                            $(this).draggable({
                                zIndex: 1070,
                                revert: true, // will cause the event to go back to its
                                revertDuration: 0 //  original position after the drag
                            })

                        })
                    }

                    ini_events($('#external-events div.external-event'))

                    /* initialize the calendar
                     -----------------------------------------------------------------*/
                    //Date for the calendar events (dummy data)
                    var date = new Date()
                    var d = date.getDate(),
                        m = date.getMonth(),
                        y = date.getFullYear()

                    var Calendar = FullCalendar.Calendar;
                    var Draggable = FullCalendar.Draggable;

                    var containerEl = document.getElementById('external-events');
                    var checkbox = document.getElementById('drop-remove');
                    var calendarEl = document.getElementById('calendar');

                    // initialize the external events
                    // -----------------------------------------------------------------

                    new Draggable(containerEl, {
                        itemSelector: '.external-event',
                        eventData: function(eventEl) {
                            return {
                                title: eventEl.innerText,
                                backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue(
                                    'background-color'),
                                borderColor: window.getComputedStyle(eventEl, null).getPropertyValue(
                                    'background-color'),
                                textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
                            };
                        }
                    });

                    var calendar = new Calendar(calendarEl, {
                        headerToolbar: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'dayGridMonth,timeGridWeek,timeGridDay'
                        },
                        themeSystem: 'bootstrap',
                        //Random default events
                        events: [{
                                title: 'Ngày nghỉ',
                                start: new Date(y, m, 2),
                                backgroundColor: '#f56954', //red
                                borderColor: '#f56954', //red
                                allDay: true
                            },
                            {
                                title: 'Nghỉ phép 3 ngày',
                                start: new Date(y, m, 11,0),
                                end: new Date(y, m, 13 ,0),
                                backgroundColor: '#f39c12', //yellow
                                borderColor: '#f39c12',
                                allDay: true
                            },
                            {
                                title: 'Tăng ca',
                                start: new Date(y, 5, 26, 20, 0),
                                end: new Date(y, 6, 1, 21, 0),
                                allDay: true,
                                backgroundColor: '#00c0ef', //Info (aqua)
                                borderColor: '#00c0ef' //Info (aqua)
                            },
                            {
                                title: 'Họp với sếp',
                                start: new Date(y, m, d, 17, 30),
                                allDay: false,
                                backgroundColor: '#0073b7', //Blue
                                borderColor: '#0073b7' //Blue
                            },
                            {
                                title: 'Tăng ca',
                                start: new Date(y, m, d, 13, 0),
                                end: new Date(y, m, d, 14, 0),
                                allDay: true,
                                backgroundColor: '#00c0ef', //Info (aqua)
                                borderColor: '#00c0ef' //Info (aqua)
                            },
                            {
                                title: 'Tăng ca',
                                start: new Date(y, m, 20, 20, 0),
                                end: new Date(y, m, 25, 21, 0),
                                allDay: true,
                                backgroundColor: '#00c0ef', //Info (aqua)
                                borderColor: '#00c0ef' //Info (aqua)
                            },
                            {
                                title: 'PCZONE',
                                start: new Date(y, m, d + 1, 19, 0),
                                end: new Date(y, m, d + 1, 22, 30),
                                allDay: true,
                                backgroundColor: '#00a65a', //Success (green)
                                borderColor: '#00a65a' //Success (green)
                            },
                            {
                                title: 'PCZONE',
                                start: new Date(y, m, 31, 0),
                                end: new Date(y, m, d, 0),
                                allDay: true,
                                backgroundColor: '#00a65a', //Success (green)
                                borderColor: '#00a65a' //Success (green)
                            },
                            {
                                title: 'Họp online',
                                start: new Date(y, m, 28),
                                end: new Date(y, m, 29),
                                allDay: true,
                                url: 'https://www.google.com/',
                                backgroundColor: '#3c8dbc', //Primary (light-blue)
                                borderColor: '#3c8dbc' //Primary (light-blue)
                            }
                        ],
                        editable: true,
                        droppable: true, // this allows things to be dropped onto the calendar !!!
                        drop: function(info) {
                            // is the "remove after drop" checkbox checked?
                            if (checkbox.checked) {
                                // if so, remove the element from the "Draggable Events" list
                                info.draggedEl.parentNode.removeChild(info.draggedEl);
                            }
                        }
                    });

                    calendar.render();
                    $('#calendar').fullCalendar()

                    /* ADDING EVENTS */
                    var currColor = '#3c8dbc' //Red by default
                    // Color chooser button
                    $('#color-chooser > li > a').click(function(e) {
                        e.preventDefault()
                        // Save color
                        currColor = $(this).css('color')
                        // Add color effect to button
                        $('#add-new-event').css({
                            'background-color': currColor,
                            'border-color': currColor
                        })
                    })
                    $('#add-new-event').click(function(e) {
                        e.preventDefault()
                        // Get value and make sure it is not null
                        var val = $('#new-event').val()
                        if (val.length == 0) {
                            return
                        }

                        // Create events
                        var event = $('<div />')
                        event.css({
                            'background-color': currColor,
                            'border-color': currColor,
                            'color': '#fff'
                        }).addClass('external-event')
                        event.text(val)
                        $('#external-events').prepend(event)

                        // Add draggable funtionality
                        ini_events(event)

                        // Remove event from text input
                        $('#new-event').val('')
                    })
                })
            </script>
        </body>
    @endif
@endsection
