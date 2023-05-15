<?php

/*
 * Plugin Name:       My Custom Plugin
 * Description:       Plugin Creation from scratch
 * Version:           1.0.0 
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Nozipho 
 */

 function count_post_visits() {
    if( is_single() ) {
        global $post;
        $views = get_post_meta( $post->ID, 'my_post_viewed', true );
        if( $views == '' ) {
            update_post_meta( $post->ID, 'my_post_viewed', '1' );   
        } else {
            $views_no = intval( $views );
            update_post_meta( $post->ID, 'my_post_viewed', ++$views_no );
        }
    }
}
add_action( 'wp_head', 'count_post_visits' );