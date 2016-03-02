<?php get_header() ?>
    <div class="wrapper-inner home">
        <div class="content">


            <div class="stamp big">
                <span class="icon-frame">
                    <span class="content">#2
                    </span>
                </span>
            </div>
            <div class="well">
                <h2>
                    Karen Blixen
                    <small>Próximamente</small>
                </h2>
                <blockquote>
                    Cuando el narrador es fiel, eterna e inquebrantablemente fiel a la historia, al final es el silencio quien habla. Cuando la historia ha sido traicionada, el silencio no es más que vacío. Pero nosotros, los fieles, cuando hemos dicho nuestra última palabra oímos la voz del silencio.
                </blockquote>
            </div>
            <div class="inicio-index">
                <h3>Próximo número a finales de Marzo</h3>
            </div>


            <?php
            if ( have_posts() ):

                while(have_posts()): the_post(); ?>
                    <div class="stamp big">
                        <a href="<?php echo get_issuem_issue_link() ?>">
                                <span class="icon-frame">
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
                        <h3>Artículos</h3>
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
                        <h3>Entrevistas</h3>
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
                        <h3>Cuentos</h3>
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
            <p><strong>A sangre y letras</strong> es una revista literaria creada por alumnos del <strong><a href="http://escrituracreativa.com/">taller de escritura creativa de Clara Obligado</a></strong></p>
            <p>Si quieres saber más de nosotros <strong><a href="/la-revista/">pincha aquí</a></strong></p>
            <p>O, si lo prefieres, puedes apuntarte a nuestro <strong><a href="/newsletter/">boletín de noticias</a></strong></p>
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
