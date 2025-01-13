<?php

    /* para pruebas 
    require_once "models/DataBase.php";
    $conn = DataBase::connection();

    require_once "controllers/Dashboard.php";
    $controller = new Dashboard;
    $controller -> main();
    */ 

    ob_start();

    require_once "models/Database.php";

    if(!isset($_REQUEST['c'])){

        require_once "controllers/Landing.php";

        $controller = new Landing;

        $controller -> main();
 
    } else {

        $controller = $_REQUEST['c'];

        require_once "controllers/" . $controller . ".php";

        $controller = new $controller;

        $action  = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'main';

        call_user_func(array($controller, $action));

    }

    ob_end_flush();

    
?>