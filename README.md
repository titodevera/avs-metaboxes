# avs-metaboxes
Developer's toolkit for building metaboxes for WordPress.

**Version:**        0.5

## How to
* Place "AVS Metaboxes" into your theme´s folder
* Copy the example below to the "functions.php"

## Example:

        require_once 'inc/avs-metaboxes/init.php';

        $avs_metabox = new Avs_Metabox_Wrapper\Avs_Metabox('pages-metabox','Pages Metabox',array('page','post'));

        //Adds input text field
        $avs_metabox->add_field(array(
        	'type'					=> 'text',
        	'id' 						=> 'my_text_field',
        	'label' 				=> 'My text field:',
        	'desc' 					=> 'My text field description',
        	'col_width' 		=> 'col4'
        ));
