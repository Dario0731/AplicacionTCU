<?php include(CONFIG['public_path'] . 'header.admin.php'); ?>

<div class="container">
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

        // obtener los clientes de la BD
        var clients = <?php echo json_encode(viewbag("clients")); ?>;
        console.log(clients);

        var title = event.map(d => d.title);
        var start = event.map(d => d.startDate);
        var end = event.map(d => d.endDate);
        var color = event.map(d => d.color);

        var client_name = clients.map(c => c.name);
        var birth_day = clients.map(c => c.birth_date);
        var pay_date = clients.map(c => c.pay_date);

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

        for (let i = 0; i < birth_day.length; i++) {
            let originalDate = new Date(birth_day[i]);
            for (let j = 0; j < yearsToShow; j++) {
                let birthdayThisYear = new Date(currentYear + j, originalDate.getMonth(), originalDate.getDate());
                let formattedBirthday = formatDate(birthdayThisYear);

                events.push({
                    title: 'Cumpleaños de ' + client_name[i],
                    start: formattedBirthday,
                    end: formattedBirthday, // El cumpleaños es un solo día
                    color: '#408602'
                });
            }
        }

        // Se agregan las fechas de pago repetidas
        for (let i = 0; i < pay_date.length; i++) {
            let originalPayDate = new Date(pay_date[i]);
            for (let j = 0; j < yearsToShow; j++) {
                let payDateThisYear = new Date(currentYear + j, originalPayDate.getMonth(), originalPayDate.getDate());
                let formattedPayDate = formatDate(payDateThisYear);

                events.push({
                    title: 'Fecha de pago de ' + client_name[i],
                    start: formattedPayDate,
                    end: formattedPayDate, // La fecha de pago es un solo día
                    color: '#FF5733'
                });
            }
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