<?php 
/*
Template Name: Startsida
*/

get_header(); 
?>

<!-- Header image -->
<div id="headerImage">
    <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
    <div class="colorFilter"></div>
    <h2 class="headerImgHeading"><?php echo get_bloginfo( 'name' ); ?></h2>
    <h2 class="headerImgText"><?php echo get_bloginfo( 'description' ); ?></h2>
</div>

<!-- The content -->
<div id="container">

    <!-- Categories-section -->
    <h2>Arbeten</h2>
        <div id="content">
            <div id="boxHolder">
            <?php
                // Get the ID of "Projekt"-category
                $category_id = get_cat_ID( 'Projekt' );

                // Get the URL of this category
                $category_link = get_category_link( $category_id );
            ?>
                <a class="box2" href="<?php echo esc_url( $category_link ); ?>" title="Projekt">
                    <p class="aLogo"><i class="fas fa-archive"></i></p>
                    
                    <p class="aText">Projekt</p>
                </a>

            <?php
                // Get the ID of "Foton"-category
                $category_id2 = get_term_by('name', 'Foton', 'post_tag');

                // Get the URL of this category
                $category_link2 = get_tag_link( $category_id2 );
            ?>
                <a class="box2" href="<?php echo esc_url( $category_link2 ); ?>" title="Foton">
                    <p class="aLogo"><i class="fas fa-camera"></i></p>
                    
                    <p class="aText">Foton</p>
                </a>

            <?php
                // Get the ID of "Foton"-category
                $category_id3 = get_term_by('name', 'Konst', 'post_tag');

                // Get the URL of this category
                $category_link3 = get_tag_link( $category_id3 );
            ?>
                <a class="box2" href="<?php echo esc_url( $category_link3 ); ?>" title="Konst">
                    <p class="aLogo"><i class="fas fa-paint-brush"></i></p>
                    
                    <p class="aText">Konst</p>
                </a>
            </div>
        </div><!-- End of categories -->
        <div style="clear: both;"></div><!-- Clear floats -->

        <!-- Section divider -->
        <hr>


        <!-- "About"-section -->
        <?php 
            // Get About-post by title
            $my_post = get_page_by_title( 'Om mig', OBJECT, 'post' );
        ?>
        <!-- About-post title -->
        <h2><?php echo get_the_title( $my_post->ID ); ?></h2>
        <!-- Profile-image -->
        <div class="boxAbout">
            <div class="boxAboutImg">
                <img src="<?php bloginfo('template_directory'); ?>/images/face3.jpg" alt="Profilbild">
                <div class="colorFilter2"></div>
            </div>
        </div>
        <!-- Text -->
        <div class="boxAbout2">
            <div class="boxAboutText">
                <!-- Print  About-post content -->
                <?php
                    echo $my_post->post_content;
                ?>
                <br>
                <!-- Link to contact-page -->
                <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Kontakt' ) ) ); ?>" class="hvr-float-shadow">Kontakta mig</a>
            </div>
        </div>
        <div style="clear: both;"></div><!-- Clear floats -->
        <br>


<!-- Footer -->
<?php get_footer(); ?>