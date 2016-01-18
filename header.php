<!DOCTYPE html>

<html>
<head>
    <title>A sangre y letras, revista literaria</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body <?php body_class()?>>
    <div class="wrapper">
        <header class="main">
            <div class="inner">
                <div class="logo">
                    <a href="<?php echo get_site_url();?> ">as<span class="icon-and"></span>le</a>
                </div>

                <?php if (function_exists(clean_custom_menus)) clean_custom_menus("primary", get_permalink( $post->ID )); ?>


            </div>
        </header>
