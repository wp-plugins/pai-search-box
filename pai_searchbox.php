<?php
/*
Plugin Name: PAi Search Box
Plugin URI: http://www.pai.pt/content/staticpages/PAi_novo/pt_pai_noseusite.html
Description: Este widget coloca uma caixa de pesquisa das Paginas Amarelas no seu blog e permite aos utilizadores efectuar pesquisas directamente em pai.pt.
Version: 1.0
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

function paiSearchBox()
{
	// Image paths
	$pai_path = WP_PLUGIN_URL . '/' . dirname(plugin_basename( __FILE__)) . '/img/'; 
	
	/* You can customize box's width to help you match you theme (in pixels) */
	$tbl_width = 205;
	
	/* Width of the input field to keep things proportional - do not modify */
	$pai_input_width = $tbl_width - 125 . 'px'; 	
?>
<!-- Pesquisa Páginas Amarelas -->

<form id="wwForm" method="post" target="_blank" action="http://www.pai.pt/search.ds?adrecip=HTMLAPI_WP" >
  <input type="hidden" name="newSearch" value="true" />
  <table width="<?php echo $tbl_width ?>" height="44" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="5"><img src="<?php echo $pai_path ?>canto_esq.jpg"></td>
      <td background="<?php echo $pai_path ?>fundo.jpg" width="75"><a href="http://www.pai.pt" ><img src="<?php echo $pai_path ?>logo_pa.gif" alt="Páginas Amarelas" border="0"></a></td>
      <td background="<?php echo $pai_path ?>fundo.jpg"><input type="text" name="singleSearchInput" id="singleTxt" style="font: verdana; font-size: 10px; width: <?php echo $pai_input_width ?>; height: 14px; padding: 0"></td>
      <td background="<?php echo $pai_path ?>fundo.jpg" width="30"><input type="image" src="<?php echo $pai_path ?>bt_ok.gif" border="0" alt="Procurar"></td>
      <td width="4"><img src="<?php echo $pai_path ?>canto_dir.jpg"></td>
    </tr>
    <tr>
      <td colspan="5"><div style="text-align: center; font-size: 80%; color: #666"><a href="http://www.pai.pt/content/staticpages/PAi_novo/pt_pai_noseusite.html" target="_blank">Adicionar este widget ao seu site</a></div></td>
	</tr>
  </table>
</form>
<!-- Pesquisa Páginas Amarelas -->
<?php
}

function widget_paiSearchBox($args) {
	extract($args);
	echo $before_widget;
	echo $before_title . 'Pesquisa PAi';
	echo $after_title;
	paiSearchBox();
	echo $after_widget;
}

function paiSearchBox_init()
{
  register_sidebar_widget(__('PAI Search Box'), 'widget_paiSearchBox');
}
add_action("plugins_loaded", "paiSearchBox_init");
?>
