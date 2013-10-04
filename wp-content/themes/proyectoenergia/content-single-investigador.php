<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
        <h1 class="entry-title">Investigador</h1>
    </header>
	<div class="entry-content">
   
   <div class="fondo_inv_post">        
     <div class="marco-inv-post"></div>
     <div class="foto_inv_post">
     <?php if( get_field('foto_investigador') ):  
     $image = get_field('foto_investigador');
     $link = get_field('link', $image['id']);?> 
     <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" height="230px" width="233px"/>   
     <?php else: ?>   
     <img src="<?php bloginfo('template_directory')?>/images/avatar.png" border="0" width="230" height="233"/>
     <?php endif;?>
     </div> <!-- fin foto-->
      <Div class="nombre_inv_post"><?php the_title();?></div>  
   </div>
   
     <div class="datos_generales_inv_1">
       <div class="title_inv_post">Datos del investigador</div>
       <div class="title_label_inv">Línea de investigación</div>
        <div class="datos_inv_post"><?php echo get_the_term_list( $post->ID, 'testimonial-category', '', ', ', '' ); ?></div>
       <div class="title_label_inv">Correo electrónico</div>
        <div class="datos_inv_post"><?php echo $my_meta = get_post_meta( $post->ID, 'correo_inv', true ); ?></div>
       <div class="title_label_inv">Enlaces</div>
        <div class="datos_inv_post"><?php the_field('enlaces_inv'); ?></div>
     </div>
   
     <div class="datos_generales_inv_2">
       <div class="title_label_inv">Información relevante</div>
        <div class="datos_inv_post"><?php the_field('informacion_relevante'); ?></div>
       <div class="title_label_inv">Publicaciones recientes</div>
        <div class="datos_inv_post"><?php the_field('publicaciones_recientes'); ?></div>
     </div>    
   </div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'twentyeleven' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'twentyeleven' ) );
			if ( '' != $tag_list ) {
				$utility_text = __( 'This entry was posted in %1$s and tagged %2$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
			} elseif ( '' != $categories_list ) {
				$utility_text = __( 'This entry was posted in %1$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
			} else {
				$utility_text = __( 'This entry was posted by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
			}

			printf(
				$utility_text,
				$categories_list,
				$tag_list,
				esc_url( get_permalink() ),
				the_title_attribute( 'echo=0' ),
				get_the_author(),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
			);
		?>
		<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
