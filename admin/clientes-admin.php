<?php
  include 'sesiones.php';
  include 'templates/header.php';
?>

<div class="barra">
    <a href="administrador.php"><h1>Administración de Clientes</h1></a>
    <p>Bienvenid@  <span class="nombre"><?php echo $_SESSION['usuario']; ?></span></p>
    <a href="login.php?cerrar_sesion=true">Cerrar Sesión</a>
</div>
        
<h1>Tabla de Clientes</h1>
<div class="contenedor">
    <div class="botones-crear">
        <a href="administrador.php" class="da-link">Regresar</a>
    </div>

    <table id="registros">
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Telefono</th>
            <th>Comentario</th>
            <th>Fecha</th>
            <th>Hora</th>
        </tr>    

        <?php
        try {
            require_once('funciones/funciones.php'); //para conectar con la base de datos
            $stm = $conn->prepare("SELECT * FROM clientes");
            $stm->execute();
            $peticion = $stm->get_result();
        } catch (\Exception $e) {  //En caso de que haya falla en conexion con bd mandaramensaje pero la pagina seguira funcionando
            echo $e->getMessage();
        }
        ?>
    <br>
        <?php while ($fila = $peticion->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $fila['nombre']; ?></td>
                <td><?php echo $fila['email']; ?></td>
                <td><?php echo $fila['telefono']; ?></td>
                <td><?php echo $fila['mensaje']; ?></td>
                <td><?php echo $fila['fecha']; ?></td>
                <td><?php echo $fila['hora']; ?></td>
                <td>

                    <?php if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2) : ?>
                        <!-- BORRAR -->                             <!-- data-tipo="cliente" nos redirecciona a modelo-producto.php por ajax -->
                        <a href="#" data-id="<?php echo $fila['id']; ?>" data-tipo="clientes" class="borrar_registro"> 
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

