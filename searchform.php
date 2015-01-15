<?php
/**
 * The template for displaying search forms in LunarLove
 *
 * @package LunarLove
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php _ex( '搜索内容:', 'label', 'lunarlove' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Type to search...', 'placeholder', 'lunarlove' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" required>
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( '搜索', 'submit button', 'lunarlove' ); ?>">
</form>