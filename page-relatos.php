<?php get_header() ?>
    <div class="wrapper-inner essays">
        <div class="content">

            <div class="inicio-index">
                <h2>Los artículos</h2>
                <ul class="names">
                    <!--<li class="title"><a href="<?php echo get_permalink(12) ?>">Prólogo</a></li>-->
                    <?php

                    $special = array(
                        'article_category'		=> 'articulos'
                    );


                    $line = '<li><a class="issuem_article_link" href="%URL%"><strong>%TITLE%</strong>, %BYLINE%</a></li>';
                    echo get_issuem_articles_free_form($special, $line, "empty");
                    ?>
                </ul>
                </div>
            <div class="inicio-index">
                <h2>Las reseñas</h2>
                <ul class="names">
                    <!--<li class="title"><a href="<?php echo get_permalink(12) ?>">Prólogo</a></li>-->
                    <?php

                    $special = array(
                        'article_category'		=> 'reseñas'
                    );


                    $line = '<li><a class="issuem_article_link" href="%URL%"><strong>%TITLE%</strong>, %BYLINE%</a></li>';
                    echo get_issuem_articles_free_form($special, $line, "empty");
                    ?>
                </ul>
            </div>
            <div class="inicio-index">
                <h2>Las entrevistas</h2>
                <ul class="names">
                    <!--<li class="title"><a href="<?php echo get_permalink(12) ?>">Prólogo</a></li>-->
                    <?php

                    $special = array(
                        'article_category'		=> 'entrevistas'
                    );


                    $line = '<li><a class="issuem_article_link" href="%URL%"><strong>%TITLE%</strong>, %BYLINE%</a></li>';
                    echo get_issuem_articles_free_form($special, $line, "empty");
                    ?>
                </ul>
                </div>
            <div class="inicio-index">
                <h2>Los cuentos</h2>
                <ul class="names">
                    <!--<li class="title"><a href="<?php echo get_permalink(12) ?>">Prólogo</a></li>-->
                    <?php

                    $special = array(
                        'article_category'		=> 'cuentos'
                    );


                    $line = '<li><a class="issuem_article_link" href="%URL%"><strong>%TITLE%</strong>, %BYLINE%</a></li>';
                    echo get_issuem_articles_free_form($special, $line, "empty");
                    ?>
                </ul>
            </div>
        </div>
        <div class="sidebar"></div>

    </div>
<?php get_footer() ?>
