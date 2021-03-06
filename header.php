<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" l<?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title(); ?></title>

	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
  <!-- CSS
  ================================================== -->
  <?php
	$fonts       = array(
		'authentic' => 'Alegreya:400italic,700italic,400,700|Alegreya+SC:400,700',
		'trendy'    => 'Open+Sans:400italic,700italic,400,700|Trocchi',
		'pristine'  => 'Droid+Sans:400,700|Lora:400,700,400italic',
	);
	$font_option = anatomy_options( 'font_set', 'Alegreya:400italic,700italic,400,700|Alegreya+SC:400,700' );
	$fonts       = array_flip( $fonts );
	?>
  <link href='//fonts.googleapis.com/css?family=<?php echo $font_option; ?>' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/css.php?color_scheme=' . anatomy_options( 'color_scheme', 'default' ) . '&inverted=' . anatomy_options( 'inverted_design', 'default' ) . '&textures=' . anatomy_options( 'texture_set', 'linen|brillant' ); ?>&fonts=<?php echo $fonts[ $font_option ]; ?>" type="text/css">
   <?php
	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );}
	?>
   <?php
	if ( ! isset( $content_width ) ) {
		$content_width = 960;}
	?>
   <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<!-- Primary Page Layout
	================================================== -->
  <!-- TOPHAT -->
  <?php get_template_part( 'tophat' ); ?>
	<div class="container">
		<div class="sixteen columns">
		  <?php
			$search       = anatomy_options( 'display', array( 'large_search' => false ) );
			$large_search = isset( $search['large_search'] ) ? $search['large_search'] : false;
			?>
		  <div class="alpha thirteen columns">
		  <?php
			$logo_src = anatomy_options( 'logo', null );
			if ( empty( $logo_src ) ) :
				?>
			<h1 class="logo <?php echo ( ! $large_search ? 'no-search' : 'remove-bottom' ); ?>" style="margin-top: 40px"><a href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a>
		</h1>
			 <?php else : ?>
		  <div class="logo"><a href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'name' ); ?>"><img src="<?php echo $logo_src; ?>" /></a><span class="screen-reader-text"><?php bloginfo( 'name' ); ?></span></div>
		<?php endif; ?>
		  </div>
	  <div class="omega three columns">
		<?php
		$social = anatomy_options( 'social' );
		if ( ! empty( $social ) and is_array( $social ) ) {
			$size  = anatomy_options( 'social_icons[size]', 'default' );
			$color = anatomy_options( 'social_icons[color]', 'logo' );
			?>
		  <div class="social-profiles">
			<ul class="icons size-<?php echo $size; ?> color-<?php echo $color; ?>">
			<?php
			$type = ( anatomy_options( 'social_icons[type]', 'default' ) == 'default' ? '' : '-' . anatomy_options( 'social_icons[type]' ) );
			foreach ( $social as $which => $link ) {
				if ( ! empty( $link ) ) {
					echo '<li class="' . $which . '"><a href="' . $link . '" target="_blank"><i class="icon-' . $which . $type . '"></i></a></li>';
				}
			}
			?>
			</ul>
		  </div>
		<?php } ?>
	  </div>
	  <div class="clear"></div>
	  <?php
		if ( $large_search ) :
			get_template_part( 'searchform', 'dictionary' );
	  endif;
		?>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'regular',
					'menu_id'        => 'regular_menu',
					'fallback_cb'    => 'anatomy_default_menu',
				)
			);
			?>
		</div>
