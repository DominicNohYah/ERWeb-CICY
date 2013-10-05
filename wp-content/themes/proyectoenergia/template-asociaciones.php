<?php
/**
 * Template Name: Platilla asociaciones
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
<header class="entry-header">
<h1 class="entry-title"><?php the_title(); ?></h1>
</header>
<?php
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args=array('paged'=>$paged, 'post_type'=>'empresa' , 'tipo_eoa' => 'asosiacion', 'orderby' => 'title', 'posts_per_page'=>'10');
    query_posts($args);
?>
<div class="contenedor-template">
<?php twentyeleven_content_nav( 'nav-above' ); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'contentempresa', get_post_format() ); ?>

<?php endwhile;  else:
     ?>

				<article id="post-0" class="post no-results not-found">               
						<h3 id="not-found"><?php _e( 'Lo sentimos, no hay contenido en esta sección', 'twentyeleven' ); ?></h1>
				</article><!-- #post-0 -->
<?php endif; ?>
<?php twentyeleven_content_nav( 'nav-below' ); ?>
</div>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>