
<?php require 'inc/templates/header.php';  ?>

<main class="contenedor">
        <!--una por pagina dice a gloogle que es lo mas importante de la pagina-->
        <h1 class="centrar-texto">Conoce sobre nosotros</h1>
        <div class="contenido-nosotros">
            <div class="imagen">
                <img src="img/nosotros.jpg" alt="Imagen sobre nosotros">
            </div>
            <div class="texto-nosotros">
                <blockquote>25 Años de experiencia</blockquote>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet nesciunt beatae hic sunt libero similique alias tempora consectetur aut, maxime nemo, ea est fuga esse in, ab a sequi quos! Lorem ipsum dolor sit amet consectetur adipisicing
                    elit. Laboriosam consectetur magnam earum ducimus ipsum reiciendis. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet nesciunt beatae hic sunt libero similique alias tempora consectetur aut, maxime nemo, ea est fuga esse
                    in, ab a sequi quos! Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam consectetur magnam earum ducimus ipsum reiciendis.
                </p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet nesciunt beatae hic sunt libero similique alias tempora consectetur aut, maxime nemo, ea est fuga esse in, ab a sequi quos! Lorem ipsum dolor sit amet consectetur adipisicing
                    elit. Laboriosam consectetur magnam earum ducimus ipsum reiciendis. Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                </p>
            </div>
        </div>

    </main>

    <section class="contenedor seccion">
        <!-- Para cambio de contenido en una pagina -->
        <h2 class="centrar-texto">Ubicacion</h2>

        <div id="mapa" class="mapa"></div>

        <div class="iconos-nosotros">
            <p class="coordenadas centrar-texto">Coordenadas: 17.778439, -98.738594</p>
        </div>
    </section>

    <?php require 'inc/templates/footer.php';  ?>