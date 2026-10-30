<?php require_once '../../modelo/bicicleta.php';
$id = $_GET['id'] ?? null;
$bicicleta = $id ? Bicicleta::obtenerPorId($id) : null;
$titulo = $bicicleta ? 'Editar Bicicleta' : 'Agregar Bicicleta';
$accion = $bicicleta ? 'editar' : 'agregar';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1><?php echo $titulo; ?></h1>

                <form method="POST" action="../acciones.php">
                    <input type="hidden" name="accion" value="<?php echo $accion; ?>">
                    <?php if ($bicicleta) : ?>
                        <input type="hidden" name="id" value="<?php echo $bicicleta->id; ?>">
                    <?php endif; ?>

                    <div class="mb-3">
                        <label class="form-label">Marca</label>
                        <input type="text" class="form-control" name="marca" value="<?php echo $bicicleta ? htmlspecialchars($bicicleta->marca) : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Modelo</label>
                        <input type="text" class="form-control" name="modelo" value="<?php echo $bicicleta ? htmlspecialchars($bicicleta->modelo) : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Rodado</label>
                        <input type="number" min="1" class="form-control" name="rodado" value="<?php echo $bicicleta ? $bicicleta->rodado : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Cantidad de cambios</label>
                        <input type="number" min="0" class="form-control" name="cantidadCambios" value="<?php echo $bicicleta ? $bicicleta->cantidadCambios : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Color</label>
                        <input type="text" class="form-control" name="color" value="<?php echo $bicicleta ? htmlspecialchars($bicicleta->color) : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Precio</label>
                        <input type="number" min="0" step="0.01" class="form-control" name="precio" value="<?php echo $bicicleta ? $bicicleta->precio : ''; ?>" required>
                    </div>

                    <div class="d-grid gap-2 d-sm-flex">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="listar.php" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>