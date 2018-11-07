<?php get_header(); ?>

    <!-- SLIDER -->
    <div class="flexslider">
      <ul class="slides">
        <!-- First Slider -->
        <li class="slider1">
          <div class="container">
            <div class="imagen-slider col-sm-5 col-sm-offset-1">
              <img src="<?php bloginfo( 'template_directory' );?>/imagenes/img-slider1.png">
            </div>
            <div class="informacion-slider col-sm-5">
              <h3 class="titulo">Lorem ipsum dolor sit amet</h3>
              <p class="descripcion">
                Donec nec justo eget felis facilisis ferment-tum. aliquam porttitor mauris sit amet orce. aenean dignissim pellentesque felis.
              </p>
              <a href="" class="btn-slider">Ver más..</a>
            </div>
          </div>
        </li>
        <!-- Second Slider -->
        <li class="slider2">
          <div class="container">
            <div class="imagen-slider col-sm-5 col-sm-offset-1">
              <img src="<?php bloginfo( 'template_directory' );?>/imagenes/img-slider2.png">
            </div>
            <div class="informacion-slider col-sm-5">
              <h3 class="titulo">Fons Alpha et Omega</h3>
              <p class="descripcion">
                Titulus triunphalis facilisis ferment-tum. aliquam porttitor mauris sit amet orce. aenean dignissim pellentesque felis.
              </p>
              <a href="" class="btn-slider">Ver más..</a>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <!-- Mensaje de Bienvenida -->
    
    <section class="bienvenida">
      <div class="container text-center">
        <h4 class="titulo-bienvenida">BIENVENIDO A MI SITIO WEB</h4>
        <p class="mensaje-bienvenida">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>
      </div>
    </section>
    <!-- Cuerpo Home -->
    <section class="container cuerpo-home">
      <div class="row clearfix">
        <!-- Post Reciente -->
        <div class="col-md-6">
          <article class="articulo-home">
            <h5 class="titulo-articulo">POST RECIENTE</h5>
            <hr>
            <header class="titulo-post">
              <h3><a href="">ULTIMA ENTRADA</a></h3>
            </header>
            <ul class="info">
              <li>Publicado en: <a href="#">Blog</a></li>
              <li>Por: <a href="#">Admin</a></li>
              <li>En: <a href="#">Abril 25 2014</a></li>
            </ul>
            <div class="excerpt">
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.</p>
              <p><a href="#" class="post-link">Leer más.</a></p>
            </div>
          </article>
        </div>
        <!-- Proyecto Reciente  -->
        <div class="col-md-6">
          <article class="proyecto-home">
            <h5 class="titulo-articulo">PROYECTOS</h5>
            <hr>
            <div class="presentacion-proyecto">
              <a href="#">
                <img src="<?php bloginfo( 'template_directory' );?>/imagenes/img-slider1.png" alt="" class="img-responsive center-block">
              </a>
              <p>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.
              </p>
              <p class="text-center">
                <a href="#" class="ver-proyectos">Ver Proyectos</a>
              </p>
            </div>
          </article>
        </div>
      </div>
    </section>

<?php get_footer(); ?>