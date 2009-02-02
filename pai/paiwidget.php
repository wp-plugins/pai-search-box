<?php
/*
Plugin Name: PAi Search Box
Plugin URI: http://www.pai.pt/content/staticpages/PAi_novo/pt_pai_noseusite.html
Description: Este plugin coloca uma caixa de pesquisa da Páginas Amarelas no seu blog que permite aos seus utilizadores procurar contactos de empresas, serviços e particulares.
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

// Get widths and paths
$w = $_GET['w'];
$iw = $_GET['iw'];
$pai_path = urldecode($_GET['pai']);
$pbi_path = urldecode($_GET['pbi']);

if (empty($w)) {
	$w = 205;
} 
if (empty($iw)) {
	$iw = "80px";
}

/* DEBUG
echo $pai_path . '<br><br>';
echo $pbi_path . '<br><br>';
echo $w . '<br><br>';
echo $iw;
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<script type="text/javascript">
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('x={E:r(e,c){3(!e.6.y(F G("\\\\b"+c+"\\\\b","i")))e.6+=(e.6?" ":"")+c},H:r(e,c){e.6=e.6.I(F G(" \\\\b"+c+"\\\\b|\\\\b"+c+"\\\\b ?","W"),"")}};s={z:r(a,b){2 c=J;2 d=4.X("Y");3(d){2 e=d.7("Z");8(2 j=0;j<e.9;j++){2 f=e[j];2 g=f.7("a");8(2 k=0;k<g.9;k++){3(g[k].n=="#"+a){x.E(f,"K");c=L;10}t{x.H(f,"K")}}}}2 h=[];2 l=4.7("o");8(2 i=0;i<l.9;i++){2 m=l[i];3(m.6.y(/\\M\\b/i)){3(m.u=="N"+a)m.5.p="A";t h.11(m)}}8(2 i=0;i<h.9;i++)h[i].5.p="B";3(!b)q.v.I("#"+a)},O:r(e){3(!e)e=q.12;3(e.P)e.P();t e.13=J;s.z(14.n.Q(1))},R:r(){3(!4.7)15;2 b=4.7("a");8(2 i=0;i<b.9;i++){2 a=b[i];3(a.n)a.16=s.O}2 c;3(q.v.n)c=q.v.n.Q(1);2 d=4.7("o");8(2 i=0;i<d.9;i++){2 e=d[i];3(e.6.y(/\\M\\b/i)){3(!c)c=e.u;e.u="N"+e.u}}3(c)s.z(c,L)}};q.17=s.R;2 C=q.v.n||"#18";3(4.S){2 5=4.S();5.T("o.U","p: B;");5.T("o"+C,"p: A;")}t{2 w=4.7("w")[0];3(w){2 5=4.19("5");5.1a("1b","1c/1d");5.D(4.V("o.U { p: B; }"));5.D(4.V("o"+C+" { p: A; }"));w.D(5)}}',62,76,'||var|if|document|style|className|getElementsByTagName|for|length||||||||||||||hash|div|display|window|function|Tabs|else|id|location|head|CSS|match|GoTo|block|none|contentId|appendChild|AddClass|new|RegExp|RemoveClass|replace|false|current_pai_tab|true|bcontentpai|_|OnClickHandler|preventDefault|substring|Init|createStyleSheet|addRule|contentpai|createTextNode|gi|getElementById|paitabs|li|break|push|event|returnValue|this|return|onclick|onload|Introduction|createElement|setAttribute|type|text|css'.split('|'),0,{}))
</script>
<style type="text/css">
body {
	margin:0;
	padding:0;
}
ul#paitabs {
	list-style:none;
	margin:0 0 0 5px;
	padding:0;
}
ul#paitabs li {
	float:left;
	margin:0;
	padding:2px 3px 0 0;
	height:15px;
	font-size:11px;
}
ul#paitabs li a {
	text-decoration:none;
	font-family:Tahoma, Geneva, sans-serif;
	outline:none;
}
ul#paitabs li a:link, a:visited {
	color:#777;
}
ul#paitabs li a:hover, a:active {
	color:#999;
}
ul#paitabs li.current_pai_tab a {
	color:#06F;
}
.contentpai {
	border:0px black solid;
	clear:left;
	padding:0;
	margin:0;
}
#search_pai, #search_pbi {
	padding: 0;
	margin: 0;
}
</style>
</head>
<body>
<!-- Início Pesquisa Páginas Amarelas -->
<ul id="paitabs">
  <li class="current_pai_tab"><a href="#tab_pai">Empresas</a>&nbsp;|&nbsp;</li>
  <li><a href="#tab_pbi">Pessoas</a>&nbsp;|&nbsp;</li>
  <li><a href="http://www.pai.pt/content/staticpages/PAi_novo/pt_pai_noseusite.html" target="_blank">Sobre</a></li>
</ul>
<div class="contentpai" id="tab_pai">
  <form id="search_pai" method="post" target="_blank" action="http://www.pai.pt/search.ds?adrecip=HTMLAPI_WIDGET">
    <input name="newSearch" value="true" type="hidden">
    <input name="locale" value="pt_PT" type="hidden">
    <input type="hidden" name="advancedSearch" value="false" id="advancedSearch" />
    <table width="<?php echo $w ?>" height="46" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="5"><img src="<?php echo $pai_path ?>canto_esq.gif" /></td>
        <td background="<?php echo $pai_path ?>fundo.gif" width="75"><a href="http://www.pai.pt" ><img src="<?php echo $pai_path ?>logo_pai.png" alt="Páginas Amarelas" border="0" /></a></td>
        <td background="<?php echo $pai_path ?>fundo.gif"><input type="text" name="singleSearchInput" id="singleTxt2" style="font: verdana; font-size: 10px; color: #555; width: <?php echo $iw ?>; height: 14px; padding: 0" /></td>
        <td background="<?php echo $pai_path ?>fundo.gif" width="30"><input type="image" src="<?php echo $pai_path ?>bt_ok.gif" border="0" alt="Procurar" /></td>
        <td width="4"><img src="<?php echo $pai_path ?>canto_dir.gif" /></td>
      </tr>
    </table>
  </form>
</div>
<!-- Fim Pesquisa Páginas Amarelas -->
<!-- Início Pesquisa Páginas Brancas -->
<div class="contentpai" id="tab_pbi">
  <form id="search_pbi" method="post" target="_blank" action="http://www.pbi.pai.pt/search.ds?adrecip=HTMLAPI_WIDGET" >
    <input name="newSearch" value="true" type="hidden">
    <input name="locale" value="pt_PT" type="hidden">
    <input type="hidden" name="advancedSearch" value="true" id="advancedSearch" />
    <table width="<?php echo $w ?>" height="46" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="5"><img src="<?php echo $pbi_path ?>canto_esq.gif"></td>
        <td background="<?php echo $pbi_path ?>fundo.gif" width="75"><a href="http://www.pai.pt" ><img src="<?php echo $pbi_path ?>logo_pbi.png" alt="Páginas Brancas" width="68" height="30" border="0"></a></td>
        <td background="<?php echo $pbi_path ?>fundo.gif"><input name="what" tabindex="1" type="text" id="whatTxt" value="Quem?" style="font: verdana; font-size: 9px; color: #555; width: <?php echo $iw ?>; height: 12px; padding: 0; margin: 0 0 2px 0" onfocus="if(this.value==this.defaultValue){this.value = '';}" onblur="if(this.value==''){this.value=this.defaultValue;}" /><br />
          <input name="where" tabindex="2" type="text" id="whereTxt" style="font: verdana; font-size: 9px; color: #555; width: <?php echo $iw ?>; height: 12px; padding: 0" value="Onde?" onfocus="if(this.value==this.defaultValue){this.value = '';}" onblur="if(this.value==''){this.value=this.defaultValue;}" /></td>
        <td background="<?php echo $pbi_path ?>fundo.gif" width="30"><input type="image" src="<?php echo $pai_path ?>bt_ok.gif" border="0" alt="Procurar" /></td>
        <td width="4"><img src="<?php echo $pbi_path ?>canto_dir.gif"></td>
      </tr>
    </table>
  </form>
</div>
<!-- Fim Pesquisa Páginas Brancas -->
</body>
</html>
