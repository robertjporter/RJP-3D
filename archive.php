<?php
/* 
Template Name: Archives
*/ get_header(); ?>

<!-- HEADER SLIDER-->
	<?php get_sidebar( 'header_slider' ); ?>

<div id="primary" class="site-content">
	<div id="content" role="main">

		<?php while ( have_posts() ) : the_post(); 
		
			$thumb_id = get_post_thumbnail_id($post->ID);
			$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
			$thumb_url = $thumb_url_array[0];
		?>


			<div class="mason-div secondaryBG">
						
				<div class="mason-img mason-img-1" 
					style="background-image: url( <?php echo $thumb_url;?> );"
					onclick="location.href='<?php echo get_the_permalink( $post->ID ); ?>';"> 
				</div>
				
				<div class="mason-content mason-content-1">
					<h2 class="centered"
					onclick="location.href='<?php echo get_the_permalink( $post->ID ); ?>';">
						<?php echo get_the_title( $post->ID ); ?>
					</h2>
					<div class="mason-seperator centered" style="background-image: url(<?php echo esc_url( get_theme_mod( 'RJP_seperator' ) ); ?>);"></div>
					<p><?php echo get_the_excerpt( $post->ID );?></p>
					<div class="mason-connector" style="background-image: url(<?php echo esc_url( get_theme_mod( 'RJP_connector' ) ); ?>);"></div>
					<br>
					<button type="button" class="contact_button boost"
					onclick="location.href='<?php echo get_the_permalink( $post->ID ); ?>';">See More..</button>
				</div>
		
			</div>
			
		<?php endwhile; // end of the loop. ?>
	</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>