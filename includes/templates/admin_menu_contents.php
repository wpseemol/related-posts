<div class="wrap">
    <h1>
        Related Posts
    </h1>

    <form method="post" action="options.php">

        <?php
        // Output security fields for the registered setting
        settings_fields('related_posts_settings');


        // Output setting fields (inputs, etc.)
        do_settings_sections('wp-related-posts');

        // Save button
        submit_button();
        ?>



    </form>


</div>