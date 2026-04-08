# TechStore Colombia

Bienvenido al repositorio del proyecto **TechStore Colombia**, un sistema web desarrollado en puro PHP diseñado para gestionar el catálogo, el comercio electrónico e historial de compras internas de productos tecnológicos cumpliendo estrictas reglas de negocio y restricciones operativas enfocadas en la persistencia con variables de sesión y control de acceso.

## Estructura del Proyecto

La arquitectura del proyecto está dividida en tres módulos principales para separar las responsabilidades del sistema (Módulos de Vista, de Configuración y de Lógica Central):

```text
/
├── config/
│   └── init.php                 # Contiene la base de datos estática del catálogo de productos ($Productos) y las funciones globales básicas (como la verificación de login).
├── src/
│   ├── auth.php                 # Control de autenticación POST. Almacena temporalmente la base de datos de usuarios (con carritos e historial por defecto) y genera las sesiones.
│   ├── cart.php                 # Lógica controladora de las acciones de carrito (action=add y action=remove) a través de peticiones GET, con pre-verificación de base de datos.
│   └── logout.php               # Destruye las cookies locales y variables de la sesión borrando por completo cualquier rastro del usuario temporal.
├── public/
│   ├── assets/
│   │   └── css/                 # Contenedores de hojas estilo que dan vida a las vistas:
│   │       ├── style.css        # Estilos base, navegación, grillas de inicio de producto y el formulario de login.
│   │       └── productos.css    # Diseño especifico y refinado para el layout del contenedor 3D de información en una página de producto único.
│   ├── login.php                # Interfaz que interactúa con la lógica recabando credenciales del formulario.
│   ├── inicio.php               # Interfaz central o Catálogo, muestra tarjetas de todas las categorías disponibles y envía las señales de añadir productos.
│   ├── producto.php             # Interfaz dinámica e individual en detalle que busca imprimir los atributos visuales e informativos de un solo producto del catálogo.
│   ├── carrito.php              # Interfaz interactiva donde el usuario puede sumar totales, eliminar objetos del carrito en línea, y finalizar compras registrando su dirección.
│   └── perfil.php               # Dashboard personal del usuario que presenta su historial de pedidos en base a sesiones y sus identificaciones formales, con capacidad para cancelar (eliminar) pedidos anteriores.
└── README.md                    # Documentación actual del proyecto.
```

## Dinámica y Flujo del Sistema

Este software está enteramente orientado a ejecutarse **sin BD**, construyendo la validación, el catálogo y las operaciones sobre arreglos virtuales integrados en los códigos base como `[$Usuarios]` y `[$Productos]`. Todo el control y estado de vida de la información se perpetúan a través de interconexiones a las súper variables `$_SESSION`, por lo tanto:

- Las URLs hacen un uso riguroso y sanitizado de peticiones de método `GET` para orquestar adiciones visuales al carrito, revisiones o cancelaciones del historial sin colapsar el progreso general del lado del servidor.
- El ingreso al sistema se protege con verificadores que obligan a realizar recálculos de acceso al principio de cada vista protegida y formulario por la regla central de **Solo Usuarios Autenticados**.
- Gracias a la lógica central, el carrito de los usuarios que abandonan una vista o actúan en un formulario no es duplicado cuando éstos recargan la ventana forzosamente en su navegador.

## Autores
* Luis Ernesto Nuñez Celis
* Justin Gamarra Salas
