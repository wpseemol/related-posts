<?php


namespace Related_Posts;

if (!defined("ABSPATH")) {
    return;
}


class Related_Posts_Content
{


    public function __construct()
    {


        add_filter("the_content", array($this, "the_content_callback"));
    }


    public function the_content_callback($content)
    {

        if (!is_single()) {
            return $content;
        }


        $options = get_option("related_posts_options", array('show_hidden' => 1, 'title' => 'Related Posts', "show_word" => 10, "default_image" => "https://i.ibb.co.com/2Ww6SnG/deffault-image.jpg"));


        if (empty($options['show_hidden'])) {
            return $content;
        }


        global $post;

        // $post_id = get_the_ID();
        $post_id = $post->ID;

        $categories = get_the_category($post_id);
        $category_ids = array_map(function ($category) {
            return $category->term_id;
        }, $categories);

        $related_posts = get_posts(array(
            "post_type" => "post",
            "post_per_page" => 5,
            "category__in" => $category_ids,
            "post__not_in" => array($post_id),
            "orderby" => "rand",

        ));

        // $test = print_r($related_posts, true);

        if (empty($related_posts)) {
            return $content;
        }



        ob_start();

        include(RELATED_POSTS_PLUGIN_PATH . "includes/templates/related_post_content.php");
        $related_content = ob_get_clean();

        $content .= $related_content;

        return $content;
    }
}
