<?php require 'inc/templates/header.php';  ?>

<h1 class="centrar-texto">Artesanias</h1>
            <div class="imagen-artesanias"></div>    

<div class="productos">
            <div class="cajas">
                <div class="contenedor-productos contenido-header">
                    <h1>Cajas de Olinala</h1>
                                                        
                        <?php
                        try {
                            require_once('inc/funciones/conexion-bd.php'); //para conectar con la base de datos
                            $stm = $conn->prepare("SELECT * FROM productos");
                            $stm->execute();
                            $peticion = $stm->get_result();
                        } catch (\Exception $e) {  //En caso de que haya falla en conexion con bd mandaramensaje pero la pagina seguira funcionando
                            echo $e->getMessage();
                        }
                        ?>
                        <br>

                        <div class="wrapper">
                            <?php while ($fila = $peticion->fetch_assoc()) { ?>
                                <div class="anuncio mediana">
                                    <a href="compras.php?id=<?php echo $fila['id']; ?>"><img src="img/artesanias/<?php echo $fila['url_imagen']; ?>" alt="<?php echo $fila['id']; ?>"></a>
                                    <div class="contenido-anuncio">
                                    <h3 value="<?php $fila['artesania']; ?>" class="producto-texto arte"><?php echo $fila['artesania']; ?></h3>
                                        <p class="descripcion-texto arte"><?php echo nl2br($fila['descripcion']); ?></p>
                                        <p class="precio arte">$ <?php echo $fila['precio']; ?></p>
                                        <a href="compras.php?id=<?php echo $fila['id']; ?>" class="da-link2">Comprar</a>
                                    </div>
                                </div> 
                                <?php $conn->close();
                            } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        

<?php require 'inc/templates/footer.php';  ?>


<!-- esc_attr() - 
esc_html() - 

<p class="precio arte" esc_attr() > esc_html() </p> -->
