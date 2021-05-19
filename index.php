<?php require 'inc/templates/header.php';  ?>

		<div class="site-principal inicio">
			<h1 class="titulo">Venta de cajas <br> y <br> artesanias</h1>
			<h1 class="historia">Nuestra Historia</h1>
			<h3 class="artesanias">Artesanias</h2>
			<a href="galeria.php" class="da-link">Ver Galeria</a>
		</div>

		<div class="productos">
				<div class="contenedor-productos contenido-header">
					<h1>Cajas de Olinala</h1>

					<?php 
						try {
							require_once ('inc/funciones/conexion-bd.php'); //para conectar con la base de datos
							$stm = $conn->prepare("SELECT * FROM productos");
							$stm->execute();
							$peticion = $stm->get_result();

							} catch (\Exception $e) {  //En caso de que haya falla en conexion con bd mandaramensaje pero la pagina seguira funcionando
								echo $e->getMessage();
							}
					?>
					<section class="contenedor seccion">
						<div class="wrapper">
							<?php while($fila = $peticion->fetch_assoc() ) { ?>
								<div class="anuncio">
									<img src="img/artesanias/<?php echo $fila['url_imagen']; ?>" alt="<?php echo $fila['id']; ?>">
									<div class="contenido-anuncio">
										<h3 class="producto-texto"><?php echo $fila['artesania']; ?></h3>
											<p class="descripcion-texto"><?php echo nl2br($fila['descripcion']); ?></p>
											<p class="precio">$ <?php echo $fila['precio']; ?></p>
											<a href="compras.php?id=<?php echo $fila['id']; ?>" class="da-link2">Comprar</a>											
									</div>
								</div> 
								<?php $conn->close(); 
							} ?>
						</div>
					</section>
				</div>
		</div>

	<section class="imagen-contacto">
        <div class="contenedor contenido-contacto">
            <h2>Contactanos</h2>
            <p>LLena el formulario de contacto y un asesor se pondra en contacto contigo a la brevedad</p>
            <a href="contacto.php" class="da-link3">Contactanos</a>
        </div>
	</section>
	

	<?php require 'inc/templates/footer.php';  ?>
