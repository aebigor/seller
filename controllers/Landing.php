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

    // Inicializar el array de imágenes
    $images = [];

    // Función para agregar productos aleatorios a la lista de imágenes
    function add_random_images($category_products, &$images, $num_images_to_add) {
        if (count($category_products) > 0) {
            // Seleccionar aleatoriamente productos de esta categoría
            $random_products = array_rand($category_products, min($num_images_to_add, count($category_products)));
            if (is_array($random_products)) {
                foreach ($random_products as $index) {
                    $images[] = $category_products[$index]->get_image();
                }
            } else {
                $images[] = $category_products[$random_products]->get_image();
            }
        }
    }

    // Primero tratamos de llenar las imágenes desde las tres categorías
    add_random_images($category1_products, $images, 6);
    add_random_images($category2_products, $images, 6 - count($images)); // Completar hasta 6
    add_random_images($category3_products, $images, 6 - count($images)); // Completar hasta 6

    // Si todavía no tenemos 6 imágenes, usamos más de una categoría
    if (count($images) < 6) {
        // En este punto, hay menos de 6 imágenes, y tenemos que llenar el espacio
        // Intentamos completar con los productos de las categorías que tienen productos disponibles
        $remaining_needed = 6 - count($images);

        // Si hay más productos en alguna de las categorías, los añadimos
        if (count($category1_products) > 0) {
            add_random_images($category1_products, $images, $remaining_needed);
        } elseif (count($category2_products) > 0) {
            add_random_images($category2_products, $images, $remaining_needed);
        } elseif (count($category3_products) > 0) {
            add_random_images($category3_products, $images, $remaining_needed);
        }
    }

    // Ahora tenemos las 6 imágenes (o menos si no hay suficientes productos)
    // Pasamos estas imágenes a la vista
    $random_images = array_slice($images, 0, 6);  // Aseguramos que haya exactamente 6

        /*
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
        */


    require_once "views/landing/modules/header_v2.php";
}





}


 ?>