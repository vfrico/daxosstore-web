<?
/*
 * 		file "categories.php" - daxosstore-web project
 * 		This file shows the apps by category
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
session_start();
include_once('lib/html5.php');
$html5 = new htmlpage();
?>
<!DOCTYPE HTML>
<html>
<? $html5->headersection("Admin page"); ?>
<body>
	<? $html5->heading(); ?>
	<? // Comprueba si el usuario es administrador
	
if (isset($_SESSION['user'])) { //Si ha iniciado sesión
	echo "Usuario: ".$_SESSION['user'];
	echo "<br>". $_SESSION['isadmin'];
	if ($_SESSION['isadmin']){
		echo "admin";
	}else{
		echo "noadmin";
	}
}
else{//Si no ha iniciado sesión
	messagereplace("No has iniciado sesión", "index.php",6000);
}
	?>
	<? $html5->pagfooter(); ?>
</body>
</html>
