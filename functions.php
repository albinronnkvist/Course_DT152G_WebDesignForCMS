<?php
// Register menus
function register_my_menus() {
    register_nav_menus(
        array(
        'main-nav' => __('Header Menu')
        )
    );
}
add_action('init', 'register_my_menus');

// Add scripts
function wpdocs_theme_name_scripts() {
    wp_enqueue_script( 'menu', get_template_directory_uri() . '/scripts/menu.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

// Dynamic header-image
$args = array(
    'width' => 1920,
    'heigth' => 1080,
    'default-image' => get_template_directory_uri() . 'images/header.jpg',
    'uploads' => true,
    'flex-width' => true,
);
add_theme_support( 'custom-header', $args );


// Images
add_theme_support( 'post-thumbnails' ); 

add_image_size('featured-image', 657, 369, true);
add_image_size('single-image', 550, 369, true);
add_image_size('profile-pic', 300, 300, true);


// Logo
function theme_prefix_setup() {
	
	add_theme_support( 'custom-logo', array(
		'height'      => 80,
		'width'       => 150,
		'flex-width' => true,
	) );

}
add_action( 'after_setup_theme', 'theme_prefix_setup' );


// Replace excerpt with "read more" link
function new_excerpt_more($more) {
    global $post;
    return $more . '<a class="moretag" href="'. get_permalink( $post->ID ). '">Läs mer &raquo;</a>';
}
add_filter('the_excerpt', 'new_excerpt_more');

// Widgetarea in sidebar
if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Widgetarea_Sidebar',
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);


// Breadcrumbs
add_filter( 'wpseo_breadcrumb_links', 'wpse_100012_override_yoast_breadcrumb_trail' );

function wpse_100012_override_yoast_breadcrumb_trail( $links ) {
    global $post;

    if ( is_tag() ) {
        $breadcrumb[] = array(
            'url' => get_category_link( get_category_by_slug('Blogg') ),
            'text' => 'Blogg',
        );

        array_splice( $links, 1, -2, $breadcrumb );
    }

    return $links;
}

// Login link in menu
add_filter('wp_nav_menu_items', 'add_login_logout_link', 10, 2);
function add_login_logout_link($items, $args) {
        ob_start();
        wp_loginout('index.php');
        $loginoutlink = ob_get_contents();
        ob_end_clean();
        $items .= '<li>'. $loginoutlink .'</li>';
    return $items;
}

// VALIDATION ERROR FIXES
// Remove script type text.
add_filter('style_loader_tag', 'codeless_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'codeless_remove_type_attr', 10, 2);
function codeless_remove_type_attr($tag, $handle) {
    return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}

// Yoast breadcrumbs “Attribute xmlns:v not allowed here” fix
add_filter ('wpseo_breadcrumb_output','bybe_crumb_v_fix');
function bybe_crumb_v_fix ($link_output) {
  $link_output = preg_replace(array('#<span xmlns:v="http://rdf.data-vocabulary.org/\#">#','#<span typeof="v:Breadcrumb"><a href="(.*?)" .*?'.'>(.*?)</a></span>#','#<span typeof="v:Breadcrumb">(.*?)</span>#','# property=".*?"#','#</span>$#'), array('','<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="$1" itemprop="url"><span itemprop="title">$2</span></a></span>','<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title">$1</span></span>','',''), $link_output);
  return $link_output;
}
?>