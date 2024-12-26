<?php

namespace Related_Posts;

if (!defined("ABSPATH")) {
    return;
}


class Wp_Enqueue_Style
{
    public function __construct()
    {

        add_action("wp_enqueue_scripts", array($this, "wp_enqueue_scripts_callback"));



    }



    public function wp_enqueue_scripts_callback()
    {
        if (is_single()) {
            wp_enqueue_style("related-post-custom-style", RELATED_POSTS_PLUGIN_URL . "assets/css/related-posts-style.css", array(), filemtime(RELATED_POSTS_PLUGIN_PATH . "assets/css/related-posts-style.css"), "all");


        }
    }

}