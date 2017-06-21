<?php

  $avs_metabox = new Avs_Metabox_Wrapper\Avs_Metabox( 'pages-metabox', 'Pages Metabox', array( 'page','post' ) );

  //text field
  $avs_metabox->add_field(array(
   'type'					=> 'text',
   'id' 					=> 'my_text_field',
   'label' 				=> 'My text field:',
   'desc' 				=> 'My text field description',
   'col_width' 		=> 'col4'
  ));

  //number field
  $avs_metabox->add_field(array(
   'type'					=> 'number',
   'id' 					=> 'my_number_field',
   'label' 				=> 'My number field:',
   'desc' 				=> 'My number field description',
   'col_width' 		=> 'col4'
  ));

  //email field
  $avs_metabox->add_field(array(
    'type'				=> 'email',
    'id' 					=> 'my_email_field',
    'label' 			=> 'My email field:',
    'desc' 				=> 'My email field description',
    'col_width' 	=> 'col4',
    'clear_after' => true
  ));

  //checkbox field
  $avs_metabox->add_field(array(
    'type'				=> 'checkbox',
    'id' 					=> 'my_checkbox_field',
    'label' 			=> 'My checkbox field:',
    'desc' 				=> 'My checkbox field description',
    'col_width' 	=> 'col4'
  ));

  //url field
  $avs_metabox->add_field(array(
    'type'				=> 'url',
    'id' 					=> 'my_url_field',
    'label' 			=> 'My url field:',
    'desc' 				=> 'My url field description',
    'col_width' 	=> 'col8',
    'clear_after' => true
  ));

  //date field
  $avs_metabox->add_field(array(
    'type'				 => 'date',
    'id' 					 => 'my_date_field',
    'label' 			 => 'My date field:',
    'desc' 				 => 'My date field description',
    'col_width' 	 => 'col6',
    'format' 		   => 'dd-mm-yy',
    'mindate' 		 => 0,
    'is_date_range'=> false
  ));

  //date range field
  $avs_metabox->add_field(array(
    'type'				 => 'date',
    'id' 					 => 'my_daterange_field',
    'label' 			 => 'My date range field:',
    'desc' 				 => 'My date range field description',
    'col_width' 	 => 'col6',
    'format' 		   => 'dd-mm-yy',
    'mindate' 		 => 0,
    'is_date_range'=> true,
    'clear_after'  => true
  ));

  //textarea field
  $avs_metabox->add_field(array(
    'type'				=> 'textarea',
    'id' 					=> 'my_textarea_field',
    'label' 			=> 'My textarea field:',
    'desc' 				=> 'My textarea field description',
    'col_width' 	=> 'col12',
    'clear_after' => true
  ));

  //image field
  $avs_metabox->add_field(array(
    'type'				=> 'image',
    'id' 					=> 'my_image_field',
    'label' 			=> 'My image field:',
    'desc' 				=> 'My image field description',
    'col_width' 	=> 'col3'
  ));

  //select field
  $avs_metabox->add_field(array(
    'type'				=> 'select',
    'id' 					=> 'my_select_field',
    'label' 			=> 'My select field:',
    'desc' 				=> 'My select field description',
    'col_width' 	=> 'col6',
    'options'			=> array(
      'option-1' => 'option-1-value',
      'option-2' => 'option-2-value'
    )
  ));

  //multiple select field
  $avs_metabox->add_field(array(
    'type'				=> 'select',
    'id' 					=> 'my_multipleselect_field',
    'label' 			=> 'My multiple select field:',
    'desc' 				=> 'My multiple select field description',
    'col_width' 	=> 'col3',
    'multiple'		=> true,
    'options'			=> array(
      'option-1' => 'option-1-value',
      'option-2' => 'option-2-value'
    )
  ));

  //colorpicker field
  $avs_metabox->add_field(array(
   'type'					=> 'colorpicker',
   'id' 					=> 'my_colorpicker_field',
   'label' 				=> 'My colorpicker field:',
   'desc' 				=> 'My colorpicker field description',
   'col_width' 		=> 'col3',
   'clear_after' 	=> true
  ));


  //TyniMCE editor
  $avs_metabox->add_field(array(
   'type'					=> 'editor',
   'id' 					=> 'my_editor_field',
   'label' 				=> 'My editor field:',
   'desc' 				=> 'My editor field description',
   'col_width' 		=> 'col12',
   'clear_after' 	=> true
  ));

?>
