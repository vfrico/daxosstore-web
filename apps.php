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

?>

<!DOCTYPE HTML>
<html>
<? $html5->headersection("Apps"); ?>
<body>
<? $html5->heading(); ?>
<center>
<?
if ($_SESSION['isadmin'])
{	
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
			echo '<label for="appname">Nombre de la aplicación: </label>';
			echo "<input class=inputxt type=\"text\" name=\"appname\" value=\"".$row['name']."\"/><br>";
            echo "Categoría:";
            echo '<select name=category>';
            echo '<option value="Accesories">Accesories</option>';
            echo '<option value="Internet">Internet</option>';
            echo '<option value="Graphics">Graphics</option>';               
            echo '<option value="Games">Games</option>';
			echo '<option value="Multimedia">Multimedia</option>';
			echo '<option value="Office">Office</option>';
			echo '<option value="Education">Education</option>';
			echo '<option value="System" selected="selected">System</option>';
			echo '<option value="Other">Other</option>';
			echo '<option value="GOnline">Games Online</option>';
			echo '<option value="Cloud">Apps en la nube</option>';
			echo '</select>';
			echo '  ('.$row['category'].")";
			echo '<br>';
			
			echo '<label for="appurl">URL de la aplicación:</label>';
			echo '<input class=inputxt type="text" name="appurl" value="'.$row['url'].'" />';
			echo '<br>';
			echo '<label for="appname">Imagen de la Aplicación:</label>';
			echo "<img src='uploadedimgs/".$row['image']."' style=\"width:24px;height:24px; margin: 0px 4px -6px 4px\" />";
			echo '<input  class=inputxt type=FILE name="imagefile" id=imagefile> ';
			echo '<br>';
            echo '<label for="tags">Etiquetas:</label>';
            echo '<input class=inputxt type="text" name="tags" value="'.$row['tags'].'" />';
            echo '<br>';
            echo '<label for="Info">Información:</label>';
            echo '<textarea class=inputxt type="text" name="info">'.$row['info'].'</textarea> ';
            echo '<br>';
            if ($_SESSION['isadmin']){
            echo '<label for="active">¿Activa?:</label>';
          	if ($row['active'] == 1){
            		echo '<input class=inputxt type="checkbox" checked="checked" name="active" />';		
            	}
            	else{
            		echo '<input class=inputxt type="checkbox" name="active" />';		
            	}
            echo '<br>';}
            echo '<input class=inputbut type="submit" value=Enviar>';
		}
		echo "</form></div>";
		echo "<br>";
	}
	
	else
	{
		echo "<div style=\"width: 1000px;\">";
		$salida =  $base->query("SELECT * FROM apps");
		?>
		<table>
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
			</tr>
		<?
		//~ for ($i=1; $i <= 10; $i++) {
		while ($row = $salida->fetchArray(SQLITE3_ASSOC)) 
		{
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
}
	?>	
			</center>
<? $html5->pagfooter(); ?>
</body>
</html>
