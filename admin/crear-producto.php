<?php require 'templates/header.php';
include 'sesiones.php';  ?>

<div class="barra">
    <a href="administrador.php"><h1>Administración de Productos</h1></a>
    <p>Bienvenid@  <span class="nombre"><?php echo $_SESSION['usuario']; ?></span></p>
    <a href="login.php?cerrar_sesion=true">Cerrar Sesión</a>
</div>

    <main class="contenedor seccion contenido-centrado">
    
    <div class="botones-crear">
        <a href="administrador.php" class="da-link">Regresar</a>
    </div>

        <form class="contacto" id="guardar-producto-archivo" name="guardar-producto" method="POST" action="modelo-producto.php" enctype="multipart/form-data">
            <fieldset>
                <!--agrupa campos que esten relacionados-->

                <legend>Producto Nuevo</legend>
                <label for="artesania">Artesania:</label>
                <input type="text" name="artesania" placeholder="Artesania">

                <label for="tamano">tamaño:</label>
                <input type="text" name="tamano" placeholder="Tamaño">

                <label for="precio">Precio:</label>
                <input type="text" name="precio" placeholder="Precio">

                <label for="stock">Stock:</label>
                <input type="text" name="stock" placeholder="Stock">

                <label for="descripcion">Descripcion:</label>
                <textarea name="descripcion" cols="30" rows="10" placeholder="Descripcion"></textarea>

                <div class="form-group">
                  <label for="imagen_producto">Imagen del producto: </label>
                  <input type="file" id="imagen_producto" name="archivo_imagen">
                </div>

                <div>
                    <input type="hidden" name="registro" value="nuevo">
                    <button type="submit" class="boton">Añadir</button>
                </div>    
            </fieldset>
        </form>
    </main>

<?php require 'templates/footer.php';  ?>