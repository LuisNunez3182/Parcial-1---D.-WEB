<?php
require '../config/init.php';

if (!estaLogueado()) {
    header("Location: ../public/login.php");
    exit();
}

function agregarProducto($idProducto)
{
    global $Productos;
    $productoValido = false;
    foreach ($Productos as $prod) {
        if ($prod['id'] == $idProducto) {
            $productoValido = true;
            break;
        }
    }

    if (!$productoValido) {
        $referer = $_SERVER['HTTP_REFERER'] ?? '../public/inicio.php';
        header("Location: " . $referer);
        exit();
    }

    if (!isset($_SESSION['Carrito'])) {
        $_SESSION['Carrito'] = [];
    }

    $encontrado = false;
    foreach ($_SESSION['Carrito'] as $index => $item) {
        if ($item['idProducto'] == $idProducto) {
            // Modificamos el array original usando el índice
            $_SESSION['Carrito'][$index]['cantidad'] += 1;
            $encontrado = true;
            break;
        }
    }

    if (!$encontrado) {
        $_SESSION['Carrito'][] = [
            'idProducto' => $idProducto,
            'cantidad' => 1,
        ];
    }

    $referer = $_SERVER['HTTP_REFERER'] ?? '../public/inicio.php';
    header("Location: " . $referer);
    exit();
}
function eliminarProducto($idProducto)
{
    if (isset($_SESSION['Carrito'])) {
        foreach ($_SESSION['Carrito'] as $index => $item) {
            if ($item['idProducto'] == $idProducto) {
                unset($_SESSION['Carrito'][$index]);
                break;
            }
        }
        // Reindexar el carrito después de eliminar un producto
        $_SESSION['Carrito'] = array_values($_SESSION['Carrito']);
    }

    $referer = $_SERVER['HTTP_REFERER'] ?? '../public/inicio.php';
    header("Location: " . $referer);
    exit();
}

if (isset($_GET['action'])) {
    if ($_GET['action'] === 'add' && isset($_GET['id'])) {
        agregarProducto($_GET['id']);
    }
    elseif ($_GET['action'] === 'remove' && isset($_GET['id'])) {
        eliminarProducto($_GET['id']);
    }
}
?>