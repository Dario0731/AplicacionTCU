<?php include(CONFIG['public_path'] . 'header.admin.php'); ?>

<div class="container">
    <div class="py-3 text-end"><button id="addEventButton" class="btn btn-primary">Añadir Evento</button></div>
    <div id='calendar' class="pb-5"></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Obtener la fecha actual
        let date = new Date();
        let year = date.getFullYear();
        let month = (date.getMonth() + 1).toString().padStart(2, '0'); // Los meses comienzan en 0
        let day = date.getDate().toString().padStart(2, '0');

        // obtener los eventos de la BD
        var event = <?php echo json_encode(viewbag("events")); ?>;
        console.log(event);

        var title = event.map(d => d.title);
        var start = event.map(d => d.startDate);
        console.log(start)
        var end = event.map(d => d.endDate);
        var color = event.map(d => d.color);

        // carga los eventos
        var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title'
                },
                initialDate: `${year}-${month}-${day}`,
                editable: false,
                events: [{
                        title: title,
                        start: start[0],
                        end: end[0],
                        color: color
                    }
                    // Más eventos...
                ]
            });
            calendar.render();


        // añade un evento
        document.getElementById('addEventButton').addEventListener('click', function() {
            var newEvent = {
                title: 'Entrenar equipo',
                start: '2024-08-08',
                end: addDays('2024-08-15', 2)
            };
            calendar.addEvent(newEvent);
        });

        function addDays(dateString, days) {
            let date = new Date(dateString);
            date.setDate(date.getDate() + days);
            let year = date.getFullYear();
            let month = (date.getMonth() + 1).toString().padStart(2, '0');
            let day = date.getDate().toString().padStart(2, '0');
            return `${year}-${month}-${day}`;
        }

    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar')
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth'
        })
        calendar.render()
    })
</script>

<?php include(CONFIG['public_path'] . 'footer.php'); ?>