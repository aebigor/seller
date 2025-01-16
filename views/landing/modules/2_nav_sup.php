
<nav class="navbar navbar-expand-lg bg-body-white rounded-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img class="mx-5" id="logo-servitel" src="assets/imagenes/landing/logo_servitel.png" alt="Logo"
                style="width: 100px; height: auto; margin-right: 10px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorías
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Celulares</a></li>
                        <li><a class="dropdown-item" href="#">Computadores</a></li>
                        <li><a class="dropdown-item" href="#">Equipos Usados</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Métodos de Pago</a></li>
                        <li><a class="dropdown-item" href="#">Reglas de promos</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Contacto</a>
                </li>
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active btn-bd-primary-v2 border text-white rounded-3" aria-current="page"
                        href="<?= isset($_SESSION['sesion_status']) && $_SESSION['sesion_status'] === 'ok' ? '?c=MenuA&a=log_out' : '?c=Login&a=main' ?>">
                        <?= isset($_SESSION['sesion_status']) && $_SESSION['sesion_status'] === 'ok' ? 'Cerrar sesión' : 'Registrarse / Iniciar Sesion' ?>
                    </a>
                </li>
            </ul>
<style type="text/css">
/* El contenedor del carrito y el popup */
.carrito-popup {
    background-color: white;
    padding: 15px;
    border-radius: 5px;
    width: 300px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    display: none; /* Inicialmente oculto */
    position: absolute; /* Posicionamiento absoluto */
    z-index: 9999; /* Aseguramos que se muestre por encima de otros elementos */
    max-height: 400px;
    overflow-y: auto;
}

/* Ajustes en la tabla del carrito */
#lista-carrito thead {
    background-color: #007bff;
    color: white;
}

#lista-carrito td {
    vertical-align: middle;
}

#lista-carrito img {
    max-width: 50px;
    height: auto;
}

#vaciar-carrito {
    display: block;
    margin-top: 10px;
    text-align: center;
}

/* Para el carrito al pasar el mouse */
.navbar-nav {
    position: relative;
}
</style>
<!-- El contenedor del carrito en el Navbar -->
<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    <li class="nav-item d-flex align-items-center">
        <img id="img-carrito" src="assets/img/car.svg" alt="car" style="width: 36px; height: auto;">
        <div id="total-carrito" class="ms-2">$0.00</div>
    </li>
</ul>

<!-- Modal del carrito (oculto inicialmente) -->
<div id="carrito-popup" class="carrito-popup">
    <table id="lista-carrito">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    <a href="#" id="vaciar-carrito" class="btn-3">Vaciar carrito</a>
</div>




        </div>
    </div>
</nav>