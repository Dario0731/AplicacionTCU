<?php include(CONFIG['public_path'] . 'header.admin.php'); ?>


<div class="container p-4">
    <div class="" style="height: 100%;">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th class="text-center">Fecha de registro</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Peso</th>
                    <th class="text-center">Altura</th>
                    <th class="text-center">comentarios personales</th>
                    <th class="text-center">Disciplina(s)</th>
                    <th class="text-center">Porcentaje de grasa</th>
                    <th class="text-center">Porcentaje de músculo</th>
                    <th class="text-center">Comentarios al cliente</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (is_array(viewbag("clientes"))) : ?>
                    <?php foreach (viewbag("clientes") as $cliente) : ?>
                        <tr id="cliente-<?= $cliente['progress_id'] ?>">
                            <td class="text-center"><?= $cliente['progress_date'] ?></td>
                            <td class="text-center"><?= $cliente['name'] . ' ' . $cliente['last_name'] ?></td>
                            <td class="text-center"><?= htmlspecialchars($cliente['weight']) ?></td>
                            <td class="text-center"><?= htmlspecialchars($cliente['height']) ?></td>
                            <td class="text-center"><?= htmlspecialchars($cliente['comments']) ?></td>
                            <td class="text-center"><?= htmlspecialchars($cliente['discipline']) ?></td>
                            <td class="text-center"><?= htmlspecialchars($cliente['fat_percentage']) ?></td>
                            <td class="text-center"><?= htmlspecialchars($cliente['muscle_percentage']) ?></td>
                            <td class="text-center"><?= htmlspecialchars($cliente['client_comments']) ?></td>
                            <td class="text-center">
                                <button type="button" class="btn delete-btn" data-id="<?= $cliente['progress_id'] ?>"><img src="<?= CONFIG['assets'] ?>img/delete-icon.svg" alt="icono de eliminar al cliente" style="height: 20px;"></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="10" class="text-white">No hay datos disponibles</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
