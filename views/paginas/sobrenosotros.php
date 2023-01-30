<!--Sobre nosotros-->

<main class="devwebcamp">
    <h2 class="devwebcamp__heading"><?php echo $titulo; ?></h2>
    <p class="devwebcamp__descripcion">Somos un proyecto en desarrollo, que se encarga en la Venta de Tickets online a diversos Eventos en el distrito de Pacasmayo</p>

    <div class="devwebcamp__grid">
        <div <?php aos_animacion(); ?> class="devwebcamp__imagen">
            <picture>
                <source srcset="build/img/Ticket.png" type="image/png">
                <source srcset="build/img/sobre_devwebcamp.webp" type="image/webp">
                <img loading="lazy" width="200" height="300" src="build/img/sobre_devwebcamp.jpg" alt="Imagen DevWebcamp">
            </picture>
        </div>

        <div  class="devwebcamp__contenido">
            <p <?php aos_animacion(); ?> class="devwebcamp__texto">Ser un punto centralizado de compra de boletos para eventos en Pacasmayo, La libertad - Perú utilizando un sistema que garantice la interacción con nuestros clientes, organizadores sea simple y eficaz.</p>
        
        </div>
    </div>
</main>