<?php

include "issuem_hacks.php";

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
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri() .'/favicon.ico'?>" >
<?php }


function asyle_theme_setup() {
    add_theme_support('menus');

    register_nav_menu('primary', 'This is the primary header menu of the magazine');
}

add_action('wp_head', 'my_favicon');
add_action('wp_enqueue_scripts', 'asyle_script_enqueue');
add_action('after_setup_theme', 'asyle_theme_setup');




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


function get_authors_list($prole, $classul, $actual) {
    $display_admins = true;
    $order_by = 'display_name'; // 'nicename', 'email', 'url', 'registered', 'display_name', or 'post_count'
    $role = $prole || ""; // 'subscriber', 'contributor', 'editor', 'author' - leave blank for 'all'
    $avatar_size = 64;
    $hide_empty = false; // hides authors with zero posts

    if(!empty($display_admins)) {
        $blogusers = get_users('orderby='.$order_by.'&role='.$role);
    } else {
        $admins = get_users('role=administrator');
        $exclude = array();
        foreach($admins as $ad) {
            $exclude[] = $ad->ID;
        }
        $exclude = implode(',', $exclude);
        $blogusers = get_users('exclude='.$exclude.'&orderby='.$order_by.'&role='.$role);
    }
    $authors = array();
    foreach ($blogusers as $bloguser) {
        $user = get_userdata($bloguser->ID);
        if(!empty($hide_empty)) {
            $numposts = count_user_posts($user->ID);
            if($numposts < 1) continue;
        }
        $authors[] = (array) $user;
    }

    echo '<ul class="'.$classul.'">';
    foreach($authors as $author) {

        $display_name = $author["data"]->display_name;
//        $description = $author['description'];
//        $avatar = get_avatar($author['ID'], $avatar_size);
        $author_profile_url = get_author_posts_url($author['ID']);


        //echo '<li><h3>'.$display_name.'</h3><a href="', $author_profile_url, '">', $avatar , '</a><p>'.$description.'</p><p><a href="', $author_profile_url, '" class="contributor-link">➤ Posts by '.$display_name.'</a></p></li>';

        $class = "";
        if($actual === $display_name) { $class = "active"; }

        echo '<li><a class="'. $class .'" href="', $author_profile_url, '">'.$display_name.'</a></li>';
    }
    echo '</ul>';
}


function get_authors_stamps($prole, $classul, $actual) {
    $display_admins = true;
    $order_by = 'display_name'; // 'nicename', 'email', 'url', 'registered', 'display_name', or 'post_count'
    $role = $prole || ""; // 'subscriber', 'contributor', 'editor', 'author' - leave blank for 'all'
    $avatar_size = 115;
    $hide_empty = false; // hides authors with zero posts

    if(!empty($display_admins)) {
        $blogusers = get_users('orderby='.$order_by.'&role='.$role);
    } else {
        $admins = get_users('role=administrator');
        $exclude = array();
        foreach($admins as $ad) {
            $exclude[] = $ad->ID;
        }
        $exclude = implode(',', $exclude);
        $blogusers = get_users('exclude='.$exclude.'&orderby='.$order_by.'&role='.$role);
    }
    $authors = array();
    foreach ($blogusers as $bloguser) {
        $user = get_userdata($bloguser->ID);
        if(!empty($hide_empty)) {
            $numposts = count_user_posts($user->ID);
            if($numposts < 1) continue;
        }
        $authors[] = (array) $user;
    }

    echo '<ul class="'.$classul.'">';
    foreach($authors as $author) {

        $display_name = $author["data"]->display_name;
//        $description = $author['description'];
        $avatar = get_avatar($author['ID'], $avatar_size);
        $author_profile_url = get_author_posts_url($author['ID']);


        //echo '<li><h3>'.$display_name.'</h3><a href="', $author_profile_url, '">', $avatar , '</a><p>'.$description.'</p><p><a href="', $author_profile_url, '" class="contributor-link">➤ Posts by '.$display_name.'</a></p></li>';

        $class = "";
        if($actual === $display_name) { $class = "active"; }

        echo "<li>";
        echo '        <div class="stamp small"><a href="'.$author_profile_url.'"';

        echo '                            <span class="icon-revistas">';
        echo '                                <span class="content">';
        echo $avatar;
        echo '                                </span>';
        echo '                            </span>';
        echo '</a>        </div>';
        echo '<span class="name">'.$display_name.'</span>';
        echo '</li>';
    }
    echo '</ul>';
}



function getListOfArticlesByAuthor($id,$className) {
    $args = array(
        'author'        =>  $id, // I could also use $user_ID, right?
        'orderby'       =>  'post_date',
        'order'         =>  'ASC',
        'post_type' => 'article'
    );

    // get his posts 'ASC'
    $current_user_posts = get_posts( $args );


    if(sizeof($current_user_posts)) {

        echo "<ul class='".$className."'>";
        foreach ( $current_user_posts as $post ) {
            echo "<li><a href='" . get_permalink($post->ID). "'</a>".$post->post_title ."</li>";
        }
        echo "</ul>";
    }

}


function template_chooser($template)
{
    global $wp_query;
    $post_type = get_query_var('post_type');
    if( $wp_query->is_search && $post_type == 'article' )
    {
        return locate_template('search-article.php');  //  redirect to archive-search.php
    }
    return $template;
}
add_filter('template_include', 'template_chooser');


/**
 * Search SQL filter for matching against post title only.
 *
 * @link    http://wordpress.stackexchange.com/a/11826/1685
 *
 * @param   string      $search
 * @param   WP_Query    $wp_query
 */
function wpse_11826_search_by_title( $search, $wp_query ) {
    if ( ! empty( $search ) && ! empty( $wp_query->query_vars['search_terms'] ) ) {
        global $wpdb;

        $q = $wp_query->query_vars;
        $n = ! empty( $q['exact'] ) ? '' : '%';

        $search = array();

        foreach ( ( array ) $q['search_terms'] as $term ) {
            if($term != "all") {
                $search[] = $wpdb->prepare( "$wpdb->posts.post_title LIKE %s", $wpdb->esc_like( $term ) . $n );
            } else {
                return "";
            }
        }


        if ( ! is_user_logged_in() )
            $search[] = "$wpdb->posts.post_password = ''";

        $search = ' AND ' . implode( ' AND ', $search );
    }



    return $search;
}

add_filter( 'posts_search', 'wpse_11826_search_by_title', 10, 2 );

add_filter('posts_orderby','my_sort_custom',10,2);
function my_sort_custom( $orderby, $query ){
    global $wpdb;

    if(!is_admin() && is_search())
        $orderby =  $wpdb->prefix."posts.post_title ASC";

    return  $orderby;
}


function get_search_letters() {

    $queryString = "ABCDEFGHIJKLMN'OPQRSTUVWXYZ";

    echo '<ul class="pagination text">';

    echo  '<li><a href="'.get_site_url().'?s=all&post_type=article">Todos</a></li>';

    for($i=0;$i<=strlen($queryString)-1;$i++) {

        $letter = substr($queryString, $i, 1);

        if($letter == "'") {
            $letter = "Ñ";
        }
        echo  '<li><a href="'.get_site_url().'?s='.$letter.'&post_type=article">'.$letter.'</a></li>';

    }

    echo '</ul>';


}