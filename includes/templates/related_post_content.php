<section class="related-post-container">
    <h2>related post</h2>
    <div class="related-post-card-container">
        <?php foreach ($related_posts as $post): ?>
            <div class="related-post-card-container">
                <h3>
                    <?php

                    echo $post->post_title; ?>
                </h3>
                <p>
                    <?php echo $post->post_content; ?>
                </p>
                <p>
                    <?php echo $post->post_date; ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
</section>