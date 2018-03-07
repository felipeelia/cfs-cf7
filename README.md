# CFS - Contact Form 7 Field

Contact Form 7 field for Custom Field Suite

## Description

Tihs plugin creates a new type of field into [Custom Field Suite](https://wordpress.org/plugins/custom-field-suite/): the user can select any form generated with [Contact Form 7](https://wordpress.org/plugins/contact-form-7/).

You can get the form HTML using

`CFS()->get( 'form_field_id' )`

or the form ID using

`CFS()->get( 'form_field_id', get_the_ID(), array( 'format' => 'raw' ) )`.

Note: Obviously, this plugin requires both *Custom Field Suite* and *Contact Form 7* to work.

## Installation

1. Upload the plugin files to the `/wp-content/plugins/cfs-cf7` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Enjoy

## Frequently Asked Questions

### Can I choose HTML class or id of the form?

Yes. You can enter those values at Fields Group edit screen :)
