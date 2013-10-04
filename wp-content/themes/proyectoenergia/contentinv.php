<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<div class="divinvestigador">
  <div class="header-inv">
      <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
   <div class="marcoinv"></div></a>
   <div class="foto-inv"> 
   <?php if( get_field('foto_investigador') ):  
   $image = get_field('foto_investigador');
   $link = get_field('link', $image['id']);
   ?>
   <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" height="118px" width="118px"/>   
   <?php else: ?>   
   <img src="<?php bloginfo('template_directory')?>/images/avatar.png" border="0"/>
   <?php endif;?> 
 
   </div>
   <h2 class="nombreinv"><?php //the_title(); ?>
   <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
   </h2>
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

if( $my_meta && '' != $my_meta ) : echo $my_meta; endif;
   
   echo '</div>'; 
   ?>
   </div>
</div>