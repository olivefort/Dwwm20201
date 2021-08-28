<article class="student">
    <?php
    $image = get_field('stud_img');
    $size = 'full'; // (thumbnail, medium, large, full or custom size)
    if( $image ) {
        echo wp_get_attachment_image( $image, $size,"",['class'=> "student-img"] );
    }?>
    <h2 class="student-name"><?php the_title(); ?></h2>
    <a href="<?php the_permalink() ?>" class="student-link">Lire la suite</a>
</article>