<?php
/**
* Template Name: Edit post
*
*/

?>

<div class="page">
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php 
                    if (isset($_GET['edit_post'])) {
                        $post_id = intval($_GET['edit_post']);
                        $post = get_post($post_id);
                    
                        // Check if the current user is the author of the post
                        if ($post && $post->post_author == $current_user->ID) {
                            // Display the edit form
                            ?>
                            <form method="post" action="">
                                <label for="post_title">Title</label>
                                <input type="text" name="post_title" value="<?php echo esc_attr($post->post_title); ?>" required>
                    
                                <label for="post_content">Content</label>
                                <textarea name="post_content" required><?php echo esc_textarea($post->post_content); ?></textarea>
                    
                                <?php
                                // Render ACF fields
                                $acf_fields = get_field_objects($post_id);
                                if ($acf_fields) {
                                    foreach ($acf_fields as $field) {
                                        $field_value = $field['value'];
                                        ?>
                                        <label for="<?php echo esc_attr($field['name']); ?>"><?php echo esc_html($field['label']); ?></label>
                                        <?php
                                        acf_render_field_wrap($field);
                                    }
                                }
                                ?>
                    
                                <input type="hidden" name="post_id" value="<?php echo esc_attr($post_id); ?>">
                                <input type="submit" name="update_post" value="Update Post">
                            </form>
                            <?php
                        } else {
                            echo '<p>You do not have permission to edit this post.</p>';
                        }
                    }

                    // do the update with ACF

                    if (isset($_POST['update_post'])) {
                        $post_id = intval($_POST['post_id']);
                        $post_title = sanitize_text_field($_POST['post_title']);
                        $post_content = wp_kses_post($_POST['post_content']);
                    
                        // Update the post
                        $updated_post = array(
                            'ID' => $post_id,
                            'post_title' => $post_title,
                            'post_content' => $post_content,
                        );
                        wp_update_post($updated_post);
                    
                        // Update ACF fields
                        if ($acf_fields) {
                            foreach ($acf_fields as $field) {
                                $field_key = $field['key'];
                                $field_value = $_POST['acf'][$field_key]; // ACF stores fields in the 'acf' array
                                update_field($field_key, $field_value, $post_id);
                            }
                        }
                    
                        echo '<p>Post updated successfully!</p>';
                    }
                    ?>
                    
                </div>
            </div>
        </div>
    </section>
</div>
<?php get_footer();


