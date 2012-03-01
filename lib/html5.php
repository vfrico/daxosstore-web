<?php
/*
 * 		file "lib/html5.php" - daxosstore-web project
 * 		Permite que todas las páginas sean iguales entre sí
 * 
 * 		Copyright (C) 2012 - by Víctor Fernández Rico <vfrico@gmail.com>
 * 		Released under GPL3 license (See COPYNG file or http://www.gnu.org/copyleft/gpl.html)
 * 
 *      This program is free software; you can redistribute it and/or modify
 *      it under the terms of the GNU General Public License as published by
 *      the Free Software Foundation; either version 2 of the License, or
 *      (at your option) any later version.
 *      
 *      This program is distributed in the hope that it will be useful,
 *      but WITHOUT ANY WARRANTY; without even the implied warranty of
 *      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *      GNU General Public License for more details.
 *      
 *  	You should have received a copy of the GNU General Public License
 * 	    along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *      
 */
include_once('forms.php');
class htmlpage {
	function headersection($title) {
		if ($title =="") {
			$title = "Dax OS Store";
		}
		else {
			$title = "Dax OS Store | ".$title;
		}
		?>
		<head>
			<meta charset="UTF-8">
			<title><? echo $title; ?></title>
			<link href='src/css/style.css' rel="stylesheet" type="text/css" media="all">
			<link rel="shortcut icon" href="favicon.ico">
		</head>
		<?
	}
	
	function heading() {
		?>
		<nav>
		<ul id="navegacion">
			<li><a href="http://www.socialnet.zobyhost.com/"><img class="navigationimages" alt="Linux Dax Web" src="images/header/logo-daxweb.svg"></a></li>
			<li><img class="navigationimages" alt="Actualizar Dax OS" src="images/header/update.svg"></li>
			<li><a href="http://www.socialnet.zobyhost.com/buscador/site/index_es.html"><img class="navigationimages" alt="Buscador" src="images/header/search.svg"></a></li>
			<li><a href="info.php?id=version"><img class="navigationimages" alt="Versión" title="Versión 0.3" src="images/header/engine.svg"></a></li>
			<li><a href="admin.php"><img class="navigationimages" alt="Versión" title="Versión 0.3" src="images/header/manage.svg"></a></li>
		</ul>
		</nav>
		<div id="login">
			
		<?
		if (!isset($_SESSION['user'])){
			loginform(false);
		}
		else {
			echo "Has iniciado sesión como: ".$_SESSION['user'];
			echo "<br><center><a href=\"logout.php\">Cerrar sesión</a>";
		}
		?>		
		</div>

		<header id="brand">
			<h1><a href="index.php"><img class="cabezal" alt="Dax OS Store" src="images/header/cabezal.svg"></a></h1>
		</header> 
		<?
	}
	
	function pagfooter() {
		?>
		<footer>
		<img src="images/header/logo-daxweb.svg" alt="Dax Web" class="navigationimages" style="margin: -10px 0px"/>
		Dax OS Store es un proyecto de Dax Web, está registrado bajo la licencia GPL
		</footer>
		<?
	}
} // Close class

function notadmin() {
	?>
	<h1>No estás autorizado a ver esta página</h1>
	<script type="text/javascript">
		setTimeout('location.replace("index.php")',5500);
	</script>
	<?
}
?>
