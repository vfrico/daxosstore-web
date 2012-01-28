<?
/*
 * 		file "index.php" - daxosstore-web project
 * 
 * 		Copyright (C) 2011 - by Víctor Fernández Rico <vfrico@gmail.com>
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


?>

<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Language" content="es-ES" />
	<meta http-equiv="content-type" content="text/html;charset=UTF-8">
	<title>Dax OS Store</title>
	<link href='src/css/style.css' rel="stylesheet" type="text/css" media="all">
</head>
<body>
	<nav>
		<ul id="navegacion">
			<li><a href="http://www.socialnet.zobyhost.com/"><img class="navigationimages" alt="Linux Dax Web" src="images/header/logo-daxweb.png"></a></li>
			<li><img class="navigationimages" alt="Actualizar Dax OS" src="images/header/daxos-update.png"></li>
			<li><a href="http://www.socialnet.zobyhost.com/buscador/site/index_es.html"><img class="navigationimages" alt="Buscador" src="images/header/buscador.png"></a></li>
			<li><a href="version.html"><img class="navigationimages" alt="Versión" title="Versión 0.3" src="images/header/daxosstore-info.png"></a></li>
		</ul>
	</nav>
	<br>
	<br>
	<br>
	<header>
		<h1><img class="cabezal" alt="" src="images/header/cabezal.png"></h1>
	</header> 

	<table id="table">
		<tr>
			<td rowspan="3">
				Campo unificado
			</td>
			<td>
				<a href="categories.php?cat=Accesories">
				<img src="images/categories/accesorios.png" alt="Accesorios" class="imgcat"/><br>
				Accesorios
				</a>
			</td>
			<td>
				<a href="categories.php?cat=Internet">
				<img src="images/categories/internet.png" alt="Internet" class="imgcat"/><br>
				Internet
				</a>
			</td>
			<td>
				<a href="categories.php?cat=Graphics">
				<img src="images/categories/graficos.png" alt="graficos" class="imgcat"/><br>
				Gráficos
				</a>
			</td>
			<td rowspan="3">
				Campo unificado
			</td>
		</tr>
		<tr>
			<td>
				<a href="categories.php?cat=Games">
				<img src="images/categories/juegos.png" alt="Juegos" class="imgcat"/><br>
				Juegos
				</a>
			</td>
			<td>
				<a href="categories.php?cat=Multimedia">
				<img src="images/categories/sonidoyvideo.png" alt="sonidoyvideo" class="imgcat"/><br>
				Sonido y Vídeo
				</a>
			</td>
			<td>
				<a href="categories.php?cat=Office">
				<img src="images/categories/ofimatica.png" alt="Ofimática" class="imgcat"/><br>
				Ofimática
				</a>
			</td>
		</tr>
		<tr>
			<td>
				<a href="categories.php?cat=Education">
				<img src="images/categories/educacion.png" alt="Educación" class="imgcat"/><br>
				Educación
				</a>
			</td>
			<td>
				<a href="categories.php?cat=System">
				<img src="images/categories/ajustes.png" alt="Ajustes" class="imgcat"/><br>
				Ajustes
				</a>
			</td>
			<td>
				<a href="categories.php?cat=Other">
				<img src="images/categories/otras.png" alt="Otras" class="imgcat"/><br>
				Otras
				</a>
			</td>
		</tr>
	</table>
	<footer>
		<img src="images/header/logo-daxweb.png" alt="Dax Web" class="navigationimages" style="margin: -10px 0px"/>
		Dax OS Store es un proyecto de Dax Web, está registrado bajo la licencia GPL

	</footer>
</body>
</html>
