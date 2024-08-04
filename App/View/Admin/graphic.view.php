<?php include(CONFIG['public_path'] . 'header.admin.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container">
    <div class="text-center py-5">
        <p class="h2">Peso</p>
        <canvas id="weight"></canvas>
    </div>
    <div class="text-center py-5">
        <p class="h2">Porcentaje de Musculo</p>
        <canvas id="muscle_percentage"></canvas>
    </div>
    <div class="text-center py-5">
        <p class="h2">Porcentaje de Grasa</p>
        <canvas id="fat_percentage"></canvas>
    </div>
</div>

<!--Gráfico de peso-->
<script>
    // Obtener datos desde PHP (viewbag)
    var data = <?php echo json_encode(viewbag("progress")); ?>;
    
    // Extraer los valores de peso y fechas de los datos obtenidos
    var labels = data.map(d => d.progress_date);
    var weight = data.map(d => d.weight);

    // Usar map y replace para quitar el símbolo 'kg'
    var cleanWeight = weight.map(function(item) {
        return parseFloat(item.replace('kg', ''));
    });

    console.log(cleanWeight)

    // Crear el gráfico utilizando Chart.js
    var ctx = document.getElementById('weight').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Peso',
                data: cleanWeight,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<!--Gráfico de porcentaje de musculo-->
<script>
    // Obtener datos desde PHP (viewbag)
    var data = <?php echo json_encode(viewbag("progress")); ?>;

    // Extraer los valores de peso y fechas de los datos obtenidos
    var labels = data.map(d => d.progress_date);
    var muscle = data.map(d => d.muscle_percentage);

    // Usar map y replace para quitar el símbolo '%'
    var cleanMuscle = muscle.map(function(item) {
        return parseFloat(item.replace('%', ''));
    });

    // Crear el gráfico utilizando Chart.js
    var ctx = document.getElementById('muscle_percentage').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Porcentaje de Musculo',
                data: cleanMuscle,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<!--Gráfico de porcentaje de grasa-->
<script>
    // Obtener datos desde PHP (viewbag)
    var data = <?php echo json_encode(viewbag("progress")); ?>;

    // Extraer los valores de peso y fechas de los datos obtenidos
    var labels = data.map(d => d.progress_date);
    var fat = data.map(d => d.fat_percentage);

    // Usar map y replace para quitar el símbolo '%'
    var cleanFat = fat.map(function(item) {
        return parseFloat(item.replace('%', ''));
    });

    // Crear el gráfico utilizando Chart.js
    var ctx = document.getElementById('fat_percentage').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Porcentaje de Grasa',
                data: cleanFat,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<?php include(CONFIG['public_path'] . 'footer.php'); ?>