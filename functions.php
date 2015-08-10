<?php

function asyle_script_enqueue() {

    wp_enqueue_style('styles', get_template_directory_uri() . '/css/styles.css', array(), "1.0.0", "all");
    wp_enqueue_script('jquery', get_template_directory_uri() . '/lib/jquery/jquery-1.11.2.min',array(), "1.0.0",true);
    wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/lib/jquery/jquery-ui.js',array(), "1.0.0",true);
    wp_enqueue_script('slick', get_template_directory_uri() . '/lib/slick/slick.min.js',array(), "1.0.0",true);

    wp_enqueue_style('styles-slick', get_template_directory_uri() . '/lib/slick/slick.css', array(), "1.0.0", "all");
    wp_enqueue_style('styles-slick-theme', get_template_directory_uri() . '/lib/slick/slick-theme.css', array(), "1.0.0", "all");

}

function transliterateString($txt) {
    $transliterationTable = array('á' => 'a', 'Á' => 'A', 'à' => 'a', 'À' => 'A', 'ă' => 'a', 'Ă' => 'A', 'â' => 'a', 'Â' => 'A', 'å' => 'a', 'Å' => 'A', 'ã' => 'a', 'Ã' => 'A', 'ą' => 'a', 'Ą' => 'A', 'ā' => 'a', 'Ā' => 'A', 'ä' => 'ae', 'Ä' => 'AE', 'æ' => 'ae', 'Æ' => 'AE', 'ḃ' => 'b', 'Ḃ' => 'B', 'ć' => 'c', 'Ć' => 'C', 'ĉ' => 'c', 'Ĉ' => 'C', 'č' => 'c', 'Č' => 'C', 'ċ' => 'c', 'Ċ' => 'C', 'ç' => 'c', 'Ç' => 'C', 'ď' => 'd', 'Ď' => 'D', 'ḋ' => 'd', 'Ḋ' => 'D', 'đ' => 'd', 'Đ' => 'D', 'ð' => 'dh', 'Ð' => 'Dh', 'é' => 'e', 'É' => 'E', 'è' => 'e', 'È' => 'E', 'ĕ' => 'e', 'Ĕ' => 'E', 'ê' => 'e', 'Ê' => 'E', 'ě' => 'e', 'Ě' => 'E', 'ë' => 'e', 'Ë' => 'E', 'ė' => 'e', 'Ė' => 'E', 'ę' => 'e', 'Ę' => 'E', 'ē' => 'e', 'Ē' => 'E', 'ḟ' => 'f', 'Ḟ' => 'F', 'ƒ' => 'f', 'Ƒ' => 'F', 'ğ' => 'g', 'Ğ' => 'G', 'ĝ' => 'g', 'Ĝ' => 'G', 'ġ' => 'g', 'Ġ' => 'G', 'ģ' => 'g', 'Ģ' => 'G', 'ĥ' => 'h', 'Ĥ' => 'H', 'ħ' => 'h', 'Ħ' => 'H', 'í' => 'i', 'Í' => 'I', 'ì' => 'i', 'Ì' => 'I', 'î' => 'i', 'Î' => 'I', 'ï' => 'i', 'Ï' => 'I', 'ĩ' => 'i', 'Ĩ' => 'I', 'į' => 'i', 'Į' => 'I', 'ī' => 'i', 'Ī' => 'I', 'ĵ' => 'j', 'Ĵ' => 'J', 'ķ' => 'k', 'Ķ' => 'K', 'ĺ' => 'l', 'Ĺ' => 'L', 'ľ' => 'l', 'Ľ' => 'L', 'ļ' => 'l', 'Ļ' => 'L', 'ł' => 'l', 'Ł' => 'L', 'ṁ' => 'm', 'Ṁ' => 'M', 'ń' => 'n', 'Ń' => 'N', 'ň' => 'n', 'Ň' => 'N', 'ñ' => 'n', 'Ñ' => 'N', 'ņ' => 'n', 'Ņ' => 'N', 'ó' => 'o', 'Ó' => 'O', 'ò' => 'o', 'Ò' => 'O', 'ô' => 'o', 'Ô' => 'O', 'ő' => 'o', 'Ő' => 'O', 'õ' => 'o', 'Õ' => 'O', 'ø' => 'oe', 'Ø' => 'OE', 'ō' => 'o', 'Ō' => 'O', 'ơ' => 'o', 'Ơ' => 'O', 'ö' => 'oe', 'Ö' => 'OE', 'ṗ' => 'p', 'Ṗ' => 'P', 'ŕ' => 'r', 'Ŕ' => 'R', 'ř' => 'r', 'Ř' => 'R', 'ŗ' => 'r', 'Ŗ' => 'R', 'ś' => 's', 'Ś' => 'S', 'ŝ' => 's', 'Ŝ' => 'S', 'š' => 's', 'Š' => 'S', 'ṡ' => 's', 'Ṡ' => 'S', 'ş' => 's', 'Ş' => 'S', 'ș' => 's', 'Ș' => 'S', 'ß' => 'SS', 'ť' => 't', 'Ť' => 'T', 'ṫ' => 't', 'Ṫ' => 'T', 'ţ' => 't', 'Ţ' => 'T', 'ț' => 't', 'Ț' => 'T', 'ŧ' => 't', 'Ŧ' => 'T', 'ú' => 'u', 'Ú' => 'U', 'ù' => 'u', 'Ù' => 'U', 'ŭ' => 'u', 'Ŭ' => 'U', 'û' => 'u', 'Û' => 'U', 'ů' => 'u', 'Ů' => 'U', 'ű' => 'u', 'Ű' => 'U', 'ũ' => 'u', 'Ũ' => 'U', 'ų' => 'u', 'Ų' => 'U', 'ū' => 'u', 'Ū' => 'U', 'ư' => 'u', 'Ư' => 'U', 'ü' => 'ue', 'Ü' => 'UE', 'ẃ' => 'w', 'Ẃ' => 'W', 'ẁ' => 'w', 'Ẁ' => 'W', 'ŵ' => 'w', 'Ŵ' => 'W', 'ẅ' => 'w', 'Ẅ' => 'W', 'ý' => 'y', 'Ý' => 'Y', 'ỳ' => 'y', 'Ỳ' => 'Y', 'ŷ' => 'y', 'Ŷ' => 'Y', 'ÿ' => 'y', 'Ÿ' => 'Y', 'ź' => 'z', 'Ź' => 'Z', 'ž' => 'z', 'Ž' => 'Z', 'ż' => 'z', 'Ż' => 'Z', 'þ' => 'th', 'Þ' => 'Th', 'µ' => 'u', 'а' => 'a', 'А' => 'a', 'б' => 'b', 'Б' => 'b', 'в' => 'v', 'В' => 'v', 'г' => 'g', 'Г' => 'g', 'д' => 'd', 'Д' => 'd', 'е' => 'e', 'Е' => 'E', 'ё' => 'e', 'Ё' => 'E', 'ж' => 'zh', 'Ж' => 'zh', 'з' => 'z', 'З' => 'z', 'и' => 'i', 'И' => 'i', 'й' => 'j', 'Й' => 'j', 'к' => 'k', 'К' => 'k', 'л' => 'l', 'Л' => 'l', 'м' => 'm', 'М' => 'm', 'н' => 'n', 'Н' => 'n', 'о' => 'o', 'О' => 'o', 'п' => 'p', 'П' => 'p', 'р' => 'r', 'Р' => 'r', 'с' => 's', 'С' => 's', 'т' => 't', 'Т' => 't', 'у' => 'u', 'У' => 'u', 'ф' => 'f', 'Ф' => 'f', 'х' => 'h', 'Х' => 'h', 'ц' => 'c', 'Ц' => 'c', 'ч' => 'ch', 'Ч' => 'ch', 'ш' => 'sh', 'Ш' => 'sh', 'щ' => 'sch', 'Щ' => 'sch', 'ъ' => '', 'Ъ' => '', 'ы' => 'y', 'Ы' => 'y', 'ь' => '', 'Ь' => '', 'э' => 'e', 'Э' => 'e', 'ю' => 'ju', 'Ю' => 'ju', 'я' => 'ja', 'Я' => 'ja');
    return strtolower(str_replace(array_keys($transliterationTable), array_values($transliterationTable), $txt));
}

function my_favicon() { ?>
    <link rel="shortcut icon" href="<?php get_template_directory_uri() .'favicon.ico'?>" >
<?php }


function asyle_theme_setup() {
    add_theme_support('menus');

    register_nav_menu('primary', 'This is the primary header menu of the magazine');
}

add_action('wp_head', 'my_favicon');
add_action('wp_enqueue_scripts', 'asyle_script_enqueue');
add_action('after_setup_theme', 'asyle_theme_setup');



/* IssueM */

/**
 * Get issue description, assumes latest issue if no id supplied
 *
 * @since 1.0.0
 *
 * @param int $id Issue ID
 * @return string issue description
 */
function get_issuem_issue_description( $id = false ) {

    if ( !$id ) {

        $issue = get_term_by( 'id', get_newest_issuem_issue_id(), 'issuem_issue' );
        return $issue->description;

    } else {

        $issue = get_term_by( 'id', $id, 'issuem_issue' );

        return $issue->description;

    }

}

/**
 * Get issue count, assumes latest issue if no id supplied
 *
 * @since 1.0.0
 *
 * @param int $id Issue ID
 * @return string issue count
 */
function get_issuem_issue_count( $id = false ) {

    if ( !$id ) {

        $issue = get_term_by( 'id', get_newest_issuem_issue_id(), 'issuem_issue' );
        return $issue->count;

    } else {

        $issue = get_term_by( 'id', $id, 'issuem_issue' );

        return $issue->count;

    }

}


function get_issuem_articles_free_form( $atts, $article_format = NULL ) {

    global $post;

    $issuem_settings = get_issuem_settings();
    $results = '';
    $articles = array();
    $post__in = array();

    $defaults = array(
        'posts_per_page'    	=> -1,
        'offset'            	=> 0,
        'orderby'           	=> 'menu_order',
        'order'             	=> 'DESC',
        'article_format'		=> empty( $article_format ) ? $issuem_settings['article_format'] : $article_format,
        'show_featured'			=> 1,
        'issue'					=> get_active_issuem_issue(),
        'article_category'		=> 'all',
        'use_category_order'	=> 'false',
    );

    // Merge defaults with passed atts
    // Extract (make each array element its own PHP var
    extract( shortcode_atts( $defaults, $atts ) );

    $args = array(
        'posts_per_page'	=> $posts_per_page,
        'offset'			=> $offset,
        'post_type'			=> 'article',
        'orderby'			=> $orderby,
        'order'				=> $order
    );

    if ( !$show_featured ) {

        $args['meta_query'] = array(
            'relation' => 'AND',
            array(
                'key' => '_featured_rotator',
                'compare' => 'NOT EXISTS'
            ),
            array(
                'key' => '_featured_thumb',
                'compare' => 'NOT EXISTS'
            )
        );

    }

    $issuem_issue = array(
        'taxonomy' 	=> 'issuem_issue',
        'field' 	=> 'slug',
        'terms' 	=> $issue
    );

    $args['tax_query'] = array(
        $issuem_issue
    );

    if ( !empty( $issuem_settings['use_wp_taxonomies'] ) )
        $cat_type = 'category';
    else
        $cat_type = 'issuem_issue_categories';

    if ( 'true' === $use_category_order && 'issuem_issue_categories' === $cat_type ) {

        $count = 0;

        if ( 'all' === $article_category ) {

            $all_terms = get_terms( 'issuem_issue_categories' );

            foreach( $all_terms as $term ) {

                $issue_cat_meta = get_option( 'issuem_issue_categories_' . $term->term_id . '_meta' );

                if ( !empty( $issue_cat_meta['category_order'] ) )
                    $terms[ $issue_cat_meta['category_order'] ] = $term->slug;
                else
                    $terms[ '-' . ++$count ] = $term->slug;

            }

        } else {

            foreach( split( ',', $article_category ) as $term_slug ) {

                $term = get_term_by( 'slug', $term_slug, 'issuem_issue_categories' );

                $issue_cat_meta = get_option( 'issuem_issue_categories_' . $term->term_id . '_meta' );

                if ( !empty( $issue_cat_meta['category_order'] ) )
                    $terms[ $issue_cat_meta['category_order'] ] = $term->slug;
                else
                    $terms[ '-' . ++$count ] = $term->slug;

            }

        }

        krsort( $terms );
        $articles = array();

        foreach( $terms as $term ) {

            $category = array(
                'taxonomy' 	=> $cat_type,
                'field' 	=> 'slug',
                'terms' 	=> $term,
            );

            $args['tax_query'] = array(
                'relation'	=> 'AND',
                $issuem_issue,
                $category
            );

            $articles = array_merge( $articles, get_posts( $args ) );

        }

        //And we want all articles not in a category
        $category = array(
            'taxonomy' 	=> $cat_type,
            'field'		=> 'slug',
            'terms'		=> $terms,
            'operator'	=> 'NOT IN',
        );

        $args['tax_query'] = array(
            'relation'      => 'AND',
            $issuem_issue,
            $category
        );

        $articles = array_merge( $articles, get_posts( $args ) );

        //Now we need to get rid of duplicates (assuming an article is in more than one category
        if ( !empty( $articles ) ) {

            foreach( $articles as $article ) {

                $post__in[] = $article->ID;

            }

            $args['post__in']	= array_unique( $post__in );
            $args['orderby']	= 'post__in';
            unset( $args['tax_query'] );

            $articles = get_posts( $args );

        }

    } else {

        if ( !empty( $article_category ) && 'all' !== $article_category ) {

            $category = array(
                'taxonomy' 	=> $cat_type,
                'field' 	=> 'slug',
                'terms' 	=> split( ',', $article_category ),
            );

            $args['tax_query'] = array(
                'relation'	=> 'AND',
                $issuem_issue,
                $category
            );

        }

        $articles = get_posts( $args );

    }

    $results .= '';

    if ( $articles ) :

        $old_post = $post;

        foreach( $articles as $article ) {

            $post = $article;
            setup_postdata( $article );

            $results .= '';
            $results .= "\n" . issuem_replacements_args_free_form( $article_format, $post ) . "\n";
            $results .= '';

        }

        if ( get_option( 'issuem_api_error_received' ) )
            $results .= '<div class="api_error"><p><a href="http://issuem.com/" target="_blank">' . __( 'Issue Management by ', 'issuem' ) . 'IssueM</a></div>';

        $post = $old_post;

    else :

        $results .= apply_filters( 'issuem_no_articles_found_shortcode_message', '<h1 class="issuem-entry-title no-articles-found">' . __( 'No articles Found', 'issuem' ) . '</h1>' );

    endif;

    $results .= '';

    wp_reset_postdata();

    return $results;

}

/**
 * Replaces variables with WordPress content
 *
 * @since 1.0.0
 *
 * @param int $id User ID
 */
function issuem_replacements_args_free_form( $string, $post ) {

    $issuem_settings = get_issuem_settings();

    if ( !empty( $issuem_settings['use_wp_taxonomies'] ) ) {

        $tags = 'post_tag';
        $cats = 'category';

    } else {

        $tags = 'issuem_issue_tags';
        $cats = 'issuem_issue_categories';

    }

    $string = str_ireplace( '%TITLE%', get_the_title(), $string );
    $string = str_ireplace( '%URL%', apply_filters( 'issuem_article_url', get_permalink( $post->ID ), $post->ID ), $string );

    if ( preg_match( '/%CATEGORY\[?(\d*)\]?%/i', $string, $matches ) ) {

        $post_cats = get_the_terms( $post->ID, $cats );
        $categories = '';

        if ( $post_cats && !is_wp_error( $post_cats ) ) :

            if ( !empty( $matches[1] ) )
                $max_cats = $matches[1];
            else
                $max_cats = 0;

            $cat_array = array();

            $count = 1;
            foreach ( $post_cats as $post_cat ) {

                $cat_array[] = $post_cat->name;

                if ( 0 != $max_cats && $max_cats <= $count )
                    break;

                $count++;

            }

            $categories = join( ", ", $cat_array );

        endif;

        $string = preg_replace( '/%CATEGORY\[?(\d*)\]?%/i', $categories, $string );

    }

    if ( preg_match( '/%TAG\[?(\d*)\]?%/i', $string, $matches ) ) {

        $post_tags = get_the_terms( $post->ID, $tags );
        $tag_string = '';

        if ( $post_tags && !is_wp_error( $post_tags ) ) :

            if ( !empty( $matches[1] ) )
                $max_tags = $matches[1];
            else
                $max_tags = 0;

            $cat_array = array();

            $count = 1;
            foreach ( $post_tags as $post_tag ) {

                $cat_array[] = $post_tag->name;

                if ( 0 != $max_tags && $max_tags <= $count )
                    break;

                $count++;

            }

            $tag_string = join( ", ", $cat_array );

        endif;

        $string = preg_replace( '/%TAG\[?(\d*)\]?%/i', $tag_string, $string );

    }

    if ( preg_match( '/%TEASER%/i', $string, $matches ) ) {

        if ( $teaser = get_post_meta( $post->ID, '_teaser_text', true ) )
            $string = preg_replace( '/%TEASER%/i', $teaser, $string );
        else
            $string = preg_replace( '/%TEASER%/i', '%EXCERPT%', $string );	// If no Teaser Text exists, try to get an excerpt

    }

    if ( preg_match( '/%EXCERPT\[?(\d*)\]?%/i', $string, $matches ) ) {

        if ( empty( $post->post_excerpt ) )
            $excerpt = get_the_content();
        else
            $excerpt = $post->post_excerpt;

        $excerpt = strip_shortcodes( $excerpt );
        $excerpt = apply_filters( 'the_content', $excerpt );
        $excerpt = str_replace( ']]>', ']]&gt;', $excerpt );

        if ( !empty( $matches[1] ) )
            $excerpt_length = $matches[1];
        else
            $excerpt_length = apply_filters('excerpt_length', 55);

        $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
        $excerpt = wp_trim_words( $excerpt, $excerpt_length, $excerpt_more );

        $string = preg_replace( '/%EXCERPT\[?(\d*)\]?%/i', $excerpt, $string );

    }

    if ( preg_match( '/%CONTENT%/i', $string, $matches ) ) {

        $content = get_the_content();
        $content = apply_filters( 'the_content', $content );
        $content = str_replace( ']]>', ']]&gt;', $content );
        $string = preg_replace( '/%CONTENT%/i', $content, $string );

    }

    if ( preg_match( '/%FEATURE_IMAGE%/i', $string, $matches ) ) {

        $image = get_the_post_thumbnail( $post->ID );
        $string = preg_replace( '/%FEATURE_IMAGE%/i', $image, $string );

    }

    if ( preg_match( '/%ISSUEM_FEATURE_THUMB%/i', $string, $matches ) ) {

        $image = get_the_post_thumbnail( $post->ID, 'issuem-featured-thumb-image' );
        $string = preg_replace( '/%ISSUEM_FEATURE_THUMB%/i', $image, $string );

    }

    if ( preg_match( '/%BYLINE%/i', $string, $matches ) ) {

        $author_name = get_issuem_author_name( $post );

        $byline = sprintf( __( '%s', 'issuem' ), apply_filters( 'issuem_author_name', $author_name, $post->ID ) );

        $string = preg_replace( '/%BYLINE%/i', $byline, $string );

    }

    if ( preg_match( '/%DATE%/i', $string, $matches ) ) {

        $post_date = get_the_date( '', $post->ID );
        $string = preg_replace( '/%DATE%/i', $post_date, $string );

    }

    $string = apply_filters( 'issuem_custom_replacement_args', $string, $post );

    return stripcslashes( $string );

}


/**
 * Outputs Issue Archives HTML from shortcode call
 *
 * @since 1.0.0
 *
 * @param array $atts Arguments passed through shortcode
 * @return string HTML output of Issue Archives
 */
function do_issuem_archives_list( $atts ) {

    $issuem_settings = get_issuem_settings();

    $defaults = array(
        'orderby' 		=> 'issue_order',
        'order'			=> 'DESC',
        'limit'			=> 0,
        'pdf_title'		=> $issuem_settings['pdf_title'],
        'default_image'	=> $issuem_settings['default_issue_image'],
        'args'			=> array( 'hide_empty' => 0 ),
    );
    extract( shortcode_atts( $defaults, $atts ) );

    if ( is_string( $args ) ) {
        $args = str_replace( '&amp;', '&', $args );
        $args = str_replace( '&#038;', '&', $args );
    }

    $args = apply_filters( 'do_issuem_archives_get_terms_args', $args );
    $issuem_issues = get_terms( 'issuem_issue', $args );
    $archives = array();
    $archives_no_issue_order = array();

    foreach ( $issuem_issues as $issue ) {

        $issue_meta = get_option( 'issuem_issue_' . $issue->term_id . '_meta' );

        // If issue is not a Draft, add it to the archive array;
        if ( !empty( $issue_meta['issue_status'] ) && ( 'Draft' !== $issue_meta['issue_status'] || current_user_can( apply_filters( 'see_issuem_draft_issues', 'manage_issues' ) ) ) ) {

            switch( $orderby ) {

                case "issue_order":
                    if ( !empty( $issue_meta['issue_order'] ) )
                        $archives[ $issue_meta['issue_order'] ] = array( $issue, $issue_meta );
                    else
                        $archives_no_issue_order[] = array( $issue, $issue_meta );
                    break;

                case "name":
                    $archives[ $issue_meta['name'] ] = array( $issue, $issue_meta );
                    break;

                case "term_id":
                    $archives[ $issue->term_id ] = array( $issue, $issue_meta );
                    break;

            }

        }

    }

    if ( 'issue_order' == $orderby && !empty( $archives_no_issue_order ) )
        $archives = array_merge( $archives_no_issue_order, $archives );

    if ( "DESC" == $order )
        krsort( $archives );
    else
        ksort( $archives );

    $archive_count = count( $archives ) - 1; //we want zero based

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    if ( !empty( $limit ) ) {
        $offset = ( $paged - 1 ) * $limit;
        $archives = array_slice( $archives, $offset, $limit );
    }

    return $archives;

}

// custom menu example @ https://digwp.com/2011/11/html-formatting-custom-menus/
function clean_custom_menus($m, $current_url) {
    $menu_name = $m; // specify custom menu slug

    if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
        $menu = wp_get_nav_menu_object($locations[$menu_name]);

        $menu_items = wp_get_nav_menu_items($menu->term_id);

        $menu_list .= "\t\t\t\t". '<ul class="nav">' ."\n";
        foreach ((array) $menu_items as $key => $menu_item) {
            $title = $menu_item->title;
            $url = $menu_item->url;

            $classes = 'icon-'.transliterateString( $menu_item->title).' wrapper-icon';

            if($url == $current_url) {
                $classes .= ' wrapper-icon-selected';
            }

            $menu_list .= "\t\t\t\t\t". '<li><a href="'. $url .'"><span  class="'.$classes.'"></span>'. $title .'</a></li>' ."\n";
        }
        $menu_list .= "\t\t\t\t". '</ul>' ."\n";
    } else {
        // $menu_list = '<!-- no list defined -->';
    }


    echo $menu_list;
}






?>

