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
include_once('lib/sqlite3db.php');
include_once('lib/forms.php');
$html5 = new htmlpage();
?>
<!DOCTYPE HTML>
<html>
<? $html5->headersection("Admin page"); ?>
<body>
	<? $html5->heading(); ?>
	
<? // Comprueba si el usuario es administrador
	
if (isset($_SESSION['user'])) { //si ha iniciado sesión
	echo '<div class=medio-inv style="width: 450px;">';
	echo "<h2 style=\"text-align:center;\">Usuario: ".$_SESSION['user']."</h2>";
	//Editar opciones usuario
	if(@$_GET['opt']=="user"){
		$dbuser = new dbinter();
		?>
		<section>
			<header>
				<h2 style="text-align:center;">Cambiar datos de usuario</h2>
			</header>
			<br>
		Cambiar E-Mail
		<? 
		$old = $dbuser->getemail($_SESSION['user']); //Email almacenado en la base de datos
		actualizaremail($old); 
		?>
		<br>
		<br>
		Cambiar la contraseña
		<? actualizarpass(); ?>
		<br>
		<br>
		Cambiar la información del usuario
		<?
		$old = $dbuser->getinfo($_SESSION['user']); //Información almacenada en la base de datos
		actualizarinfo($old); ?>
		</section>
		<?
	}
	else{
		if ($_SESSION['isadmin']){
			echo "<p style=\"text-align:center;\">Tienes permisos de administrador</p>";
			?>
			<ul>
				<h2>Aplicaciones</h2>
				<li><a href="submit.php">Enviar una aplicación</a></li>
				<li><a href="apps.php?table">Administrar aplicaciones</a></li>
				
				<h2>Usuarios</h2>
				<li><a href="users.php">Ver usuarios</a></li> <!-- No funciona-->
				<li><a href="users.php?opt=mod">Administrar usuarios</a></li>
				
				<h2>Información del usuario</h2>
				<li><a href="admin.php?opt=user">Cambiar datos de información</a></li>
				
				<h2>Opciones del sitio web</h2>
				<li><a href="#">Cambiar tema predeterminado</a></li>
			</ul>
			<?
		}else{
			//Usuario normal 
		?>
		<ul>
				<h2>Aplicaciones</h2>
				<li><a href="submit.php">Enviar una aplicación</a></li>
				<li><a href="apps.php?table">Administrar mis aplicaciones subidas</a></li>
				
				<h2>Información del usuario</h2>
				<li><a href="admin.php?opt=user">Cambiar datos de información</a></li>
			</ul>
		
		<?
		}
	}
	echo '</div>';
}
else{//Si no ha iniciado sesión
	messagereplace("No has iniciado sesión", "index.php",3000);
}
	?>
	<? $html5->pagfooter(); ?>
</body>
</html>
