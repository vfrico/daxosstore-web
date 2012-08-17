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
$version = "0.2.2-alpha";
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

		<h2>0.2.2-alpha</h2>
		<ul>
			<li>Permite que un usuario normal pueda subir una aplicación, pero no será visible hasta que un administrador lo revise.</li>
			<li>En la edición de aplicaciones, se ha arreglado un error que hacía que la imagen puesta, si no se cambia, se perdía.</li>
			<li>Al editar aplicaciones, el checkbox de activa se ajusta a lo puesto en la base de datos.</li>
			<li>El estilo de las listas ha sido cambiado a 'circle'</li>
		</ul>

		<h2>0.2.1-alpha</h2>
		<ul>
			<li>Ajustando etiquetas para validar correctamente el html.</li>
			<li>Los usuarios pueden cambiar la información personal: Correo electrónico, información del usuario y contraseña</li>
		</ul>

		<h2>0.2-alpha</h2>
		<ul>
			<li>Bases de datos en lugares separados: users.db y apps.db</li>
			<li>Listado de aplicaciones en apps.php para administradores</li>
			<li>Editar datos de aplicaciones (Administradores)</li>
		</ul>

		<h2>0.1.4-alpha</h2>
		<ul>
			<li>Arreglar errores</li>
			<li>Cambiar estilos de h1, h2, ul en style.css</li>
		</ul>

		<h2>0.1.3-alpha</h2>
		<ul>
			<li>Se añade soporte para registro de usuarios</li>
			<li>Se modifica la base de datos para definir si una aplicación está activa o no</li>
			<li>Se modifica la base de datos para introducir el campo email en la tabla de usuarios</li>
			<li>Esta página de información</li>
		</ul>

		<br><br>
		<h1>Tareas pendientes</h1>
		<ul>
			<li>Crear página de usuario (Cambiar contraseña, email, ¿enviar aplicaciones?)</li>
			<li><strike>Permitir gestionar las aplicaciones (cambiar datos) </strike></li>
			<li>Crear una tabla en la base de datos para intercambiar estilos css</li>
			<li>Impedir el registro de un usuario que ya exista</li>
			<li>Separar info(secciones: versión, información técnica, información para el usuario...)</li>
			<li><strike>Separar las bases de datos de Usuarios y aplicaciones,</strike> así como la del sistema</li>
		</ul>
	</div>
	<? $html5->pagfooter(); ?>
</body>
</html>

