<?php
  /*
  AVS Metaboxes
  Version: 0.5.4
  Author: Alberto de Vera Sevilla
  License: GPL3

      AVS Metaboxes version 0.5.4, Copyright (C) 2016-2017 Alberto de Vera Sevilla

      AVS Metaboxes is free software: you can redistribute it and/or modify
      it under the terms of the GNU General Public License as published by
      the Free Software Foundation, either version 3 of the License, or
      (at your option) any later version.

      AVS Metaboxes is distributed in the hope that it will be useful,
      but WITHOUT ANY WARRANTY; without even the implied warranty of
      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
      GNU General Public License for more details.

      You should have received a copy of the GNU General Public License
      along with AVS Metaboxes.  If not, see <http://www.gnu.org/licenses/>.

  */

  namespace Avs_Metabox_Wrapper;

  defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

  $file = __FILE__;
  $content_url = untrailingslashit( dirname( dirname( get_stylesheet_directory_uri() ) ) );
  $content_dir = untrailingslashit( WP_CONTENT_DIR );
  $file = wp_normalize_path( $file );
  $content_dir = wp_normalize_path( $content_dir );
  $url = str_replace( $content_dir, $content_url, $file );
  $url = str_replace( basename(__FILE__), '', $url );
  define('AVS_METABOXES_URL', $url);
  define('AVS_METABOXES_VERSION', '0.5.4');

  spl_autoload_register(function ($class_name) {
    $class_name = str_replace('Avs_Metabox_Wrapper\\','',$class_name);
    $class_name = str_replace('_','-',$class_name);
    $class_name = strtolower($class_name);

    if(is_file(dirname( __FILE__ ).'/classes/class.'.$class_name.'.php')) {
      require_once dirname( __FILE__ ).'/classes/class.'.$class_name.'.php';
    }else if(is_file(dirname( __FILE__ ).'/classes/field-types/class.'.$class_name.'.php')) {
      require_once dirname( __FILE__ ).'/classes/field-types/class.'.$class_name.'.php';
    }else if(is_file(dirname( __FILE__ ).'/classes/field-types/custom/class.'.$class_name.'.php')) {
      require_once dirname( __FILE__ ).'/classes/field-types/custom/class.'.$class_name.'.php';
    }

  });

  add_action('admin_enqueue_scripts', function(){

    wp_enqueue_script('wp-color-picker');
    wp_enqueue_style( 'wp-color-picker' );

    wp_enqueue_script('jquery-ui-datepicker');
    wp_register_style('jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css');
    wp_enqueue_style('jquery-ui');

    wp_register_script('avs-metaboxes-functions',AVS_METABOXES_URL.'/assets/functions.js',array('jquery', 'wp-color-picker', 'jquery-ui-datepicker'), AVS_METABOXES_VERSION, true);
    wp_enqueue_script('avs-metaboxes-functions');

    wp_register_style('avs-metaboxes-styles',AVS_METABOXES_URL.'/assets/styles.css',array(), AVS_METABOXES_VERSION, 'all');
    wp_enqueue_style('avs-metaboxes-styles');
  });
