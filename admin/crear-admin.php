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

    <div class="separacion">

        <form class="contacto" id="guardar-producto" method="POST" action="modelo-admin.php">
            <fieldset>
                <!--agrupa campos que esten relacionados-->

                <legend>Crear Administradores</legend>
                  
                <div class="form-group">
                  <label for="usuario">Usuario: </label>
                  <input type="text" id="usuario" name="usuario" placeholder="Usuario" required>
                </div> 

                <div class="form-group">
                  <label for="nivel">Nivel: </label>
                  <select id="nivel" name="nivel" placeholder="Nivel" required>
                        <option value=" ">-Seleccione Nivel de Administrador-</option>
                        <option value="0">Visualizador (0)</option>
                        <option value="1">Supervisor (1)</option>
                        <option value="2">Dios (2)</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="password" class="help-block">Password: </label>
                  <input type="password" id="password" name="password" placeholder="Password" required>
                  <span id="passwordOrigin"></span>
                </div> 

                <div class="form-group">
                  <label for="password" class="help-block">Repetir Password: </label>
                  <input type="password" class="form-control" id="repetir_password" name="repetir_password" placeholder="Password" required>
                  <span id="resultado_password" class="help-block"></span>
                </div> 

                <div>
                    <input type="hidden" name="registro" value="nuevo">
                    <button type="submit" class="boton" id="crear_registro_admin">Añadir</button>
                </div>    

            </fieldset>
        </form>
        
            <fieldset>
                <legend>Administradores</legend>

                <table id="registros">
                    <tr>
                        <th>Usuarios</th>
                        <th>Nivel</th>
                        <th>Administracion</th>
                    </tr>    

                    <?php
                    try {
                        require_once('funciones/funciones.php'); //para conectar con la base de datos
                        $stm = $conn->prepare("SELECT * FROM usuarios");
                        $stm->execute();
                        $peticion = $stm->get_result();
                    } catch (\Exception $e) {  //En caso de que haya falla en conexion con bd mandaramensaje pero la pagina seguira funcionando
                        echo $e->getMessage();
                    }
                    ?>
                    <br>
                    <?php while ($fila = $peticion->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $fila['usuario']; ?></td>
                            <td><?php echo $fila['nivel']; ?></td>
                            <td>
                                <!-- EDITAR -->
                                <a href="editar-admin.php?id=<?php echo $fila['id']; ?>">
                                <i class="fa fa-pencil"></i></a>
                                
                                <!-- BORRAR -->                             <!-- data-tipo="admin" nos redirecciona a modelo-admin.php por ajax -->
                                <a href="#" data-id="<?php echo $fila['id']; ?>" data-tipo="admin" class="borrar_registro"> 
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    
                        <?php $conn->close();
                    } ?>

                </table>
            </fieldset>
            </div>
    </main>

<?php require 'templates/footer.php';  ?>
