<?
/*
 * 		file "info.php" - daxosstore-web project
 * 		This file provides information
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
$version = "0.1.4-alpha";
@$varget = $_GET['id'];
?>

<!DOCTYPE HTML>
<html lang=es>
	<? $html5->headersection("");?>
<body>
	<? $html5->heading(); ?>
	<div style="width: 600px; margin: 50px auto;">
		<? echo "<h1>La versión de DaxOs Store es: $version</h1>"; ?>
		<h1>Cambios</h1>
		<h2>0.1.3-alpha</h2>
		<p>
			<ul>
				<li>Se añade soporte para registro de usuarios</li>
				<li>Se modifica la base de datos para definir si una aplicación está activa o no</li>
				<li>Se modifica la base de datos para introducir el campo email en la tabla de usuarios</li>
				<li>Este página de información</li>
			</ul>
		</p>
		<h2>0.1.4-alpha</h2>
			<ul>
				<li>Arreglar errores</li>
				<li>Cambiar estilos de h1, h2, ul en style.css</li>
			</ul>
		<h1>Tareas pendientes</h1>
		<p>
			<ul>
				<li>Crear página de usuario (Cambiar contraseña, email, ¿enviar aplicaciones?)</li>
				<li>Permitir gestionar las aplicaciones (cambiar datos)</li>
				<li>Crear una tabla en la base de datos para intercambiar estilos css</li>
				<li>Impedir el registro de un usuario que a exista</li>
				<li>Separar info(secciones: versión, información técnica, información para el usuario...)</li>
				<li>Separar las bases de datos de Usuarios y aplicaciones, así como la del sistema</li>
			</ul>
		</p>
	</div>
	<? $html5->pagfooter(); ?>
</body>
</html>

