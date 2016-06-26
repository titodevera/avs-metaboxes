# avs-metaboxes
Developer's toolkit for building metaboxes for WordPress.

**Version:**        0.2

## How to
* Place "AVS Metaboxes" into your theme´s folder
* Copy the example below to the "functions.php"

## Example:

        require_once 'avs-metaboxes/init.php';
        $avs_fields = array(
            new Avs_Metabox_Wrapper\Avs_Metabox_Field_Text('my_text_field', 'col6', false, 'My text field:'),
            new Avs_Metabox_Wrapper\Avs_Metabox_Field_Number('my_number_field', 'col6', false, 'My number field:'),
            new Avs_Metabox_Wrapper\Avs_Metabox_Field_Checkbox('my_checkbox_field', 'col6', false, 'My checkbox field:'),
            new Avs_Metabox_Wrapper\Avs_Metabox_Field_Colorpicker('my_colorpicker_field', 'col6', true, 'My colorpicker field:'),
            new Avs_Metabox_Wrapper\Avs_Metabox_Field_Textarea('my_textarea_field', 'col12', false, 'My textarea field:'),
            new Avs_Metabox_Wrapper\Avs_Metabox_Field_Image('my_image_field', 'col6', false, 'My image field:'),
            new Avs_Metabox_Wrapper\Avs_Metabox_Field_Select('my_select_field', 'col6', true, 'My select field:', array(
              'option-1' => 'option-1-value',
              'option-2' => 'option-2-value'
            ))
        );
        $avs_metabox = new Avs_Metabox_Wrapper\Avs_Metabox('pages-metabox','Pages Metabox',array('page','post'), $avs_fields);
