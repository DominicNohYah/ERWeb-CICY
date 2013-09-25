<?php
/**
 * Template Name: Plantilla Investigadores
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
?>

<?php get_header(); ?>
<header class="entry-header">
<h1 class="entry-title"><?php the_title(); ?></h1>
</header>
<?php
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args=array('paged'=>$paged, 'post_type'=>'testimonial','posts_per_page'=>'9');
    query_posts($args);
?>
<div class="contenedor-template">
<?php twentyeleven_content_nav( 'nav-above' ); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="divinvestigador">
  <div class="header-inv">
   <div class="marcoinv"></div>
   <div class="foto-inv"> 
   <?php if ( has_post_thumbnail() ) {?>
   <?php the_post_thumbnail( array(118,118) );?>
   <?php } else {?>
   <img src="<?php bloginfo('template_directory')?>/images/avatar.png" border="0"/>
   <?php } ?> 
    </div>
   <h2 class="nombreinv"><?php the_title(); ?></h2>
  </div>
   <div class="cajadatosinv">
   <div><?php //the_content(); ?></div>
   <?php
   echo '<label class="ETQN">Línea de investigación</label><br/>'; 
   echo '<div class="contenido-inv">';   
   echo get_the_term_list( $post->ID, 'testimonial-category', '', ', ', '' );
   echo'</div>';
   echo '<label class="ETQN">Correo electrónico</label><br/>'; 
   echo '<div class="contenido-inv">'; 
   
   $my_meta = get_post_meta( $post->ID, 'correo_inv', true );

if( $my_meta && '' != $my_meta ) :
 
 echo $my_meta;
 
 endif;
   
   echo '</div>'; 
   ?>
   </div>
</div>
<?php endwhile; ?>
<?php endif; ?>
<?php twentyeleven_content_nav( 'nav-below' ); ?>
</div>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>