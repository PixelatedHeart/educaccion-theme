<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<?php $agent = $_SERVER['HTTP_USER_AGENT'];
if (eregi("BlackBerry", $agent)) {?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/mobile.css" type="text/css" media="screen" />
<?php } ?>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" type="image/x-icon" href="http://educaccion.tv/wp-content/themes/educaccion/img/favicon.jpg" />

<?php wp_head(); ?>
</head>
<body>
<div id="page">

<div id="header">
	<div id="headerimg">
		<h1><a href="<?php echo get_option('home'); ?>/"><img src="<?php bloginfo('template_directory'); ?>/img/cab-educaccion.gif"></a></h1>
		
	</div>
	<div style="color:#fff;font-weight:bold;padding:10px;margin-bottom:-20px;">
	<?php								
				if ( is_active_sidebar( 'menu-header-widget-area' ) ) : ?>
					<div class="menu-header-widget-area">
						<?php dynamic_sidebar( 'menu-header-widget-area' ); ?>
					</div><?php
				else:
				endif;								
	?>
	</div>
</div>
