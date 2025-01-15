<?php
// Iniciar la sesión al inicio de la vista
session_start();

// Verificar si la sesión está activa (si 'sesion_status' está definida)
if (isset($_SESSION['sesion_status']) && $_SESSION['sesion_status'] === 'ok') {
    // Si la sesión está activa, imprimir los datos de la sesión
    echo "<p>Bienvenido, " . $_SESSION['name'] . " " . $_SESSION['lastname'] . "</p>";
    echo "<p>Correo: " . $_SESSION['email'] . "</p>";
    echo "<p>Rol: " . $_SESSION['rol'] . "</p>";
    // Puedes imprimir más datos si los tienes en la sesión
    // Ejemplo:
    // echo "<p>ID: " . $_SESSION['id'] . "</p>";
} else {
    // Si no existe sesión activa, no hacer nada (no imprimir nada)
    // O podrías redirigir al login si lo prefieres
    echo "<p>No estás logueado. Por favor, <a href='?c=Login&a=main'>inicia sesión</a></p>";
}
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <script src="assets/plantilla/bootstrap_5.3.3/assets/js/color-modes.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors modified: Jose bohorquez">
  <meta name="generator" content="Hugo 0.122.0">
  <title>Seller</title>
  <link rel="icon" href="assets/imagenes/landing/logo_servitel.ico" type="image/x-icon">
  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/footers/">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link href="assets/plantilla/bootstrap_5.3.3/assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/b3a2e83ff1.js" crossorigin="anonymous"></script>
  <?php /*
    <!-- usu fontawesome xenito3010@evnft.com pwd abc.123. -->
    <!-- <link rel ="stylesheet" href="assets/css/registro.css" type="text/css">
    <link rel ="stylesheet" href="assets/css/categoria.css" type="text/css"> -->
    */ ?>
  <style>
    /* Estilos generales para los íconos y elementos */
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      width: 100%;
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }

    /* Estilo para el primer botón (botón base violeta) */
    .btn-bd-primary {
      --bd-violet-bg: #712cf9;
      --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

      --bs-btn-font-weight: 600;
      --bs-btn-color: var(--bs-white);
      --bs-btn-bg: var(--bd-violet-bg);
      --bs-btn-border-color: var(--bd-violet-bg);
      --bs-btn-hover-color: var(--bs-white);
      --bs-btn-hover-bg: #6528e0;
      --bs-btn-hover-border-color: #6528e0;
      --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
      --bs-btn-active-color: var(--bs-btn-hover-color);
      --bs-btn-active-bg: #5a23c8;
      --bs-btn-active-border-color: #5a23c8;
    }

    /* Estilo para el segundo botón (botón base naranja) */
    .btn-bd-primary-v2 {
      --bd-orange-bg: #fe6902;
      --bd-orange-rgb: 254, 105, 2;

      --bs-btn-font-weight: 600;
      --bs-btn-color: var(--bs-white);
      --bs-btn-bg: var(--bd-orange-bg);
      /* Color base */
      --bs-btn-border-color: var(--bd-orange-bg);
      --bs-btn-hover-color: var(--bs-white);
      --bs-btn-hover-bg: #f64d00;
      /* Un tono más oscuro de naranja para el hover */
      --bs-btn-hover-border-color: #f64d00;
      /* Borde del hover */
      --bs-btn-focus-shadow-rgb: var(--bd-orange-rgb);
      --bs-btn-active-color: var(--bs-btn-hover-color);
      --bs-btn-active-bg: #e64a00;
      /* Un color aún más oscuro para el estado activo */
      --bs-btn-active-border-color: #e64a00;

      background: linear-gradient(45deg, #fe6902, #f64d00);
      /* Degradado de naranja */
      border: 2px solid #fe6902;
    }

    .btn-bd-primary-v2:hover {
      background: linear-gradient(45deg, #f64d00, #fe6902);
      /* Degradado invertido para el hover */
      border-color: #f64d00;
    }

    .btn-bd-primary-v2:active {
      background: linear-gradient(45deg, #e64a00, #f64d00);
      /* Degradado para el estado activo */
      border-color: #e64a00;
    }

    /* **Estilo para el botón de cambiar tema (ahora a la derecha)** */
    .bd-mode-toggle {
      z-index: 1500;
      position: fixed;
      bottom: 20px;
      /* Ubicación en la parte inferior */
      right: 20px;
      /* Botón a la derecha */
    }

    /* **Resaltar el ícono de estado activo del tema** */
    .bd-mode-toggle .dropdown-menu .active .bi {
      display: block !important;
    }

    /* **Estilo para el botón de subir al inicio (ahora a la izquierda)** */
    #scrollToTopBtn {
      z-index: 1500;
      position: fixed;
      bottom: 20px;
      /* Ubicación en la parte inferior */
      left: 20px;
      /* Botón a la izquierda */
      opacity: 0;
      /* Por defecto el botón está oculto */
      transition: opacity 0.3s ease;
      /* Transición suave al aparecer */
    }

    /* **Mostrar el botón de subir al inicio cuando se hace scroll** */
    #scrollToTopBtn.show {
      opacity: 1;
      /* El botón aparece cuando se activa la clase 'show' */
    }

    /* **Estilo del ícono dentro del botón de subir** */
    #scrollToTopBtn svg {
      width: 1em;
      height: 1em;
      fill: currentColor;
    }

    /* Estilo por defecto para el logo */
    #logo-servitel {
      transition: opacity 0.3s ease-in-out;
    }

    /* Logo para el tema oscuro */
    body[data-bs-theme="dark"] #logo-servitel {
      content: url('assets/imagenes/landing/logo_servitel_dark.png');
      /* Ruta del logo oscuro */
      opacity: 1;
      /* Asegurarse de que sea completamente visible */
    }

    /* Logo para el tema claro (opcional, si tienes una imagen diferente para el claro) */
    body[data-bs-theme="light"] #logo-servitel {
      content: url('assets/imagenes/landing/logo_servitel.png');
      /* Ruta del logo claro */
      opacity: 1;
      /* Asegurarse de que sea completamente visible */
    }

    /*estilos para el carrousel*/
    #ground {
      width: 900px;
      height: 900px;
      position: absolute;
      top: 100%;
      left: 50%;
      -webkit-transform: translate(-50%, -50%) rotateX(90deg);
      transform: translate(-50%, 50%) rotatex(90deg);
      background: -webkit-radial-gradient(center center, farthest-side, #9993, transparent);

    }

    @-webkit-keyframes spin {
      from {
        -webkit-transform: rotateY(0deg);
        transform: rotateY(0deg);
      }

      to {
        -webkit-transform: rotateY(360deg);
        transform: rotateY(360deg);
      }
    }

    @keyframes spin {
      from {
        -webkit-transform: rotateY(0deg);
        transform: rotateY(0deg);
      }

      to {
        -webkit-transform: rotateY(360deg);
        transform: rotateY(360deg);
      }
    }

    @-webkit-keyframes spinRevert {
      from {
        -webkit-transform: rotateY(360deg);
        transform: rotateY(360deg);
      }

      to {
        -webkit-transform: rotateY(0deg);
        transform: rotateY(0deg);
      }
    }

    @keyframes spinRevert {
      from {
        -webkit-transform: rotateY(360deg);
        transform: rotateY(360deg);
      }

      to {
        -webkit-transform: rotateY(0deg);
        transform: rotateY(0deg);
      }
    }

    #drag-container,
    #spin-container {
      position: relative;
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      margin: auto;
      -webkit-transform-style: preserve-3d;
      transform-style: preserve-3d;
      -webkit-transform: rotateX(-10deg);
      transform: rotateX('-10deg');
    }

    #drag-container img,
    #drag-container video {
      -webkit-transform-style: preserve-3d;
      transform-style: preserve-3d;
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      line-height: 200px;
      font-size: 50px;
      text-align: center;
      -webkit-box-shadow: 0 0 8px #fff;
      box-shadow: 0 0 #fff;
      -webkit-box-reflect: below 10px linear-gradient(transparent, transparent, #0005);
    }

    #drag-container img:hover,
    #drag-container video:hover {
      -webkit-box-shadow: 0 0 15px #fff;
      box-shadow: 0 0 15px #fff;
      -webkit-box-reflect: below 10px linear-gradient(transparent, transparent, #0006);

    }

    #drag-container p {
      font-family: serif;
      position: absolute;
      padding-top: 100%;
      left: 50%;
      -webkit-transform: translate(-50%, -50%) rotateX(90deg);
      transform: translate(-50%, -50%) rotateX(90deg);
      color: #000;

    }
  </style>
</head>

<body>
  <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="check2" viewBox="0 0 16 16">
      <path
        d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
    </symbol>
    <symbol id="circle-half" viewBox="0 0 16 16">
      <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
    </symbol>
    <symbol id="moon-stars-fill" viewBox="0 0 16 16">
      <path
        d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
      <path
        d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
    </symbol>
    <symbol id="sun-fill" viewBox="0 0 16 16">
      <path
        d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
    </symbol>
  </svg>

  <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="bootstrap" viewBox="0 0 118 94">
      <title>Bootstrap</title>
      <path fill-rule="evenodd" clip-rule="evenodd"
        d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z">
      </path>
    </symbol>
    <symbol id="facebook" viewBox="0 0 16 16">
      <path
        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
    </symbol>
    <symbol id="instagram" viewBox="0 0 16 16">
      <path
        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
    </symbol>
    <symbol id="twitter" viewBox="0 0 16 16">
      <path
        d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
    </symbol>
  </svg>
  <!-- Botón para cambiar tema -->
  <div class="dropdown bd-mode-toggle">
    <button class="btn btn-sm btn-bd-primary-v2 py-2 dropdown-toggle d-flex align-items-center" id="bd-theme"
      type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Cambiar tema (automático)">
      <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
        <use href="#circle-half"></use>
      </svg>
      <span class="visually-hidden" id="bd-theme-text">Cambiar tema</span>
    </button>
    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light"
          aria-pressed="false">
          <svg class="bi me-2 opacity-50" width="1em" height="1em">
            <use href="#sun-fill"></use>
          </svg>
          Claro
        </button>
      </li>
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
          aria-pressed="false">
          <svg class="bi me-2 opacity-50" width="1em" height="1em">
            <use href="#moon-stars-fill"></use>
          </svg>
          Oscuro
        </button>
      </li>
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto"
          aria-pressed="true">
          <svg class="bi me-2 opacity-50" width="1em" height="1em">
            <use href="#circle-half"></use>
          </svg>
          Automático
        </button>
      </li>
    </ul>
  </div>
  <!-- Botón para subir al inicio -->
  <button id="scrollToTopBtn" class="btn btn-sm btn-bd-primary-v2 py-2">
    <i class="fa-solid fa-angles-up"></i>
    <span class="visually-hidden">Subir al inicio</span>
  </button>
  <script>
    // Mostrar el botón de subir al inicio cuando el usuario baja
    window.onscroll = function () {
      var scrollToTopBtn = document.getElementById("scrollToTopBtn");
      if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        scrollToTopBtn.classList.add("show");
      } else {
        scrollToTopBtn.classList.remove("show");
      }
    };

    // Función para ir al inicio al hacer click en el botón
    document.getElementById("scrollToTopBtn").addEventListener("click", function () {
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
    });
  </script>