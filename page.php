<?php 
	get_header();

		if (have_posts()) :
			while (have_posts()) : the_post();
			
		$meta = get_post_meta( $post->ID, 'your_fields', true );
	?>

<style>
canvas 
{ 
	position: absolute;
    height: 100%;
	width: 100%;
    top: 0;
	left:0;
    bottom: 0; 
}

#meta_test{
	position: absolute;
    top: 50%;
	left:0;
    bottom: 0;
	background-color: black;
	color: green;
	z-index: +100;
}
</style> 



<script> 



	//CREATING SCENE  ------------------------------------------------------
	var scene = new THREE.Scene(); 
	var camera = new THREE.PerspectiveCamera( 75, window.innerWidth/window.innerHeight, 0.1, 10000 ); 
	var renderer = new THREE.WebGLRenderer( { alpha: true } ); 
	renderer.setClearColor( 0xffffff, 0 );
	renderer.setSize( window.innerWidth, window.innerHeight ); 
	document.body.appendChild( renderer.domElement ); 

	
	// CONTROLS  ------------------------------------------------------
	controls = new THREE.OrbitControls( camera, renderer.domElement );
	//controls.addEventListener( 'change', render ); // add this only if there is no animation loop (requestAnimationFrame)
	controls.enableDamping = true;
	controls.dampingFactor = 1.25;
	controls.enableZoom = true;


	// LIGHTS ------------------------------------------------------
	//Side-Top
	pointLight = new THREE.PointLight( 0xffffff, 0.25, 1000*4 );
	pointLight.position.set( 0, 300, 600 );
	pointLight.castShadow = true;
	scene.add( pointLight );

	//Side-Back
	pointLight2 = new THREE.PointLight( 0xffffff, 0.25, 1000*4 );
	pointLight2.position.set( -600, 0, -600 );
	pointLight2.castShadow = true;
	scene.add( pointLight2 );
	
	//Side-Forward
	pointLight3 = new THREE.PointLight( 0xffffff, 0.25, 1000*4 );
	pointLight3.position.set( 600, 0, -600 );
	pointLight3.castShadow = true;
	scene.add( pointLight3 );
	
	//Side
	pointLight4 = new THREE.PointLight( 0xffffff, 0.25, 1000*4 );
	pointLight4.position.set( 0, 0, -600 );
	pointLight4.castShadow = true;
	scene.add( pointLight4 );
	
	//Top
	directionalLight = new THREE.DirectionalLight( 0xffffff, .25);
	directionalLight.position.set( 1, 300, -1 );
	directionalLight.castShadow = true;
	scene.add( directionalLight );
	
	//Ambient
	ambientLight = new THREE.AmbientLight( 0x444444,1 );
	scene.add( ambientLight );
	
	//Ambient
	ambientLight2 = new THREE.AmbientLight( 0x444444,1 );
	scene.add( ambientLight2 );
	
//ASSETS ------------------------------------------------------
	var TShirt_MAT = new THREE.MeshPhongMaterial
	( {
		color: 0x5f6369,
		specular: 0x5f6369,
		shininess: 10,
		map: THREE.ImageUtils.loadTexture( "<?php echo $meta['Col_Map']; ?>" ),
		specularMap: THREE.ImageUtils.loadTexture( "<?php echo $meta['Spec_Map']; ?>" ),
		normalMap: THREE.ImageUtils.loadTexture( "<?php echo $meta['Norm_Map']; ?>" ),
		normalScale: new THREE.Vector2( 0.8, 0.8 )
	} );
	loader = new THREE.JSONLoader();
	loader.load( "<?php echo $meta['Mesh']; ?>", function( geometry ) { createScene( geometry, 100, TShirt_MAT ) } );
	
//SKYBOX-------------------------------------------------------
	function makeSkybox( urls, size ) {
		var skyboxCubemap = THREE.ImageUtils.loadTextureCube( urls );
		skyboxCubemap.format = THREE.RGBFormat;

		var skyboxShader = THREE.ShaderLib['cube'];
		skyboxShader.uniforms['tCube'].value = skyboxCubemap;

		return new THREE.Mesh(
			new THREE.BoxGeometry( size, size, size ),
			new THREE.ShaderMaterial({
				fragmentShader : skyboxShader.fragmentShader, vertexShader : skyboxShader.vertexShader,
				uniforms : skyboxShader.uniforms, depthWrite : false, side : THREE.BackSide
			})
		);
	}
	
	//CREATING SCENE ASSETS------------------------------------------------------
	function createScene( geometry, scale, material ) 
	{
	mesh1 = new THREE.Mesh( geometry, material );
	mesh1.position.y = - 50;
	mesh1.rotation.y = 300;
	mesh1.scale.x = mesh1.scale.y = mesh1.scale.z = scale;
	scene.add( mesh1 );
	}
	
		scene.add( makeSkybox( [
		'/wp-content/themes/RJP_3D/skybox/px.jpg', // right
		'/wp-content/themes/RJP_3D/skybox/nx.jpg', // left
		'/wp-content/themes/RJP_3D/skybox/py.jpg', // top
		'/wp-content/themes/RJP_3D/skybox/ny.jpg', // bottom
		'/wp-content/themes/RJP_3D/skybox/pz.jpg', // back
		'/wp-content/themes/RJP_3D/skybox/nz.jpg'  // front
	], 8000 ));
	
	//EXTRAS ------------------------------------------------------
	//window resize
	window.addEventListener( 'resize', onWindowResize, false );
	function onWindowResize() {
	camera.aspect = window.innerWidth / window.innerHeight;
	camera.updateProjectionMatrix();
	renderer.setSize( window.innerWidth, window.innerHeight );
	}

	//adding to scene
	camera.position.z = 300;
	
	
	//Render
	var render = function () 
	{ 
	requestAnimationFrame( render ); 
	renderer.render(scene, camera);
	renderer.setClearColor( 0xffffff, 0);	
	}; 
	
	render(); 
</script> 

<div id="meta_test">
	<?php
		// Retrieves the stored value from the database
		$meta_value = get_post_meta( get_the_ID(), 'meta-text', true );
	 
		// Checks and displays the retrieved value
		if( !empty( $meta_value ) ) {
			echo $meta_value;
		}
	?>
	<?php
		// Retrieves the stored value from the database
		$meta_value2 = get_post_meta( get_the_ID(), 'meta-image', true ); ?>
		<br>
		<img src="<?php echo $meta_value2;?>" alt="Smiley face" height="256" width="256">
		
		<?php $meta_value3 = get_post_meta( get_the_ID(), 'meta-image2', true ); ?>
		<br>
		<img src="<?php echo $meta_value3;?>" alt="Smiley face" height="256" width="256">
	
	
</div>

	<?php 
		endwhile;
			
		else :
			echo '<p>No content found</p>';
		endif;
	?>
	
	
	<?php	
	get_footer();
	
?>