<?php
require '../config/init.php';

if (!estaLogueado()) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['delete_order']) && !empty($_GET['delete_order'])) {
    $orden_id = $_GET['delete_order'];
    foreach ($_SESSION['pedidos'] as $index => $pedido) {
        if ($pedido['id'] === $orden_id) {
            unset($_SESSION['pedidos'][$index]);
            break;
        }
    }
    $_SESSION['pedidos'] = array_values($_SESSION['pedidos']); // Re-index
    header("Location: perfil.php?msg=deleted");
    exit();
}

$user = $_SESSION['usuario'];
$pedidos = $_SESSION['pedidos'];

// Ordenar los pedidos por total de mayor a menor
usort($pedidos, function ($a, $b) {
    return $b['total'] <=> $a['total'];
});
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Techstore Colombia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="d-flex flex-column min-vh-100 bg-light">

    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand mb-0 h1" href="inicio.php">Techstore Colombia</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="d-flex gap-2 flex-column flex-lg-row ms-auto mt-3 mt-lg-0">
                    <a class="btn btn-outline-info" href="perfil.php">Mi Perfil</a>
                    <a class="btn btn-outline-light" href="../src/logout.php">Cerrar Sesión</a>
                    <a class="btn btn-outline-light" href="carrito.php">Carrito</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenedor perfil -->
    <div class="container my-5 max-w-md flex-grow-1">
        <?php if (isset($_GET['msg']) && $_GET['msg'] === 'success'): ?>
            <div class="alert alert-success fs-5">¡Tu pedido ha sido procesado exitosamente!</div>
        <?php endif; ?>
        <?php if (isset($_GET['msg']) && $_GET['msg'] === 'deleted'): ?>
            <div class="alert alert-warning">El pedido fue cancelado y eliminado de los registros.</div>
        <?php endif; ?>

        <!-- Carta de usuario-->
        <div class="card shadow-sm border-0 bg-white mb-5">
            <div class="card-body">
                <h3 class="card-title pb-3 border-bottom">Mis Datos Personales</h3>
                <div class="row pt-3">
                    <div class="col-sm-6 mb-3"><strong>Nombre:</strong> <?= htmlspecialchars($user['Nombre']) ?></div>
                    <div class="col-sm-6 mb-3"><strong>Cédula:</strong> <?= htmlspecialchars($user['Cedula']) ?></div>
                    <div class="col-sm-6 mb-3"><strong>Email:</strong> <?= htmlspecialchars($user['Email']) ?></div>
                    <div class="col-sm-6 mb-3"><strong>Celular:</strong> <?= htmlspecialchars($user['Celular']) ?></div>
                </div>
            </div>
        </div>

        <!-- Historial pedidos -->
        <h3 class="mb-4">Historial de Pedidos (Ordenados por Total)</h3>
        <?php if (empty($pedidos)): ?>
            <div class="alert alert-secondary">No tienes pedidos anteriores asociados a tu cuenta.</div>
        <?php else: ?>
            <div class="accordion" id="accordionPedidos">
                <?php foreach ($pedidos as $i => $orden): ?>
                    <div class="accordion-item shadow-sm mb-3 border-0 rounded overflow-hidden">
                        <h2 class="accordion-header" id="heading<?= $i ?>">
                            <button class="accordion-button collapsed <?php echo $i === 0 ? '' : 'collapsed' ?>" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse<?= $i ?>"
                                aria-expanded="<?php echo $i === 0 ? 'true' : 'false' ?>" aria-controls="collapse<?= $i ?>">
                                <div class="w-100 d-flex justify-content-between pe-3">
                                    <span class="fw-bold">Pedido <?= htmlspecialchars($orden['id']) ?></span>
                                    <span class="text-secondary"><?= htmlspecialchars($orden['fecha']) ?></span>
                                    <span class="text-success fw-bold">$<?= number_format($orden['total'], 0, ',', '.') ?>
                                        COP</span>
                                </div>
                            </button>
                        </h2>
                        <div id="collapse<?= $i ?>" class="accordion-collapse collapse <?php echo $i === 0 ? 'show' : '' ?>"
                            aria-labelledby="heading<?= $i ?>" data-bs-parent="#accordionPedidos">
                            <div class="accordion-body bg-light">
                                <p class="mb-3 border-bottom pb-2"><strong>Dirección de Envío:</strong>
                                    <?= htmlspecialchars($orden['direccion']) ?></p>
                                <div class="table-responsive">
                                    <table class="table table-sm text-center align-middle">
                                        <thead class="table-secondary">
                                            <tr>
                                                <th>Producto</th>
                                                <th>Precio U.</th>
                                                <th>Cant.</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($orden['productos'] as $prod): ?>
                                                <tr>
                                                    <td class="text-start fw-bold"><?= htmlspecialchars($prod['Nombre']) ?></td>
                                                    <td>$<?= number_format($prod['Precio'], 0, ',', '.') ?></td>
                                                    <td><?= $prod['cantidad'] ?></td>
                                                    <td>$<?= number_format($prod['Subtotal'], 0, ',', '.') ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-end pt-2">
                                    <a href="?delete_order=<?= $orden['id'] ?>" class="btn btn-outline-danger btn-sm">Eliminar
                                        Pedido</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Pie de pagina -->
    <footer class="bg-dark text-white text-center py-4 mt-auto w-100">
        <div class="container">
            <p class="mb-0">&copy; 2026 Techstore Colombia. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>