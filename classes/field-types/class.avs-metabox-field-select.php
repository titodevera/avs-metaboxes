<?php

  namespace Avs_Metabox_Wrapper;

  defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

  final class Avs_Metabox_Field_Select extends Avs_Metabox_Field{

    private $options;
    private $multiple;

    function __construct($field_id, $column_width, $clear_after, $field_title, $field_description, $multiple = false, $options = array()){
      parent::__construct($field_id, $column_width, $clear_after, $field_title, $field_description);
      $this->options = $options;
      $this->multiple = $multiple;
    }

    public function render_input($field_value){
      ob_start();
      ?>
      <?php if( $this->multiple ): ?>
        <select multiple name="<?php echo parent::get_field_id();?>[]" id="<?php echo parent::get_field_id();?>">
          <?php foreach($this->options as $key => $value) : ?>
                  <?php
                  $selected = '';
                  for( $i=0;$i<sizeof($this->options);$i++ ){
                    if( isset($field_value[$i]) && $field_value[$i] == $value ) $selected = 'selected';
                  }
                  ?>
                  <option value="<?php echo $value;?>" <?php echo $selected; ?>><?php echo $key;?></option>
          <?php endforeach; ?>
        </select>
      <?php else: ?>
        <select name="<?php echo parent::get_field_id();?>" id="<?php echo parent::get_field_id();?>">
          <?php foreach ($this->options as $key => $value) : ?>
                  <option value="<?php echo $value;?>" <?php selected( $field_value, $value ); ?>><?php echo $key;?></option>
          <?php endforeach; ?>
        </select>
      <?php endif; ?>

      <?php
      return ob_get_clean();
    }

    public function sanitize_field($field_value){
      //$field_value =  wp_strip_all_tags($field_value);
      return $field_value;
    }

  }
