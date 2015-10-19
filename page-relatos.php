<?php get_header() ?>
    <div class="wrapper-inner essays">
        <div class="content">
            <div class="well">

                <?php
                if ( have_posts() ):

                    while(have_posts()): the_post(); ?>
                            <h2>
                                <?php echo get_issuem_issue_title(); ?>

                                <small><?php the_date('F Y'); ?></small>
                            </h2>
                            <blockquote>
                                <?php echo get_issuem_issue_description(); ?>
                            </blockquote>
                    <?php endwhile;
                endif
                ?>
            </div>

            <?php get_search_letters();?>


            <?php echo getAllIssues(); ?>
        </div>
        <div class="sidebar">
            <div class="stamp small">
                <span class="icon-frame">
                    <span class="content">#<?php $data = get_issuem_issue_meta();
                        echo $data["issue_order"]; ?>
                    </span>
                </span>
            </div>
            <ul class="names">
                <!--<li class="title"><a href="<?php echo get_permalink(12) ?>">Prólogo</a></li>-->
                <?php

                $special = array(
                    'use_category_order'	=> 'true',
                );


                $line = '<li><a class="issuem_article_link" href="%URL%">%TITLE%, %BYLINE%</a></li>';
                $lineCategory = '<li><strong>%TITLE%, %BYLINE%</strong></li>';
                echo get_issuem_articles_free_form("", $line, $lineCategory);
                ?>
            </ul>
        </div>        
    </div>
<?php get_footer() ?>
