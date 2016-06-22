<?php

  namespace Avs_Metabox_Wrapper;

  defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

  class Avs_Metabox{

    private $id = '';
    private $title = '';
    private $post_types = array();
    private $fields = array();

    function __construct($id, $title, $post_types, $fields){
      $this->id = $id;
      $this->title = $title;
      $this->post_types = $post_types;
      $this->fields = $fields;
      add_action('add_meta_boxes', array($this,'meta_box'));
      add_action('save_post', array($this,'meta_box_save'));
    }

    public function meta_box(){
      add_meta_box( $this->id, $this->title, array($this,'meta_box_callback'), $this->post_types, 'advanced', 'default', null );
    }

    public function meta_box_callback(){
      echo '<div class="avs-metabox-cont avs-metabox-clearfix">';
      foreach ($this->fields as $field) {
        echo $field->get_field();
        echo ($field->get_clear_after()) ? '<div class="avs-metabox-clearfix"></div>' : '';
      }
      echo '</div>';
    }

    public function meta_box_save($post_id){

      foreach ($this->fields as $field) {
        $field_id = $field->get_field_id();
        $field_id_nonce = $field_id . '_nonce';

        if ( ! isset( $_POST[$field_id] ) || ! isset( $_POST[$field_id_nonce] ) || ! wp_verify_nonce( $_POST[$field_id_nonce], 'edit' ) || defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
        }

        if ( 'page' == $_POST['post_type'] ) {
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            }
        } else {
            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;
            }
        }

        $field_value = $field->sanitize_field($field->get_field_type(),$_POST[$field_id]);

        update_post_meta( $post_id, $field_id, $field_value );

      }

    }

  }

?>
