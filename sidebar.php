<!-- Searchform -->
<?php get_search_form(); ?>

<!-- Categories -->
<h3><?php _e('Kategorier'); ?></h3>
	<ul class="ul-sidebar">
		<?php wp_list_categories( array(
			'exclude'  => 1,
			'title_li' => ''
    	) );  ?>
	</ul>

<!-- Tags -->
<h3><?php _e('Taggar'); ?></h3>
		<?php wp_tag_cloud( 'format=list' ); ?>

<!-- Widgetarea -->
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Widgetarea_Sidebar") ) : ?>
<?php endif;?>