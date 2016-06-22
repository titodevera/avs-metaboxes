<?php
  /*
  AVS Metaboxes
  Version: 0.1
  Author: Alberto de Vera Sevilla
  License: GPL3

      AVS Metaboxes version 0.1, Copyright (C) 2016 Alberto de Vera Sevilla

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

  require 'classes/class.avs-metabox.php';
  require 'classes/class.avs-metabox-field.php';

  add_action('admin_enqueue_scripts',function(){
    wp_enqueue_style( 'wp-color-picker' );

    wp_register_script('avs-metaboxes-functions',get_stylesheet_directory_uri().'/avs-metaboxes/assets/functions.js',array('jquery', 'wp-color-picker'), '1.0', true);
    wp_enqueue_script('avs-metaboxes-functions');

    wp_register_style('avs-metaboxes-styles',get_stylesheet_directory_uri().'/avs-metaboxes/assets/styles.css',array(), '1.0', 'all');
    wp_enqueue_style('avs-metaboxes-styles');
  });

?>
