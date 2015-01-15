<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package LunarLove
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Ooops!', 'lunarlove' ); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content">
					<p><?php _e( '您试图查看的页面似乎并不存在，试试搜索?', 'lunarlove' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>