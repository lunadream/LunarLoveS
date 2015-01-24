<?php
/**
 * @package LunarLove
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php lunarlove_posted_on(); ?>
            <?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'lunarlove' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links"><?php printf( __( '%1$s', 'lunarlove' ), $tags_list ); ?></span> /
			<?php endif; // End if $tags_list ?>
            
            <span class="comments-link"><?php comments_popup_link( __( '没有评论', 'lunarlove' ), __( '1 条评论', 'lunarlove' ), __( '% 条评论', 'lunarlove' ) ); ?></span>
            <?php edit_post_link( __( '编辑', 'lunarlove' ), ' / <span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( '继续阅读 <span class="meta-nav">&gt;&nbsp;&gt;</span>', 'lunarlove' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'lunarlove' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>
</article><!-- #post-## -->