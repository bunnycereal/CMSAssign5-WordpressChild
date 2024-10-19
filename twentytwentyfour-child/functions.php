<style>
  <?php include "style.css" ?>
</style>
<?php

require_once get_stylesheet_directory() . '/style.css';
function mychildtheme_enqueue_styles() {
    $parent_style = 'parent-style';
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}

function footermessage(){
    echo '
    <div class="dottedline"></div>
    <div class="footer-message">
    <p>Saskatchewan Polytechnic serves students through applied learning opportunities on
    Treaty 4 and Treaty 6 Territories and the homeland of the Metis</p>
    </div>';

}

// Hook to wp_enqueue_scripts for enqueuing styles
add_action( 'wp_enqueue_scripts', 'mychildtheme_enqueue_styles' );

// Hook footermessage to wp_footer to ensure it runs at the bottom of the page
add_action( 'wp_footer', 'footermessage' );

//Initialize custom blocks
function register_custom_blocks() {
    register_block_type('twentytwentyfour-child/event-date', array(
        'title' => __('Event Date', 'twentytwentyfour-child'),
        'description' => __('A block for displaying the event date.', 'twentytwentyfour-child'),
        'category' => 'common',
        'icon' => 'calendar',
        'supports' => array(
            'html' => false,
            'align' => true,
        ),
    ));

    register_block_type('twentytwentyfour-child/event-time', array(
        'title' => __('Event Time', 'twentytwentyfour-child'),
        'description' => __('A block for displaying the event time.', 'twentytwentyfour-child'),
        'category' => 'common',
        'icon' => 'clock',
        'supports' => array(
            'html' => false,
            'align' => true,
        ),
    ));

    register_block_type('twentytwentyfour-child/event-location', array(
        'title' => __('Event Location', 'twentytwentyfour-child'),
        'description' => __('A block for displaying the event location.', 'twentytwentyfour-child'),
        'category' => 'common',
        'icon' => 'location',
        'supports' => array(
            'html' => false,
            'align' => true,
        ),
    ));

    register_block_type('twentytwentyfour-child/event-room', array(
        'title' => __('Event Room', 'twentytwentyfour-child'),
        'description' => __('A block for displaying the event room.', 'twentytwentyfour-child'),
        'category' => 'common',
        'icon' => 'building',
        'supports' => array(
            'html' => false,
            'align' => true,
        ),
    ));
}
add_action('init', 'register_custom_blocks');
?>

