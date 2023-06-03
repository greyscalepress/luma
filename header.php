<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 */

/*
 * Add class to allow styling for toolbar.
 */
$html_class = (is_admin_bar_showing()) ? 'wp-toolbar' : '';
wpShower::checkFrontPage();
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 <?php echo $html_class; ?>" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 <?php echo $html_class; ?>" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html class="<?php echo $html_class; ?>" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-98845LF6LH"></script>
	<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-98845LF6LH');
	</script>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php wp_title('|', true, 'right'); ?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php
$meta_description = get_theme_mod('outspoken_meta_description');
$meta_keywords = get_theme_mod('outspoken_meta_keywords');
$meta_no = array();
foreach (array('noindex', 'nofollow', 'noarchive') as $key) {
	$value = get_theme_mod('outspoken_meta_'.$key);
	if ($value) $meta_no[] = $key;
}
$scripts = get_theme_mod('outspoken_font_scripts');
$google_font = get_theme_mod('outspoken_font_google');
if ($scripts != '') echo $scripts;
elseif ($google_font != '') echo $google_font;
$favicon = get_theme_mod('outspoken_favicon');
?>
<?php if ($meta_description): ?>
	<meta name="description" content="<?php echo $meta_description; ?>" />
<?php endif; ?>
<?php if ($meta_keywords): ?>
	<meta name="keywords" content="<?php echo $meta_keywords; ?>" />
<?php endif; ?>
<?php if (!empty($meta_no)): ?>
	<meta name="robots" content="<?php echo implode(', ', $meta_no); ?>">
<?php endif; ?>
<?php
if ($favicon != ''):
	$upload_dir = wp_upload_dir();
?>
	<?php foreach (wpShower::$icons['apple'] as $size): ?>
	<link rel="apple-touch-icon" sizes="<?php echo $size; ?>x<?php echo $size; ?>" href="<?php echo $upload_dir['baseurl']; ?>/apple-touch-icon-<?php echo $size; ?>x<?php echo $size; ?>.png" />
	<?php endforeach; ?>
	<?php foreach (wpShower::$icons['icon'] as $size): ?>
	<link rel="icon" type="image/png" href="<?php echo $upload_dir['baseurl']; ?>/favicon-<?php echo $size; ?>x<?php echo $size; ?>.png" sizes="<?php echo $size; ?>x<?php echo $size; ?>" />
	<?php endforeach; ?>
<?php endif; ?>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header" role="banner">
			<?php get_search_form(); ?>
			<div id="navbar" class="navbar">
				<div id="search-toggle">
					<span class="icon">s</span>
					<span class="pointer"></span>
				</div>
				<h3 class="menu-toggle">m</h3>
				<nav id="site-navigation" class="navigation main-navigation" role="navigation">
					<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e('Skip to content', 'outspoken'); ?>"><?php _e('Skip to content', 'outspoken'); ?></a>
					<?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'nav-menu')); ?>
				</nav><!-- #site-navigation -->
			</div><!-- #navbar -->
<?php $align = get_theme_mod('outspoken_site_title_align'); ?>
			<div class="site-title<?php echo $align == 'center' || $align == 'right' ? ' '.$align : ''; ?>">
				<div class="home-link">
					<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
<?php
$logo = get_theme_mod('outspoken_logo');
if ($logo == ''):
?>
						<h1><?php bloginfo('name'); ?></h1>
<?php else: ?>
						<img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" />
<?php endif; ?>
					</a>
<?php if (get_theme_mod('outspoken_display_tagline')): ?>
					<h2 class="site-description"><?php bloginfo('description'); ?></h2>
<?php endif; ?>
				</div>
			</div>

			
		</header><!-- #masthead -->

		<?php if (is_single()) outspoken_post_nav(); ?>

		<div id="main" class="site-main">
