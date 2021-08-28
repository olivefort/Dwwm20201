<?php get_header(); ?>

<main id="main-content" class="post">
    <div class="container container-narrow">
        <?php
            if(have_posts()){
                while(have_posts()){
                    the_post();
                    the_title('<h1>','</h1>');
                    the_content();
                };
            };
        ?>
    </div>
</main>

<?php get_footer(); ?>

