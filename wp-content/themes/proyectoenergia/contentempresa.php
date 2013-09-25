<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<div class="divempresa">
  <div class="logo_empresa"> <?php the_post_thumbnail(array(254,242));?> </div>
  <div class="cajadatosempresa">
  <h2 class="nombreempresa"><?php the_title(); ?></h2>
  <div class="descripcionempresa">
  <?php 
  the_content(); //mostrara el contenido del post como la descripción de la empresa
  echo '<p>'; meta('direc_empresa'); echo '</p>'; // la función meta muestra un campo que especifiquemos
  echo '<p>Tel:'; meta('tel_empresa'); echo '</p>';
  ?>
  </div>
  </div>
</div>