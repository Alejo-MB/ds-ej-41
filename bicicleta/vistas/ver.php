<?php require_once '../../modelo/bicicleta.php';
$id = $_GET['id'] ?? null;
$bicicleta = $id ? Bicicleta::obtenerPorId($id) : null;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Bicicleta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Detalle de Bicicleta</h1>

                <?php if ($bicicleta) : ?>
                    <div class="card">
                        <div class="card-body">
                            <p><strong>ID:</strong> <?php echo $bicicleta->id; ?></p>
                            <p><strong>Marca:</strong> <?php echo htmlspecialchars($bicicleta->marca); ?></p>
                            <p><strong>Modelo:</strong> <?php echo htmlspecialchars($bicicleta->modelo); ?></p>
                            <p><strong>Rodado:</strong> <?php echo $bicicleta->rodado; ?></p>
                            <p><strong>Cantidad de cambios:</strong> <?php echo $bicicleta->cantidadCambios; ?></p>
                            <p><strong>Color:</strong> <?php echo htmlspecialchars($bicicleta->color); ?></p>
                            <p><strong>Precio:</strong> $ <?php echo number_format($bicicleta->precio, 2, ',', '.'); ?></p>
                        </div>
                    </div>

                    <div class="mt-3">
                        <a href="listar.php" class="btn btn-secondary">Volver</a>
                        <a href="editar.php?id=<?php echo $bicicleta->id; ?>" class="btn btn-warning">Editar</a>
                    </div>
                <?php else : ?>
                    <div class="alert alert-danger">Bicicleta no encontrada</div>
                    <a href="listar.php" class="btn btn-secondary">Volver</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>