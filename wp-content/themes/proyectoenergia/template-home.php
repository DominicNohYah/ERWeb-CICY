<?php
/**
 * Template Name: template home
 * Description: template for home
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
                        <header class="entry-header">
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                        </header>
				<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                     <!-- .entry-header -->
                    
                        <div class="entry-content">
                            <?php //include (ABSPATH . '/wp-content/plugins/wp-featured-content-slider/content-slider.php'); ?>
                            <?php //the_content(); ?>
                            <?php 
                            	if(!dynamic_sidebar('sidebar-recent')):
                                endif;
                            ?>                            
                        </div><!-- .entry-content -->                        
                    </article><!-- #post-<?php the_ID(); ?> -->

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>