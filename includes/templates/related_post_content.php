<section class="related-post-container">
    <h2><?php

    $title = isset($options["title"]) ? $options["title"] : "Default Value";

    echo $title ?></h2>



    <div class="related-post-card-container">
        <?php foreach ($related_posts as $post): ?>
            <div class="related-post-card">
                <figure>
                    <?php
                    $thumbnail_url = "";
                    if (has_post_thumbnail($post->ID)) {

                        $thumbnail_url = get_the_post_thumbnail_url($post->ID, "thumbnail");
                    } else {
                        $thumbnail_url = isset($options["default_image"]) ? $options["default_image"] : "Please upload image";
                    }
                    echo "<img src='$thumbnail_url' alt=' $post->post_title;' class='related-posts-image' />";
                    ?>
                </figure>

                <h3>
                    <?php

                    echo $post->post_title; ?>
                </h3>
                <p>
                    <?php

                    $show_word = isset($options["show_word"]) ? intval($options["show_word"]) : 0;

                    if ($show_word > 0) {

                        $word_array = explode(" ", $post->post_content);

                        if (count($word_array) > $show_word) {

                            echo implode(" ", array_slice($word_array, 0, $show_word)) . "...";
                        } else {

                            echo $post->post_content;
                        }
                    } else {

                        echo $post->post_content;
                    }



                    ?>
                </p>
                <p>
                    <?php echo wp_date("d F, Y", strtotime($post->post_date)); ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
</section>