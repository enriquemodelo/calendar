<?php
include('consultas/eventos.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/bootstrap/main.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/list/main.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/timegrid/main.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.4.2/main.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@4.4.2/main.min.css"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.25.3/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/interaction/main.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/bootstrap/main.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/locales-all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/list/main.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/luxon/main.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/moment-timezone/main.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/moment/main.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/timegrid/main.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mockjax/1.6.2/jquery.mockjax.min.js"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.4.2/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@4.4.2/main.min.js"></script> -->
    <script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js"></script>

    <!-- <script src="assets/fullcalendar/4.0.0/popper.min.js"></script>
    <script src="assets/fullcalendar/4.0.0/tooltip.min.js"></script> -->
  


    <style>
        .fc-day-grid-event .fc-content {
            white-space: normal;
        }

        .hover-end{padding:0;margin:0;font-size:75%;text-align:center;position:absolute;bottom:0;width:100%;opacity:.8}

    </style>
    <script>
        let calendar;
        let date_picker;
        let filter_option = "all";

        $(document).ready(function() {
            initCalendar();

            refresh_calendar_filter();

            event_click();
        });

        function initCalendar() {
            var calendarEl = $("#calendar").get(0);
            let today = new Date();

            calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'es',
                plugins: [
                    "interaction",
                    "dayGrid",
                    "timeGrid",
                    "list",
                    "bootstrap",
                    "moment"
                ],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'timeGridDay,timeGridWeek,dayGridMonth,listWeek'
                },
                themeSystem: "bootstrap",
                timeZone: "local",
                showNonCurrentDates: false,
                height: 900,

                defaultDate: today,
                navLinks: false,
                businessHours: false,
                editable: true,
                selectable: true,
                eventLimit: true,
                lazyFetching: true,

                views: {
                    dayGridMonth: {
                        eventLimit: 3
                    }
                },

                eventRender: function(info) {
                    // var tooltip = new Tooltip(info.el, {
                    //     title: info.event.extendedProps.estatus,
                    //     placement: 'top',
                    //     trigger: 'hover',
                    //     container: 'body'
                    // });
                    
                    if (filter_option !== "all" && info.event.extendedProps.estatus !== filter_option) {

                        return false;
                    }

                    
                },
                eventMouseEnter: function (info) {
                    info.el.title = info.event.extendedProps.descripcion;
                    

                },
                eventMouseover: function(event, jsEvent, view) {
                    $('.fc-event-inner', this).append('<div id=\"'+event.id+'\" class=\"hover-end\">'+$.fullCalendar.formatDate(event.end, 'h:mmt')+'</div>');
                },
                events: events(),

                
                
                eventClick:function(info){          
                    var id = info.event.extendedProps.estatus;

                    alert(id);
                    
                }, 

                dateClick: function(info) {
                    alert('Date: ' + info.dateStr);
                    alert('Resource ID: ' + info.resource.id);
                },


            });

            calendar.render();
        }

        function refresh_calendar_filter() {
            $(document).on("click", ".filter-container .filter", function(e) {
                filter_option = $(this).val();
                calendar.rerenderEvents();
            });
        }

        function events() {
            const startOfMonth = moment().startOf("month");

            return [
                <?php while ($events = mysqli_fetch_array($query)) { ?> {
                        id: '<?php echo $events["id"]; ?>',
                        title: '<?php echo $events["title"]; ?>',
                        descripcion: '<?php echo $events["descripcion"]; ?>',
                        start: '<?php echo $events["start"]; ?>',
                        end: '<?php echo $events["end"]; ?>',
                        color: '<?php echo $events["color"]; ?>',
                        colorText: '<?php echo $events["colorText"]; ?>',
                        estatus: '<?php echo $events["estatus"]; ?>'                        

                    },

                <?php } ?>
            ];
        }

        function event_click() {
            calendar.on("eventClick", function(calendar_event) {
                console.log(calendar_event);
            });
        }
    </script>

</head>

<body>

    <div class="container calendar-container mw-100 px-2">
        <div class="row no-gutters">
            <div class="col">
                <div id='calendar' class=""></div>
            </div>

            <div class="col-3">
                <div class="row no-gutters mt-5">
                    <div class="col-10 mx-auto filter-container">

                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio1" name="eventFilter" class="custom-control-input filter" value="all" checked="true">
                            <label class="custom-control-label" for="customRadio1">Todos</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio2" name="eventFilter" class="custom-control-input filter" value="1">
                            <label class="custom-control-label" for="customRadio2">Activos</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio3" name="eventFilter" class="custom-control-input filter" value="0">
                            <label class="custom-control-label" for="customRadio3">Finalizados</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>