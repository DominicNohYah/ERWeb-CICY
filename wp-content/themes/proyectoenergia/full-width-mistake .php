<?php
/**
 * Template Name: Investigadores
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

		<div id="primary">
        
       			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php the_content(); ?>

				<?php endwhile; // end of the loop. ?>
                
                <?php wp_reset_query(); 
          $arg = array(
	 'numberposts' => 10,	  
     'category' => 8,
     'order' =>'ASC'
     );
    $postas = get_posts($arg);
        
$contador=0;          
foreach($postas as $post) : setup_postdata($post);  

$colorbox;
$contador = 1 +$contador;
$resto = $contador%2;

if ($resto==0) { 

$colorbox="whitebox";

} else{$colorbox="greybox2";}

echo '<div class="'.$colorbox.'">';
echo '<div class="title-post">'; echo $contador.'.-';  the_title(); echo '</div>';
echo '<div class="contenido-post">'; the_content(); echo '</div>';
  wp_reset_postdata();

echo '</div>';

endforeach; 
               
?>
                

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>