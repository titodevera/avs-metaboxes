# avs-metaboxes
Developer's toolkit for building metaboxes for WordPress.

**Version:**        0.1

## How to
* Place "AVS Metaboxes" into your theme´s folder
* Copy the example below to the "functions.php"

## Example:

        require_once 'avs-metaboxes/init.php';
        $avs_fields = array(
        	new Avs_Metabox_Wrapper\Avs_Metabox_Field('text', 'my_text_field', 'col6', false, 'My text field:'),
        	new Avs_Metabox_Wrapper\Avs_Metabox_Field('number', 'my_number_field', 'col6', true, 'My number field:'),
        	new Avs_Metabox_Wrapper\Avs_Metabox_Field('checkbox', 'my_checkbox_field', 'col6', false, 'My checkbox field:'),
        	new Avs_Metabox_Wrapper\Avs_Metabox_Field('colorpicker', 'my_colorpicker_field', 'col6', true, 'My colorpicker field:'),
        	new Avs_Metabox_Wrapper\Avs_Metabox_Field('textarea', 'my_textarea_field', 'col12', false, 'My textarea field:'),
        	new Avs_Metabox_Wrapper\Avs_Metabox_Field('image', 'my_image_field', 'col6', false, 'My image field:'),
        	new Avs_Metabox_Wrapper\Avs_Metabox_Field('select', 'my_select_field', 'col6', true, 'My select field:', array(
        		'option-1' => 'option-1-value',
        		'option-2' => 'option-2-value'
        	))
        );
        $avs_metabox = new Avs_Metabox_Wrapper\Avs_Metabox('pages-metabox','Pages Metabox',array('page','post'), $avs_fields);
