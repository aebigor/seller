<?php 

class Landing
{
    public function main()
    {
        require_once "models/Product.php";        
        $product = new Product;      
        $category1_products = $product->products_by_category(1); 
        $category2_products = $product->products_by_category(2); 
        $category3_products = $product->products_by_category(3); 

        require_once "views/landing/modules/header_v2.php";  
    }
}


 ?>