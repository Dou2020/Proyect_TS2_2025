<?php
// Sample data for intersecciones
$intersecciones = [
    ['id' => 1, 'name' => 'Intersección 1', 'status' => 'Activo'],
    ['id' => 2, 'name' => 'Intersección 2', 'status' => 'Inactivo'],
    ['id' => 3, 'name' => 'Intersección 3', 'status' => 'Activo'],
];
?>

    <div class="container mt-5">
        <h1 class="mb-4">Lista de Intersecciones</h1>
        <div class="row">
            <?php foreach ($intersecciones as $interseccion): ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($interseccion['name']) ?></h5>
                            <p class="card-text">Estado: <?= htmlspecialchars($interseccion['status']) ?></p>
                            <a href="details.php?id=<?= urlencode($interseccion['id']) ?>" class="btn btn-primary">Ver Detalles</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>