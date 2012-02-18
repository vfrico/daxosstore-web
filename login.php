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

	<div id="medio">
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
	</div>
	<? $html5->pagfooter(); ?>
</body>
</html>

