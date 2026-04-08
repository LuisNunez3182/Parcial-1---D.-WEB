<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Techstore Colombia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Barra de navegacion -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Techstore Colombia</span>
        </div>
    </nav>

    <!-- Login -->
    <div class="login-container">
        <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
        <div class="error-box">
            usuario o contraseña es invalida
        </div>
        <?php
endif; ?>
        <h2>Iniciar Sesión</h2>
        <form action="../src/auth.php" method="POST">
            <div class="form-group">
                <label for="username">Usuario</label>
                <input type="text" id="username" name="username" placeholder="Ingresa tu usuario" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required>
            </div>
            <button type="submit" class="btn-submit">Ingresar</button>
        </form>
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