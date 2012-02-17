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
include('lib/sqlite3db.php');
$html5 = new htmlpage();

?>

<!DOCTYPE HTML>
<html lang=es>
	<? $html5->headersection("");?>
<body>
	<? $html5->heading(); ?>
	<?
	$base = new dbinter();
	
	$resultado = $base->checkuser($_POST['usuario'],$_POST['contrasena']);
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
echo $_POST['usuario'];
echo $_POST['contrasena'];
	echo "<br>";
	echo "<br>";
	if($resultado){
		echo "si";
		session_start();
		$_SESION['init'] = true;
	}
	else{
		echo "no";
	}
	?>

	<? $html5->pagfooter(); ?>
</body>
</html>

