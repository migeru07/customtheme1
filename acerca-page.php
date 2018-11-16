<?php 
/*
Template Name: Acerca de
Description: Página que habla de mi...
*/
get_header(); ?>

   <section class="container">

        <h3 class="subtitulo text-center"><?php the_title(); ?></h3>

        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

        <div class="col-md-10 col-md-offset-1">
          <p class="text-center">
            <?php the_content(); ?>
          </p>
        </div>
        
		<?php 
            if(has_post_thumbnail() ) {
                the_post_thumbnail('medium', array(
                  'class' => 'img-circle mifoto center-block'));
            }
        ?>
		<?php endwhile; ?>
        <?php else : ?>
         <h2 class="center">Not Found</h2>
         <p class="center">
        <?php _e("No se encontró ningunga información."); ?></p>
        <?php endif; ?>

        <p class="text-success2 text-center"><?php the_field('mi_referencia'); ?></p>
        <hr>
        <h3 class="subtitulo text-center">TESTIMONIOS</h3>

		<?php 	get_template_part('content','testimonios'); ?>

    </section>

<?php get_footer(); ?>