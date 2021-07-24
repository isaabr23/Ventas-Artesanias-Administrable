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
        <a href="crear-admin.php" class="da-link">Regresar</a>
    </div>

    <div>
            <?php
                $stm = "SELECT * FROM usuarios WHERE id = $id";
                $resultado = $conn->query($stm);
                $fila = $resultado->fetch_assoc();
            ?>

        <form class="contacto" id="guardar-producto" method="POST" action="modelo-admin.php">
            <fieldset>
                <!--agrupa campos que esten relacionados-->

                <legend>Editar Administradores</legend>
                <label for="usuario">Usuario:</label>
                <input type="text" name="usuario" id="usuario" placeholder="Usuario" value="<?php echo $fila['usuario']; ?>">

                <label for="nivel">Nivel:</label>
                <input type="text" name="nivel" id="nivel" placeholder="Nivel" value="<?php echo $fila['nivel']; ?>">

                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="*****">

                <label for="password">Repetir Password:</label>
                <input type="password" name="repetir_password" id="repetir_password" placeholder="*****">

                <div>
                    <input type="hidden" name="registro" value="actualizar">
                    <input type="hidden" name="id_registro" value="<?php echo $id; ?>"> 
                    <button type="submit" class="boton">Guardar</button>
                </div>    

            </fieldset>
        </form>
    <div>
</main>

<?php require 'templates/footer.php';  ?>
