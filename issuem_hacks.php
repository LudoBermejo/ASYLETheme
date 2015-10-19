<?php
/**
 * Created by PhpStorm.
 * User: ludo
 * Date: 11/08/15
 * Time: 11:39
 */

/* IssueM */


function get_issuem_issue_link($id = false ) {

    if ( !$id ) {
        $issue = get_term_by( 'id', get_newest_issuem_issue_id(), 'issuem_issue' );

    } else {
        $issue = get_term_by( 'id', $id, 'issuem_issue' );
    }


    $issue_url = get_term_link( $issue, 'issuem_issue' );
    return $issue_url;


}

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


function get_issuem_articles_free_form( $atts, $article_format = NULL, $issue = "" ) {

    if(!($issue)) {
        $issue = get_active_issuem_issue();
    }
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
        'issue'					=> $issue,
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

            echo "Categorías";
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

        var_dump($articles);

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

    $result = "";

    return $archives;

}


function getStampsPastIssues() {

    $archives = do_issuem_archives_list("");

    $result = "";
    foreach ( $archives as $archive => $issue_array ) {

        if ( 0 == $issuem_settings['page_for_articles'] )
            $article_page = get_bloginfo( 'wpurl' ) . '/' . apply_filters( 'issuem_page_for_articles', 'article/' );
        else
            $article_page = get_page_link( $issuem_settings['page_for_articles'] );

        $issue_url = get_term_link( $issue_array[0], 'issuem_issue' );
        if ( !empty( $issuem_settings['use_issue_tax_links'] ) || is_wp_error( $issue_url ) ) {
            $issue_url = add_query_arg( 'issue', $issue_array[0]->slug, $article_page );
        }

        if ( !empty( $issue_array[1]['pdf_version'] ) || !empty( $issue_meta['external_pdf_link'] ) ) {

            $pdf_url = empty( $issue_meta['external_pdf_link'] ) ? apply_filters( 'issuem_pdf_attachment_url', wp_get_attachment_url( $issue_array[1]['pdf_version'] ), $issue_array[1]['pdf_version'] ) : $issue_meta['external_pdf_link'];

            $pdf_line = '<a href="' . $pdf_url . '" target="' . $issuem_settings['pdf_open_target'] . '">';

            if ( 'PDF Archive' == $issue_array[1]['issue_status'] ) {

                $issue_url = $pdf_url;
                $pdf_line .= empty( $pdf_only_title ) ? $issuem_settings['pdf_only_title'] : $pdf_only_title;

            } else {

                $pdf_line .= empty( $pdf_title ) ? $issuem_settings['pdf_title'] : $pdf_title;

            }

            $pdf_line .= '</a>';

        } else {

            $pdf_line = apply_filters( 'issuem_pdf_version', '&nbsp;', $pdf_title, $issue_array[0] );

        }

        if ( !empty( $issue_meta['external_link'] ) )
            $issue_url = apply_filters( 'archive_issue_url_external_link', $issue_meta['external_link'], $issue_url );


        $issue_meta = get_option( 'issuem_issue_' . $issue_array[0]->term_id . '_meta' );
        if ( 'Draft' !== $issue_meta['issue_status'] && isset($issue_meta["issue_order"])) {
            if($issue_array[0]->name !== get_issuem_issue_title() ) {

                $result .= '<div class="stamp small"><a href="'.$issue_url.'">';
                $result .= '<span class="icon-frame">';
                $result .= '<span class="content">#';
                $result .= $issue_meta["issue_order"];
                $result .= '</span">';
                $result .= '</span">'.'</a>';
                $result .= '</div">';
            }
        }
    }

    return $result;

}


function getStampsAllIssues() {

    $archives = do_issuem_archives_list("");

    $result = "";
    foreach ( $archives as $archive => $issue_array ) {

        if ( 0 == $issuem_settings['page_for_articles'] )
            $article_page = get_bloginfo( 'wpurl' ) . '/' . apply_filters( 'issuem_page_for_articles', 'article/' );
        else
            $article_page = get_page_link( $issuem_settings['page_for_articles'] );

        $issue_url = get_term_link( $issue_array[0], 'issuem_issue' );
        if ( !empty( $issuem_settings['use_issue_tax_links'] ) || is_wp_error( $issue_url ) ) {
            $issue_url = add_query_arg( 'issue', $issue_array[0]->slug, $article_page );
        }

        if ( !empty( $issue_array[1]['pdf_version'] ) || !empty( $issue_meta['external_pdf_link'] ) ) {

            $pdf_url = empty( $issue_meta['external_pdf_link'] ) ? apply_filters( 'issuem_pdf_attachment_url', wp_get_attachment_url( $issue_array[1]['pdf_version'] ), $issue_array[1]['pdf_version'] ) : $issue_meta['external_pdf_link'];

            $pdf_line = '<a href="' . $pdf_url . '" target="' . $issuem_settings['pdf_open_target'] . '">';

            if ( 'PDF Archive' == $issue_array[1]['issue_status'] ) {

                $issue_url = $pdf_url;
                $pdf_line .= empty( $pdf_only_title ) ? $issuem_settings['pdf_only_title'] : $pdf_only_title;

            } else {

                $pdf_line .= empty( $pdf_title ) ? $issuem_settings['pdf_title'] : $pdf_title;

            }

            $pdf_line .= '</a>';

        } else {

            $pdf_line = apply_filters( 'issuem_pdf_version', '&nbsp;', $pdf_title, $issue_array[0] );

        }

        if ( !empty( $issue_meta['external_link'] ) )
            $issue_url = apply_filters( 'archive_issue_url_external_link', $issue_meta['external_link'], $issue_url );



        $issue_meta = get_option( 'issuem_issue_' . $issue_array[0]->term_id . '_meta' );
        if ( 'Draft' !== $issue_meta['issue_status'] && isset($issue_meta["issue_order"])) {


                $result .= '<div class="stamp big"><a href="'.$issue_url.'">';
                $result .= '<span class="icon-frame">';
                $result .= '<span class="content">#';
                $result .= $issue_meta["issue_order"];
                $result .= '</span">';
                $result .= '</span">'.'</a>';
                $result .= '</div>';

                $result .= '<div class="well">';
                    $result .= '<h2>';
                    $result .= $issue_array[0]->name;
                    $result .= '<small>';
                    $result .= 'Agosto 2015';
                    $result .= '</small>';
                    $result .= '</h2>';
                    $result .= '<blockquote>';
                    $result .= $issue_array[0]->description;
                    $result .= '</blockquote>';
                $result .= '</div>';

                $result .= '<ul class="sumary">';
                $line = '<li><a class="issuem_article_link" href="%URL%"><strong>%TITLE%</strong>%BYLINE%</a></li>';

                $result .= get_issuem_articles_free_form("", $line, $issue_array[0]->slug);
                $result .= '</ul>';

        }
    }

    return $result;

}


function getAllIssues() {

    $archives = do_issuem_archives_list("");

    $result = "";

    $result .= '<ul class="pagination number">';

    $count = 0;
    foreach ( $archives as $archive => $issue_array ) {

        $issue_url = get_term_link( $issue_array[0], 'issuem_issue' );
        if ( !empty( $issuem_settings['use_issue_tax_links'] ) || is_wp_error( $issue_url ) ) {
            $issue_url = add_query_arg( 'issue', $issue_array[0]->slug, $article_page );
        }

        if ( !empty( $issue_meta['external_link'] ) )
            $issue_url = apply_filters( 'archive_issue_url_external_link', $issue_meta['external_link'], $issue_url );


        $issue_meta = get_option( 'issuem_issue_' . $issue_array[0]->term_id . '_meta' );
        if ( 'Draft' !== $issue_meta['issue_status'] && isset($issue_meta["issue_order"])) {

                $result .= '<li><a href="'.$issue_url.'">'.$issue_array[0]->slug.'</a></li>';
        }
    }

    for($i=$count+1;$i<10;$i++) {
        $result .= '<li><span class="disabled">'.($i+1).'</span></li>';
    }

    $result .= '</ul>';
    return $result;

}

if ( !function_exists( 'issuem_magazine_article_meta' ) ) {

    function issuem_magazine_article_meta() {

        global $post;

        $author_name = get_the_author_meta( 'display_name' );

        $byline = sprintf( __( 'By %s | ', 'issuem' ), apply_filters( 'issuem_author_name', $author_name, $post->ID ) );

        echo $byline;

        $issues = get_the_terms( $post->ID, 'issuem_issue' );
        foreach( $issues as $issue ) {

            $issue_list[] = '<a href="' . add_query_arg( 'issue', $issue->slug, '/' ) . '">' . $issue->name . '</a>';

        }
        $article_issue = join( ' | ', $issue_list );
        echo $article_issue . ' | ';

        $issuem_settings = get_issuem_settings();
        if ( !empty( $issuem_settings['use_wp_taxonomies'] ) )
            $article_categories = get_the_term_list( $post->ID, 'category', '', ', ', ' | ' );
        else
            $article_categories = get_the_term_list( $post->ID, 'issuem_issue_categories', '', ', ', ' | ' );

        if ( '' != $article_categories )
            echo $article_categories;



    }

}

?>