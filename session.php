<?
/*
 * 		file "session.php" - daxosstore-web project
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
$html5 = new htmlpage();
@$_usuario = $_POST['usuario'];
@$_clave = $_POST['contrasena'];

if (isset($_usuario) && isset($_clave)) {
    //comprobar que el usuario está autorizado a entrar
    //se necesita conectar a la base de datos
	$base = new dbinter();
	$resultado = $base->checkuser($_usuario,$_clave);
	if ($resultado){
		$_SESSION['user'] = $_usuario;
		$_SESSION['isadmin'] = $base->isanadmin($_usuario);
	}

} else {
	messagereplace("Los datos introducidos no eran correctos","login.php",3000);
}

?>

<!DOCTYPE HTML>
<html lang=es>
	<? $html5->headersection("");?>
<body>
	<? $html5->heading(); ?>
	<div id=medio>
<?
if(!isset($_SESSION['user'])){
	messagereplace("Los datos introducidos no eran correctos","login.php",3000);
	}
else {
		messagereplace('Has iniciado sesión como <b>'.$_SESSION["user"].'</b>',"admin.php",3000);
}
?>
</div>
	<? $html5->pagfooter(); ?>
</body>
</html>

