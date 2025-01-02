<?php
    
    class DataBase{

        public static function connection(){  

            $hostname = "localhost";

            $port = "3306";

            $database = "pentland"; // ajustar (nombre BD) en qa servidor de pruebas

            $username = "root";     // ajustar (usuario BD) en qa servidor de pruebas

            $password = "S3rv1t3l4dm1n//";         // ajustar (Contraseña de BD) en qa servidor de pruebas

			$pdo = new PDO("mysql:host=$hostname;port=$port;dbname=$database;charset=utf8",$username,$password);

			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $pdo;

		}

	}
    
?>
