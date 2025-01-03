<?php
    class menuA{
        public function __construct(){}
        public function main(){
            
            #require_once "views/administrador/menu/header.php";
            // require_once "views/administrador/menu/categori.php";
            #require_once "views/administrador/menu/footer.php";

            require_once "views/dashboard/modules/1_header.view.php";
            require_once "views/dashboard/modules/2_nav_lat.php";
            require_once "views/dashboard/modules/3_nav_sup.php";
            require_once "views/dashboard/modules/4_info_page.php";
            require_once "views/dashboard/modules/contenido.php";
            require_once "views/dashboard/modules/footer.php";

        }

        public  function cerrarSecion(){
            session_start();
            session_destroy();
            header("Location: ?c=menu ");
        }
    }
?>