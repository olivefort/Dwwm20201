<article class="card">
    <?php
    $image = get_field('img_form');
    $size = 'full'; // (thumbnail, medium, large, full or custom size)
    if( $image ) {
    echo wp_get_attachment_image( $image, $size,"",['class'=> "card-img"] );
    }?>
    <div class="card-content">
        <h2 class="card-title"><?php the_title(); ?></h2>
        <p class="card-excerpt"><?php the_excerpt(); ?></p>
    </div>
    <a href="<?php the_permalink() ?>" class="card-link">Lire la suite <img loading="lazy"  src="<?= get_stylesheet_directory_uri(  );?>/img/icon-arrow-right.svg" alt="" aria-hidden="true"></a>
</article>