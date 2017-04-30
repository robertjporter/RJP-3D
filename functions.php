<?php

	//--------------ENQUE SCRIPTS-------------
	function RJP_scripts_styles() {

		/*   CALL ALL CSS AND SCRIPTS FOR SITE */
		wp_enqueue_style('style', get_stylesheet_uri());
		wp_enqueue_script( 'threejs', get_template_directory_uri() . '/js/three.min.js', array ( 'jquery' ), 1.1, false);
		wp_enqueue_script( 'OrbitControls', get_template_directory_uri() . '/js/OrbitControls.js', array ( 'jquery' ), 1.1, false);
	}
	add_action( 'wp_enqueue_scripts', 'RJP_scripts_styles' );
	
	
//----------------------------------------------------------------//
//THEME SETUP
//----------------------------------------------------------------//
function RJP_Redux_setup() {
	//Add Featured Image support
	add_theme_support('post-thumbnails');
	add_image_size('medium-thumbnail', 180, 180, true);
	add_image_size('banner-image', 920, 210, true);
}
add_action('after_setup_theme', 'RJP_Redux_setup');


//Customize excerpt word count length
function RJP_Redux_excerpt_length(){
	return 50;
}
add_filter('excerpt_length', 'RJP_Redux_excerpt_length');

//----------------------------------------------------------------//
//META BOXES
//----------------------------------------------------------------//

function add_your_fields_meta_box() {
	add_meta_box(
		'your_fields_meta_box', // $id
		'Your Fields', // $title
		'show_your_fields_meta_box', // $callback
		'post', // $screen
		'normal', // $context
		'high' // $priority
	);
	
	add_meta_box(
		'your_fields_meta_box', // $id
		'Your Fields', // $title
		'show_your_fields_meta_box', // $callback
		'page', // $screen
		'normal', // $context
		'high' // $priority
	);
}
add_action( 'add_meta_boxes', 'add_your_fields_meta_box' );

function show_your_fields_meta_box() {
	global $post;  
		$meta = get_post_meta( $post->ID, 'your_fields', true ); ?>

	<input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

	<p>
		<label for="your_fields[image]">Preveiw</label><br>
		<input type="text" name="your_fields[image]" id="your_fields[image]" class="meta-image regular-text" value="<?php echo $meta['image']; ?>">
		<input type="button" class="button image-upload" value="Browse">
	</p>
	
	<div class="image-preview"><img src="<?php echo $meta['image']; ?>" style="max-width: 128px;"></div>
	
	<h1> Low level of definition </h1>
	
	<p>
		<label for="your_fields[image]">Texture Map 512x512  or less</label><br>
		<input type="text" name="your_fields[Col_Map]" id="your_fields[Col_Map]" class="meta-image regular-text" value="<?php echo $meta['Col_Map']; ?>">
		<input type="button" class="button image-upload" value="Browse">
	</p>
	
	<div class="image-preview"><img src="<?php echo $meta['Col_Map']; ?>" style="max-width: 128px;"></div>
	
	<p>
		<label for="your_fields[image]">Specular Map 512x512  or less</label><br>
		<input type="text" name="your_fields[Spec_Map]" id="your_fields[Spec_Map]" class="meta-image regular-text" value="<?php echo $meta['Spec_Map']; ?>">
		<input type="button" class="button image-upload" value="Browse">
	</p>
	
	<div class="image-preview"><img src="<?php echo $meta['Spec_Map']; ?>" style="max-width: 128px;"></div>
	
	<p>
		<label for="your_fields[image]">Normal Map 512x512  or less</label><br>
		<input type="text" name="your_fields[Norm_Map]" id="your_fields[Norm_Map]" class="meta-image regular-text" value="<?php echo $meta['Norm_Map']; ?>">
		<input type="button" class="button image-upload" value="Browse">
	</p>
	
	<div class="image-preview"><img src="<?php echo $meta['Norm_Map']; ?>" style="max-width: 128px;"></div>
	
	<p>
		<label for="your_fields[image]">UV overlay Map 512x512  or less</label><br>
		<input type="text" name="your_fields[UV_Map]" id="your_fields[UV_Map]" class="meta-image regular-text" value="<?php echo $meta['UV_Map']; ?>">
		<input type="button" class="button image-upload" value="Browse">
	</p>
	
	<div class="image-preview"><img src="<?php echo $meta['UV_Map']; ?>" style="max-width: 128px;"></div>
	
	<p>
		<label for="your_fields[image]">3D Model file (.js) Update</label><br>
		<input type="text" name="your_fields[Mesh]" id="your_fields[Mesh]" class="meta-image regular-text" value="<?php echo $meta['Mesh']; ?>">
		<input type="button" class="button image-upload" value="Browse">
	</p>
	
<script>
jQuery(document).ready(function ($) {

	// Instantiates the variable that holds the media library frame.
	var meta_image_frame;
	// Runs when the image button is clicked.
	$('.image-upload').click(function (e) {
		// Prevents the default action from occuring.
		e.preventDefault();

		var meta_image = $(this).parent().children('.meta-image');

		// If the frame already exists, re-open it.
		if (meta_image_frame) {
			meta_image_frame.open();
			return;
		}
		// Sets up the media library frame
		meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
			title: meta_image.title,
			button: {
				text: meta_image.button
			}
		});
		// Runs when an image is selected.
		meta_image_frame.on('select', function () {
			// Grabs the attachment selection and creates a JSON representation of the model.
			var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
			// Sends the attachment URL to our custom image input field.
			meta_image.val(media_attachment.url);

			//var image_url = meta_image.val();
			//$(selected).closest('div').find('.image-preview').children('img').attr('src', image_url);
		});
		// Opens the media library frame.
		meta_image_frame.open();
	});
});
</script>

	<?php }

function save_your_fields_meta( $post_id ) {   
	// verify nonce
	if ( !wp_verify_nonce( $_POST['your_meta_box_nonce'], basename(__FILE__) ) ) {
		return $post_id; 
	}
	// check autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}
	// check permissions
	if ( 'page' === $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) ) {
			return $post_id;
		} elseif ( !current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}  
	}
	
	$old = get_post_meta( $post_id, 'your_fields', true );
	$new = $_POST['your_fields'];

	if ( $new && $new !== $old ) {
		update_post_meta( $post_id, 'your_fields', $new );
	} elseif ( '' === $new && $old ) {
		delete_post_meta( $post_id, 'your_fields', $old );
	}
}
add_action( 'save_post', 'save_your_fields_meta' );

//----------------------------------------------------------------//
//Navigation Menues
//----------------------------------------------------------------//

register_nav_menus(array(
	'primary' => __( 'Primary Nav Menue')
));


//----------------------------------------------------------------//
//CUSTOM FUNCTIONS
//----------------------------------------------------------------//
function improved_trim_excerpt($text) {
	global $post;
	if ( '' == $text ) {
		$text = get_the_content('');
		$text = apply_filters('the_content', $text);
		$text = str_replace('\]\]\>', ']]&gt;', $text);
		$text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
		$text = strip_tags($text, '<p>');
		$excerpt_length = 25;
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words)> $excerpt_length) {
			array_pop($words);
			array_push($words, '..');
			$text = implode(' ', $words);
		}
	}
	return $text;
}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'improved_trim_excerpt');
//----------------------------------------------------------------//
//CMS CUSTOMIZE 
//----------------------------------------------------------------//

function RobertJPorter_customize_register($wp_customize){
	
	/* 1. SETTINGS ---------------------------------------------------	
	____ ____ ___ ___ _ _  _ ____ ____ 
	[__  |___  |   |  | |\ | | __ [__  
	___] |___  |   |  | | \| |__] ___] 
	
	----------------------------------------------------------------*/
	//Register new settings to the WP database...
		//----------------------------------------------------------------//
		//SITE STYLE SETTINGS
		//----------------------------------------------------------------//
		//Logo image 
		$wp_customize->add_setting( 'RJP_logo' ); 
		
		//connection image 
		$wp_customize->add_setting( 'RJP_connector' ); 
		
		//seperator image 
		$wp_customize->add_setting( 'RJP_seperator' ); 
		
		$wp_customize->add_setting( 'RJP_primaryBG', array(
		'default' => '#30302f'));
		
		$wp_customize->add_setting( 'RJP_secondaryBG', array(
		'default' => '#212121'));
		
		$wp_customize->add_setting( 'RJP_boost_col', array(
		'default' => '#ffa500'));
		
		$wp_customize->add_setting( 'RJP_boost_text_col', array(
		'default' => '#ffffff'));
		
		$wp_customize->add_setting( 'RJP_header_col', array(
		'default' => '#ffa500'));
		
		$wp_customize->add_setting( 'RJP_text_col', array(
		'default' => '#ffffff'));
		
		$wp_customize->add_setting( 'RJP_nav_bar_col', array(
		'default' => '#ffffff'));
		
		$wp_customize->add_setting( 'RJP_nav_menu_col', array(
		'default' => '#ffffff'));
		
		$wp_customize->add_setting( 'RJP_nav_title_col', array(
		'default' => '#ffffff'));
		
		//----------------------------------------------------------------//
		//SLIDER SETTINGS
		//----------------------------------------------------------------//
		//Show COntrols?
		$wp_customize->add_setting( 'RJP_slider_controls' , array(
			'default'    => '1'
		));
		
	
		//Banner Overlay 
		$wp_customize->add_setting( 'RJP_banner_overlay_head' ); 
		$wp_customize->add_setting( 'RJP_banner_overlay_text' ); 
		$wp_customize->add_setting( 'RJP_banner_overlay_img' ); 
		
		//Banner Slide images 
		$wp_customize->add_setting( 'RJP_banner_img_00' ); 
		$wp_customize->add_setting( 'RJP_banner_img_01' ); 
		$wp_customize->add_setting( 'RJP_banner_img_02' ); 
		$wp_customize->add_setting( 'RJP_banner_img_03' ); 
		$wp_customize->add_setting( 'RJP_banner_img_04' ); 
		
		//Banner Slide links 
		$wp_customize->add_setting( 'RJP_banner_link_00' ); 
		$wp_customize->add_setting( 'RJP_banner_link_01' ); 
		$wp_customize->add_setting( 'RJP_banner_link_02' ); 
		$wp_customize->add_setting( 'RJP_banner_link_03' ); 
		$wp_customize->add_setting( 'RJP_banner_link_04' ); 
		
		//----------------------------------------------------------------//
		//INTRODUCTION SETTINGS
		//----------------------------------------------------------------//
		//Activate?
		$wp_customize->add_setting( 'RJP_intro_active' , array(
			'default'    => '1'
		));
		//Title
		$wp_customize->add_setting( 'RJP_intro_title' );
		//Body
		$wp_customize->add_setting( 'RJP_intro_body' );
		//contact
		$wp_customize->add_setting( 'RJP_intro_contact');
		
		
		
	/*2. SECTIONS ----------------------------------------------------
	____ ____ ____ ___ _ ____ _  _ ____ 
	[__  |___ |     |  | |  | |\ | [__  
	___] |___ |___  |  | |__| | \| ___]
	
	----------------------------------------------------------------*/
	//Define a new section (if desired) to the Theme Customizer
		
		//SLIDER SECTIONS--------------------------------------------------------------------
		//Navigation Menu
		$wp_customize->add_section('RJP_site_style', array(
			'title' => __('Site Style', 'RJP'),
			'priority' => 0,
		));
		
		$wp_customize->add_section('RJP_slider', array(
			'title' => __('Slider', 'RJP'),
			'priority' => 1,
		));
		
		//Introduction
		$wp_customize->add_section('RJP_intro', array(
			'title' => __('Introduction', 'RJP'),
			'priority' => 2,
		));
		
		
		
		//Contact
		$wp_customize->add_section('RJP_contact', array(
			'title' => __('Contact Information', 'RJP'),
			'priority' => 19,
		));
		
		
	/* 3. CONTROLS---------------------------------------------------
	____ ____ _  _ ___ ____ ____ _    ____ 
	|    |  | |\ |  |  |__/ |  | |    [__  
	|___ |__| | \|  |  |  \ |__| |___ ___] 

	----------------------------------------------------------------*/
	//Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
		
		//----------------------------------------------------------------//
		//SITE STYLE CONTROLS
		//----------------------------------------------------------------//
		
		//Logo image control (defines image upload option in cms)
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'RJP_logo', array(
		'label'    => __( 'Site Logo', 'RJP' ),
		'section'  => 'RJP_site_style',
		'settings' => 'RJP_logo',
		) ) );
		
		//Connector image control.
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'RJP_connector', array(
		'label'    => __( 'Connector Image', 'RJP' ),
		'section'  => 'RJP_site_style',
		'settings' => 'RJP_connector',
		) ) );
		
		//Seperator image control.
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'RJP_seperator', array(
		'label'    => __( 'Seperator Image', 'RJP' ),
		'section'  => 'RJP_site_style',
		'settings' => 'RJP_seperator',
		) ) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'RJP_primaryBG_control', array(
		'label'      => __( 'Main Background Colour', 'RJP' ),
		'section'    => 'RJP_site_style',
		'settings'   => 'RJP_primaryBG',
		) ) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'RJP_secondaryBG_control', array(
		'label'      => __( 'Secondary Background Colour', 'RJP' ),
		'section'    => 'RJP_site_style',
		'settings'   => 'RJP_secondaryBG',
		) ) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'RJP_boost_col_control', array(
		'label'      => __( 'Highlight Colour for buttons, etc', 'RJP' ),
		'section'    => 'RJP_site_style',
		'settings'   => 'RJP_boost_col',
		) ) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'RJP_boost_text_col_control', array(
		'label'      => __( 'Text Colour for buttons, etc', 'RJP' ),
		'section'    => 'RJP_site_style',
		'settings'   => 'RJP_boost_text_col',
		) ) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'RJP_header_col_control', array(
		'label'      => __( 'Headers Colour', 'RJP' ),
		'section'    => 'RJP_site_style',
		'settings'   => 'RJP_header_col',
		) ) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'RJP_text_col_control', array(
		'label'      => __( 'Text Colour', 'RJP' ),
		'section'    => 'RJP_site_style',
		'settings'   => 'RJP_text_col',
		) ) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'RJP_nav_bar_col_control', array(
		'label'      => __( 'Navigation Bar Background Colour', 'RJP' ),
		'section'    => 'RJP_site_style',
		'settings'   => 'RJP_nav_bar_col',
		) ) );
		
		
		// unprepped-------------------------------
		$wp_customize->add_setting( 'RJP_nav_bar_col', array(
		'default' => '#ffffff'));
		
		$wp_customize->add_setting( 'RJP_nav_menu_col', array(
		'default' => '#ffffff'));
		
		$wp_customize->add_setting( 'RJP_nav_title_col', array(
		'default' => '#ffffff'));
		
		
		//----------------------------------------------------------------//
		//SLIDER CONTROLS
		//----------------------------------------------------------------//
		
		
		//Adds Overlayed Image------------
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'RJP_banner_overlay_img_control', array(
		'label'    => __( 'Overlay Image (overwites text)', 'RJP' ),
		'section'  => 'RJP_slider',
		'settings' => 'RJP_banner_overlay_img',
		) ) );
		
		//Adds Overlayed Text------------
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_banner_overlay_head_control', array(
		'label'    => __( 'Overlay Header', 'RJP' ),
		'section'  => 'RJP_slider',
		'settings' => 'RJP_banner_overlay_head',
		) ) );
		
		//Adds Overlayed Text------------
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_banner_overlay_text_control', array(
		'label'    => __( 'Overlay Text', 'RJP' ),
		'section'  => 'RJP_slider',
		'settings' => 'RJP_banner_overlay_text',
		) ) );
		
		
		//Show controls?------------
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_slider_controls_control', array(
		'label'    => __( 'Display the slider controls?', 'RJP' ),
		'section'  => 'RJP_slider',
		'settings' => 'RJP_slider_controls',
		'type'      => 'checkbox',
		) ) );
		
		//Adds Image to Header Slider------------
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'banner_0_control', array(
		'label'    => __( 'Header Image 0', 'RJP' ),
		'section'  => 'RJP_slider',
		'settings' => 'RJP_banner_img_00',
		) ) );
		//Adds Link to Image
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'banner_0_link_control', array(
		'label'    => __( 'Header Image 0 Link', 'RJP' ),
		'section'  => 'RJP_slider',
		'settings' => 'RJP_banner_link_00',
		) ) );
		
		//Adds Image to Header Slider------------
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'banner_1_control', array(
		'label'    => __( 'Header Image 1', 'RJP' ),
		'section'  => 'RJP_slider',
		'settings' => 'RJP_banner_img_01',
		) ) );
		//Adds Link to Image
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'banner_1_link_control', array(
		'label'    => __( 'Header Image 1 Link', 'RJP' ),
		'section'  => 'RJP_slider',
		'settings' => 'RJP_banner_link_01',
		) ) );
		
		//Adds Image to Header Slider------------
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'banner_2_control', array(
		'label'    => __( 'Header Image 2', 'RJP' ),
		'section'  => 'RJP_slider',
		'settings' => 'RJP_banner_img_02',
		) ) );
		//Adds Link to Image
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'banner_2_link_control', array(
		'label'    => __( 'Header Image 2 Link', 'RJP' ),
		'section'  => 'RJP_slider',
		'settings' => 'RJP_banner_link_02',
		) ) );
		
		//Adds Image to Header Slider------------
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'banner_3_control', array(
		'label'    => __( 'Header Image 3', 'RJP' ),
		'section'  => 'RJP_slider',
		'settings' => 'RJP_banner_img_03',
		) ) );
		//Adds Link to Image
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'banner_3_link_control', array(
		'label'    => __( 'Header Image 3 Link', 'RJP' ),
		'section'  => 'RJP_slider',
		'settings' => 'RJP_banner_link_03',
		) ) );
		
		//Adds Image to Header Slider------------
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'banner_4_control', array(
		'label'    => __( 'Header Image 4', 'RJP' ),
		'section'  => 'RJP_slider',
		'settings' => 'RJP_banner_img_04',
		) ) );
		//Adds Link to Image
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'banner_4_link_control', array(
		'label'    => __( 'Header Image 4 Link', 'RJP' ),
		'section'  => 'RJP_slider',
		'settings' => 'RJP_banner_link_04',
		) ) );
		
		//----------------------------------------------------------------//
		//INTRODUCTION SECTION
		//----------------------------------------------------------------//
		//Activate?
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_intro_active_control', array(
		'label'    => __( 'Display the introduction?', 'RJP' ),
		'section'  => 'RJP_intro',
		'settings' => 'RJP_intro_active',
		'type'      => 'checkbox',
		) ) );
		
		//Title
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_intro_title_control', array(
		'label'    => __( 'Introduction Title', 'RJP' ),
		'section'  => 'RJP_intro',
		'settings' => 'RJP_intro_title',
		) ) );
		
		//Body
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_intro_body_control', array(
		'label'    => __( 'Introduction Body', 'RJP' ),
		'section'  => 'RJP_intro',
		'settings' => 'RJP_intro_body',
		) ) );
		
		//Contact link?
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_intro_contact_control', array(
		'label'    => __( 'Add link to contact info', 'RJP' ),
		'section'  => 'RJP_intro',
		'settings' => 'RJP_intro_contact',
		'type'      => 'checkbox',
		) ) );
		
		
		//----------------------------------------------------------------//
		//BLOG CONTROLS
		//----------------------------------------------------------------//
		//Blog Parent Catagory Background Images
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'blog_parent_catagory_BGI_01_control', array(
		'label'    => __( 'Background Image for preview window', 'RJP' ),
		'section'  => 'RJP_blog',
		'settings' => 'RJP_blog_parent_catagory_BGI_01',
		) ) );
		
		
}

/* 4. ADD ACTION */
add_action('customize_register', 'RobertJPorter_customize_register');

//Output Customize CSS
function RJP_customize_css() {
	?>
		<style type="text/css">
			p{
				color: <?php echo get_theme_mod('RJP_text_col');?>;
			}

			h1{
				color: <?php echo get_theme_mod('RJP_header_col');?>;
			}

			h2{
				color: <?php echo get_theme_mod('RJP_text_col');?>;
			}

			h3{
				color: <?php echo get_theme_mod('RJP_header_col');?>;
			}

			h4{
				color: <?php echo get_theme_mod('RJP_text_col');?>;
			}

			li{
				color: <?php echo get_theme_mod('RJP_text_col');?>;
			}

			body{
				background: <?php echo get_theme_mod('RJP_primaryBG');?>;
			}

			.primaryBG{
				background-color: <?php echo get_theme_mod('RJP_primaryBG');?>;
			}

			.secondaryBG{
				background-color: <?php echo get_theme_mod('RJP_secondaryBG');?>;
			}
			
			.buff{
				background-color: <?php echo get_theme_mod('RJP_secondaryBG');?>;
				color: <?php echo get_theme_mod('RJP_header_col');?>;
				border-color: <?php echo get_theme_mod('RJP_header_col');?>;
			}
			
			.boost{
				background-color: <?php echo get_theme_mod('RJP_boost_col');?>;
				color: <?php echo get_theme_mod('RJP_boost_text_col');?>;
				border-color: <?php echo get_theme_mod('RJP_boost_col');?>;
			}
			
			.product_button_active{
				box-shadow: 0px 0px 30px <?php echo get_theme_mod('RJP_boost_col');?>;
			}
			.product_title{
				color: <?php echo get_theme_mod('RJP_header_col');?>;
			}
			
			.contact_button{
				background-color: <?php echo get_theme_mod('RJP_boost_col');?>;
				color: <?php echo get_theme_mod('RJP_boost_text_col');?>;
				border-color: <?php echo get_theme_mod('RJP_boost_col');?>;
			}
		</style>
	<?php
}
add_action('wp_head', 'RJP_customize_css');



