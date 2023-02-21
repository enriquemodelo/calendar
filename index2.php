<link href="assets/fullcalendar/lib2/main.css" rel="stylesheet" />
<script src="assets/fullcalendar/lib2/main.js"></script>
<?php include('consultas/eventos.php'); ?>
<select id="school_selector">
    <option value="all">All</option>
    <option value="1">School 1</option>
    <option value="2">School 2</option>
</select>

<div id="calendar"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },

            views: {
                dayGridMonth: {
                    buttonText: "Mes",
                },
                timeGridWeek: {
                    buttonText: "Semana",
                },
                timeGridDay: {
                    buttonText: "Día",
                },
                listMonth: {
                    buttonText: "Lista",
                },
                timeGrid: {
                    dayMaxEventRows: 4 // ajustar a 4 solo para timeGridWeek / timeGridDay
                },
            },
            navLinks: true, // cun clic en los nombres de día / semana para navegar por las vistas
            businessHours: true, // mostrar el horario comercial
            editable: true,
            selectable: true,
            initialView: 'dayGridMonth',




            /* ---------------- eventos que se muestran en el calendario ---------------- */
            events: [
                <?php while ($events = mysqli_fetch_array($query)) { ?> {
                        id: '<?php echo $events["id"]; ?>',
                        title: '<?php echo $events["title"]; ?>',
                        start: '<?php echo $events["start"]; ?>',
                        end: '<?php echo $events["end"]; ?>',
                        color: '<?php echo $events["color"]; ?>',
                        colorText: '<?php echo $events["colorText"]; ?>',
                        estatus: '<?php echo $events["estatus"]; ?>',
                        resourceId: '<?php echo $events["estatus"]; ?>',

                    },

                <?php } ?>
            ],

            


            /* --- al dar click en una fecha se muestra modal para agregar un eventos --- */
            dateClick: function(info, selectionInfo) {



            },

        });
        calendar.setOption('locale', 'Es');
        calendar.render();

        /* ---------------------- accion para agregar un evento --------------------- */






    });
</script>