<?php
// Dividir la cadena en partes usando la coma como delimitador
$parts = explode(",", viewbag("client_info"));

// Verificar si hay suficientes partes
$name = $parts[0] . " " . $parts[1];
$discipline = $parts[2];
$weight = $parts[3];
$height = $parts[4];
$pay_date = $parts[5];
$coments = $parts[6];
$fat = $parts[7];
$muscle = $parts[8];
$comentsClient = $parts[9];
?>
<div class="container">
    <div class="row justify-content-center pt-5">
        <p class="text-center h3">Datos completos del cliente</p>
        <form action="/AplicacionTCU/ClientManagement/insertClient" method="post" enctype="multipart/form-data">
            <div class="text-center">
                <div class="row">
                    <div class="col">
                        <div class="form-group py-2">
                            <label for="name">Nombre:</label>
                            <input value="<?= htmlspecialchars($name); ?>" type="text" class="form-control" id="discipline" name="name" value="" required readonly>
                        </div>
                        <div class="form-group py-2">
                            <label for="discipline">Disciplina:</label>
                            <input value="<?= htmlspecialchars($discipline); ?>" type="text" class="form-control" id="discipline" name="discipline" value="" required readonly>
                        </div>
                        <div class="form-group py-2">
                            <label for="weight">Peso:</label>
                            <input value="<?= htmlspecialchars($weight); ?>" type="text" class="form-control" id="weight" name="weight" value="" required readonly>
                        </div>
                        <div class="form-group py-2">
                            <label for="discipline">Altura:</label>
                            <input value="<?= htmlspecialchars($height); ?>" type="text" class="form-control" id="height" name="height" value="" required readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group py-2">
                            <label for="pay">Fecha del próximo pago:</label>
                            <input value="<?= htmlspecialchars($pay_date); ?>" type="date" class="form-control" id="pay" name="pay" value="" required readonly>
                        </div>
                        <div class="form-group py-2">
                            <label for="last_name">Comentarios personales hacia el cliente:</label>
                            <input value="<?= htmlspecialchars($coments); ?>" type="text" class="form-control" id="comments" name="comments" value="" required readonly>
                        </div>
                        <div class="form-group py-2">
                            <label for="fat">Porcentaje de grasa:</label>
                            <input type="text" class="form-control" id="discipline" name="fat" value="<?= htmlspecialchars($fat); ?>" required readonly>
                        </div>
                        <div class="form-group py-2">
                            <label for="mucle">Porcentaje de músculo:</label>
                            <input type="text" class="form-control" id="mucle" name="mucle" value="<?= htmlspecialchars($muscle); ?>" required readonly>
                        </div>
                    </div>
                    <div class="form-group py-2">
                        <label for="clients_comments">Comentarios para el cliente:</label>
                        <textarea class="form-control" id="clients_comments" name="clients_comments" required rows="3" readonly><?= htmlspecialchars($comentsClient); ?></textarea>
                    </div>
                </div>
            </div>
            <div class="text-center form-group py-2">
                <a class="btn btn-primary" href="<?= route('Admin', 'clients') ?>">Volver</a>
            </div>
        </form>
    </div>
</div>