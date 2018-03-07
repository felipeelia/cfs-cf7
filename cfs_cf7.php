<?php 

class cfs_cf7 extends cfs_field {
    public $name;
    public $label;

    function __construct() {
        $this->name = 'cf7';
        $this->label = __( 'Contact Form 7', 'cfs-cf7' );
    }

    function html( $field ) {
        $field->input_class = empty( $field->input_class ) ? '' : $field->input_class;

        $contact_forms = new WP_Query( apply_filters( 'cfs_cf7_field_query_args', array(
        	'post_type' => 'wpcf7_contact_form',
        	'posts_per_page' => -1,
        	'orderby' => 'title',
        	'order' => 'ASC',
        ) ) );
        
        if ( $contact_forms->have_posts() ) {
        	?>
	        <select name="<?php echo $field->input_name; ?>" class="<?php echo trim( $field->input_class ); ?>">
	        	<option value=""><?php _e( 'Select', 'cfs-cf7' ) ?></option>
	        	<?php foreach ( $contact_forms->posts as $contact_form ) { ?>
	        		<option <?php echo ( $field->value == $contact_form->ID ) ? ' selected' : '' ?> value="<?php echo $contact_form->ID ?>"><?php echo $contact_form->post_title ?></option>
	        	<?php } ?>
	        </select>
        	<?php

        	wp_reset_postdata(); 
    	}
    }

    function options_html( $key, $field ) { ?>
		
		<tr class="field_option field_option_<?php echo $this->name; ?>">
		    <td class="label">
		        <label><?php _e( 'HTML class', 'cfs-cf7' ); ?></label>
		    </td>
		    <td>
		        <?php
		            CFS()->create_field( array(
		                'type' => 'text',
		                'input_name' => "cfs[fields][$key][options][class]",
		                'value' => $this->get_option( $field, 'class' ),
		            ) );
		        ?>
		        <p class="description"><?php _e( 'Value to be passed to <code>html_class</code> shortcode attribute', 'cfs-cf7' ); ?></p>
		    </td>
		</tr>
		<tr class="field_option field_option_<?php echo $this->name; ?>">
		    <td class="label">
		        <label><?php _e( 'HTML ID', 'cfs-cf7' ); ?></label>
		    </td>
		    <td>
		        <?php
		            CFS()->create_field( array(
		                'type' => 'text',
		                'input_name' => "cfs[fields][$key][options][id]",
		                'value' => $this->get_option( $field, 'id' ),
		            ) );
		        ?>
		        <p class="description"><?php _e( 'Value to be passed to <code>html_id</code> shortcode attribute', 'cfs-cf7' ); ?></p>
		    </td>
		</tr>

    <?php }

    function format_value_for_api( $value, $field = null ) {
        if ( $value ) {
            return do_shortcode( '[contact-form-7 id="' . $value . '" html_class="' . $field->options['class'] . '" html_id="' . $field->options['id'] . '"]');
        } else {
            return '';
        }
    }
}