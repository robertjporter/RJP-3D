<!DOCTYPE html>

<html <?php language_attributes(); ?>>
	<!--ENQUE SCRIPTS-->
	<?php wp_enqueue_script ("jquery");?>
	
	<!--SETUP TAB AND SITE INFO-->
	<head>
		
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >
		<title> <?php bloginfo( 'name' ); ?> </title>
		<?php wp_head(); ?>
	</head>

<body <?php body_class(); ?>>
	
	<!--HEADER DROPDOWN NAV CONTENT-----------------------------------------
	Mobile version of nav bar-->
	<!--Logo or title-->
	<?php if ( get_theme_mod( 'RJP_logo' ) ) : ?>
	
	<!--If logo set in CMS use the logo here-->
	<div class="nav-title-mobile">
		<a href='<?php echo esc_url( home_url( '/' ) ); ?>' 
		title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' 
		rel='home'>
			
			<img class="nav-logo-mobile"src='<?php echo esc_url( get_theme_mod( 'RJP_logo' ) ); ?>' 
			alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
		</a>
	</div>
		
	<?php else : ?>
	
	<!--If no logo set in CMS use the site title and tag-->
	<div class="nav-title-mobile">
		<h2>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?>
			</a>
		</h2>
		
		<p class='nav-description'>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'description' ); ?>
			</a>
		
		
		</p>
	</div>
	
	<?php endif; ?>
	
	<!--Dropdown menu-->
	<div class="dropdown"
	style="background-color: <?php echo esc_url( get_theme_mod( 'RJP_nav_bar_col' ) ); ?>;">
		<button onclick="myFunction()" class="dropbtn"></button>
		
		<div id="myDropdown" class="dropdown-content secondaryBG">
			<?php
				wp_nav_menu( array( 'theme-location' => 'primary' ) );
			?>
	  </div>
	</div>
	
	<script>
		/* When the user clicks on the button, 
		toggle between hiding and showing the dropdown content */
		function myFunction() {
			document.getElementById("myDropdown").classList.toggle("show");
		}

		// Close the dropdown menu if the user clicks outside of it
		window.onclick = function(event) {
		  if (!event.target.matches('.dropbtn')) {

			var dropdowns = document.getElementsByClassName("dropdown-content");
			var i;
			for (i = 0; i < dropdowns.length; i++) {
			  var openDropdown = dropdowns[i];
			  if (openDropdown.classList.contains('show')) {
				openDropdown.classList.remove('show');
			  }
			}
		  }
		}
	</script>
	
	<!--HEADER NAV CONTENT -------------------------------
	Generates a nav bar using CMS. Most of the work is done in CSS
	Base/backup Underlay-->
	<div class="header" 
	style="background-color: <?php echo esc_url( get_theme_mod( 'RJP_nav_bar_col' ) ); ?>;">
		<nav class="site-nav">

			<!--Logo or title-->
			<?php if ( get_theme_mod( 'RJP_logo' ) ) : ?>
			
			<!--If logo set in CMS use the logo here-->
			<div class="nav-title">
				<a href='
					<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
					
					<img class="nav-logo"src='<?php echo esc_url( get_theme_mod( 'RJP_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
				</a>
			</div>
				
			<?php else : ?>
			
			<!--If no logo set in CMS use the site title and tag-->
			<div class="nav-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?>
				</a>
				
				<h2 class='nav-description'>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'description' ); ?>
					</a>
				</h2>
			</div>
			
			<?php endif; ?>
			
			<!--Nav Bar-->
			<nav class="nav-bar">
				<?php
					wp_nav_menu( array( 'theme-location' => 'primary' ) );
				?>
			
				<?php 
					//$args = array (
						//'theme-location' => 'primary'
					//);
				?>
			
				<?php // wp_nav_menu(  $args  ); ?>
			</nav>
			
			
		</nav> 
	</div>
	

	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	