<?php
/**
 * Adds the Featured Page Widget.
 *
 * @category Genesis
 * @package  Widgets
 * @author   StudioPress
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     http://www.studiopress.com/themes/genesis
 */

/**
 * Genesis Featured Page widget class.
 *
 * @category Genesis
 * @package Widgets
 *
 * @since 0.1.8
 */
class Genesis_Featured_Page extends WP_Widget {

	/**
	 * Holds widget settings defaults, populated in constructor.
	 *
	 * @var array
	 */
	protected $defaults;

	/**
	 * Constructor. Set the default widget options and create widget.
	 *
	 * @since 0.1.8
	 */
	function __construct() {

		$this->defaults = array(
			'title'           => '',
			'show_title'	=>1,		
			'showposts'      => 1,
			'show_content'    => 'excerpt',
			'show_description'    => '',
			'content_limit'   => '',
			'more_text'       => '',
		);

		$widget_ops = array(
			'classname'   => 'featuredpost',
			'description' => __( 'Displays featured post', 'genesis' ),
		);

		$control_ops = array(
			'id_base' => 'featured-post',
			'width'   => 200,
			'height'  => 250,
		);

		$this->WP_Widget( 'featured-post', __( 'Post Recientes', 'genesis' ), $widget_ops, $control_ops );

	}

	/**
	 * Echo the widget content.
	 *
	 * @since 0.1.8
	 *
	 * @param array $args Display arguments including before_title, after_title, before_widget, and after_widget.
	 * @param array $instance The settings for the particular instance of the widget
	 */
	function widget( $args, $instance ) {

		extract( $args );

		/** Merge with defaults */
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		echo $before_widget;

		/** Set up the author bio */
		if ( ! empty( $instance['title'] ) )
			echo $before_title . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $after_title;

		$featured_page = new WP_Query( array( 'post_type' => 'post', 'showposts' => $instance['showposts']) );
		$cont = 0;
		if ( $featured_page->have_posts() ) : while ( $featured_page->have_posts() ) : $featured_page->the_post();
			$cont++;
			if($cont == $instance['showposts']){
				$class= 'last';
			}else{
				$class ='';
			}
			echo '<div class="post-'.get_the_ID().' post-featured '.$class.'">';

			if ( ! empty( $instance['show_title'] ) )
				printf( '<h2><a href="%s" title="%s">%s</a></h2>', get_permalink(), the_title_attribute( 'echo=0' ), get_the_title() );							
			

			if ( ! empty( $instance['show_content'] )) {
				echo '<div class="cont">';
				if ( 'excerpt' == $instance['show_content'] ){
					the_excerpt();
				}elseif ( 'content-limit' == $instance['show_content'] ){
					the_content_limit( (int) $instance['content_limit'], esc_html( $instance['more_text'] ) );
				}elseif ('description' == $instance['show_content']){					
					echo isset($instance['show_description']) ? '<p>'.$instance['show_description'].'</p>': '';	
				}else{
					the_content( esc_html( $instance['more_text'] ) );									
				}
				
				echo '<div style="clear:both;"></div>';
				echo '</div>';
			}
			echo '<div style="clear:both;"></div>
			</div><!--end post_class()-->' . "\n\n";

			endwhile;
		endif;

		echo $after_widget;
		wp_reset_query();

	}

	/**
	 * Update a particular instance.
	 *
	 * This function should check that $new_instance is set correctly.
	 * The newly calculated value of $instance should be returned.
	 * If "false" is returned, the instance won't be saved/updated.
	 *
	 * @since 0.1.8
	 *
	 * @param array $new_instance New settings for this instance as input by the user via form()
	 * @param array $old_instance Old settings for this instance
	 * @return array Settings to save or bool false to cancel saving
	 */
	function update( $new_instance, $old_instance ) {

		$new_instance['title']     = strip_tags( $new_instance['title'] );		
		$new_instance['more_text'] = strip_tags( $new_instance['more_text'] );
		$new_instance['show_description'] = strip_tags( $new_instance['show_description'] );		
		return $new_instance;

	}

	/**
	 * Echo the settings update form.
	 *
	 * @since 0.1.8
	 *
	 * @param array $instance Current settings
	 */
	function form( $instance ) {

		/** Merge with defaults */
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'genesis' ); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" />
		</p>		
        <p>
			<label for="<?php echo $this->get_field_id( 'showposts' ); ?>"><?php _e( 'Num. Post', 'genesis' ); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'showposts' ); ?>" name="<?php echo $this->get_field_name( 'showposts' ); ?>" value="<?php echo esc_attr( $instance['showposts'] ); ?>" class="widefat" />
		</p>
		<hr class="div" />		

		<p>
			<input id="<?php echo $this->get_field_id( 'show_title' ); ?>" type="checkbox" name="<?php echo $this->get_field_name( 'show_title' ); ?>" value="1"<?php checked( $instance['show_title'] ); ?> />
			<label for="<?php echo $this->get_field_id( 'show_title' ); ?>"><?php _e( 'Show Page Title', 'genesis' ); ?></label>
		</p>        
				
        <p>
					<label for="<?php echo $this->get_field_id( 'show_content' ); ?>"><?php _e( 'Content Type', 'genesis' ); ?>:</label>
					<select id="<?php echo $this->get_field_id( 'show_content' ); ?>" name="<?php echo $this->get_field_name( 'show_content' ); ?>" class="widgt">
						<option value="content" <?php selected( 'content' , $instance['show_content'] ); ?>><?php _e( 'Show Content', 'genesis' ); ?></option>
						<option value="excerpt" <?php selected( 'excerpt' , $instance['show_content'] ); ?>><?php _e( 'Show Excerpt', 'genesis' ); ?></option>
						<option value="content-limit" <?php selected( 'content-limit' , $instance['show_content'] ); ?>><?php _e( 'Show Content Limit', 'genesis' ); ?></option>
                        <option value="description" <?php selected( 'description' , $instance['show_content'] ); ?>><?php _e( 'Show Description', 'genesis' ); ?></option>
						<option value="" <?php selected( '' , $instance['show_content'] ); ?>><?php _e( 'No Content', 'genesis' ); ?></option>
					</select>
					<br />
			<?php if ($instance['show_content']=='content-limit'):?>                    
					<label for="<?php echo $this->get_field_id( 'content_limit' ); ?>"><?php _e( 'Limit content to', 'genesis' ); ?>
						<input type="text" id="<?php echo $this->get_field_id( 'content_limit' ); ?>" name="<?php echo $this->get_field_name( 'content_limit' ); ?>" value="<?php echo esc_attr( intval( $instance['content_limit'] ) ); ?>" size="3" />
						<?php _e( 'characters', 'genesis' ); ?>
					</label>
                   <?php else :
				   		if ($instance['show_content']=='description'):?> 
                   	<label for="<?php echo $this->get_field_id( 'show_description' ); ?>"><?php _e( 'Description', 'genesis' ); ?>:</label><br />
            		<textarea style="width:229px; height:175px;" id="<?php echo $this->get_field_id( 'show_description' ); ?>" name="<?php echo $this->get_field_name( 'show_description' ); ?>"><?php echo isset($instance['show_description'])?$instance['show_description']:'';?></textarea>
                   
            		<?php endif;
				endif;?>
				</p>       	

		<p>
			<label for="<?php echo $this->get_field_id( 'more_text' ); ?>"><?php _e( 'More Text', 'genesis' ); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'more_text' ); ?>" name="<?php echo $this->get_field_name( 'more_text' ); ?>" value="<?php echo esc_attr( $instance['more_text'] ); ?>" />
		</p>        
		<?php

	}

}
add_action( 'admin_print_footer_scripts','gfwa_form_submit' );

        function gfwa_form_submit() {
?>
            <script type="text/javascript">

                (function(a) {
                    a('select.widgt, input[type=checkbox].widgt').live('change', function(){
                        wpWidgets.save( a(this).closest('div.widget'), 0, 1, 0 );
                        return false;
                    });
                })(jQuery);

            </script>
<?php
        }
//add_action( 'sidebar_admin_setup', 'admin_setup');
function admin_setup() {
		wp_enqueue_media();
		wp_enqueue_script( 'tribe-image-widget', get_bloginfo('stylesheet_directory').'/js/image-widget.js', array( 'jquery', 'media-upload', 'media-views' ));

		wp_localize_script( 'tribe-image-widget', 'TribeImageWidget', array(
			'frame_title' => __( 'Select an Image', 'image_widget' ),
			'button_title' => __( 'Insert Into Widget', 'image_widget' ),
		) );
}