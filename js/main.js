(function() {
    "use strict";
    document.addEventListener('DOMContentLoaded', function() {
       
        //   Campos de seleccion de artesanias y tamaños
        var artesania = document.getElementById('artesania');
        var tamano = document.getElementById('tamano');

        //   Botones y Divs
        var calcular = document.getElementById('calcular');
        var botonRegistro = document.getElementById('btnRegistro');
        var lista_productos = document.getElementById('lista-productos');
        var suma = document.getElementById('suma-total');
        botonRegistro.disabled = true;

        calcular.addEventListener('click', calcularMonto); //cuado se de click en el boton "calcular" hara el evento calcular

            function calcularMonto(event) {
                event.preventDefault();
                if (artesania.value === ' ' || tamano.value === ' ') { 
                    alert("Debes escoger una artesania y tamano"); //manda pantalla de alerta
                    artesania.focus();
                } else {

                    if (artesania.value == 0 && tamano.value == 0) {
                        alert("Ocurrio un error..."); //manda pantalla de alerta
                    } else if (artesania.value == 1 && tamano.value == 1) {
                        var artesaniaFinal = "Caja Decorada";
                        var tamanoFinal = 'Chica';
                        var precio = 500;
                    } else if (artesania.value == 1 && tamano.value == 2) {
                        artesaniaFinal = "Caja Decorada";
                        tamanoFinal = 'Mediana';
                        precio = 1 + ',' + 100;
                    } else if (artesania.value == 1 && tamano.value == 3) {
                        artesaniaFinal = "Caja Decorada";
                        tamanoFinal = 'Grande';
                        precio = 3 + ',' + 500;
                    } else if (artesania.value == 2 && tamano.value == 1) {
                        artesaniaFinal = "Guaje Pintado";
                        tamanoFinal = 'Chico';
                        precio = 300;
                    } else if (artesania.value == 2 && tamano.value == 2) {
                        artesaniaFinal = "Guaje Pintado";
                        tamanoFinal = 'Mediano';
                        precio = 800;
                    } else if (artesania.value == 2 && tamano.value == 3) {
                        artesaniaFinal = "Guaje Pintado";
                        tamanoFinal = 'Grande';
                        precio = 1 + ',' + 800;
                    } else {
                        console.log('nada');
                    }

                    var listadoProductos = [];

                        if (artesaniaFinal) {
                            listadoProductos.push('Producto: ' + artesaniaFinal);
                        }

                        if (tamanoFinal) {
                            listadoProductos.push('Tamaño ' + tamanoFinal);
                        }

                        lista_productos.style.display = "block";
                        lista_productos.innerHTML = '';

                        for(var i = 0; i< listadoProductos.length; i++) {
                            lista_productos.innerHTML += listadoProductos[i] + '<br/>';
                            }

                            suma.innerHTML = "$ " + precio;
                            
                            botonRegistro.disabled = false;
                            document.getElementById('total_pedido').value = precio;
                }
            }                
    }); //DOM CONTENT LOADED
})();



/*******************CODIGO PARA VISUALIZAR EL MAPA *********************************/
        
var map = L.map('mapa').setView([17.778439, -98.738594], 9);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);
L.marker([17.778439, -98.738594]).addTo(map)
    .bindPopup('Pueblo de artesanos')
    .openPopup();