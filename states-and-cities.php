function enqueue_admin_custom_script($hook)
{
    // Ensure this script is only loaded on the order create and edit pages
    if ('post-new.php' != $hook && 'post.php' != $hook) {
        return;
    }

    if ('shop_order' != get_post_type()) {
        return;
    }

    wp_enqueue_style('select2-css', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css');
    wp_enqueue_script('select2-js', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js', array('jquery'), '4.0.13', true);

    wp_enqueue_script('admin-custom-script', plugins_url('/js/admin-custom-script.js', __FILE__), array('jquery', 'select2-js'), '1.0', true);

    // Pass the cities to the script
    wp_localize_script('admin-custom-script', 'citiesData', techiepress_my_cities([]));
}
add_action('admin_enqueue_scripts', 'enqueue_admin_custom_script');
