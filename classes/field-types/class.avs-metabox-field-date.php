<?php

  namespace Avs_Metabox_Wrapper;

  defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

  final class Avs_Metabox_Field_Date extends Avs_Metabox_Field{

    public $format, $mindate, $is_date_range;

    function __construct( $field_id, $column_width, $clear_after, $field_title, $field_description, $format = 'dd-mm-yy', $mindate = 0, $is_date_range = false ){
      parent::__construct( $field_id, $column_width, $clear_after, $field_title, $field_description );
      $this->format = $format;
      $this->min_date = $mindate;
      $this->is_date_range = $is_date_range;
    }

    public function render_input( $field_value ){

      ob_start();

      if( $this->is_date_range ){
        //date range
        ?>
        <span class="avs-metabox-datepicker-range">
          <input type="text"
          data-mindate="<?php echo $this->min_date;?>"
          data-format="<?php echo $this->format;?>"
          class="avs-metabox-datepicker-from"
          name="<?php echo parent::get_field_id();?>"
          value="<?php echo $field_value;?>">
          <input type="text"
          class="avs-metabox-datepicker-to"
          value="<?php echo $field_value;?>">
        </span>
        <?php
      }else{
        //simple date select
        ?>
        <input type="text"
        data-mindate="<?php echo $this->min_date;?>"
        data-format="<?php echo $this->format;?>"
        class="avs-metabox-datepicker"
        value="<?php echo $field_value;?>">
        <?php
      }

      return ob_get_clean();

    }

    public function sanitize_field( $field_value ){
      return $field_value;
    }

  }
