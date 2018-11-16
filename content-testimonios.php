<?php 
$testimonios = array(
		'post_type' => 'testimonios',
		'posts_per_page' => 2,
		'orderby' => 'rand'
	);
$the_query = new WP_Query($testimonios);
?>

<?php if (have_posts()) : ?>
<?php while ($the_query -> have_posts() ) : $the_query -> the_post(); ?>

<div class="col-md-6">
  <blockquote class="testimonios">
    <img src="<?php bloginfo( 'template_directory' );?>/imagenes/comillas.png" alt="" class="comilla">
    <p><?php the_field('testimonios') ?></p>
    <footer><cite title="Source Title"><?php the_field('nombre_cliente') ?></cite></footer>
    <p class="paginaweb"><a href="https://<?php the_field('sitio_web') ?>" target="_blank"><?php the_field('sitio_web') ?></a></p>
  </blockquote>
</div>

<?php endwhile; ?>
<?php else : ?>
 	<h2 class="center">Not Found</h2>
 	<p class="center">
<?php _e("No se encontró ningunga información."); ?></p>
<?php endif; ?>