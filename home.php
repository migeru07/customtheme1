<?php get_header(); ?>
   <hr>
    <!-- Cuerpo Home -->
    <section class="container blog">

        <h3 class="subtitulo text-center">BLOG</h3>

        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        
        <div class="row post-bloque">
          <div class="col-md-3">
            <?php 
            if(has_post_thumbnail() ) {
                the_post_thumbnail('medium', array(
                  'class' => 'img-circle mifoto center-block'));
            }
            ?>

          </div>
          <div class="col-md-9">
            <h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
            <p class="metadatos">
              Publicado en: <?php the_category( ', '); ?>
              Por: <?php the_author(); ?>
              En: <?php the_time('F j Y'); ?>
            </p>
            <p>
              <?php the_excerpt(); ?>
            </p>
            <p class="leermas"><a href="<?php the_permalink(); ?>">Leer más..</a></p>
          </div>
        </div>

        <?php endwhile; ?>
        <?php else : ?>
         <h2 class="center">Not Found</h2>
         <p class="center">
        <?php _e("No se encontró ningunga información."); ?></p>
        <?php endif; ?>

    </section>

<?php get_footer(); ?>