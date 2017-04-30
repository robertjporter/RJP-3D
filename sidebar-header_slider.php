<?php dynamic_sidebar('header_slider'); ?>
<!-- HEADER SLIDER--------------------------------------
_  _ ____ ____ ___  ____ ____    ____ _    _ ___  ____ ____ 
|__| |___ |__| |  \ |___ |__/    [__  |    | |  \ |___ |__/ 
|  | |___ |  | |__/ |___ |  \    ___] |___ | |__/ |___ |  \

----------------------------------------------------- -->
<!-- SLIDER HTML -->
<!-- Image unordered list builder -->

<!--Build logo from cms OR print the Site title and description (TODO: swap log for custom image and text-->
		<?php if ( get_theme_mod( 'RJP_banner_overlay_img' ) ) { ?>
		
		<div class='site-logo'>
			<a href='
				<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
				
				<img class='site-logo-img' src='<?php echo esc_url( get_theme_mod( 'RJP_banner_overlay_img' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
			</a>
		</div>
		
		<?php } else{ ?>
		
		<hgroup class="title_description">
			<h1 class='site-title'>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?>
				</a>
			</h1>
			
			<h2 class='site-description centered'><?php bloginfo( 'description' ); ?></h2>
		</hgroup>

		<?php }?>
<!--End overlay text/img-->
<ul class="RJPSlider" id="RJPSlider">
	<?php if ( get_theme_mod( 'RJP_banner_img_00' ) ) : ?>
		<li>
			<a class="slider-img active"
				style="background-image: url(<?php echo esc_url( get_theme_mod( 'RJP_banner_img_00' ) ); ?>)"
				href="<?php echo esc_url( get_theme_mod( 'RJP_banner_link_00' ) ); ?>"
			></a>
		</li>
	<?php endif; ?>
	
	<?php if ( get_theme_mod( 'RJP_banner_img_01' ) ) : ?>
		<li>
			<a class="slider-img"
				style="background-image: url(<?php echo esc_url( get_theme_mod( 'RJP_banner_img_01' ) ); ?>)"
				href="<?php echo esc_url( get_theme_mod( 'RJP_banner_link_01' ) ); ?>"
			></a>
		</li>
	<?php endif; ?>
	
	<?php if ( get_theme_mod( 'RJP_banner_img_02' ) ) : ?>
		<li>
			<a class="slider-img"
				style="background-image: url(<?php echo esc_url( get_theme_mod( 'RJP_banner_img_02' ) ); ?>)"
				href="<?php echo esc_url( get_theme_mod( 'RJP_banner_link_02' ) ); ?>"
			></a>
		</li>
	<?php endif; ?>
	
	<?php if ( get_theme_mod( 'RJP_banner_img_03' ) ) : ?>
		<li>
			<a class="slider-img"
				style="background-image: url(<?php echo esc_url( get_theme_mod( 'RJP_banner_img_03' ) ); ?>)"
				href="<?php echo esc_url( get_theme_mod( 'RJP_banner_link_03' ) ); ?>"
			></a>
		</li>
	<?php endif; ?>
	
	<?php if ( get_theme_mod( 'RJP_banner_img_04' ) ) : ?>
		<li>
			<a class="slider-img"
				style="background-image: url(<?php echo esc_url( get_theme_mod( 'RJP_banner_img_04' ) ); ?>)"
				href="<?php echo esc_url( get_theme_mod( 'RJP_banner_link_04' ) ); ?>"
			></a>
		</li>
	<?php endif; ?>

</ul>
<!-- Slider Control Pannel -->
<?php if ( '1' == get_theme_mod( 'RJP_slider_controls' ) ) { ?>
	<div class="control">
		<span class="prev">
			<img alt="previous" src="<?php bloginfo('template_url'); ?>/img/Icons/prev.png" height="64px"/> 
		</span>
		
		<ul class="triggers">
		   <?php if ( get_theme_mod( 'RJP_banner_img_00' ) ) : ?>
				<li id="triggerTest" class="triggerBtn"></li>
			<?php endif; ?>
			
			<?php if ( get_theme_mod( 'RJP_banner_img_01' ) ) : ?>
				<li id="triggerTest" class="triggerBtn"></li>
			<?php endif; ?>
			
			<?php if ( get_theme_mod( 'RJP_banner_img_02' ) ) : ?>
				<li id="triggerTest" class="triggerBtn"></li>
			<?php endif; ?>
			
			<?php if ( get_theme_mod( 'RJP_banner_img_03' ) ) : ?>
				<li id="triggerTest" class="triggerBtn"></li>
			<?php endif; ?>
			
			<?php if ( get_theme_mod( 'RJP_banner_img_04' ) ) : ?>
				<li id="triggerTest" class="triggerBtn"></li>
			<?php endif; ?>
		</ul>

		<span class="next"> 
			<img alt="next" src="<?php bloginfo('template_url'); ?>/img/Icons/next.png" height="64px"/> 
		</span>
	</div>
<?php } ?>

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
				$( ".slider-img" ).fadeOut(500);
				
				/*Disable inputs*/
				
				/*Add next Img*/
				jQuery(".slider-img:eq("+activeImg+")").delay(500).fadeIn(500);
				
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