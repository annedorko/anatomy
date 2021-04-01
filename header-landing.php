<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title( '|', 1, 'right' ); ?></title>
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
  <?php
    $fonts = array(
      'authentic' => 'Alegreya:400italic,700italic,400,700|Alegreya+SC:400,700',
      'trendy' => 'Open+Sans:400italic,700italic,400,700|Trocchi',
      'pristine' => 'Droid+Sans:400,700|Lora:400,700,400italic'
    );
    $font_option = anatomy_options( 'font_set', 'Alegreya:400italic,700italic,400,700|Alegreya+SC:400,700' );
    $fonts = array_flip( $fonts );
  ?>
  <link href='http://fonts.googleapis.com/css?family=<?php echo $font_option; ?>' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/css.php?color_scheme=' . anatomy_options( 'color_scheme', 'default' ) . '&inverted=' . anatomy_options( 'inverted_design', 'default' ) . '&textures=' . anatomy_options( 'texture_set', 'linen|brillant' ); ?>&fonts=<?php echo $fonts[$font_option]; ?>" type="text/css">
   <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
   <?php if ( !isset( $content_width ) ) $content_width = 960; ?>
   <?php wp_head(); ?>
</head>
<body>
	<!-- Primary Page Layout
	================================================== -->
  <!-- TOPHAT -->
  <?php get_template_part( 'tophat' ); ?>
	<div class="container">