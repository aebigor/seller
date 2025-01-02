<?php
// Iniciamos la sesión al inicio de la vista
session_start();

// Verificar si la sesión está activa y si el rol del usuario es 'Admin'
if (!isset($_SESSION['correo']) || !isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Admin') {
    // Si no existe sesión o el rol no es 'Admin', redirigir al login o a otra página
    header("Location: ?c=Roles&a=validate");
    exit();
}

// Si pasa la validación, continuar con la carga del dashboard del admin
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Home</title>

	<!-- Normalize V8.0.1 -->
	<link rel="stylesheet" href="assets/plantilla/dashboard/css/normalize.css">

	<!-- Bootstrap V4.3 -->
	<link rel="stylesheet" href="assets/plantilla/dashboard/css/bootstrap.min.css">

	<!-- Bootstrap Material Design V4.0 -->
	<link rel="stylesheet" href="assets/plantilla/dashboard/css/bootstrap-material-design.min.css">

	<!-- Font Awesome V5.9.0 -->
	<link rel="stylesheet" href="assets/plantilla/dashboard/css/all.css">

	<!-- Sweet Alerts V8.13.0 CSS file -->
	<link rel="stylesheet" href="assets/plantilla/dashboard/css/sweetalert2.min.css">

	<!-- Sweet Alert V8.13.0 JS file-->
	<script src="assets/plantilla/dashboard/js/sweetalert2.min.js" ></script>

	<!-- jQuery Custom Content Scroller V3.1.5 -->
	<link rel="stylesheet" href="assets/plantilla/dashboard/css/jquery.mCustomScrollbar.css">
	
	<!-- General Styles -->
	<link rel="stylesheet" href="assets/plantilla/dashboard/css/style.css">


</head>
<body>

	<!-- Main container -->
	<main class="full-box main-container">