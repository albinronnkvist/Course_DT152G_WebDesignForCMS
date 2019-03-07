<?php 
/*
Template Name: Kontaktsida
*/

get_header(); 
?>

<!-- The content -->
<div id="container">

    <div id="page-container">
        <!-- pagename -->
        <h2 class="pagename">Kontakt</h2>
        <hr>
        <!-- Breadcrumbs -->
        <?php
            if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb('<ul class="breadcrumbs"><li>','</li></ul>');
            }
        ?>

        <div id="contact-container">
            <h2>Kontakta mig</h2>
            <?php
                echo do_shortcode('[contact-form-7 id="66" title="Kontakta mig" html_class="mailform"]');
            ?>
        </div>

        <!-- "About"-section -->
        <div id="about-container">
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
            <div style="clear: both;"></div>
            <!-- Text -->
                <!-- Print  About-post content -->
                <?php
                    echo $my_post->post_content;
                ?>
            <div style="clear: both;"></div><!-- Clear floats -->
            <br>
        </div>

    </div><!-- End of #page-container -->
    <div style="clear: both;"></div>

<!-- Footer -->
<?php get_footer(); ?>