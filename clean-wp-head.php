<?php

add_action( 'after_setup_theme', 'nxt_clean_wp_head' );
function nxt_clean_wp_head() {
    remove_action( 'wp_print_styles', 'print_emoji_styles');
    remove_action( 'wp_head', 'print_emoji_detection_script', 7);
    remove_action( 'wp_head', 'rsd_link');
    remove_action( 'wp_head', 'wlwmanifest_link');
    remove_action( 'wp_head', 'wp_shortlink_wp_head');
    remove_action( 'wp_head', 'wp_generator');

    // Disable REST API link tag
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10);

    // Disable oEmbed Discovery Links
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10);

    // Disable REST API link in HTTP headers
    remove_action( 'template_redirect', 'rest_output_link_header', 11, 0);

    add_filter( 'emoji_svg_url', '__return_false' );

    add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
    function wps_deregister_styles() {
        wp_dequeue_style( 'wp-block-library' );
    }
}

?>