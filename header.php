<!DOCTYPE html>

<html>
<head>
    <title>A sangre y letras, revista literaria</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="http://www.asangreyletras.es/wp-content/uploads/2016/01/asyle_logo3.jpg" />
    <?php wp_head(); ?>
    <script src="/wp-content/themes/asyle/lib/jquery/jquery-1.11.2.min.js"></script>
    <script src="/wp-content/themes/asyle/js/interaction.js"></script>

</head>
<body <?php body_class()?>>

    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '1232170183478814',
                xfbml      : true,
                version    : 'v2.5'
            });
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <div class="wrapper">
        <header class="main">
            <div class="inner">
                <div class="logo">
                    <a href="<?php echo get_site_url();?> ">as<span class="icon-and"></span>le</a>
                </div>
                <button class="menu-trigger"><img src="/wp-content/themes/asyle/img/burger-icon.png"></button>

                <?php if (function_exists(clean_custom_menus)) clean_custom_menus("primary", get_permalink( $post->ID )); ?>


            </div>
        </header>
