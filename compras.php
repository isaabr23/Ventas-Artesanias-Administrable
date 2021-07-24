<?php include 'inc/templates/header.php';
      $id = $_GET['id'];
?>

<h1 class="centrar-texto">Comprar</h1>
    <div class="imagen-contacto1"></div> 

<div>
    
    <?php
        require_once('inc/funciones/conexion-bd.php');
        $stm = "SELECT * FROM productos WHERE id = $id";
        $resultado = $conn->query($stm);
        $fila = $resultado->fetch_assoc();
    ?>  

    <!-- <form action="pagar.php?id=<?php echo $_GET['id']; ?>" method="GET"> -->
        <div class="wrapper-compras centrar-textocompras">
            <div class="div1">
                <img src="img/artesanias/<?php echo $fila['url_imagen']; ?>" alt="<?php echo $fila['id']; ?>" class="img-compras">
            </div>
    
                <div class="div2 centrar-texto">
                    <legend>Descripcion: </legend>
                    <p id="descripcion" value="<?php echo nl2br($fila['descripcion']); ?>"><?php echo nl2br($fila['descripcion']); ?></p>
                </div>
                <div class="div3 centrar-texto">
                    <legend>Comprar: </legend>
                        <ul>
                            <li id="artesania" value="<?php echo $fila['artesania']; ?>">Artesania: <?php echo $fila['artesania']; ?></li>
                            <li id="tamano" value="<?php echo $fila['tamano']; ?>">Tamaño: <?php echo $fila['tamano']; ?></li>
                            <li id="precio" value="<?php echo $fila['precio']; ?>">Precio: $<?php echo $fila['precio']; ?></li>
                        </ul>
                <button type="submit" id="carrito" name="carrito">Añadir a carrito</button>
                <br>

                <a href="pagar.php?id=<?php echo $_GET['id']; ?>">
                <input type="submit" id="pagar" class="da-link4" value="pagar">
                </a>
            </div>          
        </div>
    <!-- </form> -->
</div>      


<?php require 'inc/templates/footer.php';  ?>

