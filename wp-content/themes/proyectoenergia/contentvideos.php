<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<div class="div-video">
  <div class="video_">
  <?php $cod_video = get_post_meta( $post->ID, 'codigo_video', true ); ?>
  <a href="https://www.youtube.com/watch?v=<?php echo $cod_video; ?>" rel="wp-video-lightbox"><img src="http://img.youtube.com/vi/<?php echo $cod_video; ?>/0.jpg" width="278px" height="208px"/></a>
  </div>
  <div class="titulovideo"><?php the_title();?></div>
  <div class="descripcionvideo"><?php 
$my_meta = get_post_meta( $post->ID, 'descripcion_video', true );
if( $my_meta && '' != $my_meta ) :
 echo $my_meta; 
endif;
  ?></div>
<div class="cat_vid"><?php echo 'Categorizado en: '; echo get_the_term_list( $post->ID, 'cat_videos', '', ', ', '' ); ?></div>
</div>

