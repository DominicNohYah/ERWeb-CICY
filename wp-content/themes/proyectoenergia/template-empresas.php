<?php
/**
 * Template Name: Platilla Empresas
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
    $args=array('paged'=>$paged, 'post_type'=>'empresa');
    query_posts($args);
?>
<div class="contenedor-template">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="divempresa">
  <div class="logo_empresa"> <?php the_post_thumbnail(array(254,242));?> </div>
  <div class="cajadatosempresa">
  <h2 class="nombreempresa"><?php the_title(); ?></h2>
  <div class="descripcionempresa">
  <?php 
  the_content(); //mostrara el contenido del post como la descripción de la empresa
  echo '<p>'; 
  
     $my_meta = get_post_meta( $post->ID, 'dirc_emp', true );

if( $my_meta && '' != $my_meta ) :
 
 echo $my_meta;
 
 endif;
  
  echo '</p>'; // la función meta muestra un campo que especifiquemos
  echo '<p>Tel:';  
  
     $my_meta = get_post_meta( $post->ID, 'tel_emp', true );

if( $my_meta && '' != $my_meta ) :
 
 echo $my_meta;
 
 endif;
  
  echo '</p>';
  echo '<p>'; 
 
 $my_meta = get_post_meta( $post->ID, 'pagina_emp', true );

 if( $my_meta && '' != $my_meta ) :	 
 echo "<a href=$my_meta target=_blank>"; 
 echo $my_meta;
 echo '</a>';
 echo '</p>';
 endif;
  ?>
  </div>
  </div>
</div>
<?php endwhile; ?>
<?php endif; ?>
</div>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>