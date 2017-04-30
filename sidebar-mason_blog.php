	<?php dynamic_sidebar('products_blog');?>

<!--PHP Slider Unordered List Generator-->
<?php
	function MasonBuilder( $categoryID ) {
		$args = array( 
			'cat'            	=> $categoryID,
			'posts_per_page'	=> 16, 
			'order'				=> 'ASC', 
			'orderby' 			=> 'title' 
		);
		$postslist = get_posts( $args );
		$MasonPostcount=0;
		$MasonFirstSet = false;
		
		foreach ( $postslist as $post ) : 
			
			setup_postdata( $post );
			
			if ( ($MasonPostcount % 2) == 0){
				$MasonFirstSet = !(bool)$MasonFirstSet;
			};
			
			$thumb_id = get_post_thumbnail_id($post->ID);
			$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
			$thumb_url = $thumb_url_array[0];
			
			if ( $MasonFirstSet == true ){
				if ( ($MasonPostcount % 2) == 0){?> 
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
				<?php } else { ?> 
					<div class="mason-div secondaryBG">
						<div class="mason-img mason-img-2" 
						style="background-image: url( <?php echo $thumb_url;?> );"
						onclick="location.href='<?php echo get_the_permalink( $post->ID ); ?>';"> </div>
						
						<div class="mason-content mason-content-2">
							<h2><?php echo get_the_title( $post->ID ); ?></h2>
							<div class="mason-seperator centered" style="background-image: url(<?php echo esc_url( get_theme_mod( 'RJP_seperator' ) ); ?>);"></div>
							<p><?php echo get_the_excerpt( $post->ID );?></p>
							<div class="mason-connector" style="background-image: url(<?php echo esc_url( get_theme_mod( 'RJP_connector' ) ); ?>);"></div>
							<br>
							<button type="button" class="contact_button boost"
							onclick="location.href='<?php echo get_the_permalink( $post->ID ); ?>';">See More..</button>
						</div>
						
					</div>
				<?php } 
			} else { 
				if ( ($MasonPostcount % 2) == 0){?> 
					<div class="mason-div secondaryBG">
						
						<div class="mason-img mason-img-3" style="background-image: url( <?php echo $thumb_url;?> );"
						onclick="location.href='<?php echo get_the_permalink( $post->ID ); ?>';"> 
							<div class="mason-connector"
							style="background-image: url(<?php echo esc_url( get_theme_mod( 'RJP_connector' ) ); ?>);"></div>
						</div>
						
						<div class="mason-content mason-content-3">
							<h2><?php echo get_the_title( $post->ID ); ?></h2>
							<div class="mason-seperator centered" style="background-image: url(<?php echo esc_url( get_theme_mod( 'RJP_seperator' ) ); ?>);"></div>
							<p><?php echo get_the_excerpt( $post->ID );?></p>
							<br>
							<button type="button" class="contact_button boost"
							onclick="location.href='<?php echo get_the_permalink( $post->ID ); ?>';">See More..</button>
						</div>  
						
					</div>
				<?php } else { ?> 
					<div class="mason-div secondaryBG">
					
						<div class="mason-img mason-img-4" style="background-image: url( <?php echo $thumb_url;?> );"
						onclick="location.href='<?php echo get_the_permalink( $post->ID ); ?>';"> 
							<div class="mason-connector"
							style="background-image: url(<?php echo esc_url( get_theme_mod( 'RJP_connector' ) ); ?>);"></div>
						</div>
						
						<div class="mason-content mason-content-4">
							<h2><?php echo get_the_title( $post->ID ); ?></h2>
							<div class="mason-seperator centered" style="background-image: url(<?php echo esc_url( get_theme_mod( 'RJP_seperator' ) ); ?>);"></div>
							<p><?php echo get_the_excerpt( $post->ID );?></p>
							<br>
							<button type="button" class="contact_button boost"
							onclick="location.href='<?php echo get_the_permalink( $post->ID ); ?>';">See More..</button>
						</div> 
						
					</div>
				<?php 
			}
	}
			$MasonPostcount++;
			
		endforeach; 
		wp_reset_postdata();
	}
	MasonBuilder();
?>













































