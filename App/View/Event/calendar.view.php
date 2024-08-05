<?php include(CONFIG['public_path'] . 'header.admin.php'); ?>

<div class="container">
    <div id='calendar' class="p-4"></div>
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

        var title = event.map(d => d.title);
        var start = event.map(d => d.startDate);
        var end = event.map(d => d.endDate);
        var color = event.map(d => d.color);

        // Se crea y recorre el array de eventos
        var events = [];
        for (let i = 0; i < title.length; i++) {
            events.push({
                title: title[i],
                start: start[i],
                end: addDays(end[i], 2), // se le suma un dia a la fecha final
                color: color[i]
            });
        }

        // carga los eventos
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title'
            },
            initialDate: `${year}-${month}-${day}`,
            editable: false,
            events: events
        });
        calendar.render();


        // añade un evento
        document.getElementById('addEventButton').addEventListener('click', function() {
            var newEvent = {
                title: 'Entrenar equipo',
                start: '2024-05-08'
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

<?php include(CONFIG['public_path'] . 'footer.php'); ?>