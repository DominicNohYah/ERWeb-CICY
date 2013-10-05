<?php 
/**
 * @package Featured articles PRO - Wordpress plugin
 * @author CodeFlavors ( codeflavors[at]codeflavors.com )
 * @version 2.4
 * 
 * For more information on FeaturedArticles template functions, see: http://www.codeflavors.com/documentation/display-slider-file/
 */
?>
<div class="FA_overall_container_classic_responsive <?php the_slider_color();?>" style="<?php the_slider_width();?>" id="<?php echo $FA_slider_id;?>">	
	<div class="FA_featured_articles" style="<?php the_slider_height();?>">
	<?php foreach ($postslist as $i => $post): ?>
		<div class="FA_article <?php the_fa_class();?>" style="<?php if($i > 0):?> display:none;<?php endif;?>">	
			<div class="FA_wrap">
				<?php 
					/**
					 * Template function to display post image.
					 */
					the_fa_image('', '');
				?>				
				<?php 
					/**
					 * Template function to display post title
					 */
					the_fa_title('<h2>', '</h2>');
				?>
				
				<?php 
					/**
					 * Post author
					 */
					the_fa_author('<span class="FA_author">', '</span>');
				?>
				
				<?php 
					/**
					 * Template function to display the post date
					 */
					the_fa_date('<span class="FA_date">', '</span>');
				?> 
				               
                <?php 
                	/**
                	 * Template function to display content. Has the ability to run or not shortcodes
                	 */
                	the_fa_content('<div class="fa_content">', '</div>');
                ?>
                
                <?php 
                	/**
                	 * Template function to display read more link. Only argument is link CSS class
                	 */
                	the_fa_read_more('FA_read_more');
                ?>
	        	      	                      
			</div>			
		</div>	
	<?php endforeach;?>			
	</div>
	<?php if( has_bottom_nav() && count($postslist) > 1 ):?>
		<ul class="FA_navigation">
		<?php foreach ($postslist as $k=>$post):?>
			<li<?php if($k==0):?> class="first"<?php endif;?>><a href="#" title="<?php the_title();?>"></a></li>
		<?php endforeach;?>
		</ul>			
	<?php endif;?>
	<?php if( has_sideways_nav() && count($postslist) > 1 ):?>
		<a href="#" title="<?php __('Previous post');?>" class="FA_back"></a>
		<a href="#" title="<?php __('Next post');?>" class="FA_next"></a>
	<?php endif;?>	
</div>