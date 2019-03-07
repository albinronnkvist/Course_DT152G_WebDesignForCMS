<!-- Header -->
<?php get_header(); ?>

<!-- The content -->
<div id="container">

<div id="page-container">

    <h2 class="pagename"><?php the_title(); ?></h2>
    <hr>

    <!-- Breadcrumbs -->
    <?php
        if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb('<ul class="breadcrumbs"><li>','</li></ul>');
        }
    ?>

        <!-- Post -->
        <div id="project-content">

                <!-- Posts -->
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>          
                         
                    <!-- Posts Featured image -->
                    <div class="featured-image3">
                        <?php 
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail('single-image');
                            } 
                        ?>
                    </div>
                    
                    <!-- Posts Full text -->
                    <div class="project-text">
                    
                        <!-- Postname -->
                        <h3 class="h3First-project"><?php the_title(); ?></h3>

                        <!-- Posts published date -->
                        <p class="date-text"><?php echo get_the_date( 'Y-m-d' ); ?></p>

                        <!-- Posts full text -->
                        <?php the_content(); ?>                    

                    </div>

                <!-- If no posts exist -->
                <?php endwhile; else: ?>
                    <p>
                        <?php _e('Sorry, no posts matched your criteria.'); ?>
                    </p>
                <?php endif; ?>

        </div>
        
</div><!-- End of #page-container -->
<div style="clear: both;"></div>

<!-- Footer -->
<?php get_footer(); ?>