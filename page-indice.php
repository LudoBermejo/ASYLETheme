<?php get_header() ?>
<div class="wrapper-inner home">

    <div class="content">


        <?php

        echo getStampsAllIssues();

        return;
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

                <ul class="sumary">


                    <?php

                    $line = '<li><a class="issuem_article_link" href="%URL%"><strong>%TITLE%</strong>%BYLINE%</a></li>';
                    echo get_issuem_articles_free_form("", $line);
                    ?>

                </ul>

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
