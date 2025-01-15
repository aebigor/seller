let itemsCarrito = []; // Aquí almacenaremos los productos del carrito

document.addEventListener('DOMContentLoaded', () => {
    cargarCarritoDesdeLocalStorage(); // Cargar el carrito si ya existe en localStorage
    cargarEventListeners(); // Cargar los event listeners
    verificarCarritoExpirado(); // Verificar si el carrito ha expirado
});

// Verificar si el carrito ha estado en localStorage por más de 24 horas
function verificarCarritoExpirado() {
    const tiempoUltimaActividad = localStorage.getItem('tiempoUltimaActividad');
    const limiteDeTiempo = 1 * 60 * 1000; // 1 minuto en milisegundos


    if (tiempoUltimaActividad && Date.now() - tiempoUltimaActividad > limiteDeTiempo) {
        console.log("Carrito expirado, devolviendo los productos al inventario...");
        
        // Llamada al backend para devolver productos al inventario
        itemsCarrito.forEach(item => {
            fetch('/seller/controllers/actualizar_producto.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id: item.id,
                    cantidad: item.cantidad // Devolver la cantidad total al inventario
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('Producto devuelto al inventario:', item.id);
                } else {
                    console.log('Error al devolver producto al inventario', data.message);
                }
            })
            .catch(error => {
                console.error('Error al realizar la solicitud para devolver al inventario:', error);
            });
        });

        // Limpiar el carrito de localStorage y actualizar la interfaz
        localStorage.removeItem('carrito');
        localStorage.removeItem('tiempoUltimaActividad');
        itemsCarrito = [];
        actualizarCarritoHTML();
    }
}

// Cargar el carrito desde localStorage
function cargarCarritoDesdeLocalStorage() {
    const carritoGuardado = localStorage.getItem('carrito');
    if (carritoGuardado) {
        try {
            const carrito = JSON.parse(carritoGuardado);
            if (Array.isArray(carrito)) {
                itemsCarrito = carrito.filter(item => item.precio && item.cantidad);
                actualizarCarritoHTML();
            } else {
                console.error('El carrito guardado no tiene un formato válido.');
            }
        } catch (error) {
            console.error('Error al cargar el carrito desde localStorage:', error);
        }
    }
}

// Guardar el carrito en localStorage
function guardarCarritoEnLocalStorage() {
    localStorage.setItem('carrito', JSON.stringify(itemsCarrito));
    localStorage.setItem('tiempoUltimaActividad', Date.now()); // Actualizamos el tiempo de la última actividad
}





// nuevo
function cargarEventListeners() {
    document.addEventListener('click', (e) => {
        if (e.target.classList.contains('agregar-carrito')) {
            const elemento = e.target.closest('.col-md-4'); // Ajuste en la selección del elemento
            comprarElemento(elemento);
        }
    });
}

function comprarElemento(elemento) {
    const infoElemento = {
        imagen: elemento.querySelector('img').src,
        titulo: elemento.querySelector('.card-title').textContent,
        precio: parseFloat(elemento.querySelector('.text-muted').textContent),
        id: elemento.querySelector('.agregar-carrito').getAttribute('data-id'),
        cantidad: 1
    };

    // Verificar la cantidad disponible en la base de datos
    fetch('/seller/controllers/verificar_cantidad.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id: infoElemento.id })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Si hay suficientes productos, agregar al carrito
            if (data.cantidadDisponible >= infoElemento.cantidad) {
                agregarAlCarrito(infoElemento);
                // Llamada al backend para actualizar la cantidad en la base de datos
                fetch('/seller/controllers/actualizar_producto.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        id: infoElemento.id,
                        cantidad: -1 // Restamos una unidad
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Cantidad del producto actualizada correctamente');
                    } else {
                        console.log('Error al actualizar la cantidad:', data.message);
                    }
                })
                .catch(error => {
                    console.error('Error al realizar la solicitud:', error);
                });
            } else {
                alert('No hay suficientes productos disponibles en stock');
            }
        } else {
            console.error('Error al verificar la cantidad', data.message);
        }
    })
    .catch(error => {
        console.error('Error en la solicitud para verificar cantidad:', error);
    });



}
function agregarAlCarrito(infoElemento) {
    let existeElemento = itemsCarrito.find(item => item.id === infoElemento.id);
    if (existeElemento) {
        existeElemento.cantidad++;
    } else {
        itemsCarrito.push(infoElemento);
    }
    guardarCarritoEnLocalStorage();  // Guardamos el carrito actualizado en localStorage
    actualizarCarritoHTML();         // Actualizamos la interfaz del carrito
}

function actualizarCarritoHTML() {
    const listaCarrito = document.getElementById('lista-carrito').querySelector('tbody');
    listaCarrito.innerHTML = '';  // Limpiar el contenido previo del carrito antes de actualizarlo

    itemsCarrito.forEach(item => {
        if (item.precio && item.cantidad) {
            const row = document.createElement('tr');  // Crear una fila de tabla

            // Crear cada celda de la fila
            const imagenCell = document.createElement('td');
            const nombreCell = document.createElement('td');
            const precioCell = document.createElement('td');
            const cantidadCell = document.createElement('td');
            const eliminarCell = document.createElement('td');

            // Establecer el contenido de cada celda
            imagenCell.innerHTML = `<img src="${item.imagen}" alt="Imagen del producto" style="max-width: 100px; height: auto;">`;
            nombreCell.textContent = item.titulo;
            precioCell.textContent = `$${item.precio.toFixed(2)}`;
            cantidadCell.textContent = item.cantidad;
            eliminarCell.innerHTML = `<span class="borrar-item-btn" data-id="${item.id}">X</span>`; // Cambiado a span con contenido X

            // Agregar evento de clic al botón de eliminar
            eliminarCell.querySelector('.borrar-item-btn').addEventListener('click', () => {
                eliminarItemCarrito(item.id);
            });

            // Agregar cada celda a la fila
            row.appendChild(imagenCell);
            row.appendChild(nombreCell);
            row.appendChild(precioCell);
            row.appendChild(cantidadCell);
            row.appendChild(eliminarCell);

            // Agregar la fila a la tabla
            listaCarrito.appendChild(row);
        }
    });

    calcularTotal(); // Actualizamos el total
}

function calcularTotal() {
    let total = 0;
    itemsCarrito.forEach(item => {
        if (item.precio && item.cantidad) {
            total += item.precio * item.cantidad;
        }
    });
    document.getElementById('total-carrito').textContent = `$${total.toFixed(2)}`;
}

function eliminarItemCarrito(id) {
    const item = itemsCarrito.find(item => item.id === id);
    if (item) {
        item.cantidad--;  // Restamos una unidad al producto
        if (item.cantidad === 0) {
            itemsCarrito = itemsCarrito.filter(item => item.id !== id); // Si la cantidad es 0, lo eliminamos del carrito
        }
    }
    guardarCarritoEnLocalStorage();  // Guardamos el carrito actualizado en localStorage
    actualizarCarritoHTML();         // Actualizamos la interfaz del carrito

    // Llamada al backend para actualizar la cantidad de productos en la base de datos
    fetch('/seller/controllers/actualizar_producto.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            id: id,
            cantidad: 1 // Devolvemos una unidad al inventario
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log('Producto actualizado en la base de datos');
        } else {
            console.log('Error al actualizar la cantidad:', data.message);
        }
    })
    .catch(error => {
        console.error('Error al realizar la solicitud:', error);
    });
}
