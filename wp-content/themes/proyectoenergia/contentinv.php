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
   foreach((get_the_category()) as $category) {
      echo $category->cat_name . ' ';
}
   echo'</div>';
   echo '<label class="ETQN">Correo electrónico</label><br/>'; 
   echo '<div class="contenido-inv">'; meta('Correo_investigador'); echo '</div>';
   ?>
   </div>
</div>