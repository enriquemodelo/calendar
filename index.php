<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="http://fullcalendar.io/js/fullcalendar-2.3.1/fullcalendar.min.js"></script>
<link rel="stylesheet" href="http://fullcalendar.io/js/fullcalendar-2.3.1/fullcalendar.min.css" />
<select id="school_selector">
  <option value="all">All</option>
  <option value="1">School 1</option>
  <option value="2">School 2</option>
</select>

<div id="mycalendar"></div>

<script>
    var initialLocaleCode = 'es';
    $('#mycalendar').fullCalendar({ 
        header: {

        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listMonth'
        },
    events: [
        {
            title: 'Event 1',
            start: '2015-05-01',
            school: '1'
        },
        {
            title: 'Event 2',
            start: '2015-05-02',
            school: '2'
        },
        {
            title: 'Event 3',
            start: '2015-05-03',
            school: '1'
        },
        {
            title: 'Event 4',
            start: '2015-05-04',
            school: '2'
        }
    ],
    // eventRender: function eventRender( event, element, view ) {
    //     return ['all', event.school].indexOf($('#school_selector').val()) >= 0
    // }
});

$('#school_selector').on('change',function(){
    $('#mycalendar').fullCalendar('rerenderEvents');
})
</script>



