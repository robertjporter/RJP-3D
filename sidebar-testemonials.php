<?php dynamic_sidebar('testemonials'); ?>

<!-- TESTEMONIALS ------------------------------------
	___ ____ ____ ___ _ _  _ ____ _  _ _ ____ _    ____ 
	 |  |___ [__   |  | |\/| |  | |\ | | |__| |    [__  
	 |  |___ ___]  |  | |  | |__| | \| | |  | |___ ___] 

	--------------------------------------------------- -->
	
		<?php
		function RJP_mason_customize_register($wp_customize){
		//----------------------------------------------------------------//
		//TESTIMONIAL SETTINGS
		//----------------------------------------------------------------//
		//Testimonial Title
		$wp_customize->add_setting( 'RJP_testimonials_title' );	
		
		//Testimonial Tag
		$wp_customize->add_setting( 'RJP_testimonials_tag' );	
		
		//Testimonial 00
		$wp_customize->add_setting( 'RJP_testimonials_img_0' );	
		$wp_customize->add_setting( 'RJP_testimonials_name_0', array(
		'default' => 'Eusebia Bărlâdeanu',
		'transport' => 'postMessage',
		)); 
		$wp_customize->add_setting( 'RJP_testimonials_company_0', array(
		'default' => 'XYZ Interactive',
		'transport' => 'postMessage',
		)); 
		$wp_customize->add_setting( 'RJP_testimonials_body_0', array(
		'default' => 'They helped me become a devoted coffee evangelist, a wannabe web practitioner, a troublemaker, a general TV trailblazer, a problem solver.',
		'transport' => 'postMessage',
		)); 
		
		//Testimonial 01
		$wp_customize->add_setting( 'RJP_testimonials_img_1' );	
		$wp_customize->add_setting( 'RJP_testimonials_name_1', array(
		'default' => 'Eusebia Bărlâdeanu',
		'transport' => 'postMessage',
		)); 
		$wp_customize->add_setting( 'RJP_testimonials_company_1', array(
		'default' => 'XYZ Interactive',
		'transport' => 'postMessage',
		)); 
		$wp_customize->add_setting( 'RJP_testimonials_body_1', array(
		'default' => 'They helped me become a devoted coffee evangelist, a wannabe web practitioner, a troublemaker, a general TV trailblazer, a problem solver.',
		'transport' => 'postMessage',
		)); 
		
		//Testimonial 02
		$wp_customize->add_setting( 'RJP_testimonials_img_2' );	
		$wp_customize->add_setting( 'RJP_testimonials_name_2', array(
		'default' => 'Eusebia Bărlâdeanu',
		'transport' => 'postMessage',
		)); 
		$wp_customize->add_setting( 'RJP_testimonials_company_2', array(
		'default' => 'XYZ Interactive',
		'transport' => 'postMessage',
		)); 
		$wp_customize->add_setting( 'RJP_testimonials_body_2', array(
		'default' => 'They helped me become a devoted coffee evangelist, a wannabe web practitioner, a troublemaker, a general TV trailblazer, a problem solver.',
		'transport' => 'postMessage',
		)); 
		
		//Testimonial 03
		$wp_customize->add_setting( 'RJP_testimonials_img_3' );	
		$wp_customize->add_setting( 'RJP_testimonials_name_3', array(
		'default' => 'Eusebia Bărlâdeanu',
		'transport' => 'postMessage',
		)); 
		$wp_customize->add_setting( 'RJP_testimonials_company_3', array(
		'default' => 'XYZ Interactive',
		'transport' => 'postMessage',
		)); 
		$wp_customize->add_setting( 'RJP_testimonials_body_3', array(
		'default' => 'They helped me become a devoted coffee evangelist, a wannabe web practitioner, a troublemaker, a general TV trailblazer, a problem solver.',
		'transport' => 'postMessage',
		)); 
		
		//----------------------------------------------------------------//
		//TESTIMONIAL SECTION
		//----------------------------------------------------------------//
		$wp_customize->add_section('RJP_testimonials', array(
			'title' => __('Client testimonials', 'RJP'),
			'priority' => 90,
		));
		
		
		//----------------------------------------------------------------//
		//TESTIMONIALS CONTROLS
		//----------------------------------------------------------------//
		//Testimonial Title
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_testimonials_title_control', array(
		'label'    => __( 'Title for testemonials section', 'RJP' ),
		'section'  => 'RJP_testimonials',
		'settings' => 'RJP_testimonials_title',
		) ) );
		
		//Testimonial Tag
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_testimonials_tag_control', array(
		'label'    => __( 'A short tag for testemonials section', 'RJP' ),
		'section'  => 'RJP_testimonials',
		'settings' => 'RJP_testimonials_tag',
		) ) );
		
		//Testimonial 00
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'RJP_testimonials_img_0_control', array(
		'label'    => __( 'Portraite or Logo for first client', 'RJP' ),
		'description' => __( '128px by 128px is best' ),
		'section'  => 'RJP_testimonials',
		'settings' => 'RJP_testimonials_img_0',
		) ) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_testimonials_name_0_control', array(
		'label'    => __( 'First Clients Name', 'RJP' ),
		'section'  => 'RJP_testimonials',
		'settings' => 'RJP_testimonials_name_0',
		) ) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_testimonials_company_0_control', array(
		'label'    => __( 'Name of the clients company/organisation', 'RJP' ),
		'section'  => 'RJP_testimonials',
		'settings' => 'RJP_testimonials_company_0',
		) ) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_testimonials_body_0_control', array(
		'label'    => __( 'Clients Quote', 'RJP' ),
		'section'  => 'RJP_testimonials',
		'settings' => 'RJP_testimonials_body_0',
		) ) );
		
		//Testimonial 01
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'RJP_testimonials_img_1_control', array(
		'label'    => __( 'Portraite or Logo for second client', 'RJP' ),
		'description' => __( '128px by 128px is best' ),
		'section'  => 'RJP_testimonials',
		'settings' => 'RJP_testimonials_img_1',
		) ) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_testimonials_name_1_control', array(
		'label'    => __( 'Clients Name', 'RJP' ),
		'section'  => 'RJP_testimonials',
		'settings' => 'RJP_testimonials_name_1',
		) ) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_testimonials_company_1_control', array(
		'label'    => __( 'Name of the clients company/organisation', 'RJP' ),
		'section'  => 'RJP_testimonials',
		'settings' => 'RJP_testimonials_company_1',
		) ) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_testimonials_body_1_control', array(
		'label'    => __( 'Clients Quote', 'RJP' ),
		'section'  => 'RJP_testimonials',
		'settings' => 'RJP_testimonials_body_1',
		) ) );
		
		//Testimonial 02
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'RJP_testimonials_img_2_control', array(
		'label'    => __( 'Portraite or Logo for third client', 'RJP' ),
		'description' => __( '128px by 128px is best' ),
		'section'  => 'RJP_testimonials',
		'settings' => 'RJP_testimonials_img_2',
		) ) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_testimonials_name_2_control', array(
		'label'    => __( 'Clients Name', 'RJP' ),
		'section'  => 'RJP_testimonials',
		'settings' => 'RJP_testimonials_name_2',
		) ) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_testimonials_company_2_control', array(
		'label'    => __( 'Name of the clients company/organisation', 'RJP' ),
		'section'  => 'RJP_testimonials',
		'settings' => 'RJP_testimonials_company_2',
		) ) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_testimonials_body_2_control', array(
		'label'    => __( 'Clients Quote', 'RJP' ),
		'section'  => 'RJP_testimonials',
		'settings' => 'RJP_testimonials_body_2',
		) ) );
		
		//Testimonial 03
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'RJP_testimonials_img_3_control', array(
		'label'    => __( 'Portraite or Logo for fourth client', 'RJP' ),
		'description' => __( '128px by 128px is best' ),
		'section'  => 'RJP_testimonials',
		'settings' => 'RJP_testimonials_img_3',
		) ) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_testimonials_name_3_control', array(
		'label'    => __( 'Clients Name', 'RJP' ),
		'section'  => 'RJP_testimonials',
		'settings' => 'RJP_testimonials_name_3',
		) ) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_testimonials_company_3_control', array(
		'label'    => __( 'Name of the clients company/organisation', 'RJP' ),
		'section'  => 'RJP_testimonials',
		'settings' => 'RJP_testimonials_company_3',
		) ) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'RJP_testimonials_body_3_control', array(
		'label'    => __( 'Clients Quote', 'RJP' ),
		'section'  => 'RJP_testimonials',
		'settings' => 'RJP_testimonials_body_3',
		) ) );
		}

		/* 4. ADD ACTION */
		add_action('customize_register', 'RJP_mason_customize_register');
		?>
	
	<div class="testimonials secondaryBG">
		<h1 class="testimonials_title">
			<?php echo ( get_theme_mod( 'RJP_testimonials_title' ) ); ?>
		</h1>
		
		<h4 class="testimonials_body">
			<?php echo ( get_theme_mod( 'RJP_testimonials_tag' ) ); ?>
		</h4>
		
		<ul class="clients">
			<?php if ( get_theme_mod( 'RJP_testimonials_img_0' ) ) : ?>
				<li class="client">
					<img class="feature_img" src="<?php echo ( get_theme_mod( 'RJP_testimonials_img_0' ) ); ?>" height="128" width="128" > </img>
					<p><?php echo ( get_theme_mod( 'RJP_testimonials_name_0' ) ); ?></p>
					<p><?php echo ( get_theme_mod( 'RJP_testimonials_company_0' ) ); ?></p>
					<p><?php echo ( get_theme_mod( 'RJP_testimonials_body_0' ) ); ?> </p>
				</li>
			<?php endif; ?>	
			
			<?php if ( get_theme_mod( 'RJP_testimonials_img_1' ) ) : ?>
				<li class="client">
					<img class="feature_img" src="<?php echo ( get_theme_mod( 'RJP_testimonials_img_1' ) ); ?>" height="128" width="128" > </img>
					<p><?php echo ( get_theme_mod( 'RJP_testimonials_name_1' ) ); ?></p>
					<p><?php echo ( get_theme_mod( 'RJP_testimonials_company_1' ) ); ?></p>
					<p><?php echo ( get_theme_mod( 'RJP_testimonials_body_1' ) ); ?> </p>
				</li>
			<?php endif; ?>	
				
			<?php if ( get_theme_mod( 'RJP_testimonials_img_2' ) ) : ?>
				<li class="client">
					<img class="feature_img" src="<?php echo ( get_theme_mod( 'RJP_testimonials_img_2' ) ); ?>" height="128" width="128" > </img>
					<p><?php echo ( get_theme_mod( 'RJP_testimonials_name_2' ) ); ?></p>
					<p><?php echo ( get_theme_mod( 'RJP_testimonials_company_2' ) ); ?></p>
					<p><?php echo ( get_theme_mod( 'RJP_testimonials_body_2' ) ); ?> </p>
				</li>
			<?php endif; ?>	
				
			<?php if ( get_theme_mod( 'RJP_testimonials_img_3' ) ) : ?>			
				<li class="client">
					<img class="feature_img" src="<?php echo ( get_theme_mod( 'RJP_testimonials_img_3' ) ); ?>" height="128" width="128" > </img>
					<p><?php echo ( get_theme_mod( 'RJP_testimonials_name_3' ) ); ?></p>
					<p><?php echo ( get_theme_mod( 'RJP_testimonials_company_3' ) ); ?></p>
					<p><?php echo ( get_theme_mod( 'RJP_testimonials_body_3' ) ); ?> </p>
				</li>
			<?php endif; ?>	
		</ul>
			
	</div>