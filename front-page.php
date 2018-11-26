<?php get_header(); ?>

    <!-- SLIDER -->
    <?php   get_template_part('content','slider'); ?>
    <!-- Mensaje de Bienvenida -->
    
    <section class="bienvenida">
      <div class="container text-center">
        <h4 class="titulo-bienvenida"><?php echo get_theme_mod('the-welcome-title'); ?></h4>
        <p class="mensaje-bienvenida"><?php echo get_theme_mod('the-welcome-paragraph'); ?></p>
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
          
            <?php 
              $post = array( 
                  'post_type' => 'post',
                  'posts_per_page' => 1
                );
              $the_query = new WP_Query($post);
            ?>

            <?php if (have_posts()) : ?>
            <?php while ($the_query -> have_posts() ) : $the_query -> the_post(); ?>
            <header class="titulo-post">
              <h3><a href=""><?php the_title(); ?></a></h3>
            </header>
            <ul class="info">
              <li>Publicado en: <a href="<?php bloginfo( 'url' ); ?>/blog">Blog</a></li>
              <li>Por: <a href="#"><?php the_author(); ?></a></li>
              <li>En: <a href="#"><?php the_time('F j Y'); ?></a></li>
            </ul>
            <div class="excerpt">
              <?php echo get_excerpt(300); ?>
              <p><a href="<?php the_permalink(); ?>" class="post-link">Leer más.</a></p>
        
              <?php endwhile; ?>
              <?php else : ?>
                <h2 class="center">Not Found</h2>
                <p class="center">
              <?php _e("No se encontró ningunga información."); ?></p>
              <?php endif; wp_reset_postdata();  ?>
            </div>
          </article>
        </div>
        <!-- Proyecto Reciente  -->
        <div class="col-md-6">
          <article class="proyecto-home">
            <h5 class="titulo-articulo">PROYECTOS</h5>
            <hr>

            <?php 
              $portafolio = array( 
                  'post_type' => 'portafolio',
                  'posts_per_page' => 1
                );
              $the_query = new WP_Query($portafolio);
            ?>

            <?php if (have_posts()) : ?>
            <?php while ($the_query -> have_posts() ) : $the_query -> the_post(); ?>
              <div class="presentacion-proyecto">
                <a href="#">
                  <?php 
                    if(has_post_thumbnail()) {
                      the_post_thumbnail( 'medium', array( 'class' => 'img-responsive center-block'));
                    }
                  ?>
                </a>
                <?php echo get_excerpt(200); ?>
                <p class="text-center">
                  <a href="<?php bloginfo( 'url' ); ?>/portafolio" class="ver-proyectos">Ver Proyectos</a>
                </p>
              </div>
        
            <?php endwhile; ?>
            <?php else : ?>
              <h2 class="center">Not Found</h2>
              <p class="center">
            <?php _e("No se encontró ningunga información."); ?></p>
            <?php endif; wp_reset_postdata();  ?>

            
          </article>
        </div>
      </div>
    </section>

<?php get_footer(); ?>