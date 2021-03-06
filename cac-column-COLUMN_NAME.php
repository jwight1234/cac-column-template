<?php

class CPAC_Column_COLUMN_NAME extends CPAC_Column {

    /**
     * This function will setup the column data
     *
     */
    public function init() {

        // do not delete
    	parent::init();

        // Identifier, pick an unique name. Single word, no spaces. Underscores allowed.
        $this->properties['type'] = 'column-COLUMN_NAME';

        // Default column label.
        $this->properties['label'] = __( 'COLUMN_LABEL', 'cac-COLUMN_NAME' );

        // (optional) You can make it support sorting with the pro add-on enabled. Sorting will be done by it's raw value.
        $this->properties['is_sortable'] = true;

        // (optional) Enable/Disable inline editing support for this column.
        $this->properties['is_editable'] = true;
    }

    /**
     * Returns the display value for the column.
     *
     * @param int $id ID
     * @return string Value
     */
    public function get_value( $post_id ) {

        // get raw value
        $value = $this->get_raw_value( $post_id );

        // optionally you can change the display of the value. In this example we added a post link.
        $value = '<a href="' . get_permalink( $post_id ) . '">' . $value . '</a>';

        return $value;
    }

    /**
     * Get the raw, underlying value for the column
     * Not suitable for direct display, use get_value() for that
     * This value will be used by 'sorting', 'inline-edit' and get_value().
     *
     * @param int $id ID
     * @return mixed Value
     */
    public function get_raw_value( $post_id ) {

        // put all the column logic here to retrieve the value you need
        // For example: $value = get_post_meta( $post_id, '_my_custom_field_example', true );

        $value = 'something';

        return $value;
    }

    /**
     * (Optional) Inline editing settings. You can remove this function is you do not use it!
     *
     * @return array Editable settings
     */
    public function get_editable_settings() {

        // available types: text, textarea, media, float, togglable, select, select2_dropdown and select2_tags
        $settings = array(
            'type' => 'text'
        );

        // (Optional) Only applies to type: togglable, select, select2_dropdown and select2_tags
        // $settings['options'] = array( 'value_1', 'value_2', 'etc.' );

        // (Optional) If a selector is provided, editable will be delegated to the specified targets
        // $settings['js']['selector'] = 'a.my-class';

        return $settings;
    }

    /**
     * (Optional) Inline Edit store function. You can remove this function is you do not use it!
     *
     * @param int $id Object ID
     * @param mixed $value Value to be saved
     */
    public function save( $id, $value ) {

        // Store the value that has been entered with inline-edit
        // For example: update_post_meta( $id, '_my_custom_field_example', $value );
    }

    /**
     * (Optional) Apply conditionals. You can remove this function is you do not use it!
     *
     * This determines whether the column should be available. If you want to disable this column
     * for a particular posttype you can set this to false.
     *
     * @return bool True/False Default should be 'true'.
     */
    public function apply_conditional() {

        // Example: if the posttype does not support thumbnails then return false
        // if ( ! post_type_supports( $this->get_post_type(), 'thumbnail' ) ) {
        //    return false;
        // }

        return true;
    }

    /**
     * (Optional) Create extra settings for you column. These are visible when editing a column. You can remove this function is you do not use it!
     *
     * Write your own settings or use any of the standard avaiable settings.
     */
    public function display_settings() {

        // You can write your own input fields here, or use the examples below...

        // The following settings are available out-of-the-box:

        // Display an image preview size settings screen
        // $this->display_field_preview_size();

        // Display an excerpt length input field
        // $this->display_field_excerpt_length();

        // Display a date format settings input field
        // $this->display_field_date_format();

        // Display before and after input fields
        // $this->display_field_before_after();

        // Displays a dropdown menu with user display formats
        // $this->display_field_user_format();
    }

    /*
     * (Optional) Enqueue CSS + JavaScript on the admin listings screen. You can remove this function is you do not use it!
     *
     * This action is called in the admin_head action on the listings screen where your column values are displayed.
     * Use this action to add CSS + JavaScript
     *
     * @since 3.3.4
     */
    public function scripts() {

        // wp_register_script( 'cac-COLUMN_NAME', plugin_dir_url( __FILE__ ) . "js/column.js" );
        // wp_enqueue_script( 'cac-COLUMN_NAME' );

        // wp_register_style( 'cac-COLUMN_NAME', plugin_dir_url( __FILE__ ) . "css/column.css" );
        // wp_enqueue_style( 'cac-COLUMN_NAME' );
    }
}