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
  <div class="logo_empresa"> 
  
   <?php if( get_field('logo_emp') ):  
   $image = get_field('logo_emp');
   $link = get_field('link', $image['id']);
   ?>
   <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" height="240px" width="254px"/>   
   <?php else: ?>   
   <img src="<?php bloginfo('template_directory')?>/images/Imagenempresas.png" height="240px" width="254px" border="0"/>
   <?php endif;?> 
   
  </div>
  <div class="cajadatosempresa">
  <h2 class="nombreempresa"><?php the_title(); ?></h2>
  <div class="descripcionempresa">
  <?php
  echo '<p>'; 
  
 $my_meta = get_post_meta( $post->ID, 'descripcion_emp', true );

if( $my_meta && '' != $my_meta ) :
 
 echo $my_meta;
 
 endif;
  
  echo '</p>'; 
  
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

