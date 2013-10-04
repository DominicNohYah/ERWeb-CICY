<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">

			<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with three columns of widgets.
				 */
				if ( ! is_404() )
					get_sidebar( 'footer' );
			?>

			<div id="site-generator">
			<span class="textfooter">Todos los derechos reservados CICY ER 2013</span>
              <div class="contenedor_mbanner">
                <a href="https://www.facebook.com/pages/Proyecto-Energ%C3%ADa-Sustentable/242525039232979?fref=ts" target="_blank"><img src="<?php bloginfo('template_directory')?>/images/FcN.png" border="0"/></a>
                <a href="https://twitter.com/CicyEnergaRenov" target="_blank" ><img src="<?php bloginfo('template_directory')?>/images/TwitN.png" border="0"/></a>
                <a href="http://www.youtube.com/channel/UCH865H7idNf7PIwn6M-cnlw" target="_blank"><img src="<?php bloginfo('template_directory')?>/images/YoutubeN.png" border="0"/></a>
              </div>
            </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>