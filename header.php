<?php
/*
 * Header Section of Yestin One
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress - Yestin
 * @subpackage Yestin_One
 * @since Yestin One 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	// 如果是首页和文章列表页面, 显示博客标题
	if(is_front_page() || is_home()) { 
		//bloginfo('name');
		wp_title( '|', true, 'right' ); 
 
	// 如果是文章详细页面和独立页面, 显示文章标题
	} else if(is_single() || is_page()) {
		wp_title('-',true,'right');
 
	// 如果是类目页面, 显示类目表述
	} else if(is_category()) {
		printf('%1$s 类目的文章存档', single_cat_title('', false));
 
	// 如果是搜索页面, 显示搜索表述
	} else if(is_search()) {
		printf('%1$s 的搜索结果', wp_specialchars($s, 1));
 
	// 如果是标签页面, 显示标签表述
	} else if(is_tag()) {
		printf('%1$s 标签的文章存档', single_tag_title('', false));
 
	// 如果是日期页面, 显示日期范围描述
	} else if(is_date()) {
		$title = '';
		if(is_day()) {
			$title = get_the_time('Y年n月j日');
		} else if(is_year()) {
			$title = get_the_time('Y年');
		} else {
			$title = get_the_time('Y年n月');
		}
		printf('%1$s的文章存档', $title);
 
	// 其他页面显示博客标题
	} else {
		//bloginfo('name');
		wp_title( '|', true, 'right' ); 
	}
?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
<?php if (is_home()){
	$description = "Yestin的技术博客,个人博客,技术博客,软件开发,Yestin,IYestin,IT博客,关注前沿技术,记录技术文章,从前端到后台";
	$keywords = "技术博客,个人博客,Yestin,IYestin,软件开发,编程,程序";
	} elseif (is_single()){
		//."|".get_the_excerpt()
	$description = $post->post_title ;
	$keywords = "";
	$tags = wp_get_post_tags($post->ID);
	foreach ($tags as $tag ) {
		$keywords = $keywords . $tag->name . ",";
	}
	} elseif(is_category()){
		$description = category_description();
	}

	if($description!="")
		echo '<meta name="description" content="'.$description.'" />';
	if($keywords !="") 
		echo '<meta name="keywords" content="'.$keywords.'" />';
?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
			<?php if ( get_theme_mod( 'themonic_logo' ) ) : ?>
		
		<div class="themonic-logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_theme_mod( 'themonic_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
		</div>
	<?php if( get_theme_mod( 'iconic_one_social_activate' ) == '1') { ?>	
		<div class="socialmedia">
		<a href="<?php echo get_theme_mod( 'twitter_url', 'default_value' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/twitter.png" alt="Follow us on Twitter"/></a> <a href="<?php echo get_theme_mod( 'facebook_url', 'default_value' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/facebook.png" alt="Follow us on Facebook"/></a> <a href="<?php echo get_theme_mod( 'plus_url', 'default_value' ); ?>" rel="author" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/gplus.png" alt="Follow us on Google Plus"/></a><a href="<?php echo get_theme_mod( 'rss_url', 'default_value' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/rss.png" alt="Subscribe RSS"/></a>
		</div>
	<?php } ?>	

		<?php else : ?>
		<hgroup>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			<a class="site-description"><?php bloginfo( 'description' ); ?></a>
		</hgroup>
	<?php if( get_theme_mod( 'iconic_one_social_activate' ) == '1') { ?>
		<div class="socialmedia">
		<a href="<?php echo get_theme_mod( 'twitter_url', 'default_value' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/twitter.png" alt="Follow us on Twitter"/></a> <a href="<?php echo get_theme_mod( 'facebook_url', 'default_value' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/facebook.png" alt="Follow us on Facebook"/></a> <a href="<?php echo get_theme_mod( 'plus_url', 'default_value' ); ?>" rel="author" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/gplus.png" alt="Follow us on Google Plus"/></a><a href="<?php echo get_theme_mod( 'rss_url', 'default_value' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/rss.png" alt="Follow us on rss"/></a>
		</div>
	<?php } ?>	
		<?php endif; ?>

		<nav id="site-navigation" class="themonic-nav" role="navigation">
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'themonic' ); ?>"><?php _e( 'Skip to content', 'themonic' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'menu-top', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->

		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?><div class="clear"></div>
	</header><!-- #masthead -->

	<div id="main" class="wrapper">