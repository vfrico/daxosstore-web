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
include('lib/html5.php');
$html5 = new htmlpage();

?>

<!DOCTYPE HTML>
<html lang=es>
	<? $html5->headersection("");?>
<body>
	<? $html5->heading(); ?>

	<table id="table">
		<tr>
			<td rowspan="3">
				<a href="categories.php?cat=Cloud">
				<img src="images/categories/cloud.png" alt="Cloudapps" class="bigcat"/><br>
				Apps en la nube
				</a>
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
				<a href="categories.php?cat=GOnline">
				<img src="images/categories/games.png" alt="graficos" class="bigcat"/><br>
				Juegos Online
				</a>
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
	<? $html5->pagfooter(); ?>
</body>
</html>
