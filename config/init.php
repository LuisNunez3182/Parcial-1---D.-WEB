<?php
date_default_timezone_set('America/Bogota');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$Productos = [
    [
        "id" => 1,
        "Nombre" => "Laptop Macbook Pro 16",
        "Precio" => 4604000,
        "Imagen" => "assets/img/laptopMAC.jpg",
        "Categoria" => "Laptops",
        "Descripcion" => "GEEKOM GeekBook X14 Pro Laptop, 2.2lbs Ultra Thin 14  2.8K OLED Laptop Computer, Ultra 9 185H, 32GB LPDDR5x 7500MHz
         RAM 2TB SSD, Up to 16 Hour, 2X USB4, Fingerprint, Hub, Copilot, Windows 11 Pro Disponible",
        "ContenidoC" => "Envío disponible a Colombia con costos calculados al finalizar la compra. Entrega estimada entre 5 y 8 días hábiles. Opciones de envío exprés disponibles. Producto en stock y listo para despacho inmediato.",
        "Descripcion1" => [

            "Marca" => "GEEKOM",
            "Modelo" => "GEEKOM GeekBook X14 Pro",
            "Tamaño de pantalla" => "14 Pulgadas",
            "Color" => "GeekBook X14 Pro U9 32GB+2T",
            "Disco duro" => "2 TB",
            "CPU" => "Intel Core Ultra 9",
            "Memoria RAM" => "32 GB",
            "Sistema operativo" => "Pre-installed Windows 11 Pro",
            "Características" => "Docking Station, Pre-installed Windows 11 Pro, AI, 2.2 lbs, 0.23 inch thick, Aerospace Grade Magnesium Alloy",
            "Tarjeta gráfica" => "Integrated"

        ]

    ],

    [
        "id" => 2,
        "Nombre" => "ASUS Zenbook 14 OLED",
        "Precio" => 4791087,
        "Imagen" => "https://m.media-amazon.com/images/I/51zo9F6nAhL._AC_SX300_SY300_QL70_FMwebp_.jpg",
        "Categoria" => "Laptops",
        "Descripcion" => "ASUS Zenbook 14 OLED 2024 Laptop, Intel Core Ultra 9 285H de 16 núcleos, pantalla táctil WUXGA de 14, gráficos Intel Arc 140T, 32GB LPDDR5 1TB SSD, teclado retroiluminado, Thunderbolt 4, Wi-Fi 7",
        "ContenidoC" => "Envío disponible a Colombia con tiempos estimados de 4 a 8 días hábiles. Opción de entrega exprés disponible según ubicación. Producto en stock con despacho rápido y seguro.",
        "Descripcion1" => [
            "Marca" => "Asus",
            "Modelo" => "UX3405CA-U93WC",
            "Tamaño de pantalla" => "14 Pulgadas",
            "Color" => "Jaspe Gris",
            "Disco duro" => "1 TB",
            "CPU" => "Intel Core Ultra 9",
            "Memoria RAM" => "32 GB",
            "Sistema operativo" => "Windows 11 Home",
            "Características" => "Audio HD, Teclado retroiluminado",
            "Tarjeta gráfica" => "Dedicada"
        ]
    ],
    [
        "id" => 3,
        "Nombre" => "TOSHIBA ML-EM09PA",
        "Precio" => 254000,
        "Imagen" => "https://m.media-amazon.com/images/I/71u2ONUdUDL._AC_SY300_SX300_QL70_FMwebp_.jpg",
        "Categoria" => "Electrodomesticos",
        "Descripcion" => "TOSHIBA ML-EM09PA(SS) horno microondas pequeño con 6 menús automáticos, función de silencio y bloqueo para niños, iluminación LED, perfecto para apartamentos y dormitorios, 0.9 pies cúbicos, plato",
        "ContenidoC" => "Producto disponible para envío a Colombia. Entrega estimada entre 3 y 7 días hábiles. Incluye garantía limitada del fabricante y opciones de envío rápido. Disponible para compra inmediata.",
        "Descripcion1" => [
            "Marca" => "Toshiba",
            "Dimensiones" => "14,7\" prof. x 18,7\" an. x 10,7\" al. pulgadas",
            "Color" => "Acero inoxidable",
            "Características" => "Bloqueo de seguridad para niños, Bloqueo del panel de control, Botón de un toque, Descongelar, Temporizador",
            "Uso recomendado" => "Residencial",
            "Instalación" => "Encimera",
            "Potencia" => "900 vatios",
            "Material" => "Acero inoxidable",
            "Componentes" => "Horno de microondas, Manual de instrucciones, Tocadiscos de vidrio",
            "Control" => "Táctil"
        ]
    ],
    [
        "id" => 4,
        "Nombre" => "Laptop Lenovo ThinkPad X1 Carbon",
        "Precio" => 5380795,
        "Imagen" => "https://m.media-amazon.com/images/I/71DI+fyD8VL._AC_SX425_.jpg",
        "Categoria" => "Laptops",
        "Descripcion" => "Lenovo ThinkPad X1 Carbon Gen 13 Business AI Laptop, Intel Core Ultra 7 255U, pantalla táctil FHD+ de 14 pulgadas, DDR5 de 32 GB, SSD de 1 TB, cámara IR 1080p, huella digital, Wi-Fi 6E, Win 11 Pro",
        "ContenidoC" => "Importación disponible con envío a Colombia. Tiempo estimado de entrega entre 4 y 7 días hábiles. Opción de entrega rápida disponible. Producto con disponibilidad inmediata.",
        "Descripcion1" => [
            "Marca" => "Lenovo",
            "Modelo" => "21NY",
            "Tamaño de pantalla" => "14 Pulgadas",
            "Color" => "Negro",
            "Disco duro" => "1 TB",
            "CPU" => "Intel Mobile CPU",
            "Memoria RAM" => "32 GB",
            "Sistema operativo" => "Windows 11 Pro",
            "Características" => "Lector de huellas digitales, Teclado retroiluminado",
            "Tarjeta gráfica" => "Integrado"
        ]
    ],
    [
        "id" => 5,
        "Nombre" => "Laptop Dell XPS",
        "Precio" => 5596340,
        "Imagen" => "https://m.media-amazon.com/images/I/71Nr-5xBFvL._AC_SX679_.jpg",
        "Categoria" => "Laptops",
        "Descripcion" => "Laptop Dell XPS 13 9345, Copilot+ AI PC (13.4 FHD+ 120Hz, Snapdragon X Plus (> Intel i7-1355U), 16GB 8448MT/s RAM, 1TB SSD), delgada y ligera, 27 horas de duración de la batería, cámara web IR, Wi-Fi 7, Win 11 Pro",
        "ContenidoC" => "Envío internacional disponible hacia Colombia con seguimiento incluido. Entrega estimada entre 5 y 9 días hábiles. Opciones de envío prioritario disponibles. Producto en inventario listo para despacho.",
        "Descripcion1" => [
            "Marca" => "ist computers",
            "Modelo" => "Dell XPS 13 9345",
            "Tamaño de pantalla" => "13,4 Pulgadas",
            "Color" => "Grafito",
            "Disco duro" => "1 TB",
            "CPU" => "Snapdragon X Plus",
            "Memoria RAM" => "16 GB",
            "Sistema operativo" => "Windows 11 Pro",
            "Características" => "120 Hz, Audio HD, Lector de huellas digitales, Recubrimiento antidestellos, Teclado retroiluminado",
            "Tarjeta gráfica" => "Integrado"
        ]



    ],
    [
        "id" => 6,
        "Nombre" => "Robot aspirador ultra AI Shark AV2501S",
        "Precio" => 152500,
        "Imagen" => "assets/img/robot.jpg",
        "Categoria" => "Electrodomesticos",
        "Descripcion" => "Robot aspirador ultra AI Shark AV2501S, con Matrix Clean, mapeo doméstico, base autovaciada 
        sin bolsa HEPA de 30 días de capacidad, perfecta para pelo de mascotas, Wifi, gris oscuro ",
        "ContenidoC" => "cargos de envío e importación a Colombia Detalles 
Entrega por COP 152,689.44 el jueves, 16 de abril. Realiza el pedido en 10 hrs 16 mins
O entrega más rápida el miércoles, 15 de abril
Enviar a Colombia
Disponible",
        "Descripcion1" => [
            "Marca" => "Shark",
            "Modelo" => "AI Ultra",
            "Superficie" => "Alfombras y pisos duros",
            "Características" => "Autovaciado, pelo de mascotas, autolimpieza, sin bolsa",
            "Color" => "Gris oscuro/plateado"
        ]

    ],
    [
        "id" => 7,
        "Nombre" => "Samsung Galaxy S23 Ultra",
        "Precio" => 5596340,
        "Imagen" => "https://m.media-amazon.com/images/I/513vXUcPFrL._AC_SX679_.jpg",
        "Categoria" => "Celulares",
        "Descripcion" => "Samsung Galaxy S23 Ultra 5G, versión estadounidense, 256GB, negro fantasma - desbloqueado (renovado)",
        "ContenidoC" => "Disponible para envío a Colombia con entrega estimada entre 3 y 6 días hábiles. Opciones de envío exprés disponibles. Producto nuevo, sellado y con garantía del fabricante.",
        "Descripcion1" => [
            "Marca" => "Samsung",
            "Modelo" => "Galaxy S23 Ultra",
            "Sistema operativo" => "Android",
            "Memoria RAM" => "8 GB",
            "CPU" => "Snapdragon",
            "Velocidad CPU" => "3,36 GHz",
            "Almacenamiento" => "256 GB",
            "Tamaño de pantalla" => "6,8 Pulgadas",
            "Resolución" => "1440 x 3088",
            "Tasa de refresco" => "120 hertz"
        ]



    ],
    [
        "id" => 8,
        "Nombre" => "Apple iPhone 15 Pro,",
        "Precio" => 7596340,
        "Imagen" => "https://m.media-amazon.com/images/I/71hDhuRKjqL._AC_SX679_.jpg",
        "Categoria" => "Celulares",
        "Descripcion" => "Apple iPhone 15 Pro, 256 GB, titanio negro - Desbloqueado (Renovado)",
        "ContenidoC" => "Envío disponible a Colombia con entrega estimada entre 3 y 6 días hábiles. Producto original, nuevo y sellado. Incluye garantía del fabricante y opciones de entrega rápida.",
        "Descripcion1" => [
            "Marca" => "Apple",
            "Modelo" => "iPhone 15 Pro",
            "Sistema operativo" => "iOS 17",
            "Memoria RAM" => "8 GB",
            "CPU" => "Apple A17 Pro",
            "Velocidad CPU" => "3,78 GHz",
            "Almacenamiento" => "256 GB",
            "Tamaño de pantalla" => "6,1 Pulgadas",
            "Resolución" => "2556 × 1179",
            "Tasa de refresco" => "120 Hz"
        ]


    ],
    [
        "id" => 9,
        "Nombre" => "Google Pixel 10 - ",
        "Precio" => 3596340,
        "Imagen" => "https://m.media-amazon.com/images/I/61aU1bmGyML._AC_SX679_.jpg",
        "Categoria" => "Celulares",
        "Descripcion" => "Google Pixel 10 - Smartphone Android desbloqueado - Asistente de IA Gemini, cámara trasera triple avanzada, batería de carga rápida de más de 24 horas y pantalla Actua de 6.3 pulgadas - Índigo - 128",
        "ContenidoC" => "Disponible para envío a Colombia con entrega estimada entre 4 y 7 días hábiles. Producto nuevo, original y sellado. Incluye garantía y opciones de envío prioritario.",
        "Descripcion1" => [
            "Marca" => "Google",
            "Modelo" => "Pixel 10",
            "Estilo" => "Pixel 10 (solo teléfono)",
            "Sistema operativo" => "Android 16",
            "Memoria RAM" => "12 GB",
            "CPU" => "Google Tensor",
            "Velocidad CPU" => "3,78 GHz",
            "Almacenamiento" => "128 GB",
            "Tamaño de pantalla" => "6,3 Pulgadas",
            "Resolución" => "1080 x 2424 píxeles",
            "Tasa de refresco" => "120 Hz"
        ]

    ],
    [
        "id" => 10,
        "Nombre" => "Motorola Moto G - 2025 ",
        "Precio" => 1596340,
        "Imagen" => "https://m.media-amazon.com/images/I/8160OiLlJEL._AC_SX425_.jpg     ",
        "Categoria" => "Celulares",
        "Descripcion" => "Motorola Moto G - 2025 | Desbloqueado | Hecho para Estados Unidos | 4/128 GB | Cámara de 50 MP | Gris Bosque",
        "ContenidoC" => "Envío disponible a Colombia con entrega estimada entre 3 y 6 días hábiles. Producto nuevo, sellado y con garantía. Opciones de envío rápido disponibles.",
        "Descripcion1" => [
            "Marca" => "Motorola",
            "Modelo" => "Moto G",
            "Sistema operativo" => "Android 15",
            "Memoria RAM" => "4 GB",
            "CPU" => "Others",
            "Velocidad CPU" => "2,4 GHz",
            "Almacenamiento" => "12 GB",
            "Tamaño de pantalla" => "6,7 Pulgadas",
            "Resolución" => "HD+ (1604 × 720) | 263ppi",
            "Tasa de refresco" => "120 Hz"
        ]

    ],
    [
        "id" => 11,
        "Nombre" => "[NUEVO] MAGNIFIQUE -",
        "Precio" => 224000,
        "Imagen" => "https://m.media-amazon.com/images/I/71x1NIKmZWL._AC_SY300_SX300_QL70_FMwebp_.jpg",
        "Categoria" => "Electrodomesticos",
        "Descripcion" => "[NUEVO] MAGNIFIQUE - Olla de cocción lenta de 4 cuartos con configuración manual de calentamiento - Electrodoméstico pequeño de cocina perfecto para cenas familiares, recipiente apto para lavavajillas",
        "ContenidoC" => "Producto disponible para envío a Colombia. Entrega estimada entre 4 y 8 días hábiles. Incluye garantía básica del fabricante y opciones de envío rápido. Disponible para despacho inmediato.",
        "Descripcion1" => [
            "Marca" => "MAGNIFIQUE EXPERIENCE DELIGHT",
            "Color" => "Manual Rojo",
            "Material" => "Aluminio",
            "Dimensiones" => "11,5\" prof. x 20\" an. x 6\" al. pulgadas",
            "Capacidad" => "4 Cuartos",
            "Potencia" => "255 vatios",
            "Lavavajillas" => "Sí",
            "Voltaje" => "120 Voltios (CA)",
            "Forma" => "Oval",
            "Patrón" => "Sólido"
        ]

    ],
    [
        "id" => 12,
        "Nombre" => "Nuwave Bravo Pro Smart Air",
        "Precio" => 569200,
        "Imagen" => "https://m.media-amazon.com/images/I/71-zyTGy9kL._AC_SY300_SX300_QL70_FMwebp_.jpg",
        "Categoria" => "Electrodomesticos",
        "Descripcion" => "Nuwave Bravo Pro Smart Air Fryer - Combo de horno tostador, horno de convección Airfryer de encimera, funciones 10 en 1 con tecnología de crujiente más rápida y uniforme, 1800 W, 50-450 °F, sin PFAS",
        "ContenidoC" => "Disponible para envío a Colombia con entrega estimada entre 4 y 8 días hábiles. Producto nuevo con garantía del fabricante. Opciones de envío rápido y despacho inmediato.",
        "Descripcion1" => [
            "Marca" => "Nuwave",
            "Color" => "Negro",
            "Dimensiones" => "13\" prof. x 17,68\" an. x 9,75\" al. pulgadas",
            "Capacidad" => "21 Cuartos",
            "Características" => "Horno multifunción 10 en 1 con gran capacidad de 21 cuartos, ideal para cocinar grandes porciones. Tecnología de convección de alta y baja velocidad para resultados crujientes con hasta 90% menos aceite. Temperatura ajustable de 50 a 450 °F, temporizador hasta 24 horas y ventilador silencioso con múltiples velocidades.",
            "Voltaje" => "No especificado"
        ]

    ],
];



function estaLogueado()
{
    return isset($_SESSION['usuario']) && !empty($_SESSION['usuario']);
}
?>