<?php

/*
 * Plugin Name:       Related Posts
 * Plugin URI:        #
 * Description:       Show Related Post in single post page.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Seemol chakroborti
 * Author URI:        https://github.com/wpseemol
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       related-posts
 * Domain Path:       /languages
 */


if (!defined("ABSPATH")) {
    return;
}

class Related_Posts_Main
{

    private static $instance = null;

    private function __construct()
    {

        // all constant function call here
        $this->define_constants();

        // call all file loaded function
        $this->load_class();

    }

    public static function get_instance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    private function define_constants()
    {
        define("RELATED_POSTS_PLUGIN_PATH", plugin_dir_path(__FILE__));
    }

    private function load_class()
    {
    }





}

Related_Posts_Main::get_instance();