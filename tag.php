<!-- Header -->
<?php get_header(); ?>

<!-- The content -->
<div id="container">

<div id="page-container">

    <?php  
        if( is_home() || is_front_page() )
            $heading = '';
        
        if( is_single() || is_page() )
            $heading = wp_title( false, 'right' );

        if( is_category() || is_tag() )
            $heading = single_cat_title( '', false );
    ?>
    <h2 class="pagename"><?php echo $heading; ?></h2>
    <hr>

    <!-- Breadcrumbs -->
    <?php
        if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb('<ul class="breadcrumbs"><li>','</li></ul>');
        }
    ?>

        <!-- Posts -->
        <div id="posts-container">
            <h3 class="h3First">Senaste Inläggen:</h3>

            <div class="specific-post">

                <!-- Posts -->
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <!-- Postname -->
                    <h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>

                    <!-- Posts published date -->
                    <p class="date-text"><?php echo get_the_date( 'Y-m-d' ); ?></p>

                    <!-- Posts Featured image -->
                    <div class="featured-image">
                        <?php 
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail('featured-image');
                            } 
                        ?>
                    </div>

                    <!-- Posts excerpt text -->
                    <?php the_excerpt(); ?>

                    <!-- Post divider -->
                    <hr class="post-divider">

                <!-- If no posts exist -->
                <?php endwhile; else: ?>
                    <p>
                        <?php _e('Sorry, no posts matched your criteria.'); ?>
                    </p>
                <?php endif; ?>

            </div>

        </div>

        <!-- Sidebar -->
        <div id="sidebar">
            <?php get_sidebar(); ?>
        </div>
        
        </div><!-- End of #page-container -->

        <div style="clear: both;"></div>

<!-- Footer -->
<?php get_footer(); ?>