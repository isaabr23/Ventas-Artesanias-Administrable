<?php 
  include 'sesiones.php';
  require_once 'funciones/funciones.php';
  include 'templates/header.php';
  $id = $_GET['id'];
?>

<div class="barra">
    <a href="administrador.php"><h1>Administración de Productos</h1></a>
    <p>Bienvenid@  <span class="nombre"><?php echo $_SESSION['usuario']; ?></span></p>
    <a href="login.php?cerrar_sesion=true">Cerrar Sesión</a>
</div>

    <main class="contenedor seccion contenido-centrado">

    <div class="botones-crear">
        <a href="administrador.php" class="da-link">Regresar</a>
    </div>

    <div>
            <?php 
                $stm = "SELECT * FROM productos WHERE id = $id";
                $resultado = $conn->query($stm);
                $fila = $resultado->fetch_assoc();
            ?>

            <form class="contacto" name="guardar-producto" id="guardar-producto-archivo" method="POST" action="modelo-producto.php" enctype="multipart/form-data">
                <fieldset>
                    <!--agrupa campos que esten relacionados-->

                    <legend>Editar Producto</legend>
                    <label for="artesania">Artesania:</label>
                    <input type="text" name="artesania" id="artesania" placeholder="Artesania" value="<?php echo $fila['artesania']; ?>">

                    <label for="tamano">tamaño:</label>
                    <input type="text" name="tamano" id="tamano" placeholder="Tamaño" value="<?php echo $fila['tamano']; ?>">

                    <label for="precio">Precio:</label>
                    <input type="text" name="precio" id="precio" placeholder="Precio" value="<?php echo $fila['precio']; ?>">

                    <label for="stock">Stock:</label>
                    <input type="text" name="stock" id="stock" placeholder="Stock" value="<?php echo $fila['stock']; ?>">

                    <label for="descripcion">Descripcion:</label>
                    <textarea name="descripcion" cols="30" rows="10" id="descripcion" placeholder="Descripcion"><?php echo $fila['descripcion']; ?></textarea>
                    
                    <div class="form-group">
                        <label for="imagen_actual">Imagen Actual: </label>
                        <br>
                        <img src="../img/artesanias/<?php echo $fila['url_imagen']; ?>"  width=200>  <!-- Iprimira la imagen correspodiente -- width = hace mas pequeña o grande la imagen -->
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="imagen_producto">Imagen del producto: </label>
                        <input type="file" id="imagen_producto" name="archivo_imagen">
                    </div>
                    
                    <div>
                        <input type="hidden" name="registro" value="actualizar">
                        <input type="hidden" name="id_registro" value="<?php echo $id; ?>"> <?php // ???? ?>
                        <button type="submit" class="boton">Guardar</button>
                    </div>    

                </fieldset>
            </form>
        <div>
    </main>

<?php require 'templates/footer.php';  ?>