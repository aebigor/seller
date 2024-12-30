<?php
require_once "models/users/DataBase.php";

try {
    if (!isset($_REQUEST['c'])) {
        require_once "controller/Menu.php";
        $controller = new Menu;
        $controller->main();
    } else {
        $controllerName = $_REQUEST['c'];
        require_once "controller/" . $controllerName . ".php";
        $controller = new $controllerName;
        $action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'main';

        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            echo "Error: Acción no válida.";
        }
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>