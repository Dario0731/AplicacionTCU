<?php include(CONFIG['public_path'] . 'header.admin.php'); ?>

<div id='calendar'></div>
<button id="addEventButton">Añadir Evento</button>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar')
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth'
        })
        calendar.render()
    })
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            initialDate: '2024-06-12',
            editable: true,
            events: [{
                    title: 'Natación',
                    start: '2024-06-01'
                },
                {
                    title: 'Torneo de futbol',
                    start: '2024-06-07',
                    end: '2024-06-10'
                }
                // Más eventos...
            ]
        });
        calendar.render();

        document.getElementById('addEventButton').addEventListener('click', function() {
            var newEvent = {
                title: 'Entrenar equipo',
                start: '2024-06-23'
            };
            calendar.addEvent(newEvent);
        });
    });
</script>

<style>
    /* Estilo personalizado para la barra de herramientas del encabezado */
    .fc-header-toolbar {
        background-color: linear-gradient(90deg, #4b6cb7, #182848);
        border-bottom: 2px solid #ccc;
    }

    /* Estilo personalizado para los días */
    .fc-daygrid-day {
        background-color: #000;
        color: #fff;
        border: 1px solid #ddd;
    }

    /* Estilo personalizado para los eventos */
    .fc-event {
        background-color: #000;
        color: #fff;
        border: 1px solid #377bb5;
    }

    /* Estilo para cambiar el color del texto del título */
    .fc-toolbar-title {
        color: #fff;
        font-size: 20px;
        font-weight: bold;
    }
</style>