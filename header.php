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



    <div class="wrapper">
        <header class="main">
            <div class="inner">
                <div class="logo">
                    <a href="<?php echo get_site_url();?> ">
                       <img src="http://www.asangreyletras.es/wp-content/themes/asyle/img/logo.png" style="
                        width: 138px;
                        padding-top: 25px;
                        ">
                    </a>
                </div>
                <button class="menu-trigger"><img src="/wp-content/themes/asyle/img/burger-icon.png"></button>

                <?php if (function_exists(clean_custom_menus)) clean_custom_menus("primary", get_permalink( $post->ID )); ?>


            </div>
        </header>
