<?php
/**
* Template Name: User Dashboard
*
*/

?>

<div class="page">
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php 
                    if (is_user_logged_in()) {
                        $current_user = wp_get_current_user();
                        $args = array(
                            'post_type' => 'flowers', // Replace with your custom post type
                            'author' => $current_user->ID, // Only show posts by the current user
                            'posts_per_page' => -1, // Show all posts
                        );
                    
                        $user_posts = new WP_Query($args);
                    
                        if ($user_posts->have_posts()) {
                            while ($user_posts->have_posts()) {
                                $user_posts->the_post();
                                ?>
                                <div class="user-post">
                                    <p><?php the_title(); ?></p>
                                    <a href="<?php echo esc_url(add_query_arg('edit_post', get_the_ID(), get_permalink())); ?>">Edit</a>
                                </div>
                                <?php
                            }
                            wp_reset_postdata();
                        } else {
                            echo '<p>No posts found.</p>';
                        }
                    } else {
                        echo '<p>Please <a href="' . wp_login_url(get_permalink()) . '">log in</a> to view your posts.</p>';
                    }
                    ?>
                    
                </div>
            </div>
        </div>
    </section>
</div>
<?php get_footer();


