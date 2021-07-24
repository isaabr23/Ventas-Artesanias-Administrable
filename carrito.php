<?php include 'inc/templates/header.php';
      $id = $_GET['id'];
?>

<h1 class="centrar-texto">Carrito</h1>
    <h2 class="centrar-texto">Tu compra</h2>
<main>

<div>
    
        <div class="wrapper-compras centrar-textocompras">

                    <legend>Comprar: </legend>
                    <button type="submit" onclick="addProducto();" value="Cotizar">Cotizar</button>
                        </div>
                        <br>
                            <h4>Aqui Se Añaden</h4>
                    
                            <label type="text" id="lista5"></label><br> 
                            <div id="lista1"></div>
                            <div id="listaproductos" style="text-align: center; font-weight: 900;">1</div>
                        <br>
</div>  


</main>

<?php require 'inc/templates/footer.php';  ?>





    
