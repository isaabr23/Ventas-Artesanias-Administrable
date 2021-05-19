<?php require 'inc/templates/header.php';  ?>

<h1 class="centrar-texto">Cotizador</h1>
    <div class="imagen-contacto1"></div> 
    <h2 class="centrar-texto">Cotiza tu compra</h2>
<main>
    <div class="iconos-nosotros">
        <div class="contenedor-cotizador seccion-cotizador contenido-cotizador">
            <form class="contacto" action="">
                <fieldset>
                    <legend>Elige tu artesania</legend>

                        <div class="orden">
                            <label for="artesania">Seleccione la Artesania deseada:</label> <br>
                            <select id="artesania" name="artesania" required>
                                <option value=" ">-Seleccione una Artesania-</option>
                                <option value="1">Caja decorada</option>
                                <option value="2">Guaje pintado</option>
                            </select>
                        </div>

                        <div class="orden">
                            <label for="tamano">Seleccione el tamaño deseado:</label> <br>
                            <select id="tamano" name="tamano" required>
                                <option value=" ">-Seleccione un tamaño-</option>
                                <option value="1">Chico</option>
                                <option value="2">Mediano</option>
                                <option value="3">Grande</option>
                            </select>
                        </div>
                </fieldset>  
                <input type="submit" id="calcular" class="da-link4" value="Calcular">
            </form>  
        </div>    
        
        <div class="contenedor-cotizador seccion-cotizador contenido-cotizador">
            <fieldset>
                <legend>Cotizacion</legend>
                <div class="total">
                <label for="artesania">Resumen:</label> <br>

                    <div id="lista-productos">
                    </div>
<br>
                    <label for="artesania">Total:</label>

                    <div id="suma-total">
                    </div>

                </div><!--Total-->
            </fieldset>  
            <input type="hidden" name="total_pedido" id="total_pedido" value="total_pedido">
            <input type="submit" class="da-link4" id="btnRegistro" name="submit" value="Pagar">
        </div>  
    </div>
</main>    

<?php require 'inc/templates/footer.php';  ?>
