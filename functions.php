<?php
function tourism_office_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus([
        'primary' => __('Primary Menu', 'tourism-office')
    ]);
}
add_action('after_setup_theme', 'tourism_office_setup');

function tourism_office_scripts() {
    wp_enqueue_style('tourism-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'tourism_office_scripts');

function tourism_register_cpts() {
    register_post_type('activity', [
        'labels' => [
            'name' => __('Activities'),
            'singular_name' => __('Activity')
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'things-to-do'],
        'supports' => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true
    ]);

    register_post_type('accommodation', [
        'labels' => [
            'name' => __('Accommodations'),
            'singular_name' => __('Accommodation')
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'places-to-stay'],
        'supports' => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true
    ]);
}
add_action('init', 'tourism_register_cpts');


// Show admin notice if ACF is not active
add_action('admin_notices', function () {
    if (!function_exists('get_field')) {
        echo '<div class="notice notice-error"><p><strong>ACF Plugin Required:</strong> This theme requires the Advanced Custom Fields plugin to work properly. Please install and activate it.</p></div>';
    }
});

// Register Custom Post Types
function register_custom_post_types() {
    // Activities CPT
    register_post_type('activity', array(
        'labels' => array(
            'name' => 'Activities',
            'singular_name' => 'Activity',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-calendar-alt',
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'activities'),
    ));

    // Accommodations CPT
    register_post_type('accommodation', array(
        'labels' => array(
            'name' => 'Accommodations',
            'singular_name' => 'Accommodation',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-building',
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'accommodations'),
    ));
}
add_action('init', 'register_custom_post_types');

// Add ACF Options Page
if(function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Theme Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}

// Enqueue Styles
function enqueue_custom_styles() {
    wp_enqueue_style('home-styles', get_template_directory_uri() . '/assets/css/home.css', array(), '1.0.0');
    wp_enqueue_style('header-styles', get_template_directory_uri() . '/assets/css/header.css', array(), '1.0.0');
    wp_enqueue_style('activities-styles', get_template_directory_uri() . '/assets/css/activities.css', array(), '1.0.0');
    wp_enqueue_style('accommodations-styles', get_template_directory_uri() . '/assets/css/accommodations.css', array(), '1.0.0');
    wp_enqueue_style('footer-styles', get_template_directory_uri() . '/assets/css/footer.css', array(), '1.0.0');
    
    // Enqueue accommodations.js only on accommodation archive page
    if (is_post_type_archive('accommodation')) {
        wp_enqueue_script('accommodations-script', get_template_directory_uri() . '/assets/js/accommodations.js', array(), '1.0.0', true);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');

// Add image sizes
add_image_size('listing-thumbnail', 400, 300, true);

// Add theme support
function custom_theme_setup() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'custom_theme_setup');

// Add featured field to Activity CPT
function add_activity_fields() {
    acf_add_local_field_group(array(
        'key' => 'group_activity_details',
        'title' => 'Activity Details',
        'fields' => array(
            array(
                'key' => 'field_activity_category',
                'label' => 'Category',
                'name' => 'activity_category',
                'type' => 'select',
                'choices' => array(
                    'fishing' => 'Fishing Charters',
                    'tours' => 'Tours',
                    'restaurants' => 'Restaurants, Pubs & Shops'
                ),
                'required' => 1,
            ),
            array(
                'key' => 'field_featured_activity',
                'label' => 'Featured Activity',
                'name' => 'featured_activity',
                'type' => 'true_false',
                'ui' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'activity',
                ),
            ),
        ),
    ));
}
add_action('acf/init', 'add_activity_fields');

/**
 * Register Custom Post Type for Activities
 */
function register_activity_post_type() {
    $labels = array(
        'name'                  => 'Activities',
        'singular_name'         => 'Activity',
        'menu_name'            => 'Activities',
        'add_new'              => 'Add New',
        'add_new_item'         => 'Add New Activity',
        'edit_item'            => 'Edit Activity',
        'new_item'             => 'New Activity',
        'view_item'            => 'View Activity',
        'search_items'         => 'Search Activities',
        'not_found'            => 'No activities found',
        'not_found_in_trash'   => 'No activities found in Trash',
        'all_items'            => 'All Activities',
        'archives'             => 'Activity Archives',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-calendar',
        'hierarchical'        => false,
        'supports'            => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'custom-fields'
        ),
        'rewrite'            => array(
            'slug' => 'activities',
            'with_front' => true
        ),
        'capability_type'    => 'post',
    );

    register_post_type('activity', $args);
}
add_action('init', 'register_activity_post_type');

// Flush rewrite rules on theme activation
function activity_rewrite_flush() {
    register_activity_post_type();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'activity_rewrite_flush');

/**
 * Register Custom Post Type for Accommodations
 */
function register_accommodation_post_type() {
    $labels = array(
        'name'                  => 'Accommodations',
        'singular_name'         => 'Accommodation',
        'menu_name'            => 'Accommodations',
        'add_new'              => 'Add New',
        'add_new_item'         => 'Add New Accommodation',
        'edit_item'            => 'Edit Accommodation',
        'new_item'             => 'New Accommodation',
        'view_item'            => 'View Accommodation',
        'search_items'         => 'Search Accommodations',
        'not_found'            => 'No accommodations found',
        'not_found_in_trash'   => 'No accommodations found in Trash',
        'all_items'            => 'All Accommodations',
        'archives'             => 'Accommodation Archives',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-building',
        'hierarchical'        => false,
        'supports'            => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'custom-fields'
        ),
        'rewrite'            => array(
            'slug' => 'accommodations',
            'with_front' => true
        ),
        'capability_type'    => 'post',
    );

    register_post_type('accommodation', $args);
}
add_action('init', 'register_accommodation_post_type');

/**
 * Add ACF Fields for Accommodations
 */
function add_accommodation_fields() {
    acf_add_local_field_group(array(
        'key' => 'group_accommodation_details',
        'title' => 'Accommodation Details',
        'fields' => array(
            array(
                'key' => 'field_accommodation_category',
                'label' => 'Category',
                'name' => 'accommodation_category',
                'type' => 'select',
                'choices' => array(
                    'hotel' => 'Hotels',
                    'bb' => 'Bed & Breakfasts',
                    'resort' => 'Resorts',
                    'camping' => 'Camping & RV',
                    'vacation_rental' => 'Vacation Rentals'
                ),
                'required' => 1,
                'default_value' => 'hotel',
            ),
            array(
                'key' => 'field_accommodation_phone',
                'label' => 'Phone Number',
                'name' => 'accommodation_phone',
                'type' => 'text',
                'required' => 1,
                'placeholder' => '1-250-000-0000',
            ),
            array(
                'key' => 'field_accommodation_email',
                'label' => 'Email',
                'name' => 'accommodation_email',
                'type' => 'email',
                'required' => 0,
            ),
            array(
                'key' => 'field_accommodation_website',
                'label' => 'Website',
                'name' => 'accommodation_website',
                'type' => 'url',
                'required' => 0,
            ),
            array(
                'key' => 'field_accommodation_address',
                'label' => 'Address',
                'name' => 'accommodation_address',
                'type' => 'text',
                'required' => 1,
            ),
            array(
                'key' => 'field_amenities',
                'label' => 'Amenities',
                'name' => 'amenities',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Add Amenity',
                'sub_fields' => array(
                    array(
                        'key' => 'field_amenity',
                        'label' => 'Amenity',
                        'name' => 'amenity',
                        'type' => 'text',
                        'required' => 1,
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'accommodation',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
}
add_action('acf/init', 'add_accommodation_fields');
