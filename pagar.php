<?php
require_once ('inc/funciones/conexion-bd.php'); //para conectar con la base de datos
    $id = $_GET['id'];

    $stm = "SELECT * FROM productos WHERE id = $id";
    $resultado = $conn->query($stm);
    $fila = $resultado->fetch_assoc();
    
    if (!isset($fila)) {  /****** falta hacer que el usuario no ingrese por url  para esto es el !isset pero no es post por ello no se como aqu se pasa por el id y el WHERE********/
        exit("Hubo error");
    }    
    // echo "<pre>";
    // print_r($fila);
    // echo "</pre>";

    //importamos la clase de Payer
use PayPal\Api\Payer;  
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment; 
// use PayPal\Api\CancelUrl;
// use PayPal\Api\Payment;  

include 'inc/configPayPal.php';

$artesania = $fila[artesania];
$tamano = $fila[tamano];
$precio = $fila[precio];
$descripcion = $fila[descripcion];
$precio = (float) $precio; //convertimos el recio a entero
$envio = 0; 
$total = $precio + $envio;

//Metodo de pago
$compra = new Payer();  
$compra->setPaymentMethod('paypal'); // solo aceptaremos pagos de paypal video 613/3:14

// Cada articulo que compremos
$articulo = new Item();
$articulo->setName($artesania)
         ->setCurrency('MXN') // Tipo de moneda
         ->setQuantity(1) // Cantidad de articulos vendidos ** se puede hacer una variable de 'cantidad' en caso de que sean mas de 1
         ->setPrice($precio);

// Para el carrito
// $articulo2 = new Item();
// $articulo2->setName($artesania2)
//         ->setCurrency('MXN') 
//         ->setQuantity(1) 
//         ->setPrice($precio2);

//Lista de articulos
$listaArticulos = new ItemList();
// $listaArticulos->setItems(array($articulo, $articulo2));
$listaArticulos->setItems(array($articulo));

// Agregamos Detalles adicionales a la cantidad a pagar
$detalles = new Details();
$detalles->setShipping($envio) //paypal li requiere aunque valga cero
         ->setSubtotal($precio);

// Cantidad a pagar
$cantidad = new Amount();
$cantidad->setCurrency('MXN')
         ->setTotal($precio)
         ->setDetails($detalles);

// Transaccion
$transaccion = new Transaction();
$transaccion->setAmount($cantidad)
            ->setItemList($listaArticulos)
            ->setDescription('Pago ')
            ->setInvoiceNumber(uniqid());

// Redireccionar al pagar o al cancelar
$redireccionar = new RedirectUrls();
$redireccionar->setReturnUrl(URL_SITIO . "/pago_finalizado.php?exito=true") // URL de configPayPal y es cuando el pago es EXITOSO
              ->setCancelUrl(URL_SITIO . "/pago_finalizado.php?exito=false"); // el pago fue CANCELADO

// echo $redireccionar->getReturnURL(); podemos colocar cada set con get y verificar cada dato

// Envia toda la informacion a PayPal
//crea, procesa y manejar 
$pago = new Payment();
$pago->setIntent("sale") // Creando una venta
     ->setPayer($compra)
     ->setRedirectUrls($redireccionar)
     ->setTransactions(array($transaccion)); // Para mas transacciones ->setTransactions(array($transaccion, $transaccion2));

try {
    $pago->create($apiContext);
} catch (PayPal\Exception\PayPalConnectionException $pce) {
    echo "<pre>";
    print_r(json_decode($pce->getData()));
    exit;
    echo "</pre>";
}

$aprobado = $pago->getApprovalLink();

header("Location: {$aprobado}");




/***********Validar************/
// echo $compra->getPaymentMethod() . "1<br>";
// echo $articulo->getPrice() . "2<br>";
// echo $listaArticulos->getItems() . "3<br>";
// echo $detalles->getSubtotal() . "4<br>";
// echo $cantidad->getTotal() . "5<br>";
// echo $transaccion->getInvoiceNumber() . "6<br>";
// echo $redireccionar->getReturnUrl() . "7<br>";
// echo $pago->getIntent() . "8<br>";