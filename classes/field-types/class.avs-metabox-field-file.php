<?php

  namespace Avs_Metabox_Wrapper;

  defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

  final class Avs_Metabox_Field_File extends Avs_Metabox_Field{

    function __construct($field_id, $column_width, $clear_after, $field_title, $field_description){
      parent::__construct($field_id, $column_width, $clear_after, $field_title, $field_description);
    }

    public function render_input( $field_value ){
      ob_start();
      ?>
      <input type="text" class="avs-metabox-file-field" id="<?php echo parent::get_field_id();?>" name="<?php echo parent::get_field_id();?>" value="<?php echo $field_value;?>" >
      <a href="#" class="button avs-metabox-file">Select file</a>
      <div>
        <div class="avs-metabox-file-preview">
          <?php
            $attached_file_icon = wp_mime_type_icon('application/pdf');
            $attached_file_name = basename( get_attached_file( $field_value ) );
          ?>
          <?php if( !empty( $attached_file_name ) ): ?>
            <img src="<?php echo $attached_file_icon ?>">
            <p><?php echo $attached_file_name;?></p>
            <span class="dashicons dashicons-no avs-metabox-file-remove" title="Remove this file"></span>
          <?php else: ?>
            No file selected
          <?php endif; ?>
        </div>
      </div>
      <?php
      return ob_get_clean();
    }

    public function sanitize_field($field_value){
      $field_value = filter_var( $field_value, FILTER_SANITIZE_NUMBER_INT );
      return $field_value;
    }

  }
