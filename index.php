<?php get_header(); ?>
<div id="home"></div>

	<!-- HEADER SLIDER-->
	<?php dynamic_sidebar('header_slider'); ?>
<!-- HEADER SLIDER--------------------------------------
_  _ ____ ____ ___  ____ ____    ____ _    _ ___  ____ ____ 
|__| |___ |__| |  \ |___ |__/    [__  |    | |  \ |___ |__/ 
|  | |___ |  | |__/ |___ |  \    ___] |___ | |__/ |___ |  \

----------------------------------------------------- -->
<!-- SLIDER HTML -->
<!-- Image unordered list builder -->


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
		</ul>




	<!-- -----------------MAIN BODY CONTENT-------------------- -->
<div class="site-content">
	
	
	<!-- PRODUCTS BLOG --> 
	
	<?php //get_sidebar( 'mason_blog' ); ?>
	
	<!-- MASON BLOG --> 
	<div class="mason-blog">
	<?php RJP_MasonBlog_section() ?>
	</div>
	
	<!-- TESTEMONIALS-->
	<?php RJP_testemonials_section() ?>
	<br>
	
	<!-- CONTACT FORM-->
	<?php //RJP_Contact_section()	
	//echo do_shortcode( '[sitepoint_contact_form]' );
	?>
	
	<div class="RJP_conatact_form_7 centered">
	<?php 
		echo do_shortcode( '[contact-form-7 id="1234" title="Contact form 1"]' ); 
	?>
	</div>
	
</div>

<div class="nav-buffer"  id="footer"></div>

<?php get_footer(); ?>

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	