# avs-metaboxes
Developer's toolkit for building metaboxes for WordPress.

**Version:**        0.3

## How to
* Place "AVS Metaboxes" into your theme´s folder
* Copy the example below to the "functions.php"

## Example:

        require_once 'inc/avs-metaboxes/init.php';
        $avs_fields = array(
            new Avs_Metabox_Wrapper\Avs_Metabox_Field_Text('my_text_field', 'col6', false, 'My text field:', 'My text field description'),
            new Avs_Metabox_Wrapper\Avs_Metabox_Field_Number('my_number_field', 'col6', false, 'My number field:', 'My number field description'),
            new Avs_Metabox_Wrapper\Avs_Metabox_Field_Checkbox('my_checkbox_field', 'col6', false, 'My checkbox field:', 'My checkbox field description'),
            new Avs_Metabox_Wrapper\Avs_Metabox_Field_Colorpicker('my_colorpicker_field', 'col6', true, 'My colorpicker field:', 'My colorpicker field description'),
            new Avs_Metabox_Wrapper\Avs_Metabox_Field_Textarea('my_textarea_field', 'col12', false, 'My textarea field:', 'My textarea field description'),
            new Avs_Metabox_Wrapper\Avs_Metabox_Field_Image('my_image_field', 'col6', false, 'My image field:', 'My image field description'),
            new Avs_Metabox_Wrapper\Avs_Metabox_Field_Select('my_select_field', 'col6', true, 'My select field:', 'My select field description', array(
              'option-1' => 'option-1-value',
              'option-2' => 'option-2-value'
            )),
            new Avs_Metabox_Wrapper\Avs_Metabox_Field_Email('my_email_field', 'col8', false, 'My email field:', 'My email field description'),
            new Avs_Metabox_Wrapper\Avs_Metabox_Field_Url('my_url_field', 'col4', true, 'My url field:', 'My url field description')
        );
        $avs_metabox = new Avs_Metabox_Wrapper\Avs_Metabox('pages-metabox','Pages Metabox',array('page','post'), $avs_fields);
