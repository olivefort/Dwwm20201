<?php get_header();?>

<main id="main-content" class="student-post">
    <div class="container">
        <?php
            if(have_posts()){
                while(have_posts()){
                    the_post();
                    $image = get_field('stud_img');
                    $size = 'full'; // (thumbnail, medium, large, full or custom size)
                    if( $image ) {
                        echo wp_get_attachment_image( $image, $size,"",['class'=> "student-post-img"] );
                    }
                    $field = get_field('stud_name');
                        if ($field){ ?>
                        <h1 class="student-post-title"><?php echo $field; ?></h1>
                    <?php
                    }
                    $field = get_field('stud_movie');
                        if ($field){ ?>
                        <div class="field">
                            <div class="field-title">Son film</div>
                            <div class="field-content"><?php echo $field; ?></div>
                        </div>
                    <?php
                    }
                    $field = get_field('stud_serie');
                        if ($field){ ?>
                        <div class="field">
                            <div class="field-title">Sa série</div>
                            <div class="field-content"><?php echo $field; ?></div>
                        </div>
                    <?php
                    }
                    $field = get_field('stud_game');
                        if ($field){ ?>
                        <div class="field">
                            <div class="field-title">Son jeu vidéo</div>
                            <div class="field-content"><?php echo $field; ?></div>
                        </div>
                    <?php
                    }
                    $field = get_field('stud_langage');
                        if ($field){ ?>
                        <div class="field">
                            <div class="field-title">Son langage</div>
                            <div class="field-content"><?php echo $field; ?></div>
                        </div>
                    <?php
                    }
                    $field = get_field('stud_book');
                        if ($field){ ?>
                        <div class="field">
                            <div class="field-title">Son livre</div>
                            <div class="field-content"><?php echo $field; ?></div>
                        </div>
                    <?php
                    }
                    $field = get_field('stud_song');
                        if ($field){ ?>
                        <div class="field">
                            <div class="field-title">Sa chanson</div>
                            <div class="field-content"><?php echo $field; ?></div>
                        </div>
                    <?php
                    }
                    $field = get_field('stud_word');
                        if ($field){ ?>
                        <div class="field">
                            <div class="field-title">En deux mots</div>
                            <div class="field-content"><?php echo $field; ?></div>
                        </div>
                    <?php
                    }

                };
            };
        ?>
    </div>
</main>

<?php get_footer();?>