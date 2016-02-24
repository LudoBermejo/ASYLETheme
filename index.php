<?php get_header() ?>
    <div class="wrapper-inner home">

        <div class="content">

            <?php
                if ( have_posts() ):

                    while(have_posts()): the_post(); ?>

                        <h1><?php the_title();?></h1>
                        <p><?php the_content();?></p>

                    <?php endwhile;
                endif
            ?>

    </div>
        <div class="sidebar">
            <p><span class="icon-inicio wrapper-icon"></span></p>
            <p><strong>A sangre y letras</strong> es una revista literaria creada por alumnos del <strong><a href="http://escrituracreativa.com/">taller de escritura creativa de Clara Obligado</a></strong></p>
            <p>Si quieres saber más de nosotros <strong><a href="/la-revista/">pincha aquí</a></strong></p>
        </div>
<?php get_footer() ?>
