<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package LunarLove
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
<script type="text/javascript">
     var bodyBgs = [];
     bodyBgs[1] = "image/bg_1.jpg";
     bodyBgs[2] = "image/bg_2.jpg";
     bodyBgs[3] = "image/bg_3.jpg";
     bodyBgs[4] = "image/bg_4.jpg";
     bodyBgs[5] = "image/bg_5.jpg";
     //var randomBgIndex = Math.round( Math.random() * 4 );
     rnd.today=new Date();
     rnd.seed=rnd.today.getTime();
     function rnd() {
　　　　 rnd.seed = (rnd.seed*9301+49297) % 233280;
　　　　 return rnd.seed/(233280.0);
     };
     function rand(number) {
　　　　 return Math.ceil(rnd()*number);
    };
     document.write("<style>body{background:url( <? bloginfo('stylesheet_directory')?>/" + bodyBgs[rand(5)] + ") no-repeat 100% 0}</style>");
</script>
<script type="text/javascript" src="http://upcdn.b0.upaiyun.com/libs/jquery/jquery-2.0.3.min.js"></script>
</head>
<body <?php body_class(); ?>>
    <div id="site-navigation" class="main-navigation" role="navigation">
			<div id="nav-con" class="nav-con"><?php wp_nav_menu( array( 'theme_location' => 'primary','walker' => new Description_Walker()) ); ?>
            <form method="get" action="<?php echo esc_url( home_url( '' ) )?>"><input type="text" name="s" class="menu-search" placeholder="Type to search..." required /></form></div>
		</div><!-- #site-navigation -->  
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div>		
	</header><!-- #masthead -->
	<div id="content" class="site-content">