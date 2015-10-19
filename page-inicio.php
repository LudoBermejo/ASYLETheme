<?php get_header() ?>
    <div class="wrapper-inner home">
        <div class="content">


            <?php
            if ( have_posts() ):

                while(have_posts()): the_post(); ?>
                    <div class="stamp big">
                        <a href="<?php echo get_issuem_issue_link() ?>">
                                <span class="icon-revistas">
                                    <span class="content">#<?php $data = get_issuem_issue_meta();

                                        echo $data["issue_order"]; ?>
                                    </span>
                                </span>
                        </a>
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

                    <div class="inicio-index">
                        <strong>Artículos</strong>
                        <ul class="sumary">
                            <!--<li class="title"><a href="<?php echo get_permalink(12) ?>">Prólogo</a></li>-->
                            <?php

                            $special = array(
                                'article_category'		=> 'articulos'
                            );


                            $line = '<li><a class="issuem_article_link" href="%URL%"><strong>%TITLE%</strong>%BYLINE%</a></li>';
                            echo get_issuem_articles_free_form($special, $line);
                            ?>
                        </ul>
                        <strong>Entrevistas</strong>
                        <ul class="sumary">
                            <!--<li class="title"><a href="<?php echo get_permalink(12) ?>">Prólogo</a></li>-->
                            <?php

                            $special = array(
                                'article_category'		=> 'entrevistas'
                            );


                            $line = '<li><a class="issuem_article_link" href="%URL%"><strong>%TITLE%</strong>%BYLINE%</a></li>';
                            echo get_issuem_articles_free_form($special, $line);
                            ?>
                        </ul>
                        <strong>Cuentos</strong>
                        <ul class="sumary">
                            <!--<li class="title"><a href="<?php echo get_permalink(12) ?>">Prólogo</a></li>-->
                            <?php

                            $special = array(
                                'article_category'		=> 'cuentos'
                            );


                            $line = '<li><a class="issuem_article_link" href="%URL%"><strong>%TITLE%</strong>%BYLINE%</a></li>';
                            echo get_issuem_articles_free_form($special, $line);
                            ?>
                        </ul>
                    </div>

                    <div class="carrousel">
                        <div class="issues">
                            <?php
                                 echo getStampsPastIssues();
                            ?>


                        </div>
                    </div>


                <?php endwhile;
            endif
            ?>

        </div>
        <div class="sidebar">
            <p><span class="icon-inicio wrapper-icon"></span></p>
            <p><strong>A sangre y letras</strong> es una revista literaria creada por alumnos del <a href="http://escrituracreativa.com/">taller de escritura creativa de Clara Obligado</a></p>
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
