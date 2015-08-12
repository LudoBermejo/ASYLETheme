<!DOCTYPE html>

<html>
<head>
    <title>As&AMP;le</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
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
