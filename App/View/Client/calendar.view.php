<?php include(CONFIG['public_path'] . 'header.client.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js"></script>
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/main.min.css' rel='stylesheet' />

<div class="container d-flex flex-column min-vh-100">
    <div class="text-center my-3">
        <label for="datePicker" class="form-label text-light">Ingrese la fecha que desea buscar</label>
        <input type="date" class="form-control text-center" id="datePicker">
    </div>
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

        var client = <?php echo json_encode(viewbag("client")); ?>;

        var title = event.map(d => d.title);
        var start = event.map(d => d.startDate);
        var end = event.map(d => d.endDate);
        var color = event.map(d => d.color);

        var pay_date = client.pay_date;
        console.log(pay_date);

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


        // Se agregan los cumpleaños repetidos
        let currentYear = new Date().getFullYear();
        let yearsToShow = 5; // Mostrar cumpleaños para los próximos 5 años

        // Se agregan las fechas de pago repetidas mensualmente
        let originalPayDate = new Date(pay_date);
        let monthsToShow = 12 * yearsToShow; // Mostrar pagos para los próximos 5 años (12 meses por año)

        for (let j = 0; j < monthsToShow; j++) {
            let payDateNextMonth = new Date(originalPayDate);
            payDateNextMonth.setMonth(originalPayDate.getMonth() + j); // Agregar j meses a la fecha original
            let formattedPayDate = formatDate(payDateNextMonth);
            
            events.push({
                title: 'Fecha de pago',
                start: formattedPayDate,
                end: formattedPayDate, // La fecha de pago es un solo día
                color: '#FF5733'
            });
        }

        // carga los eventos
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'title',
                center: '',
                right: 'prev,next today'
            },
            initialDate: `${year}-${month}-${day}`,
            editable: false,
            events: events
        });
        calendar.render();

        function addDays(dateString, days) {
            let date = new Date(dateString);
            date.setDate(date.getDate() + days);
            let year = date.getFullYear();
            let month = (date.getMonth() + 1).toString().padStart(2, '0');
            let day = date.getDate().toString().padStart(2, '0');
            return `${year}-${month}-${day}`;
        }

        function formatDate(date) {
            let year = date.getFullYear();
            let month = (date.getMonth() + 1).toString().padStart(2, '0'); // Los meses comienzan en 0
            let day = date.getDate().toString().padStart(2, '0');
            return `${year}-${month}-${day}`;
        }

        // Funcionalidad para el selector de fechas
        var datePicker = document.getElementById('datePicker');
        datePicker.addEventListener('change', function() {
            var selectedDate = this.value; // Obtiene la fecha seleccionada en formato YYYY-MM-DD
            calendar.gotoDate(selectedDate); // Mueve el calendario a la fecha seleccionada
        });

    });
</script>

<?php include(CONFIG['public_path'] . 'footer.php'); ?>