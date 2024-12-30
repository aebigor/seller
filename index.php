<?php
<<<<<<< HEAD
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
=======
     
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
>>>>>>> eebf1585f1d5327d923bf18349c3fb68495c71f3
