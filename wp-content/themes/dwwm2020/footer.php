	<footer class="main-footer">
		<?php wp_footer(); ?>
		<div class="container">
			<address>
				<strong>Développeur Web et Web Mobile</strong><br>
				CEFIM<br>
				32 Avenue Marcel Dassault<br>
				37200 Tours<br>
				T : <a href="tel:0247402680">02 47 40 26 80</a>
			</address>
			<nav class="footer-nav">
				<?php
				wp_nav_menu(
					array(
					'theme_location'=>'menu-du-footer',
					)
				);
				?>
			</nav>
			<?php if ( have_rows('rezosocio', 'option') ) { ?>
                <nav class="social-nav">
                    <ul class="menu">
                        <?php while ( have_rows('rezosocio','option') ) {
                            the_row();
                            $rezologo = get_sub_field('rezo_img'); 
                            $rezolien = get_sub_field('rezo_lien');
                            $rezolien_url = $rezolien['url'];
                            $rezolien_target = $rezolien['target'] ? $rezolien['target'] : '_blank';
                        ?>
                            <li class="menu-item">
                                <a href="<?php echo esc_url($rezolien_url); ?>" target="<?php echo esc_attr($rezolien_target); ?>">
                                <span class="screen-reader-text"><?php the_sub_field('rezo_title'); ?></span>
                                <?php echo wp_get_attachment_image( $rezologo, 'tiny' );?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
            <?php } ?>
		</div>
	</footer>
</body>
</html>