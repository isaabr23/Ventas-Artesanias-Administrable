
<?php 

session_start();
$cerrar_sesion = $_GET['cerrar_sesion'];
if($cerrar_sesion) {
  session_destroy(); 
}  
  include_once 'funciones/funciones.php';
  include 'templates/header.php';
?>

  <div class="contenedor1">
	  <h1 class="titulo">Iniciar Sesión</h1>
	  
	  <hr class="border">

	  <form class="formulario" id="login-admin" method="post" action="login-admin.php">
		  <div class="form-group">
			  <i class="icono izquierda fa fa-user"></i><input class="usuario" type="text" name="usuario" placeholder="Usuario">
		  </div>

		  <div class="form-group">
			  <i class="icono izquierda fa fa-lock"></i><input class="password_btn" type="password" id="password" name="password" placeholder="Password">
		  </div>

		  <label for="password"></label>
			<div style="margin-top:15px;">
				<input style="margin-left:20px;" type="checkbox" id="mostrar_contrasena" title="clic para mostrar contraseña"/>
				&nbsp;&nbsp;Mostrar Contraseña</div>
			</div>

		  <div class="form-group">
			  <input type="hidden" name="login-admin" value="login">
			  <button type="submit" class="boton" value="Iniciar Sesion">Iniciar Sesion</button>
		  </div>
	  </form>
  </div>
</body>
</html>

<?php require 'templates/footer.php';  ?>