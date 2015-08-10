<?php get_header() ?>
    <div class="wrapper-inner home">
        <div class="sidebar">
            <p><span class="icon-inicio wrapper-icon"></span></p>
            <p>As&amp;le es una revista literaria creada por alumnos del <a href="http://escrituracreativa.com/">taller de escritura creativa de Clara Obligado</a></p>
        </div>
        <div class="content">


            <?php
            if ( have_posts() ):

                while(have_posts()): the_post(); ?>



                    <div class="stamp big">
                                <span class="icon-frame">
                                    <span class="content">#<?php $data = get_issuem_issue_meta();
                                        echo $data["issue_order"]; ?>
                                    </span>
                                </span>
                    </div>
                    <div class="well">
                        <h2>
                            <?php echo get_issuem_issue_title(); ?>

                            <small><?php the_date('F Y'); ?></small>
                        </h2>
                        <blockquote>
                            <?php echo get_issuem_issue_description(); ?>
                        </blockquote>

                    </div>

                    <ul class="sumary">


                        <?php

                        $line = '<li><a class="issuem_article_link" href="%URL%"><strong>%TITLE%</strong>%BYLINE%</a></li>';
                        echo get_issuem_articles_free_form([], $line);
                        ?>

                    </ul>

                    <div class="carrousel">
                        <div class="issues">
                            <?php
                                $archives = do_issuem_archives_list();
                               foreach ( $archives as $archive => $issue_array ) {
                                   $issue_meta = get_option( 'issuem_issue_' . $issue_array[0]->term_id . '_meta' );
                                   if ( 'Draft' !== $issue_meta['issue_status'] && isset($issue_meta["issue_order"])) {
                                       if($issue_array[0]->name !== get_issuem_issue_title() ) {
                                           ?>

                                            <div class="stamp small">
                                                        <span class="icon-frame">
                                                            <span class="content">#<?php
                                                                echo $issue_meta["issue_order"];
                                                                ?>


                                                            </span>
                                                        </span>
                                            </div>
                                        <?php

                                       }
                                   }
                               }
                            ?>


                        </div>
                    </div>


                <?php endwhile;
            endif
            ?>

        </div>
    </div>
<!--<script>
    $('.issues').slick({
        infinite: false,
        slidesToShow: 6,
        slidesToScroll: 1,
        variableWidth: true,
        appendArrows: $('.issues'),
        prevArrow: '<button class="left"><</button>',
        nextArrow: '<button class="right">></button>'
    });
</script>-->
<?php get_footer() ?>
