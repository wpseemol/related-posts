<?php
namespace Related_Posts;

if (!defined("ABSPATH")) {
    return;
}

class Admin_Menu
{
    public function __construct()
    {
        add_action("admin_menu", array($this, "admin_menu_callback"));

        add_action("admin_init", array($this, "register_settings_callback"));
    }

    public function admin_menu_callback()
    {
        add_menu_page(
            "Related Posts",
            "Related Posts",
            "manage_options",
            "wp-related-posts",
            array($this, "admin_menu_content_callback"),
            'data:image/svg+xml;base64,' . base64_encode('<svg fill="#9ca2a7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M264.5 5.2c14.9-6.9 32.1-6.9 47 0l218.6 101c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 149.8C37.4 145.8 32 137.3 32 128s5.4-17.9 13.9-21.8L264.5 5.2zM476.9 209.6l53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 277.8C37.4 273.8 32 265.3 32 256s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0l152-70.2zm-152 198.2l152-70.2 53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 405.8C37.4 401.8 32 393.3 32 384s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0z"/></svg>'),
            6
        );

    }


    public function admin_menu_content_callback()
    {
        include RELATED_POSTS_PLUGIN_PATH . "includes/templates/admin_menu_contents.php";
    }


    public function register_settings_callback()
    {
        register_setting("related_posts_settings", "related_posts_options", array("sanitize_callback" => array($this, "sanitize_options_callback")));


        add_settings_section("related_posts_main_section", "Related Posts Settings", array($this, "add_settings_section_callback"), "wp-related-posts");

        add_settings_field("show_hidden_field", "Show/hidden Posts", array($this, "render_checkbox_field"), "wp-related-posts", 'related_posts_main_section');

        add_settings_field(
            'related_posts_title',
            'Related Posts Title',
            array($this, 'render_text_field'),
            'wp-related-posts',
            'related_posts_main_section'
        );

        add_settings_field("show_word", "Content Show Word", array($this, "render_show_word_field"), "wp-related-posts", 'related_posts_main_section');

        add_settings_field(
            'default_image',
            'Default Related Post Image',
            array($this, 'render_image_upload_field'),
            'wp-related-posts',
            'related_posts_main_section'
        );

    }


    public function add_settings_section_callback()
    {
        echo "<p>Configure the settings for Related Posts.</p>";
    }


    public function render_checkbox_field()
    {
        $options = get_option('related_posts_options', ['show_hidden' => 1, 'title' => 'Related Posts']);
        $checked = isset($options['show_hidden']) && $options['show_hidden'] ? 'checked' : '';
        echo '<input type="checkbox" name="related_posts_options[show_hidden]" ' . $checked . '>';
    }

    public function render_text_field()
    {
        $options = get_option('related_posts_options', ['show_hidden' => 1, 'title' => 'Related Posts']);
        $title = isset($options['title']) ? esc_attr($options['title']) : '';
        echo '<input type="text" name="related_posts_options[title]" value="' . $title . '" class="regular-text">';
    }

    public function render_show_word_field()
    {
        $options = get_option('related_posts_options', ['show_hidden' => 1, 'title' => 'Related Posts', "show_word" => 5]);
        $show_word_number = isset($options['show_word']) ? esc_attr($options['show_word']) : 0;
        echo '<input type="number" name="related_posts_options[show_word]" value="' . $show_word_number . '" class="regular-text">';
    }

    public function render_image_upload_field()
    {
        $options = get_option('related_posts_options', ['default_image' => '']);
        $default_image = isset($options['default_image']) ? esc_url($options['default_image']) : '';

        echo '<div>
            <input type="text" placeholder="Image url" id="default_image" name="related_posts_options[default_image]" value="' . $default_image . '" class="regular-text"
            <br><img src="' . $default_image . '" id="default_image_preview" style="max-width: 160px; margin-top: 10px; display:' . ($default_image ? 'block' : 'none') . ';">
          </div>';

    }


    public function sanitize_options_callback($input)
    {
        return [
            'show_hidden' => isset($input['show_hidden']) ? 1 : 0,
            'title' => sanitize_text_field($input['title']),
            'show_word' => sanitize_text_field($input['show_word']),
            'default_image' => esc_url_raw($input['default_image']),
        ];

    }





}