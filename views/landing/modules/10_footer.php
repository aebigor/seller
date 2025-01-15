
  <div class="container ">
    <footer class="py-5">
      <div class="row text-center text-md-start">
        <div class="col-12 col-md-3 mb-3">
          <h5>Atención al cliente</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Política de devolución y
                reembolso</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Política de propiedad
                intelectual</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Política de envíos</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Reportar actividad
                sospechosa</a></li>
          </ul>
        </div>
        <div class="col-12 col-md-3 mb-3">
          <h5>Ayuda</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Centro de ayuda y preguntas
                frecuentes</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Centro de seguridad</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Protección de compras de
                seller</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Asóciate a seller</a></li>
          </ul>
        </div>
        <div class="col-12 col-md-6 mb-3">
          <form>
            <h5>Suscríbete a nuestro boletín</h5>
            <p>Resumen mensual de lo nuevo y emocionante de nuestra parte.</p>
            <div class="d-flex flex-column flex-sm-row w-100 gap-2 justify-content-center">
              <label for="newsletter1" class="visually-hidden">Dirección de correo electrónico</label>
              <input id="newsletter1" type="text" class="form-control" placeholder="Dirección de correo electrónico">
              <button class="btn btn-primary" type="button">Suscribirse</button>
            </div>
          </form>
        </div>
      </div>
      <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top align-items-center">
        <p class="mb-0 text-center">&copy; 2025 Servitelecomunicaciones SAS. Todos los derechos reservados.</p>
        <ul class="list-unstyled d-flex justify-content-center mb-0">
          <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="48" height="48">
                <use xlink:href="#twitter" /></svg></a></li>
          <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="48" height="48">
                <use xlink:href="#instagram" /></svg></a></li>
          <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="48" height="48">
                <use xlink:href="#facebook" /></svg></a></li>
        </ul>
      </div>
    </footer>
  </div>
  <script src="assets/plantilla/bootstrap_5.3.3/assets/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/carrito.js" ></script>
  <script src="assets/js/carrusel.js"></script>
  <script type="text/javascript">
document.addEventListener('DOMContentLoaded', () => {
    const carritoIcono = document.querySelector('#img-carrito');
    const carritoPopup = document.querySelector('#carrito-popup');
    const totalCarritoPopup = document.querySelector('#total-carrito');
    let itemsCarrito = []; // Este array almacena los productos agregados al carrito

    // Mostrar el carrito cuando el mouse entra en el área del carrito
    carritoIcono.addEventListener('mouseenter', () => {
        carritoPopup.style.display = 'block'; // Mostrar el popup
        posicionarCarritoPopup(); // Llamar a la función para ajustar la posición
        actualizarCarritoHTML(); // Actualizar el contenido del carrito
    });

    // Cuando se hace clic en el carrito, mantener el popup visible
    carritoIcono.addEventListener('click', (e) => {
        e.stopPropagation(); // Evitar que el clic se propague y cierre el modal
        carritoPopup.style.display = 'block'; // Mostrar el popup
        posicionarCarritoPopup(); // Ajustar la posición del popup
        actualizarCarritoHTML(); // Actualizar el contenido
    });

    // Cerrar el carrito si el clic ocurre fuera del carrito o el popup
    document.addEventListener('click', (e) => {
        if (!carritoIcono.contains(e.target) && !carritoPopup.contains(e.target)) {
            carritoPopup.style.display = 'none'; // Ocultar el popup si se hace clic fuera
        }
    });

    // Función para agregar un producto al carrito
    document.addEventListener('click', (e) => {
        if (e.target.classList.contains('agregar-carrito')) {
            const elemento = e.target;
            const infoElemento = {
                imagen: elemento.getAttribute('data-imagen'),
                titulo: elemento.getAttribute('data-titulo'),
                precio: parseFloat(elemento.getAttribute('data-precio')),
                id: elemento.getAttribute('data-id'),
                cantidad: 1
            };
            agregarAlCarrito(infoElemento);
        }
    });

    // Función para agregar productos al carrito
    function agregarAlCarrito(infoElemento) {
        let existeElemento = itemsCarrito.find(item => item.id === infoElemento.id);
        if (existeElemento) {
            existeElemento.cantidad++;
        } else {
            itemsCarrito.push(infoElemento);
        }
        actualizarCarritoHTML();
    }

    // Función para actualizar el contenido del carrito
    function actualizarCarritoHTML() {
        const listaCarrito = document.getElementById('lista-carrito').querySelector('tbody');
        listaCarrito.innerHTML = ''; // Limpiar el contenido previo del carrito antes de actualizarlo

        let total = 0;
        itemsCarrito.forEach(item => {
            const row = document.createElement('tr'); // Crear una fila de tabla

            // Crear cada celda de la fila
            const imagenCell = document.createElement('td');
            const nombreCell = document.createElement('td');
            const precioCell = document.createElement('td');
            const cantidadCell = document.createElement('td');
            const eliminarCell = document.createElement('td');

            // Establecer el contenido de cada celda
            imagenCell.innerHTML = `<img src="${item.imagen}" alt="Imagen del producto" style="max-width: 50px; height: auto;">`;
            nombreCell.textContent = item.titulo;
            precioCell.textContent = `$${item.precio.toFixed(2)}`;
            cantidadCell.textContent = item.cantidad;
            eliminarCell.innerHTML = `<span class="borrar-item-btn" data-id="${item.id}">X</span>`; // Eliminar el producto

            // Agregar cada celda a la fila
            row.appendChild(imagenCell);
            row.appendChild(nombreCell);
            row.appendChild(precioCell);
            row.appendChild(cantidadCell);
            row.appendChild(eliminarCell);

            // Agregar la fila a la tabla
            listaCarrito.appendChild(row);

            // Sumar al total
            total += item.precio * item.cantidad;
        });

        // Actualizar el total en el popup
        totalCarritoPopup.textContent = `$${total.toFixed(2)}`;
    }

    // Eliminar productos del carrito
    document.addEventListener('click', (e) => {
        if (e.target.classList.contains('borrar-item-btn')) {
            const id = e.target.getAttribute('data-id');
            itemsCarrito = itemsCarrito.filter(item => item.id !== id);
            actualizarCarritoHTML();
        }
    });

    // Función para posicionar el popup debajo del ícono del carrito
    function posicionarCarritoPopup() {
        const carritoRect = carritoIcono.getBoundingClientRect(); // Obtener la posición del carrito
        const carritoPopupRect = carritoPopup.getBoundingClientRect(); // Obtener la posición del popup

        // Ajustamos la posición del popup
        carritoPopup.style.left = `${Math.min(carritoRect.left, window.innerWidth - carritoPopupRect.width - 30)}px`; // Aseguramos que el modal no se desborde a la derecha
        carritoPopup.style.top = `${carritoRect.bottom + window.scrollY}px`; // Posicionamos el popup debajo del ícono

        // Si la posición de izquierda es menor que 0 (por ejemplo, si la ventana es demasiado pequeña),
        // ajustamos la posición para que el modal se ajuste dentro de la pantalla
        if (carritoRect.left + carritoPopupRect.width > window.innerWidth) {
            carritoPopup.style.left = `${window.innerWidth - carritoPopupRect.width - 30}px`;
        }
    }
});

  </script>
</body>

</html>