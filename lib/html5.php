<?php
/*
 * 		file "lib/html5.php" - daxosstore-web project
 * 		Permite que todas las páginas sean iguales entre sí
 * 
 * 		Copyright (C) 2012 - by Víctor Fernández Rico <vfrico@gmail.com>
 * 		Released under GPL3 license (See COPYNG file or http://www.gnu.org/copyleft/gpl.html)
 * 
 *      This file is the main on the project
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
			<li><a href="version.php"><img class="navigationimages" alt="Versión" title="Versión 0.3" src="images/header/engine.svg"></a></li>
			<li><a href="admin.php"><img class="navigationimages" alt="Versión" title="Versión 0.3" src="images/header/manage.svg"></a></li>
		</ul>
		</nav>
		<div id="login">
			
		<?
		if (isset($_SESSION['user'])){
		?>		
			<form action="session.php" method="post" >
<!--
				<label for="usuario">Usuario:</label>
-->
				<input class="login" id="usuario" type="text" name="usuario" placeholder="Usuario" size=7 />
<!--
				<label for="contrasena">Contraseña:</label>
-->
				<input class="login" id="contrasena" type="password" name="contrasena" placeholder="Contraseña" size=7 /><br>
				<center><input type="submit" value="Entrar"> | <a href="#">Registrarse</a></center>
		</form>
		<?}
		else {
			echo "Has iniciado sesión como: ".$_SESSION['user'];
		}
		?>		
		</div>
		<br>
		<br>
		<br>
		<header>
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
}
?>
