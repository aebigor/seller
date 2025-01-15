<?php 

	require_once "models/User.php";

	class Users
	{


		public function __construct(){}



		public function create_user()
		{

			if ($_SERVER['REQUEST_METHOD'] == 'GET') {

				require_once "models/Rol.php";
		    	
		    	$rol = new Rol;
		    	
		    	$roles = $rol->rol_read();

		    	#echo '<pre>'; print_r($user); echo '</pre>';
				require_once "views/dashboard/modules/1_header.php";
				require_once "views/dashboard/modules/2_nav_lat.php";
				require_once "views/dashboard/modules/3_nav_sup.php";
				require_once "views/dashboard/pages/new_user.php";
				require_once "views/dashboard/modules/footer.php";
			}

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$user = new User(
					null,
					$_POST['user_name'],
					$_POST['user_lastname'],
					$_POST['user_doc'],
					$_POST['user_cel'],
					$_POST['user_email'],
					sha1($_POST['user_pass']),
					$_POST['user_rol_reg']
				);

				#echo '<pre>'; print_r($user); echo '</pre>';

				$user -> user_create();

				header("Location: ?c=Users&a=read_user");
			}
		}




		public function read_user()
		{
			if ($_SERVER['REQUEST_METHOD'] == 'GET') {
				$user = new User;
				$users_all = $user -> user_read();
				#var_dump($users_all);  // Esto debería mostrar un array con los objetos de tipo Rol
		    	#echo '<pre>'; print_r($users_all); echo '</pre>';
				require_once "views/dashboard/modules/1_header.php";
				require_once "views/dashboard/modules/2_nav_lat.php";
				require_once "views/dashboard/modules/3_nav_sup.php";
				require_once "views/dashboard/pages/read_user.php";
				require_once "views/dashboard/modules/footer.php";
			}
		}




		public function update_user()
		{
			if ($_SERVER['REQUEST_METHOD'] == 'GET') {
				
				$user = new User;
		    	
		    	$user = $user -> get_user_by_id($_GET['id_user']);
		    	
		    	#echo '<pre>'; print_r($user); echo '</pre>';
		    	
		    	require_once "models/Rol.php";
		    	
		    	$rol = new Rol;
		    	
		    	$roles = $rol->rol_read();

		    	#echo '<pre>'; print_r($user); echo '</pre>';
		    	require_once "views/dashboard/modules/1_header.php";
				require_once "views/dashboard/modules/2_nav_lat.php";
				require_once "views/dashboard/modules/3_nav_sup.php";
				require_once "views/dashboard/pages/update_user.php";
				require_once "views/dashboard/modules/footer.php";
			}

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$user = new User(
					$_POST['id_user'], 
					$_POST['user_name'],
					$_POST['user_lastname'],
					$_POST['user_doc'],
					$_POST['user_cel'],
					$_POST['user_email'],
					sha1($_POST['user_pass']),
					$_POST['user_rol_reg']
				);
				#echo '<pre>'; print_r($user); echo '</pre>';
				$user->user_update();
				header("Location: ?c=Users&a=read_user");
			}
		}





		public function delete_user()
		{

			$user = new User;
			$user -> user_delete($_GET['id_user']);
			header("Location: ?c=Users&a=read_user");

		}





	}

 ?>