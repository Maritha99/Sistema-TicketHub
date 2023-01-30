<header class="header"> <!--bloque principal (rodea todo el contenido)-->
    <div class="header__contenedor"> <!--Centrar el contenido-->
        <nav class="header__navegacion">

            <?php if(is_auth()) { ?>
                <a href="<?php echo is_admin() ? '/admin/dashboard' : '/finalizar-registro'; ?>" class="header__enlace">Administrar</a>
                <form method="POST" action="/logout" class="header__form">
                    <input type="submit" value="Cerrar Sesión" class="header__submit">
                </form>
            <?php } else { ?>
                <a href="/registro" class="header__enlace">Registro</a>
                <a href="/login" class="header__enlace">Iniciar Sesión</a>
            <?php } ?>
        </nav>
        
        <div class="header__contenido">  <!--Contenido de la izquierda-->
            <a href="/">  <!--Al dar click se recarga la misma web-->
                <h1 class="header__logo">
                    TicketHub   <!--Aqui es un parrafo de texto para el nombre de la APP--->
                </h1>
            </a>
          <!--  <p class="header__texto">Eventos Diciembre 2022</p><!--Aqui es un parrafo de texto para las fechas--->
           <!-- <p class="header__texto--modalidad">En linea - Presencial</p>  <!--Aqui es un parrafo de texto--->
        
         <!--   <a href="/registro" class="header__boton">Comprar Ticket</a>  <!--Boton que redirecciona a comprar ticket-->
        </div>
    </div>
</header>
<div class="barra">
    <div class="barra__contenido">
        <a href="/">
            <h2 class="barra__logo">
                TicketHub
            </h2>
        </a>
        <nav class="navegacion">
            <a href="/sobrenosotros" class="navegacion__enlace <?php echo pagina_actual('/sobrenosotros') ? 'navegacion__enlace--actual' : ''; ?>">Sobre nosotros</a>
            <a href="/organizadores" class="navegacion__enlace <?php echo pagina_actual('/organizadores') ? 'navegacion__enlace--actual' : ''; ?>">Organizaciones</a>
            <a href="/eventos" class="navegacion__enlace <?php echo pagina_actual('/eventos') ? 'navegacion__enlace--actual' : ''; ?>">Eventos</a>
           <!-- <a href="/registro" class="navegacion__enlace">Comprar Pase</a>sss-->
        </nav>
    </div>
</div>