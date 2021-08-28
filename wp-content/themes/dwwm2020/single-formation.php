
<?php get_header();?>

<main id="main-content" class="post">
    <div id="mainPhoto" class="module-hero" style="background-image: url(<?php the_field('img_fond'); ?>);">
        <div id="pageTitle" class="container contour">
            <?php the_title('<h1>','</h1>'); ?>
        </div>
    </div>
    <section class="module-desc">
        <div class="container container-narrow">
        <?php
            if(have_posts()){
                while(have_posts()){
                    the_post();
                    the_content();
                };
            };
        ?>
        </div>
    </section>
</main>

<?php get_footer();?>