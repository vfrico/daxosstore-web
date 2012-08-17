<?php
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
//para crear el header, nav y footer 
include_once('lib/html5.php');
$html5 = new htmlpage();

include('lib/sqlite3db.php');
//Conectamos base de datos:
$base = new dbinter;
// Para la imagen //
if ($_FILES["imagefile"]["name"] != ''){
	$filename = time().$_FILES["imagefile"]["name"];
	//~ echo $filename;
	if (file_exists("uploadedimgs/" . $filename))
	{
		echo $filename . " already exists. ";
	}
	else
	{
		move_uploaded_file($_FILES["imagefile"]["tmp_name"],
		"uploadedimgs/" . $filename);
		echo "Imagen guardada en: " . "upload/" . $filename;
	}
}
else {
	$filename = false;
}
// Termina la imagen //


if (isset($_GET['edit']))
{ //Edita la aplicación 
	if ($_SESSION['isadmin']){
		if ($_POST['active'] == 'Yes' || $_POST['active'] == 'On' || $_POST['active'] == 'on'){
			$active = 1;
		}
		else $active = 0;
	}
	else $active = 0;

	// if(isset($_POST['active']) && @$_POST['active']=='Yes') echo "TRUE";
	// else echo "FALSE";

	if ($filename == false){
		$base->updateapp($_POST["appname"],$_POST["category"],$_POST["appurl"],false,$_POST['tags'],$_POST['info'],$_SESSION['user'],$_GET['edit'],$active);
	}
	else{
		$base->updateapp($_POST["appname"],$_POST["category"],$_POST["appurl"],$filename,$_POST['tags'],$_POST['info'],$_SESSION['user'],$_GET['edit'],$active);
	}
	
}

else {
	if ($_SESSION['isadmin']){
		if ($_POST['active'] == 'Yes' || $_POST['active'] == 'on' || $_POST['active'] == 'On'){
			$active = 1;
		}
		else $active = 0;
	}
	else $active = 0;
	$base->anadirapp($_POST["appname"],$_POST["category"],$_POST["appurl"],$filename,$_POST['tags'],$_POST['info'],$_SESSION['user'],$active);
}
?>

<!DOCTYPE HTML>
<html>
<? $html5->headersection("Submit app"); ?>
<body>
<? $html5->heading(); ?>
	<? 
	// Comprueba si el usuario es administrador
	// if ($_SESSION['isadmin']) {
		?>
            Aplicación: <? echo $_POST["appname"]; ?> <br>
            Categoría: <? echo $_POST["category"]; ?> <br>
            Tags: <? echo $_POST["tags"]; ?> <br>
            Info: <? echo $_POST["info"]; ?> <br>
            Archivo: <? echo $_FILES["imagefile"]["name"]; ?> <br>
            URL de la Aplicación: <? echo $_POST["appurl"]; ?> <br>
            Active: <? echo @$_POST['active']; ?> <br>
		<?
	// }
	// else {
	// 	notadmin();
	// }
	?>
<? $html5->pagfooter(); ?>
</body>
</html>
