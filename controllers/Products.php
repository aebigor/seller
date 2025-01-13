<?php 
require_once "models/Product.php";

class Products
{
    public function __construct(){}



    public function create_product()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once "views/dashboard/modules/1_header.php";
            require_once "views/dashboard/modules/2_nav_lat.php";
            require_once "views/dashboard/modules/3_nav_sup.php";
            require_once "views/dashboard/pages/new_product.php";  
            require_once "views/dashboard/modules/footer.php";
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $image_path = $this->handle_image_upload();

            
            $product = new Product(
                null,
                $_POST['product_name'],
                $_POST['product_description'],
                $_POST['product_technical_description'],
                $_POST['product_price'],
                $_POST['product_amount'],
                $_POST['product_category'],
                $image_path 
            );

            
            $product->product_create();

            
            header("Location: ?c=Products&a=read_products");
        }
    }


    
    private function handle_image_upload() {
        if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == 0) {
            $target_dir = 'assets/imagenes/products/';
            
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            $image_extension = pathinfo($_FILES['product_image']['name'], PATHINFO_EXTENSION);
            $image_name = uniqid('product_', true) . '.' . $image_extension;
            $target_file = $target_dir . $image_name;

            if (move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file)) {
                return $target_file;
            } else {
                return null;
            }
        }
        return null;
    }


    
    public function read_products()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $product = new Product; 
            $products = $product->products_read(); 
            require_once "views/dashboard/modules/1_header.php";
            require_once "views/dashboard/modules/2_nav_lat.php";
            require_once "views/dashboard/modules/3_nav_sup.php";
            require_once "views/dashboard/pages/read_products.php";  
            require_once "views/dashboard/modules/footer.php";
        }
    }


    
    public function update_product()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            $product = new Product();
            $product = $product->get_product_by_id($_GET['id']);
            
            
            require_once "views/dashboard/modules/1_header.php";
            require_once "views/dashboard/modules/2_nav_lat.php";
            require_once "views/dashboard/modules/3_nav_sup.php";
            require_once "views/dashboard/pages/update_product.php";
            require_once "views/dashboard/modules/footer.php";
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $product = new Product(
                $_POST['product_id'],
                $_POST['product_name'],
                $_POST['product_description'],
                $_POST['product_technical_description'],
                $_POST['product_price'],
                $_POST['product_amount'],
                $_POST['product_category'],
                $_POST['existing_image'] 
            );

            
            if ($_FILES['product_image']['name']) {
                
                $image_path = $this->handle_image_upload();
                $product->set_image($image_path);  
            } else {
                
                $product->set_image($_POST['existing_image']);
            }

            
            $product->update_product();

            
            header("Location: ?c=Products&a=read_products");
        }
    }




    public function delete_product()
    {
        $product = new Product;
        $product -> product_delete($_GET['id']);
        header("Location: ?c=Products&a=read_products");
    }


    
}
?>
