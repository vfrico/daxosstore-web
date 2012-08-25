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
include_once('lib/sqlite3db.php');
$html5 = new htmlpage();

?>

<!DOCTYPE HTML>
<html>
<? $html5->headersection("Apps"); ?>
<body>
<? $html5->heading(); ?>
<center>
<?
$base = new SQLite3('lib/apps.db');
if (isset($_GET['edit']))
{
	$_id = $_GET['edit'];
	echo "<br><br>";
	echo "Editar aplicación con ID:".$_id;
	$salida = $base->query("SELECT * FROM apps WHERE id='".$_id."'");
	echo "<br><br><div style=\"width: 800px;\">";
	echo "<form action=\"appsubmit.php?edit=".$_id."\" method=\"post\" enctype=\"multipart/form-data\"	>";
	while ($row = $salida->fetchArray(SQLITE3_ASSOC)) 
	{
		?>
		<img src='<? echo "uploadedimgs/".$row['image']; ?>' style="width:90px;height:90px; margin: 10px auto" />
		<table style="margin: 0px auto; text-align:left;" id="tablesubmit" >
                    <tr>
                        <td><label for="appname">Aplicación:</label></td>
        				<td><input class=inputxt style="width:150px;" type="text" name="appname" value="<? echo $row['name']; ?>" /><br></td>
                    </tr>
            <!--<input type="text" name="category" />-->
            <tr>
            <td>Categoría: </td>
            <td>
                <select name=category>
                 <option value="<? echo $row['category']; ?>"><? echo $row['category']; ?></option>
                 <option value="Accesories">Accesories</option>
                 <option value="Internet">Internet</option>
                 <option value="Graphics">Graphics</option>                 
                 <option value="Games">Games</option>
                 <option value="Multimedia">Multimedia</option>
                 <option value="Office">Office</option>
                 <option value="Education">Education</option>
                 <option value="System">System</option>
                 <option value="Other">Other</option>
                 <option value="GOnline">Games Online</option>
                 <option value="Cloud">Apps en la nube</option>
                </select>
            </td>
            </tr>
            <tr>
                <td><label for="appurl">URL de la aplicación:</label></td>
                <td><input class=inputxt style="width:300px;" type="text" value="<? echo $row['url']; ?>" name="appurl" /> </td>
            </tr>
            <tr>
                <td>
		    <label for="appname">Imagen de la Aplicación:</label>
                </td>
                <td><input  class=inputxt type=FILE name="imagefile" id='imagefile'> </td>
            </tr>
	    <tr>
	    <td colspan="2" align="center">La imagen de la aplicación actual es la que aparece arriba. <br>Si quieres cambiarla, selecciona un archivo, si no, déjalo tal cual.</td>
	    </tr>
            <tr>
                <td><label for="appname">Etiquetas:</label></td>
                <td><input class=inputxt type="text" value="<? echo $row['tags']; ?>" style="width:120px;" name="tags" /></td>
            </tr>
            <tr>
                <td><label for="appname">Información:</label></td>
                <td><input class=inputxt type="text" style="width:250px;" value="<? echo $row['info']; ?>" name="info" /> </td>
            </tr>
            <?
            if($_SESSION['isadmin']) { 
            	?>
                <tr><td><label for="active">¿Activa?:</label></td>
                <td class="squaredThree">
                    <input id='squaredThree' type="checkbox" name="active"<? if ($row['active'] == 1) echo 'checked="checked"';?> />
                </td>
                </tr>
                <? } 
           	?>
            <tr><td colspan="2" align="center"><input style="margin-top: 20px" class=inputbut type="submit" value="Enviar datos"></td></tr>
        </table>
	<?
	}
	echo "</form></div>";
	echo "<br>";
}

else if (isset($_GET['table']))
{
	echo "<div style=\"width: 1000px;\">";
	$salida =  $base->query("SELECT * FROM apps");
	?>
	<table class="appadmin" border="1" cellspacing=0 cellpadding=2>
		<thead>
		<tr>
			<td>
				id
			</td>
			<td>
				img
			</td>
			<td>
				Nombre
			</td>
			<td>
				Información
			</td>
			<td>
				Dirección
			</td>	
			<td>
				Categotía
			</td>
			<td>
				Usuario
			</td>
			<td>
				Tags
			</td>
			<td>
				¿Activa?
			</td>
			<td>
				Editar
			</td>					
		</tr>
		</thead>
	<?
	//~ for ($i=1; $i <= 10; $i++) {
	while ($row = $salida->fetchArray(SQLITE3_ASSOC)) 
	{
	if (!$_SESSION['isadmin']){
		if ($row['byuser'] != $_SESSION['user']){
			continue; //Si el usuario no es el que ha enviado la aplicación, se salta
		}
	}
	?>
		<tr>
			<td>
				<? echo $row['id']; ?>
			</td>
			<td>
				<? 	echo "<img src='"."uploadedimgs/".$row['image']."' style=\"width:30px;height:30px; \" />"; ?>
			</td>
			<td>
				<? echo $row['name']; ?>
			</td>
			<td>
				<? echo $row['info']; ?>
			</td>
			<td>
				<? echo $row['url']; ?>
			</td>
			<td>
				<? echo $row['category']; ?>
			</td>
			<td>
				<? echo $row['byuser']; ?>
			</td>
			<td>
				<? echo $row['tags']; ?>
			</td>
			<td>
				<? echo $row['active']; ?>
			</td>
			<td>
				<? echo "<a href=\"apps.php?edit=".$row['id']."\">Editar</a>"; ?>
			</td>						
		</tr>
	<?
	}
	echo "</table></div>";
}
else if (isset($_GET['id']))
{
	$_id = $_GET['id'];
	// echo "Ver información de aplicación con ID: $_id";
	$base1 = new dbinter();
	$app = $base1->getAppFromId($_id);
	echo "<br>";

	?>
	<table>
		<tr>
			<td class="applogo">
				<? 	echo "<img src='"."uploadedimgs/".$app['image']."' class=logo />"; ?>
			</td>
			<td class="container1">
			<header class="nameapp">
				<? 	
				echo "<h1>".$app['name']."</h1>";
				//~ echo "<h2>Categoria: ".$app['category']."</h2>";
				?>
			</header>
			<section class="information">
				<? echo $app['info']; ?>
			</section>
			</td>
		</tr>
		<tr>
			<td align="center" colspan="2" style="padding-top:20px;padding-bottom:20px;">
			<h2><a href="<?echo $app['url'] ?>">Descargar <i><?echo $app['name']?></i></a></h2>
			</td>
		</tr>
		<tr>
			<td><b>Etiquetas:</b></td>
			<td><?echo $app['tags']?></td>
		</tr>
	</table>
	<?

	echo "<br>";
}

	?>	
			</center>
<? $html5->pagfooter(); ?>
</body>
</html>
