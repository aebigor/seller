


  <div class="container ">
    <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%"
      data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2" tabindex="0">
      <h4 id="scrollspyHeading1"></h4>
      <br>
      <h1 class="text-center">Celulares</h1>
      <br>

<section>
  <br>
  <h4 id="scrollspyHeading3"></h4>
  <section>
    <div class="container">
      <div class="row g-5 justify-content-center">
        <?php
        if (isset($category1_products) && !empty($category1_products)) {
            $product_count = count($category1_products); // Contamos los productos para saber cuántos hay

            // Determinamos cuántas columnas debe tener la fila
            foreach ($category1_products as $producto) {
                echo '
                <div class="col-12 col-sm-6 col-md-' . (12 / min($product_count, 4)) . '"> <!-- Ajusta el tamaño de columna basado en la cantidad -->
                  <div class="card h-100" style="max-width: 250px; margin: 0 auto;">
                    <img src="' . $producto->get_image() . '" class="card-img-top img-fluid rounded-5" alt="..."
                         style="max-height: 200px; width: 200px; object-fit: contain; margin: 0 auto; border-radius: 15px;">
                    <div class="card-body" style="padding: 0.75rem;">
                      <h5 class="card-title text-center" style="font-size: 1rem;">' . $producto->get_name() . '</h5>
                      <p class="card-text text-center" style="font-size: 0.875rem;">' . $producto->get_description() . '</p>
                      <p class="card-text text-center" style="font-size: 1rem; font-weight: bold;">$' . $producto->get_price() . '</p>
                      <p class="card-text text-center" style="font-size: 0.875rem;">Disponible: ' . $producto->get_amount() . ' unidades</p>
                      <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="button" onclick="agregarAlCarrito(' . $producto->get_id() . ')">Agregar al carrito</button>
                      </div>
                    </div>
                  </div>
                </div>';
            }
        } else {
            echo '<p>No hay productos disponibles en esta categoría.</p>';
        }
        ?>
      </div>
    </div>
  </section>
</section>