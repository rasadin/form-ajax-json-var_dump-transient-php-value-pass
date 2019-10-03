/**
 * Enqueue scripts and styles.
 */
function webalive_scripts()
{
    // Add custom fonts, used in the main stylesheet.
    wp_enqueue_style('webalive-fonts', webalive_fonts_url(), array(), null);


    if (has_nav_menu('top')) {
        $webalive_l10n['expand'] = __('Expand child menu', 'webalive');
        $webalive_l10n['collapse'] = __('Collapse child menu', 'webalive');
        $webalive_l10n['icon'] = twentyseventeen_get_svg(array('icon' => 'angle-down', 'fallback' => true));
    }

    wp_enqueue_script('webalive-global', get_theme_file_uri('/assets/js/global.js'), array('jquery'), '1.0', true);

    wp_enqueue_script('jquery-scrollto', get_theme_file_uri('/assets/js/jquery.scrollTo.js'), array('jquery'), '2.1.2', true);

    wp_localize_script('webalive-global', 'webaliveScreenReaderText', $webalive_l10n);
    //  wp_enqueue_script('webalive-navigation', get_theme_file_uri('/assets/js/navigation.js'), array('jquery'), '1.0', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    //BOOTSTRAP
    wp_enqueue_style('bootstrap.min', get_template_directory_uri() . '/assets/additional-lib/bootstrap/3.3.6/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_script('bootstrap.min', get_template_directory_uri() . '/assets/additional-lib/bootstrap/3.3.6/js/bootstrap.min.js', array('jquery'), '', true);

    //animate On Scroll
    wp_enqueue_script('aos', get_template_directory_uri() . '/assets/js/aos.js', array('jquery'), '', true);
    wp_enqueue_style('aos', get_template_directory_uri() . '/assets/css/aos.css', array(), false, 'all');

    //BXSLIDER
    wp_enqueue_style('jquery.fancybox.min', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css', array(), false, 'all');
    wp_enqueue_script('jquery.fancybox.min', get_template_directory_uri() . '/assets/js/jquery.fancybox.min.js', array('jquery'), '', true);
    wp_enqueue_script('iframeResizer.min', get_template_directory_uri() . '/assets/js/iframeResizer.min.js', array('jquery'), '', true);
//    wp_enqueue_script('iframeResizer.contentWindow.min', get_template_directory_uri() . '/assets/js/iframeResizer.contentWindow.min.js', array('jquery'), '', true);
    wp_enqueue_style('bxslider.css', get_template_directory_uri() . '/assets/additional-lib/jquery.bxslider/jquery.bxslider.css', array(), false, 'all');
    wp_enqueue_script('bxslider.min', get_template_directory_uri() . '/assets/additional-lib/jquery.bxslider/jquery.bxslider.min.js', array('jquery'), '', true);

    wp_enqueue_script('jquery.cookie', get_template_directory_uri() . '/assets/js/jquery.cookie.js', array('jquery'), '', true);
    wp_enqueue_script('math.min', get_template_directory_uri() . '/assets/js/math.min.js', array('jquery'), '', true);
    wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery', 'jquery.cookie', 'jquery.fancybox.min', 'math.min'), '20190423001', true);
    // Theme stylesheet.
    wp_enqueue_style('webalive-style', get_stylesheet_uri());
    wp_enqueue_style('custom-css', get_template_directory_uri() . '/assets/css/custom.css', array(), false, 'all');
    wp_enqueue_style('responsive-css', get_template_directory_uri() . '/assets/css/responsive.css', array(), false, 'all');

    $options = array(
        'admin_url'         => admin_url(''),
        'ajax_url'          => admin_url('admin-ajax.php'),
        'ajax_nonce'        => wp_create_nonce('ah3jhlk(765%^&ksk!@45'),
    );
    wp_localize_script('webalive-global', 'public_localizer', $options);
}

add_action('wp_enqueue_scripts', 'webalive_scripts');
















function my_user_ajax() {
    if( isset($_POST['fields']) ) {
        parse_str($_POST['fields'], $fields);
        set_transient('organiser_sign_up', $fields);
        wp_die();
    }
}
add_action("wp_ajax_my_user_ajax", "my_user_ajax");
add_action("wp_ajax_nopriv_my_user_ajax", "my_user_ajax");  
