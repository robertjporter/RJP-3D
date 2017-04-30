<?php 
	get_header();

		if (have_posts()) :
			while (have_posts()) : the_post();
	?>
	<br>
		<article class="post">
			<?php
				$thumb_id = get_post_thumbnail_id();
				$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
				$thumb_url = $thumb_url_array[0];
			?>
			
			<div class="mason-post-banner"
				style="background-image: url( <?php echo $thumb_url;?> );">
			</div>
			
			<div class="mason-content">
				
				<div class="secondaryBG mason-head">
					<h4 class="centered">
						<?php
							$categories = get_the_category();
							$seperator = ", ";
							$output = '';
							
							if($categories) {
								foreach ($categories as $category) {
									$output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>'. $seperator;
								}
								echo trim($output, $seperator);
							}
						?>
					</h4>
					
					<br>
					
					<h1 class="centered"> 
						<a href= "<?php the_permalink(); ?>">
							<?php the_title(); ?> 
						</a>	
						<div class="mason-seperator centered" style="background-image: url(<?php echo esc_url( get_theme_mod( 'RJP_seperator' ) ); ?>);"></div>
					</h1>
					
					
					
					<h4 class="centered">
						<?php the_time('dS/F/Y');  ?>
					</h4>
					
				</div>
				
				<div class="mason-page-connector" style="background-image: url(<?php echo esc_url( get_theme_mod( 'RJP_connector' ) ); ?>);"></div>
				
				<div class="mason-post-info">
					<?php the_content('Get more awesome &raquo;'); ?>
				</div>
			
			<!-- CONTACT FORM-->
			<div class="RJP_conatact_form_7 centered">
				<?php 
					echo do_shortcode( '[contact-form-7 id="1234" title="Contact form 1"]' ); 
				?>
			</div>
				
				<br>
				<br>	
				<?php 
					endwhile;
					else :
						echo '<p>No content found</p>';
					endif;
				get_footer();
				?>
			</div>
		</article>
