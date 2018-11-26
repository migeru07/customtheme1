<?php get_header(); ?>
   
	<section class="container">

      <h3 class="subtitulo text-center">PORTAFOLIO</h3>

	   <?php
	   wp_nav_menu( array(
	      'theme_location'  => 'portafolio-menu',
	      'container'       => 'ul',
	      'menu_class'      => 'portafolio-header text-center',
	      'menu_id'      	=> 'portafolio-filtro'
	   	));
	   ?>
      <ul class="portafolio row">
			<?php if (have_posts()) : ?>
         <?php while (have_posts()) : the_post(); ?>

			<?php $terms = get_the_terms( $post->ID , 'clasificacion' );
				if($terms) {
					$nombre_clase = array();
					foreach ( $terms as $term ) {
						$nombre_clase[] = 'cat-' . $term->slug;
					}
					$clase = join(' ', $nombre_clase);
				}
			?>

         <li class="col-md-4 col-sm-6 portafolio-entrada <?php echo $clase; ?>">
            <div class="estado-hover text-center">
              <h4><?php the_title(); ?></h4>
              <p><?php the_content(); ?></p>
            </div>
            <div class="borde">
              <a href="">
              		<?php 
			            if(has_post_thumbnail() ) {
			                the_post_thumbnail('large', array(
			                  'class' => 'img-responsive text-center img-portafolio'));
			            }
			         ?>
              </a>
            </div>
          </li>
 			<?php endwhile; ?>
        	<?php else : ?>
         	<h2 class="center">Not Found</h2>
         	<p class="center">
        	<?php _e("No se encontró ningunga información."); ?></p>
        	<?php endif; ?>
       </ul>

   </section>

<?php get_footer(); ?>