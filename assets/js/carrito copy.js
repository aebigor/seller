// Funcionalidad del carrito de compras
let itemsCarrito = []; // Cambiado de const a let para permitir la reasignación

document.addEventListener('DOMContentLoaded', () => {
    cargarEventListeners();
});

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
    actualizarCarritoHTML();
}

function actualizarCarritoHTML() {
    const listaCarrito = document.getElementById('lista-carrito').querySelector('tbody');
    listaCarrito.innerHTML = ''; // Limpiar el contenido previo del carrito antes de actualizarlo
    itemsCarrito.forEach(item => {
        const row = document.createElement('tr'); // Crear una fila de tabla

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

        // Aplicar estilos al botón de eliminar
        const botonEliminar = eliminarCell.querySelector('.borrar-item-btn');
        botonEliminar.style.cursor = 'pointer'; // Cambiar el cursor a pointer
        botonEliminar.style.color = '#00bcd4'; // Color celeste
        botonEliminar.style.fontWeight = 'bold'; // Texto en negrita

        // Agregar evento de clic al botón de eliminar
        botonEliminar.addEventListener('click', () => {
            // Llamamos a la función que elimina el artículo del carrito
            eliminarItemCarrito(item.id);
        
            // Realizar la solicitud para actualizar la cantidad en la base de datos
            fetch('/seller/controllers/actualizar_producto.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id: item.id,  // Enviamos el ID del producto
                    cantidad: item.cantidad  // Enviamos la cantidad que se va a devolver a la base de datos
                })
            })
            .then(response => {
                // Verifica si la respuesta es correcta
                if (response.ok) {
                    return response.json();  // Parseamos la respuesta como JSON
                } else {
                    throw new Error('Error en la solicitud');
                }
            })
            .then(data => {
                // Aquí se puede agregar lógica adicional si la solicitud fue exitosa
                if (data.success) {
                    console.log(`Cantidad de ${item.titulo} actualizada en la base de datos.`);
                } else {
                    console.error('Error al actualizar la base de datos:', data.message);
                }
            })
            .catch(error => {
                console.error('Error al realizar la solicitud:', error);
            });
        });
// codigo nuevo
        // Agregar cada celda a la fila
        row.appendChild(imagenCell);
        row.appendChild(nombreCell);
        row.appendChild(precioCell);
        row.appendChild(cantidadCell);
        row.appendChild(eliminarCell);

        // Agregar la fila a la tabla
        listaCarrito.appendChild(row);
    });
    calcularTotal();
}

function calcularTotal() {
    let total = 0;
    itemsCarrito.forEach(item => {
        total += item.precio * item.cantidad;
    });
    document.getElementById('total-carrito').textContent = `$${total.toFixed(2)}`;
}

document.getElementById('lista-carrito').addEventListener('click', (e) => {
    if (e.target.classList.contains('borrar-item')) {
        const id = e.target.getAttribute('data-id');
        eliminarItemCarrito(id);
    }
});

function eliminarItemCarrito(id) {
    itemsCarrito = itemsCarrito.filter(item => item.id !== id);
    actualizarCarritoHTML();
}