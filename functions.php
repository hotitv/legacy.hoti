<?php

include('settings.php');

function get_category_id($cat_name){
	$term = get_term_by('name', $cat_name, 'category');
	return $term->term_id;
}

if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9

  add_theme_support( 'post-thumbnails' );
  add_image_size('slide-image',1011,310,true);
  add_image_size('home-post-image',337,256,true);
  add_image_size('blog-image',680,336,true);

}

if ( function_exists('register_sidebar') ) {
        register_sidebar(array(
                'name'=>'Sidebar',
		'before_widget' => '<div class="side_box">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="side_title">',
		'after_title' => '</h3>',
	));
}

function ds_get_excerpt($num_chars) {

    $temp_str = substr(strip_tags(get_the_content()),0,$num_chars);
    $temp_parts = explode(" ",$temp_str);
    $temp_parts[(count($temp_parts) - 1)] = '';
    
    if(strlen(strip_tags(get_the_content())) > 125)
      return implode(" ",$temp_parts) . '...';
    else
      return implode(" ",$temp_parts);

}

// **** PRODUCTION - Template1 Search START ****

class template1_search extends WP_Widget {

	function template1_search() {
		parent::WP_Widget(false, 'Template 1 Search');
	}

	function widget($args, $instance) {
                $args['search_title'] = $instance['search_title'];
		t1_func_search($args);
	}

	function update($new_instance, $old_instance) {
		return $new_instance;
	}

	function form($instance) {
                $search_title = esc_attr($instance['search_title']);
?>
                <p><label for="<?php echo $this->get_field_id('search_title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('search_title'); ?>" name="<?php echo $this->get_field_name('search_title'); ?>" type="text" value="<?php echo $search_title; ?>" /></label></p>
<?php
	}
 }
function t1_func_search($args = array(), $displayComments = TRUE, $interval = '') {

	global $wpdb;

        echo $args['before_widget']; 
        
        if($args['search_title'] != '')
            echo $args['before_title'] . $args['search_title'] . $args['after_title']; ?>

        <div class="t1_search_cont">
            <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
            <input type="text" name="s" id="s" />
            <INPUT TYPE="image" SRC="<?php bloginfo('stylesheet_directory'); ?>/images/search-icon.jpg" class="t1_search_icon" BORDER="0" ALT="Submit Form">
            </form>
        </div><!--//t1_search_cont-->

        <?php
        echo $args['after_widget'];
        wp_reset_query();
        

}
register_widget('template1_search');  

// **** PRODUCTION - Template1 Search END ****

// EX POST CUSTOM FIELD START

$prefix = 'ex_';

$meta_box = array(
    'id' => 'my-meta-box',
    'title' => 'Custom meta box',
    'page' => 'post',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
/*        array(
            'name' => 'Text box',
            'desc' => 'Enter something here',
            'id' => $prefix . 'text',
            'type' => 'text',
            'std' => 'Default value 1'
        ),
        array(
            'name' => 'Textarea',
            'desc' => 'Enter big text here',
            'id' => $prefix . 'textarea',
            'type' => 'textarea',
            'std' => 'Default value 2'
        ),
        array(
            'name' => 'Select box',
            'id' => $prefix . 'select',
            'type' => 'select',
            'options' => array('Option 1', 'Option 2', 'Option 3')
        ),
        array(
            'name' => 'Radio',
            'id' => $prefix . 'radio',
            'type' => 'radio',
            'options' => array(
                array('name' => 'Name 1', 'value' => 'Value 1'),
                array('name' => 'Name 2', 'value' => 'Value 2')
            )
        ),*/
        array(
            'name' => 'Show in slideshow',
            'id' => $prefix . 'show_in_slideshow',
            'type' => 'checkbox'
        )
    )
);

add_action('admin_menu', 'mytheme_add_box');

// Add meta box
function mytheme_add_box() {
    global $meta_box;

    add_meta_box($meta_box['id'], $meta_box['title'], 'mytheme_show_box', $meta_box['page'], $meta_box['context'], $meta_box['priority']);
}


// Callback function to show fields in meta box
function mytheme_show_box() {
    global $meta_box, $post;

    // Use nonce for verification
    echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

    echo '<table class="form-table">';

    foreach ($meta_box['fields'] as $field) {
        // get current post meta data
        $meta = get_post_meta($post->ID, $field['id'], true);

        echo '<tr>',
                '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
                '<td>';
        switch ($field['type']) {
            case 'text':
                echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />', '<br />', $field['desc'];
                break;
            case 'textarea':
                echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>', '<br />', $field['desc'];
                break;
            case 'select':
                echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select>';
                break;
            case 'radio':
                foreach ($field['options'] as $option) {
                    echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
                }
                break;
            case 'checkbox':
                echo '<input type="checkbox" value="Yes" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
                break;
        }
        echo     '<td>',
            '</tr>';
    }

    echo '</table>';
}


add_action('save_post', 'mytheme_save_data');

// Save data from meta box
function mytheme_save_data($post_id) {
    global $meta_box;

    // verify nonce
    if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    foreach ($meta_box['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];

        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}

// EX POST CUSTOM FIELD END

?>