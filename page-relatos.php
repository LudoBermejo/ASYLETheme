<?php get_header() ?>
    <div class="wrapper-inner essays">
        <div class="content">

            <div class="inicio-index">
                <h2>Artículos</h2>
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
                <h2>Entrevistas</h2>
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
                <h2>Cuentos</h2>
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
        </div>
        <div class="sidebar"></div>

    </div>
<?php get_footer() ?>
