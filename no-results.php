<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package LunarLove
 */
?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php _e( '找不到任何内容', 'lunarlove' ); ?></h1>
	</header><!-- .page-header -->
	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			<p><?php printf( __( '准备好发布第一篇文章了吗? <a href="%1$s">点此以开始</a>.', 'lunarlove' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
		<?php elseif ( is_search() ) : ?>
			<p><?php _e( '对不起，我们没能找到任何与您的搜索关键词相关的东西，请尝试更换关键词.', 'lunarlove' ); ?></p>
			<?php get_search_form(); ?>
		<?php else : ?>
			<p><?php _e( '看起来我们找不到你想要的东西，试试搜索吧.', 'lunarlove' ); ?></p>
			<?php get_search_form(); ?>
		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->