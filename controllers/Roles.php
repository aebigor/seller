<?php

    
    require_once "models/Rol.php";

    
    class Roles 
    {
<<<<<<< HEAD
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            #require_once "views/usuario/registro/header.php";
            #require_once "views/usuario/registro/footer.php";
            #require_once "views/usuario/registro/encabezado.php";
            require_once "views/registry/registry.view.php";
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Verificar si todos los datos necesarios están presentes
            if (isset($_POST['nombre'], $_POST['apellidos'], $_POST['correo'], $_POST['passCorreo'])) {
                $usuario = 'Usuario'; // Asigna el rol de usuario automáticamente
                $rol = new Rol(
                    $_POST['nombre'],
                    $_POST['apellidos'],
                    $_POST['correo'],
                    $_POST['passCorreo'],
                    $_POST['usuario'] = $usuario
                );
                // Mostrar datos recibidos para verificar 
                // print_r($_POST);
                // // Mostrar datos de la instancia de Rol para verificar
                // print_r($rol);
                // Intentar crear el rol en la base de datos
                try {
                    $rol->createRol();
                    header("Location: ?c=Roles&a=validate");
                } catch (Exception $e) {
                    echo "Error al crear el rol: " . $e->getMessage();
                }
            } else {
                echo "Por favor, complete todos los campos del formulario.";
            }
        }
    }

            public function createRolVendedor(){
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    require_once "views/vendedor/registroV/header.php";
                    require_once "views/vendedor/registroV/footer.php";
                    require_once "views/vendedor/registroV/encabezado.php";
                } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Verificar si todos los datos necesarios están presentes
                    if (isset($_POST['nombre'], $_POST['apellidos'], $_POST['correo'], $_POST['passCorreo'])) {
                        $usuario = 'Vendedor'; // Asigna el rol de usuario automáticamente
                        $rol = new Rol(
                            $_POST['nombre'],
                            $_POST['apellidos'],
                            $_POST['correo'],
                            $_POST['passCorreo'],
                            $_POST['usuario'] = $usuario
                        );
                    // // Mostrar datos recibidos para verificar
                    // print_r($_POST);
                    // // Mostrar datos de la instancia de Rol para verificar
                    // print_r($rol);
                    // Intentar crear el rol en la base de datos
                    try {
                        $rol->createRol();
                         header("Location: ?c=Roles&a=validate");
                    } catch (Exception $e) {
                        echo "Error al crear el rol: " . $e->getMessage();
                    }
                } else {
                    echo "Por favor, complete todos los campos del formulario.";
                }
            }}
            public function createRolVendedorA(){
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    
                    require_once "views/administrador/menu/header.php";
                    // require_once "views/administrador/menu/categori.php";
                    require_once "views/administrador/menu/footer.php";
                    require_once "views/vendedor/registroV/header.php";
                    require_once "views/vendedor/registroV/footer.php";
                    require_once "views/vendedor/registroV/encabezado.php";
                } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Verificar si todos los datos necesarios están presentes
                    if (isset($_POST['nombre'], $_POST['apellidos'], $_POST['correo'], $_POST['passCorreo'])) {
                        $usuario = 'Vendedor'; // Asigna el rol de usuario automáticamente
                        $rol = new Rol(
                            $_POST['nombre'],
                            $_POST['apellidos'],
                            $_POST['correo'],
                            $_POST['passCorreo'],
                            $_POST['usuario'] = $usuario
                        );
                    // // Mostrar datos recibidos para verificar
                    // print_r($_POST);
                    // // Mostrar datos de la instancia de Rol para verificar
                    // print_r($rol);
                    // Intentar crear el rol en la base de datos
                    try {
                        $rol->createRol();
                         header("Location: ?c=Roles&a=validate");
                    } catch (Exception $e) {
                        echo "Error al crear el rol: " . $e->getMessage();
                    }
                } else {
                    echo "Por favor, complete todos los campos del formulario.";
                }
            }}



    public function validate()
    {
        // Si la solicitud es GET, simplemente cargamos la vista del formulario de inicio de sesión
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once "views/login/login.view.php";  // Cargar la vista de login
        }

        // Si la solicitud es POST, intentamos validar el inicio de sesión
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            require_once "models/users/rol.php"; // Incluye la clase que contiene la función validarRol

            $rol = new rol(); // Crea una instancia de la clase rol

            $correo = $_POST['correo']; // Obtén el correo electrónico enviado por POST
            $passCorreo = $_POST['passCorreo']; // Obtén la contraseña enviada por POST

            // Realiza la validación del rol
            $usuario = $rol->validarRol($correo, $passCorreo);

            if ($usuario) {
                // Si la validación es exitosa, se crea la sesión y se redirige al usuario
                session_start();

                // Guardamos todos los datos del usuario en la sesión
                $_SESSION['sesion_status'] = 'ok';  // estado de sesion usuario            
                $_SESSION['id_user'] = $usuario['id_user'];  // ID del usuario            
                $_SESSION['name'] = $usuario['name'];  // Nombre del usuario
                $_SESSION['lastname'] = $usuario['lastname'];  // apellido del usuario
                $_SESSION['id_number'] = $usuario['id_number'];  // Correo electrónico
                $_SESSION['cel'] = $usuario['cel'];  // Rol del usuario
                $_SESSION['email'] = $usuario['email'];
                $_SESSION['rol'] = $usuario['rol'];

                // var_dump($_SESSION);

                // Redirigir según el rol

                if ($_SESSION['rol'] == 3) {
                    header("Location: ?c=menuV");  // Redirigir a la vista de Vendedor
                }
                if ($_SESSION['rol'] == 2) {
                    header("Location: ?c=Landing&a=main");  // Redirigir a la vista de Usuario
                }
                if ($_SESSION['rol'] == 1) {
                    header("Location: ?c=MenuA&a=main");  // Redirigir a la vista de Admin
                }

            } else {
                // Si la validación falla, redirigimos a la página de login con mensaje de error
                header("Location: ?c=Roles&a=validate&m=loginFailed");
                exit();
            }
        }
    }


=======
>>>>>>> rama_local_jose

        public function __construct(){}
        
<<<<<<< HEAD
        
        public function createRolAdmin(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/administrador/registro/header.php";
                require_once "views/administrador/registro/footer.php";
                require_once "views/administrador/registro/encabezado.php";
            }
            
            
            if (isset($_POST['nombre'], $_POST['apellidos'], $_POST['correo'], $_POST['passCorreo'])) {
                $usuario = 'Admin'; // Asigna el rol de usuario automáticamente
                $rol = new Rol(
                    $_POST['nombre'],
                    $_POST['apellidos'],
                    $_POST['correo'],
                    $_POST['passCorreo'],
                    $_POST['usuario'] = $usuario
                );
            // // Mostrar datos recibidos para verificar
            // print_r($_POST);
            // // Mostrar datos de la instancia de Rol para verificar
            // print_r($rol);
            // Intentar crear el rol en la base de datos
            try {
                $rol->createRol();
                 header("Location: ?c=Roles&a=validate");
            } catch (Exception $e) {
                echo "Error al crear el rol: " . $e->getMessage();
            }
        }
    }
    public function createRolAdminA(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            require_once "views/administrador/menu/header.php";
            // require_once "views/administrador/menu/categori.php";
            require_once "views/administrador/menu/footer.php";
            require_once "views/administrador/registro/header.php";
            require_once "views/administrador/registro/footer.php";
            require_once "views/administrador/registro/encabezado.php";
        }
        
        
        if (isset($_POST['nombre'], $_POST['apellidos'], $_POST['correo'], $_POST['passCorreo'])) {
            $usuario = 'Admin'; // Asigna el rol de usuario automáticamente
=======
        public function create_rol()
        {
            require_once "views/dashboard/modules/1_header.php";
            require_once "views/dashboard/modules/2_nav_lat.php";
            require_once "views/dashboard/modules/3_nav_sup.php";
            require_once "views/dashboard/pages/new_rol.php";
            require_once "views/dashboard/modules/footer.php";


            if (isset($_POST['rol_name']) && !empty(trim($_POST['rol_name']))) {
>>>>>>> rama_local_jose
            $rol = new Rol(
                null, 
                $_POST['rol_name']   
            );            
            
            $rol->rol_create();
            header("location:?c=Roles&a=read_rol");
            }
        } 

        public function read_rol() {
            $roles = new Rol;
            $roles = $roles -> rol_read();
            #var_dump($roles); 
            require_once "views/dashboard/modules/1_header.php";
            require_once "views/dashboard/modules/2_nav_lat.php";
            require_once "views/dashboard/modules/3_nav_sup.php";
            require_once "views/dashboard/pages/read_roles.php";
            require_once "views/dashboard/modules/footer.php";

        }

        
public function update_rol() {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // Verificar si el parámetro 'id_rol' existe en la URL
        if (isset($_GET['id_rol'])) {
            $rol = new Rol();
            // Obtener el rol actual de la base de datos usando el id
            $rol = $rol->get_rol_by_id($_GET['id_rol']);
            
            // Cargar las vistas
            require_once "views/dashboard/modules/1_header.php";
            require_once "views/dashboard/modules/2_nav_lat.php";
            require_once "views/dashboard/modules/3_nav_sup.php";
            require_once "views/dashboard/pages/update_rol.php";
            require_once "views/dashboard/modules/footer.php";
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Verificar si los datos necesarios están presentes
        if (isset($_POST['name_rol_up']) && !empty(trim($_POST['name_rol_up'])) && isset($_POST['id_rol'])) {
            
            // Crear un objeto Rol con los datos recibidos
            $rol = new Rol(
                $_POST['id_rol'],      // ID del rol
                $_POST['name_rol_up']  // Nombre del rol
            );
<<<<<<< HEAD
        // // Mostrar datos recibidos para verificar
        // print_r($_POST);
        // // Mostrar datos de la instancia de Rol para verificar
        // print_r($rol);
        // Intentar crear el rol en la base de datos
        try {
            $rol->createRol();
             header("Location: ?c=Roles&a=validate");
        } catch (Exception $e) {
            echo "Error al crear el rol: " . $e->getMessage();
=======
            
            // Actualizar el rol en la base de datos
            $rol->rol_update();
            
            // Redirigir a la página de listado de roles
            header("Location: ?c=Roles&a=read_rol");
>>>>>>> rama_local_jose
        }
    }
}

        
<<<<<<< HEAD
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once "views/vendedor/menu/header.php";
            require_once "views/vendedor/menu/categori.php";
            require_once "views/vendedor/menu/footer.php";
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['nombreP'], $_POST['descripcion'], $_POST['precio'], $_POST['cantidad'], $_FILES['imagen']['name'])) {
                // Validar la imagen
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                $extension = strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
    
                if (!in_array($extension, $allowedExtensions)) {
                    $errors['imagen'] = 'La imagen debe tener una extensión válida.';
                }
    
                // Validaciones adicionales para otros campos requeridos
                if (empty($_POST['categoria'])) {
                    $errors['categoria'] = 'Por favor, selecciona una categoría.';
                }
    
                if (empty($_POST['nombreP']) || empty($_POST['descripcion']) || empty($_POST['precio']) || empty($_POST['cantidad'])) {
                    $errors['otros'] = 'Por favor, completa todos los campos necesarios.';
                }
    
                // Si no hay errores, procedemos con la subida de la imagen y la creación del producto
                if (empty($errors)) {
                    $imagenNombre = uniqid() . '.' . $extension; // Generar un nombre único para la imagen
                    $target_dir = "img/";
                    $target_file = $target_dir . basename($imagenNombre);
    
                    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file)) {
                        // Inicializar el objeto Rol con los datos
                        $rol = new Rol(
                            $_POST['nombreP'],
                            $_POST['descripcion'],
                            $_POST['precio'],
                            $_POST['cantidad'],
                            $_POST['categoria']
                        );
    
                        try {
                            // Llamar a createProductos y pasar la imagen como argumento
                            $rol->createProductos($imagenNombre);
                            echo '<p>Producto creado con éxito.</p>';
                            header("Location: ?c=MenuV"); // Redirigir al controlador deseado
                        } catch (Exception $e) {
                            $errors['db'] = "Error al crear el producto: " . $e->getMessage();
                        }
                    } else {
                        $errors['imagen'] = 'Error al subir la imagen.';
                    }
                }
            } else {
                echo "Por favor, complete todos los campos del formulario.";
            }
        }
    
        // Mostrar errores si los hay
        if (!empty($errors)) {
            foreach ($errors as $key => $error) {
                echo "<p>Error ($key): $error</p>";
            }
=======
        
        

        public function delete_rol(){
            $rol = new Rol;
            $rol = $rol -> rol_delete($_GET['id_rol']);
            header("location:?c=Roles&a=read_rol");
>>>>>>> rama_local_jose
        }
    }

?>
