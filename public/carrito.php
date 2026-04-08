<?php
require '../config/init.php';

if (!estaLogueado()) {
    header("Location: login.php");
    exit();
}

$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['direccion'])) {
    if (!empty($_SESSION['Carrito'])) {
        $total = 0;
        $items = [];
        foreach ($_SESSION['Carrito'] as $item) {
            foreach ($Productos as $p) {
                if ($p['id'] == $item['idProducto']) {
                    $sub = $p['Precio'] * $item['cantidad'];
                    $total += $sub;
                    $items[] = [
                        'Nombre' => $p['Nombre'],
                        'cantidad' => $item['cantidad'],
                        'Precio' => $p['Precio'],
                        'Subtotal' => $sub
                    ];
                }
            }
        }
        
        $nuevo_pedido = [
            'id' => uniqid('ORD-'),
            'fecha' => date('Y-m-d H:i:s'),
            'direccion' => htmlspecialchars($_GET['direccion']),
            'total' => $total,
            'productos' => $items
        ];

        $_SESSION['pedidos'][] = $nuevo_pedido;
        $_SESSION['Carrito'] = [];
        header("Location: perfil.php?msg=success");
        exit();
    }
    else {
        $msg = "Tu carrito está vacío.";
    }
}

$totalGral = 0;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito - Techstore Colombia</title>
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
                    <a class="btn btn-outline-light" href="inicio.php">Ir a Inicio</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenedor carrito -->
    <div class="container my-5 max-w-md flex-grow-1">
        <h2>Mi Carrito</h2>

        <?php if ($msg): ?>
        <div class="alert alert-danger">
            <?= $msg?>
        </div>
        <?php
endif; ?>

        <?php if (empty($_SESSION['Carrito'])): ?>
        <div class="alert alert-warning text-center">Tu carrito está vacío actualmente. <br> <a href="inicio.php"
                class="btn btn-primary mt-3">Comprar Productos</a></div>
        <?php
else: ?>
        <div class="table-responsive bg-white rounded shadow-sm p-4 mb-4">
            <table class="table align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Producto</th>
                        <th>Precio Unitario</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['Carrito'] as $item): ?>
                    <?php
        $prodInfo = null;
        foreach ($Productos as $p) {
            if ($p['id'] == $item['idProducto']) {
                $prodInfo = $p;
                break;
            }
        }
        if ($prodInfo):
            $subt = $prodInfo['Precio'] * $item['cantidad'];
            $totalGral += $subt;
?>
                    <tr>
                        <td class="fw-bold">
                            <?= htmlspecialchars($prodInfo['Nombre'])?>
                        </td>
                        <td>$
                            <?= number_format($prodInfo['Precio'], 0, ',', '.')?> COP
                        </td>
                        <td>
                            <?= $item['cantidad']?>
                        </td>
                        <td>$
                            <?= number_format($subt, 0, ',', '.')?> COP
                        </td>
                        <td><a href="../src/cart.php?action=remove&id=<?= $item['idProducto']?>"
                                class="btn btn-danger btn-sm">Quitar</a></td>
                    </tr>
                    <?php
        endif; ?>
                    <?php
    endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end border-0">Total a Pagar:</th>
                        <th colspan="2" class="border-0 fs-5 text-success">$
                            <?= number_format($totalGral, 0, ',', '.')?> COP
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="card shadow-sm border-0 bg-white">
            <div class="card-body">
                <h5 class="card-title mb-3">Información de Envío</h5>
                <form method="GET" action="">
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección Completa</label>
                        <input type="text" class="form-control" id="direccion" name="direccion"
                            placeholder="Ej: Calle 123 # 45-67, Bogotá" required>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-success fw-bold p-3 px-5">Confirmar Compra</button>
                    </div>
                </form>
            </div>
        </div>

        <?php
endif; ?>
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