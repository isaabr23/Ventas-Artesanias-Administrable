<?php
  include 'sesiones.php';
  include 'templates/header.php';
?>

<div class="barra">
    <a href="administrador.php"><h1>Administración de Productos</h1></a>
    <p>Bienvenid@  <span class="nombre"><?php echo $_SESSION['usuario']; ?></span></p>
    <a href="login.php?cerrar_sesion=true">Cerrar Sesión</a>
</div>
        
<h1>Tabla de Productos</h1>
<div class="contenedor">
    <div class="botones-crear">
        <?php if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2) :
            ?> <!-- Para que solo lo puedan ver ciertos administradores (coloca "1" en la BD "nivel") -->
                <a href="crear-producto.php" class="da-link">Añadir Producto</a> <?php // Boton verde de AÑADIR ?>
            <?php if ($_SESSION['nivel'] == 2) : ?>    
                <a href="crear-admin.php" class="da-link">Añadir Administrador</a> <?php // Boton verde de AÑADIR ?>
                <a href="clientes-admin.php" class="da-link" >Clientes</a>
            <?php endif; ?>
        <?php endif; ?> 
    </div>

    <table id="registros">
        <tr>
            <th>Artesania</th>
            <th>Tamaño</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Descripcion</th>
            <th>Fecha de ingreso</th>
            <th>Administracion</th>
        </tr>    

        <?php
        try {
            require_once('funciones/funciones.php'); //para conectar con la base de datos
            $stm = $conn->prepare("SELECT * FROM productos");
            $stm->execute();
            $peticion = $stm->get_result();
        } catch (\Exception $e) {  //En caso de que haya falla en conexion con bd mandaramensaje pero la pagina seguira funcionando
            echo $e->getMessage();
        }
        ?>
    <br>
        <?php while ($fila = $peticion->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $fila['artesania']; ?></td>
                <td><?php echo $fila['tamano']; ?></td>
                <td><?php echo '$' . ' ' . $fila['precio']; ?></td>
                <td><?php echo $fila['stock']; ?></td>
                <td><?php echo $fila['descripcion']; ?></td>
                <td><?php echo $fila['fecha']; ?></td>
                <td>

                    <?php if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2) : ?>
                        <!-- EDITAR -->
                        <a href="editar-producto.php?id=<?php echo $fila['id']; ?>">
                        <i class="fa fa-pencil"></i></a>
                        
                        <!-- BORRAR -->                             <!-- data-tipo="producto" nos redirecciona a modelo-producto.php por ajax -->
                        <a href="#" data-id="<?php echo $fila['id']; ?>" data-tipo="producto" class="borrar_registro"> 
                            <i class="fa fa-trash"></i>
                        </a>
                    <?php endif; ?>     
                </td>
            </tr>
        
            <?php $conn->close();
        } ?>

    </table>
</div>

<?php require 'templates/footer.php'; ?>

