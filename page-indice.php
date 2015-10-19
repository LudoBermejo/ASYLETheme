<?php get_header() ?>
<div class="wrapper-inner home">

    <div class="content">


        <?php

        echo getStampsAllIssues(true);


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
