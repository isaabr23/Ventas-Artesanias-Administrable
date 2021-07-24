<?php require 'inc/templates/header.php';  ?>

<h1 class="centrar-texto">Contacto</h1>
            <div class="imagen-contacto1"></div>    

    <main class="contenedor seccion contenido-centrado">

        <h2 class="centrar-texto">Llena el formulario de contacto</h2>

        <form class="contacto" name="formulario" id="cliente" method="POST" action="admin/contacto-bd.php">
            <fieldset>

                <legend>Informacion Personal</legend>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" placeholder="Tu Nombre" required>

                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email" placeholder="Tu correo electronico" required>

                <label for="telefono">Telefono:</label>
                <input type="tel" name="telefono" id="telefono" placeholder="Tu Telefono" required>

                <label for="mensaje">Mensaje:</label>
                <textarea name="mensaje" id="mensaje" cols="30" rows="10"></textarea>
            </fieldset>

            <fieldset>
                <legend>Contacto</legend>
                <p>Como desea ser contactado:</p>
                <div class="forma-contacto">
                    <label for="pref_telefono">Telefono</label>
                    <input type="radio" name="modo" id=TelContact value="1">

                    <label for="correo">E-mail</label>
                    <input type="radio" name="modo" id=EmailContact value="2">
                </div>
                    
                    <div id="div1">

                            <p>Elija la fecha y la hora:</p>

                            <label for="fecha">Fecha:</label>
                            <input type="date" name="fecha" id="fecha" require>

                            <label for="hora">Hora:</label>
                            <input type="time" name="hora" id="hora" min="09:00" max="18:00" require>

                    </div>

            </fieldset>

            <div class="form-group">
              <input type="hidden" name="cliente" value="nuevo">
              <button type="submit" class="da-link4" value="Enviar">Enviar</button>
          </div>
        </form>
    </main>

<?php require 'inc/templates/footer.php';  ?>
