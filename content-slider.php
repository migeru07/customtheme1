<?php 
$slider = array(
		'post_type' => 'slider',
	);
$the_query = new WP_Query($slider);
?>

    <div class="flexslider">
      <ul class="slides">
        <!-- First Slider -->
        <?php if (have_posts()) : ?>
        <?php while ($the_query -> have_posts() ) : $the_query -> the_post(); ?>
        <li class="slider1">
          <div class="container">
            <div class="imagen-slider col-sm-5 col-sm-offset-1">
              <?php 
                if(has_post_thumbnail() ) {
                  the_post_thumbnail('large', array(
                    'class' => ''
                  ));
                }
              ?>
            </div>
            <div class="informacion-slider col-sm-5">
              <h3 class="titulo"><?php the_title(); ?></h3>
              <p class="descripcion">
                <?php the_field('descripcion_sliders') ?>
              </p>
              <a href="<?php the_field('link_slider') ?>" class="btn-slider">Ver más..</a>
            </div>
          </div>
        </li>
        <?php endwhile; ?>
        <?php else : ?>
          <h2 class="center">Not Found</h2>
          <p class="center">
        <?php _e("No se encontró ningunga información."); ?></p>
        <?php endif; wp_reset_postdata();  ?>
        <!-- Second Slider -->
      </ul>
    </div>