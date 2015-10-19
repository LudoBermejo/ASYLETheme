<?php get_header() ?>
    <div class="wrapper-inner home">

        <div class="content">

            <?php
                if ( have_posts() ):

                    while(have_posts()): the_post(); ?>

                        <h1><span class="icon-<?php echo transliterateString(get_the_title());?> wrapper-icon"></span> <?php the_title();?></h1>
                        <p><?php the_content();?></p>

                    <?php endwhile;
                endif
            ?>


<!--            <div class="stamp big">
                        <span class="icon-frame">
                            <span class="content">#3</span>
                        </span>
            </div>
            <div class="well">
                <h2>
                    Munro
                    <small>Otoño 2015</small>
                </h2>
                <blockquote>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas at bibendum nunc, vel faucibus diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam tristique sapien id ex gravida euismod. Etiam rutrum risus id ligula dapibus, ut molestie eros blandit. Proin massa tellus, placerat sit amet felis vel, pulvinar tincidunt orci. Proin semper nisi sed odio facilisis rutrum. Proin convallis aliquet ipsum et hendrerit. Praesent eu luctus sem, ut suscipit felis. Fusce imperdiet nisl dui, id vestibulum lorem facilisis eu. Sed luctus elementum libero mollis condimentum. Mauris eros turpis, suscipit sit amet sem id, porta accumsan velit. Etiam aliquam, magna ut aliquet mattis, magna enim semper sem, sed consectetur ante nisl in nisi. Praesent tristique dui sapien, ac dignissim tortor porta ac. Quisque hendrerit accumsan luctus. Suspendisse hendrerit odio vel diam tincidunt pharetra.</blockquote>

            </div>

            <ul class="sumary">
                <li><a href="#"><strong>Title Title Title 1</strong> Author 1</a></li>
                <li><a href="#"><strong>Title 2</strong> Author Author 2</a></li>
                <li><a href="#"><strong>Title Title 3</strong> Author Author Author3</a></li>
                <li><a href="#"><strong>Title 4</strong> Author Author 4</a></li>
                <li><a href="#"><strong>Title Title 5</strong> Author 5</a></li>
                <li><a href="#"><strong>Title TitleTitle 6</strong> Author 6</a></li>
                <li><a href="#"><strong>Title 7</strong> Author Author 7</a></li>
                <li><a href="#"><strong>Title Title Title 8</strong> Author Author 8</a></li>
                <li><a href="#"><strong>Title Title 9</strong> Author 9</a></li>
            </ul>

            <div class="carrousel">
                <div class="issues">
                    <div class="stamp small">
                                <span class="icon-frame">
                                    <span class="content">

                                    </span>
                                </span>
                    </div>
                    <div class="stamp small">
                                <span class="icon-frame">
                                    <span class="content">

                                    </span>
                                </span>
                    </div>
                    <div class="stamp small">
                                <span class="icon-frame">
                                    <span class="content">

                                    </span>
                                </span>
                    </div>
                    <div class="stamp small">
                                <span class="icon-frame">
                                    <span class="content">

                                    </span>
                                </span>
                    </div>
                    <div class="stamp small">
                                <span class="icon-frame">
                                    <span class="content">

                                    </span>
                                </span>
                    </div>
                    <div class="stamp small">
                                <span class="icon-frame">
                                    <span class="content">

                                    </span>
                                </span>
                    </div>
                    <div class="stamp small">
                                <span class="icon-frame">
                                    <span class="content">

                                    </span>
                                </span>
                    </div>

                </div>
            </div>
        </div>-->
    </div>
    <div class="sidebar">
        <p><span class="icon-exclamacion wrapper-icon"></span></p>
        <p>As&amp;le es una revista literaria creada por aulunos del taller de escritura creativa de Clara Obligado</p>
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
