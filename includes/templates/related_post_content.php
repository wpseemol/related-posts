<section class="related-post-container">
    <h2><?php echo $options["title"] ?></h2>



    <div class="related-post-card-container">
        <?php foreach ($related_posts as $post): ?>
            <div class="related-post-card">

                <!-- <pre>
                
                </pre> -->

                <figure>
                    <?php
                    $thumbnail_url = "";
                    if (has_post_thumbnail($post->ID)) {

                        $thumbnail_url = get_the_post_thumbnail($post);
                    } else {
                        $thumbnail_url = "";
                    }

                    echo ($thumbnail_url);


                    ?>
                </figure>

                <h3>
                    <?php

                    echo $post->post_title; ?>
                </h3>
                <p>
                    <?php
                    // echo $post->post_content; 
                    ?>
                </p>
                <p>
                    <?php echo $post->post_date; ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
</section>