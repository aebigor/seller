<?php 

class Landing
{
    public function main()
    {
        require_once "models/Product.php";        
        $product = new Product;

        // Obtener productos por categoría
        $category1_products = $product->products_by_category(1); 
        $category2_products = $product->products_by_category(2); 
        $category3_products = $product->products_by_category(3);

        require_once "views/landing/modules/1_header.php";
        require_once "views/landing/modules/2_nav_sup.php";
        require_once "views/landing/modules/3_section_carousell.php";
        require_once "views/landing/modules/4_celulares.php";
        require_once "views/landing/modules/5_computadores.php";
        require_once "views/landing/modules/6_equipos_usados.php";  
        require_once "views/landing/modules/7_contact.php";
        require_once "views/landing/modules/8_methods.php";
        require_once "views/landing/modules/9_importante.php";
        require_once "views/landing/modules/10_footer.php";
    }
}


 ?>