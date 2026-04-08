<?php require '../config/init.php';
$Usuarios = [
    [
        "Nombre" => "Luis",
        "Contraseña" => "1234",
        "Cedula" => "104343187",
        "Email" => "luis@example.com",
        "Celular" => "301 8113711",
        "Carrito" => [],
        "pedidos" => []
    ],
    [
        "Nombre" => "Saray",
        "Contraseña" => "1234",
        "Cedula" => "33343387",
        "Email" => "saray@example.com",
        "Celular" => "302 8123451",
        "Carrito" => [
            [
                'idProducto' => 2,
                'cantidad' => 1
            ]
        ],
        "pedidos" => [
            [
                'id' => 'ORD-EJEMPLO-1234',
                'fecha' => '2026-04-06 14:30:00',
                'direccion' => 'Avenida Principal 45, Medellín',
                'total' => 254000,
                'productos' => [
                    [
                        'Nombre' => 'TOSHIBA ML-EM09PA',
                        'cantidad' => 1,
                        'Precio' => 254000,
                        'Subtotal' => 254000
                    ]
                ]
            ]
        ]
    ]
];
if (!isset($_SESSION['Carrito']))
    $_SESSION['Carrito'] = [];
if (!isset($_SESSION['pedidos']))
    $_SESSION['pedidos'] = [];

$nombre = trim($_POST['username'] ?? '');
$cons = $_POST['password'] ?? '';

$loginValido = false;
foreach ($Usuarios as $usuario) {
    if ($usuario['Nombre'] === $nombre && $usuario['Contraseña'] === $cons) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['Carrito'] = $usuario['Carrito'];
        $_SESSION['pedidos'] = $usuario['pedidos'];
        $loginValido = true;
        break;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($loginValido) {
        header("Location: ../public/inicio.php");
        exit();
    }
    else {
        header("Location: ../public/login.php?error=1");
        exit();
    }
}
?>