<?php get_header();?>

<main id="main-content" class="post">
    <div class="container container-narrow">
    <?php
        if(have_posts()){
            while(have_posts()){
                $image = get_field('img_article');
                $size = 'full'; // (thumbnail, medium, large, full or custom size)
                if( $image ) {
                echo wp_get_attachment_image( $image, $size,"",['class'=> "featured-img"] );
                }
                the_post();
                the_title('<h1>','</h1>');
                the_content();
            };
        };
    ?>
    </div>
</main>

<?php get_footer();?>
