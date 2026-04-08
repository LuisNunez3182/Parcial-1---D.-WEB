<?php require '../config/init.php';
if (!estaLogueado()) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techstore Colombia</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>


<body class="d-flex flex-column min-vh-100">

    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="inicio.php">Techstore Colombia</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="d-flex gap-2 flex-column flex-lg-row ms-auto mt-3 mt-lg-0">
                    <a class="btn btn-outline-info" href="perfil.php">Mi Perfil</a>
                    <a class="btn btn-outline-light" href="carrito.php">Carrito</a>
                    <a class="btn btn-outline-light" href="../src/logout.php">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Banner -->
    <div class="banner mb-4">
        <img src="assets/img/Banner1.jpg" alt="Promociones y Catálogo" class="img-fluid w-100"
            style="object-fit: cover; max-height: 350px;">
    </div>

    <!-- Contenedor productos -->
    <div class="product-container container my-5 flex-grow-1">
        <h2 class="mb-5 text-center">Nuestros Productos</h2>

        <?php
// Agrupar productos por categoría
$productosPorCategoria = [];

foreach ($Productos as $prod) {
    $cat = $prod['Categoria'];

    if (!isset($productosPorCategoria[$cat])) {
        $productosPorCategoria[$cat] = [];
    }

    $productosPorCategoria[$cat][] = $prod;
}
?>

        <?php foreach ($productosPorCategoria as $categoria => $prods): ?>

        <h3 class="mt-4 mb-3 border-bottom pb-2 text-secondary">
            <?= htmlspecialchars($categoria)?>
        </h3>

        <div class="row g-4 mb-5">

            <?php foreach ($prods as $prod): ?>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3">

                <div class="card h-100 shadow-sm border-0">

                    <!-- Imagen -->
                    <a href="producto.php?id=<?= $prod['id']?>">
                        <img src="<?= htmlspecialchars($prod['Imagen'])?>" class="card-img-top"
                            style="height: 200px; object-fit: cover;">
                    </a>

                    <!-- Contenido -->
                    <div class="card-body d-flex flex-column">

                        <h5 class="card-title text-truncate" title="<?= htmlspecialchars($prod['Nombre'])?>">
                            <?= htmlspecialchars($prod['Nombre'])?>
                        </h5>

                        <p class="card-text text-success fw-bold fs-5">
                            $
                            <?= number_format($prod['Precio'], 0, ',', '.')?> COP
                        </p>

                        <div class="mt-auto">
                            <a href="../src/cart.php?action=add&id=<?= $prod['id']?>"
                                class="btn btn-primary w-100 fw-bold pb-2 pt-2">+
                                Añadir al Carrito</a>
                        </div>

                    </div>
                </div>

            </div>

            <?php
    endforeach; ?>

        </div>

        <?php
endforeach; ?>

    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4 mt-auto w-100">
        <div class="container">
            <p class="mb-0">&copy; 2026 Techstore Colombia. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>