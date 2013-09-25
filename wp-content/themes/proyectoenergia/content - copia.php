<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

		<?php if ( is_search() ) : ?>
        
          <?php if ( get_post_type() == 'post' ){?>
			 
                     <div class="fondoarticle">
	    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="articulostyle">
		<div class="contenedorCP">
        <div class="entry-content">
        <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
                    
			<?php the_excerpt();?>
		</div><!-- .entry-content -->
        <div class="image-posts"> <?php the_post_thumbnail(array(254,226));?> </div>
        <div class="marco-foto"></div>  
        </div><!--fin contenedorCP-->
		
            <footer class="entry-meta"> 
			<?php $show_sep = false; ?>
			<?php if ( is_object_in_taxonomy( get_post_type(), 'category' ) ) : // Hide category text when not supported ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'twentyeleven' ) );
				if ( $categories_list ):
			?>
			<span class="cat-links">
				<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'twentyeleven' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list );
				$show_sep = true; ?>
			</span>
			<?php endif; // End if categories ?>
			<?php endif; // End if is_object_in_taxonomy( get_post_type(), 'category' ) ?>
            <?php echo '<a href="'.esc_url( get_permalink() ).'" class="btnleer" >Leer más...</a>'; ?>
            <div class="comentarios"><?php comments_number('0','1','%'); ?></div>
            <p>Compartir:</p>
<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>"  class="facebook" target="blank"><img src="<?php bloginfo('template_directory')?>/images/face.png" border="0"/></a>                 
            
            <a href="https://twitter.com/share" class="twitter" target="_blank" data-via="cicyenergarenovable" data-lang="es" data-related="cicyenergarenovable" data-hashtags="Energía"><img src="<?php bloginfo('template_directory')?>/images/twt.png" border="0"/></a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>               
			<?php if ( is_object_in_taxonomy( get_post_type(), 'post_tag' ) ) : // Hide tag text when not supported ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'twentyeleven' ) );
				if ( $tags_list ):
				if ( $show_sep ) : ?>
			<span class="sep"> | </span>
				<?php endif; // End if $show_sep ?>
			<span class="tag-links">
				<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'twentyeleven' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list );
				$show_sep = true; ?>
			</span>
			<?php endif; // End if $tags_list ?>
			<?php endif; // End if is_object_in_taxonomy( get_post_type(), 'post_tag' ) ?>

			<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post-<?php the_ID(); ?> -->
	</div> <!-- fin de div fondo-->
			 
			  
			 <?php }?>
			  
			 <?php if ( get_post_type() == 'empresa' ){ ?>
				
			  
			 <?php } ?>
             
			
			 <?php if ( get_post_type() == 'testimonial' ){ ?>
				
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
                echo '<div class="contenido-inv">';  echo'</div>';
                echo '<label class="ETQN">Correo electrónico</label><br/>'; 
                echo '<div class="contenido-inv">'; meta('Correo_investigador'); echo '</div>';
              ?>
      
              </div>
		     <?php  } ?>   
		
   
		<?php else : ?>
        <div class="fondoarticle">
	    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="articulostyle">
		<div class="contenedorCP">
        <div class="entry-content">
        <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
                    
			<?php the_excerpt();?>
		</div><!-- .entry-content -->
        <div class="image-posts"> <?php the_post_thumbnail(array(254,226));?> </div>
        <div class="marco-foto"></div>  
        </div><!--fin contenedorCP-->
		
        		<footer class="entry-meta"> 
			<?php $show_sep = false; ?>
			<?php if ( is_object_in_taxonomy( get_post_type(), 'category' ) ) : // Hide category text when not supported ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'twentyeleven' ) );
				if ( $categories_list ):
			?>
			<span class="cat-links">
				<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'twentyeleven' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list );
				$show_sep = true; ?>
			</span>
			<?php endif; // End if categories ?>
			<?php endif; // End if is_object_in_taxonomy( get_post_type(), 'category' ) ?>
            <?php echo '<a href="'.esc_url( get_permalink() ).'" class="btnleer" >Leer más...</a>'; ?>
            <div class="comentarios"><?php comments_number('0','1','%'); ?></div>
            <p>Compartir:</p>
<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>"  class="facebook" target="blank"><img src="<?php bloginfo('template_directory')?>/images/face.png" border="0"/></a>                 
            
            <a href="https://twitter.com/share" class="twitter" target="_blank" data-via="cicyenergarenovable" data-lang="es" data-related="cicyenergarenovable" data-hashtags="Energía"><img src="<?php bloginfo('template_directory')?>/images/twt.png" border="0"/></a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>               
			<?php if ( is_object_in_taxonomy( get_post_type(), 'post_tag' ) ) : // Hide tag text when not supported ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'twentyeleven' ) );
				if ( $tags_list ):
				if ( $show_sep ) : ?>
			<span class="sep"> | </span>
				<?php endif; // End if $show_sep ?>
			<span class="tag-links">
				<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'twentyeleven' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list );
				$show_sep = true; ?>
			</span>
			<?php endif; // End if $tags_list ?>
			<?php endif; // End if is_object_in_taxonomy( get_post_type(), 'post_tag' ) ?>

			<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post-<?php the_ID(); ?> -->
	</div> <!-- fin de div fondo-->
		<?php  endif; ?>