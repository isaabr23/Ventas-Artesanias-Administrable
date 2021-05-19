

var artesania = document.getElementById('artesania').getAttribute('value');
var tamano = document.getElementById('tamano').getAttribute('value');
var descripcion = document.getElementById('descripcion').getAttribute('value'); 
var precio = document.getElementById('precio').getAttribute('value');

var carrito = document.getElementById('carrito'); // Boton añadir a carrito
// var cotizar = document.getElementById('cotizar');   // Boton Cotizar


carrito.addEventListener('click', carritoC); 
// cotizar.addEventListener('click', cotizarP);    // Escucha el evento del click de boton cotizar



var jsonarray = []; //se guardan los objetos l dar click en "añadir a carrito"
var contadorcarrito = 0;

const producto = {    /// array de la bd
    artesania: artesania,
    tamano: tamano,
    descripcion: descripcion,
    precio: precio
}



console.log(producto);

function carritoC(event) {
    event.preventDefault();

    // contadorcarrito += 1;
    // contador(contadorcarrito);

    var encarrito = []; // Array de productos

    jsonarray.push(producto); // Se agregan objetos seleccionados de la BD al array *********************////////////////
    // console.log(jsonarray);
    // console.log(contadorcarrito);

    
    var guardadoLocal = JSON.stringify(jsonarray);
    localStorage.setItem('Carro', guardadoLocal );  
    console.log(localStorage);
    
    //   copia();
}

function contador(contadorcarrito){

    var suma =+ contadorcarrito;
    var totproductoscarrito = [];
    var total = totproductoscarrito + suma;

    console.log( "total " + total);

}

var X = localStorage.getItem('Carro');
console.log(X);


// Obtener el PRECIO de cada uno de los objetos seleccionados

// function cotizarP(event) {
//     event.preventDefault();

//     var registros = jsonarray; // pasamos el array de los datos obtenidos de la BD *********************////////////////
//     var subtotal = 0;
//     parseInt(subtotal);
//     nregistros = [];

//     for(i in registros) 
//     nregistros.push(registros[i].precio); // Por cada registro (elemento en jsonarray) sacara el valor de precio


//     nregistros.forEach (function(nregistro){ //cada valor de precio lo sumara en el subtotal
//         subtotal += parseInt(nregistro); // convertimos a entero para que los sume
//     });

//     cotizacion(subtotal); // mandamos subtotal a la funcion de cotizacion

// }




// Se IMPRIME el TOTAL A PAGAR

// function cotizacion(dato) {  //recibimos el valor de subtotal

//     var total = dato;   // pasamos subtotal a total
//     console.log(total);
//     document.getElementById("cotizacion").innerHTML = total; // imprimimos total en el DIV cotizacion en la pantalla 
// }

// Crea la COPIA de lista1

// function copia() {
    
//     var food = jsonarray.map(function(x){
//         return '<li>'+x.artesania+' '+x.descripcion+' '+x.precio+'</li>'
//       })
//       document.getElementById("lista1").innerHTML = food;

// }