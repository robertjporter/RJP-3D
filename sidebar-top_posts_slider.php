<?php dynamic_sidebar('top_posts_slider'); ?>
<!-- HEADER SLIDER--------------------------------------
___ ____ ___     ___  ____ ____ ___ ____    ____ _    _ ___  ____ ____ 
 |  |  | |__]    |__] |  | [__   |  [__     [__  |    | |  \ |___ |__/ 
 |  |__| |       |    |__| ___]  |  ___]    ___] |___ | |__/ |___ |  \ 
 
----------------------------------------------------- -->
<!-- Build a rolling slider using the featured image, title and catagories of all posts with the "Header" tag-->

<!--Slider Content -->
<ul class="post_slider" id="RJPSlider">
	<?php
		$args = array( 
			'posts_per_page' => 5,
			'category_name' => 'Featured'
		);

		$myposts = get_posts( $args );
		foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
		
			<?php
				$thumb_id = get_post_thumbnail_id();
				$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
				$thumb_url = $thumb_url_array[0];
			?>
			
			<li>
				<a class="post_slider_img" 
				style="background-image: url(<?php echo $thumb_url;?>)"
				href="<?php the_permalink(); ?>"
				>
					<div class="post_slider_text secondaryBG">
						<div class="centered">
							<h1 class="centered"><?php echo get_the_title( $post->ID ); ?></h1>
							<p><?php echo get_the_excerpt( $post->ID );?></p>
						</div>
					</div>
				</a>
			</li>
			
		<?php endforeach; 
		wp_reset_postdata();
	?>
</ul>

<div class="control">
	<span class="prev">
		<img alt="previous" src="<?php bloginfo('template_url'); ?>/img/Icons/prev.png" height="64px"/> 
	</span>
	
	<ul class="triggers">
		<li id="triggerTest" class="triggerBtn"></li>
		<li id="triggerTest" class="triggerBtn"></li>
		<li id="triggerTest" class="triggerBtn"></li>
	</ul>

	<span class="next"> 
		<img alt="next" src="<?php bloginfo('template_url'); ?>/img/Icons/next.png" height="64px"/> 
	</span>
</div>

<!-- SLIDER JQUERY -->
<script type="text/javascript">
	(function ($) {
		$(function () {
			
			/*Variables*/
			var imgCount = $('ul.triggers li').length-1;
			var nextImg = 1;
			var prevImg = imgCount;
			var activeImg = 0;
			
			var imgTime = 10000; 
			var transition_speed = 2000;
			
			var int = setInterval(cycleNext, imgTime);
			

			
			/*Hide consol when not needed*/
			$( document ).ready(function() {
				if (imgCount === 0){
					$( ".control" ).hide();
				}
			});
			
			/*Populate variables*/
			numberSet();
			
			/*ACTIONS*/
			/*Next*/
			function cycleNext(){
				if (activeImg === imgCount) {
					activeImg = 0;
				}
				else {
					activeImg = activeImg+1;
				}
				numberSet();
			}
			/*Prev*/
			function cyclePrev(){
				if (activeImg === 0) {
					activeImg = imgCount;
				}
				else {
					activeImg -= 1;
				}
				numberSet();
			}
			
			/*Next Img Button press*/
			$('.next').click(function() {
				cycleNext();
			});
			
			/*Prev Img Button press*/
			$('.prev').click(function() {
				cyclePrev();
			});
			
			/*check if sliding is needed*/
			
			/*NUMBER SET FUNCTION*/
			function numberSet(){
				if (activeImg === imgCount){
					nextImg = 0;
				}
				else {
					nextImg = activeImg+1;
				}
				if (activeImg === 0){
					prevImg === imgCount
				}
				else {
					prevImg = activeImg-1;
				}
				

				/*Remove last Img*/
				$( ".post_slider_img" ).fadeOut(500);
				
				/*Disable inputs*/
				
				/*Add next Img*/
				jQuery(".post_slider_img:eq("+activeImg+")").delay(500).fadeIn(500);
				
				/*Re-enable inputs*/

				
				/*Update triggers*/
				$( ".triggerBtn" ).removeClass( "set" );
				jQuery(".triggerBtn:eq("+activeImg+")").addClass("set");
				
				/*Rest Timer*/			
					clearInterval(int);
					int = setInterval(cycleNext, imgTime);
				
				
			}
			/*Numbered controls*/
			$('.triggerBtn').click(function() {
				activeImg = $(this).index();
				numberSet();
			});
			
		});
	})(jQuery);
</script>













