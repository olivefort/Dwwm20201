<?php get_header(); ?>

<main id="main-content" class="students">
    <div class="container">
        <h1 class="section-title"><?php echo get_field('titre_de_la_page_etudiants', 'option'); ?></h1>
        <?php
            if(have_posts()){
                while(have_posts()){
                    the_post();
                    get_template_part('parts/post-loop-stud');
                };
            };
        ?>
		<div id="precsuiv" class="pagination">
			<?php the_posts_pagination([
				'prev_text' => '&laquo;',
				'next_text' => '&raquo;'
			]);?>
		</div>
    </div>
</main>

<?php get_footer(); ?>