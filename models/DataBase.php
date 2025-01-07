<?php
    
    class DataBase{

        public static function connection(){  

            $hostname = "localhost";

            $port = "3306";

            $database = "seller"; // ajustar (nombre BD) en qa servidor de pruebas

            $username = "root";     // ajustar (usuario BD) en qa servidor de pruebas

            $password = "";         // ajustar (Contraseña de BD) en qa servidor de pruebas

			$pdo = new PDO("mysql:host=$hostname;port=$port;dbname=$database;charset=utf8",$username,$password);

			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $pdo;

		}

	}
    
?>
