<?php

  namespace Avs_Metabox_Wrapper;

  defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

  class Avs_Metabox_Field{

    private $field_type, $field_id, $column_width, $clear_after, $field_title, $options;
    const VALID_FIELD_TYPES = array('text','number','checkbox','textarea','colorpicker', 'image', 'select');

    function __construct($field_type, $field_id, $column_width, $clear_after, $field_title, $options = array()){
      $this->field_type = $field_type;
      $this->field_id = $field_id;
      $this->column_width = $column_width;
      $this->clear_after = $clear_after;
      $this->field_title = $field_title;
      $this->options = $options;
    }

    public function validate_field_type($field_type){
      if(in_array($field_type,static::VALID_FIELD_TYPES)){
        return true;
      }else{
        return false;
      }
    }

    public function render_input($field_value,$type){
      ob_start();
      ?>
      <div class="avs-metabox-<?php echo $this->column_width;?> avs-metabox-clearfix">
        <label for="<?php echo $this->field_id;?>"><?php echo $this->field_title;?></label>

        <?php if ( $type==='text' || $type==='number' ) : ?>

          <input type="<?php echo $type;?>" id="<?php echo $this->field_id;?>" name="<?php echo $this->field_id;?>" value="<?php echo $field_value;?>">

        <?php elseif( $type==='checkbox' ): ?>

          <input type="<?php echo $type;?>" id="<?php echo $this->field_id;?>" name="<?php echo $this->field_id;?>" <?php checked($field_value,'on');?> >

        <?php elseif( $type==='textarea' ): ?>

          <textarea id="<?php echo $this->field_id;?>" name="<?php echo $this->field_id;?>"><?php echo $field_value;?></textarea>

        <?php elseif( $type==='colorpicker' ): ?>

          <input type="text" class="avs-metabox-colorpicker" id="<?php echo $this->field_id;?>" name="<?php echo $this->field_id;?>" value="<?php echo $field_value;?>">

        <?php elseif( $type==='image' ): ?>

          <input type="text" class="avs-metabox-image-field" id="<?php echo $this->field_id;?>" name="<?php echo $this->field_id;?>" value="<?php echo $field_value;?>" >
          <a href="#" class="button avs-metabox-image">Select image</a>
          <div>
            <div class="avs-metabox-image-preview">
              <?php
                $image_preview = wp_get_attachment_image( $field_value, 'thumbnail' );
                if(!empty($image_preview)){
                  echo $image_preview;
                }else{
                  echo 'No image selected';
                }
              ?>
              <span class="dashicons dashicons-no avs-metabox-image-remove" title="Remove this image"></span>
            </div>
          </div>

        <?php elseif( $type==='select' ): ?>

          <select name="<?php echo $this->field_id;?>" id="<?php echo $this->field_id;?>">
            <?php foreach ($this->options as $key => $value) : ?>
                    <option value="<?php echo $value;?>" <?php selected( $field_value, $value ); ?>><?php echo $key;?></option>
            <?php endforeach; ?>
          </select>

        <?php endif; ?>

        <?php wp_nonce_field( 'edit', $this->field_id.'_nonce' ); ?>
      </div>
      <?php
      return ob_get_clean();
    }

    public function sanitize_field($field_type,$field_value){
      switch ($field_type) {
        case 'text':
          $field_value = sanitize_text_field( $field_value );
          break;
        case 'number':
          $field_value = filter_var($field_value,FILTER_SANITIZE_NUMBER_INT);
          break;
        case 'checkbox':
          if($field_value === NULL) {
            $field_value = null;
          }else{
            $field_value = 'on';
          }
          break;
        case 'textarea':
          $field_value = esc_textarea( wp_strip_all_tags($field_value) );
          break;
        case 'colorpicker':
          if ( !preg_match( '/^#[a-f0-9]{6}$/i', $field_value ) ) { // if user insert a HEX color with #
            $field_value = '#ffffff';
          }
          break;
        case 'image':
          $field_value = filter_var($field_value,FILTER_SANITIZE_NUMBER_INT);
          break;
        case 'select':
          $field_value =  wp_strip_all_tags($field_value);
          break;
      }
      return $field_value;
    }

    public function get_field(){
      if($this->validate_field_type($this->field_type)){
        $field_value = get_post_meta(get_the_ID(),$this->field_id,true);
        echo $this->render_input($field_value,$this->field_type);
      }else{
        return 'Invalid field type';
      }
    }

    public function get_field_id(){
      return $this->field_id;
    }

    public function get_field_type(){
      return $this->field_type;
    }

    public function get_column_width(){
      return $this->column_width;
    }

    public function get_clear_after(){
      return $this->clear_after;
    }

  }

?>
