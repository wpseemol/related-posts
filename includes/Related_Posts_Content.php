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
            "orderby" => "date",
            "order" => "DESC"

        ));

        // $test = print_r($related_posts, true);

        if (empty($related_posts)) {
            return $content;
        }


        $content .= include(RELATED_POSTS_PLUGIN_PATH . "includes/templates/related_post_content.php");


        return $content;
    }


}