<script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var initialLocaleCode = 'es';
            var localeSelectorEl = document.getElementById('locale-selector');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: initialLocaleCode,
                headerToolbar: {
                    left: 'prev,next today,activos,finalizados',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth',
                },

        
                customButtons: {
                    activos: {
                        text: 'Buscar activos!',
                        click: function() {
                            calendar.render();
                        }
                    },
                    finalizados: {
                        text: 'Buscar Finalizados!',
                        click: function() {
                            alert('clicked the custom button!');
                        }
                    }
                },

                buttonIcons: false, // show the prev/next text
                //Numero de Semana
                //weekNumbers: true,
                navLinks: true, // can click day/week names to navigate views
                //editable: true,
                dayMaxEvents: true, // allow "more" link when too many events

                //initialDate: '2023-01-20',
                selectable: true,
                selectMirror: true,
                select: function(arg) {
                    var title = prompt('Event Title:');
                    if (title) {
                        calendar.addEvent({
                            title: title,
                            start: arg.start,
                            end: arg.end,
                            allDay: arg.allDay
                        })
                    }
                    calendar.unselect()
                },
                eventClick: function(arg) {
                    if (confirm('Are you sure you want to delete this event?')) {
                        arg.event.remove()
                    }
                },
                //editable: true,
                //dayMaxEvents: true, // allow "more" link when too many events
                resources: [
                    { id: '1', title: 'Resource A' },
                    { id: '0', title: 'Resource B' }
                ],
                events: [
                    <?php while ($events = mysqli_fetch_array($query)) { ?>                       
                        {
                            id: '<?php echo $events["id"]; ?>',
                            title: '<?php echo $events["title"]; ?>',
                            start: '<?php echo $events["start"]; ?>',
                            end: '<?php echo $events["end"]; ?>',
                            color: '<?php echo $events["color"]; ?>',
                            colorText: '<?php echo $events["colorText"]; ?>',
                            estatus: '<?php echo $events["estatus"]; ?>',
                            resourceId:'<?php echo $events["estatus"]; ?>',

                        },

                    <?php } ?>
                ],

                // eventRender: function(info){
                //     return ['all', event.estatus].indexOf($('#selector').val()) >= 0
                // }

                
                // eventDidMount: function(info) {
                //     console.log(info.event.extendedProps.estatus);
                //     return ['all', info.event.extendedProps.estatus].indexOf($('#selector').val()) >= 0
                //     calendar.render();
                // }
              

                
            });
           

            $('#selector').on('change',function(){

                var resourceA = calendar.getResourceById('a');
                var events = resourceA.getEvents();
                var eventTitles = events.map(function(event) { return event.title });        
                
                console.log(events); // [ 'Event 1', 'Event 2' ]

            })


            calendar.render();
            calendar.setOption('locale','Es');


            
        });
    </script>