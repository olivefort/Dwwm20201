<?php get_header();?>
<main id="main-content">
	<section class="home-hero inverted">
		<div class="container">
			<div class="hero-content">
				<h1 class="hero-title">Bienvenue sur le site de la promotion DWWM2020-1</h1>
				<a href="./etudiant/" class="hero-link">Rencontrez nos étudiants</a>
			</div>
		</div>
	</section>
	<section class="last-news">
		<div class="container">
			<h2 class="section-title">Les dernières actualités</h2>
			<?php
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 3,
			);
			$my_query = new WP_Query( $args );
			if( $my_query->have_posts() ) {
				while( $my_query->have_posts() ) {
					$my_query->the_post();
					get_template_part('parts/post-loop-actu');
				};
			};
			wp_reset_postdata();
			?>
		</div>
	</section>
	<section class="students inverted">
		<div class="container">
			<h2 class="section-title">Rencontrez les étudiants</h2>
			<?php
			$falinlin = array(
				'post_type' => 'etudiant',
				'orderby' => 'rand',
				'posts_per_page' => 4,
			);
			$query = new WP_Query( $falinlin );
			if( $query->have_posts() ) {
				while( $query->have_posts() ) {
					$query->the_post();
					get_template_part('parts/post-loop-stud');
				};
			};
			wp_reset_postdata();
			?>
		</div>
	</section>
	<section class="modules">
		<div class="container">
			<h2 class="section-title"><?php echo get_field('titre_de_la_page_formation', 'option'); ?></h2>
			<?php
			$module = array(
				'post_type' => 'formation',
				'orderby' => 'rand',
				'posts_per_page' => 2,
			);
			$query_forma = new WP_Query( $module );
			if( $query_forma->have_posts() ) {
				while( $query_forma->have_posts() ) {
					$query_forma->the_post();
					get_template_part('parts/post-loop-form');
				};
			};
			wp_reset_postdata();
			?>
		</div>
	</section>
</main>

<?php get_footer();?>