
<div class="evento  swiper-slide">
    <p class="evento__hora"><?php echo $evento->fechahora; ?></p> <!---hora--->
    <div class="evento__informacion">
        <h4 class="evento__nombre"><?php echo $evento->nombre; ?></h4>
        <p class="evento__hora"><?php echo $evento->hora; ?></p>  <!--hora -->
        <p class="evento__introduccion"><?php echo $evento->descripcion; ?></p>
        <a href="/login" class="header__boton">Comprar</a>
        <div class="evento__autor-info">
            <picture>
                <source srcset="img/speakers/<?php echo $evento->ponente->imagen; ?>.webp" type="image/webp">
                <source srcset="img/speakers/<?php echo $evento->ponente->imagen; ?>.png" type="image/png">
                <img class="evento__imagen-autor" loading="lazy" width="200" height="300" src="img/speakers/<?php echo $evento->ponente->imagen; ?>.png" alt="Imagen Ponente">

            </picture>
            <p class="evento__autor-nombre">
                <?php echo $evento->ponente->nombre; ?>
            </p>
        </div>
    </div>
</div>