<?php
/*
 * 		file "categories.php" - daxosstore-web project
 * 		This file shows the apps by category
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
//para crear el header, nav y footer 
include('lib/html5.php');
$html5 = new htmlpage();

include('lib/sqlite3db.php');
//Conectamos base de datos:
$base = new dbinter;
//Enviamos datos a la base
$filename = time().$_FILES["imagefile"]["name"];
echo $filename;
if (file_exists("uploadedimgs/" . $filename))
	{
		echo $filename . " already exists. ";
	}
else
	{
		move_uploaded_file($_FILES["imagefile"]["tmp_name"],
		"uploadedimgs/" . $filename);
		echo "Stored in: " . "upload/" . $filename;
	}

$base->anadirapp($_POST["appname"],$_POST["category"],$_POST["appurl"],$filename);

?>

<!DOCTYPE HTML>
<html>
<? $html5->headersection("Submit app"); ?>
<body>
<? $html5->heading(); ?>
            Aplicación: <? echo $_POST["appname"]; ?> <br>
            Categoría: <? echo $_POST["category"]; ?> <br>
            Archivo: <? echo $_FILES["imagefile"]["name"]; ?> <br>
            URL de la Aplicación: <? echo $_POST["appurl"]; ?> <br>

<? $html5->pagfooter(); ?>
</body>
</html>
