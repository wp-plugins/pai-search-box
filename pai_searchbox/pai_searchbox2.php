<?php
/*
Plugin Name: PAi Search Box
Plugin URI: http://www.pai.pt/content/staticpages/PAi_novo/pt_pai_noseusite.html
Description: Coloque uma caixa de pesquisa da Páginas Amarelas no seu blog que permite aos seus utilizadores procurar contactos de empresas, serviços e particulares.
Version: 1.1
Author: Páginas Amarelas, SA
Author URI: http://www.pai.pt

	Copyright 2009  Páginas Amarelas, SA  (email : andre.bergonse@paginasamarelas.pt)
	
	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
	
	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

// Pre-2.6 compatibility
if ( ! defined( 'WP_CONTENT_URL' ) )
      define( 'WP_CONTENT_URL', get_option( 'siteurl' ) . '/wp-content' );
if ( ! defined( 'WP_CONTENT_DIR' ) )
      define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
if ( ! defined( 'WP_PLUGIN_URL' ) )
      define( 'WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );
if ( ! defined( 'WP_PLUGIN_DIR' ) )
      define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );

function paiSearchBox($w) {
	// Paths
	$pai_widget_path = WP_PLUGIN_URL . '/' . dirname(plugin_basename( __FILE__));
	$pai_path = urlencode(WP_PLUGIN_URL . '/' . dirname(plugin_basename( __FILE__)) . '/img_pai/');
	$pbi_path = urlencode(WP_PLUGIN_URL . '/' . dirname(plugin_basename( __FILE__)) . '/img_pbi/');

	// You can customize box's width to help you match you theme (in pixels)
	if (empty($w)) {
		$w = 205; // Default value
	}
	
	$tbl_width = $w;
	
	// Width of the input field to keep things proportional - do not modify
	$pai_input_width = $tbl_width - 125 . 'px';
?>

<!-- PAI SEARCHBOX -->
<iframe src="<?php echo $pai_widget_path ?>/pai/paiwidget.php?w=<?php echo $tbl_width ?>&iw=<?php echo $pai_input_width ?>&pai=<?php echo $pai_path ?>&pbi=<?php echo $pbi_path ?>" frameborder="0" width="205" height="65" scrolling="no" style="margin: 0;"></iframe>
<!-- PAI SEARCHBOX -->
<?php
}

function widget_paiSearchBox($args) {
	extract($args);
	
	$options = get_option("widget_paiSearchBox");
	
	// Check options and set default values
	if (!is_array( $options )) {
		$options = array('pai_title' => 'Pesquisa PAi');
  	} elseif (!is_array( $options )) {
		$options = array('pai_width' => '205');
  	} 
		
	echo $before_widget;
	echo $before_title;
	echo $options['pai_title'];
	echo $after_title;
	paiSearchBox($options['pai_width']); // Call main function with width argument
	echo $after_widget;
}

function paiSearchBox_control()	{
	$options = get_option("widget_paiSearchBox");
	
	// Check options and set default values
	if (!is_array( $options )) {
		$options = array('pai_title' => 'Pesquisa PAi');
	} elseif (!is_array( $options )) {
		$options = array('pai_width' => '205');
  	} 
	
	// Update options
	if ($_POST['paiSearchBox-submit']) {
		$options['pai_title'] = htmlspecialchars($_POST['paiSearchBox-title']);
		$options['pai_width'] = htmlspecialchars($_POST['paiSearchBox-width']);
	    update_option("widget_paiSearchBox", $options);
  	}
?>
	<p>
		<label for="paiSearchBox-title">Title: </label><br />
		<input type="text" id="paiSearchBox-title" name="paiSearchBox-title" value="<?php echo $options['pai_title']; ?>" /><br />
        <label for="paiSearchBox-width">Width (in px, default 205): </label><br />
        <input type="text" id="paiSearchBox-width" name="paiSearchBox-width" value="<?php echo $options['pai_width']; ?>" />
		<input type="hidden" id="paiSearchBox-submit" name="paiSearchBox-submit" value="1" />
	</p>
<?php
}

function paiSearchBox_init() {
	register_sidebar_widget(__('PAI Search Box'), 'widget_paiSearchBox');
	register_widget_control(__('PAI Search Box'), 'paiSearchBox_control');
}

add_action("plugins_loaded", "paiSearchBox_init");
?>
