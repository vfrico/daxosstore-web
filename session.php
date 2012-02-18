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

session_start();
include('lib/html5.php');
include('lib/sqlite3db.php');
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
	}

} else {
	echo '<h1>Los datos no eran correctos</h1>
		<script type="text/javascript">
            setTimeout(\'location.replace("login.php")\',5500);
		</script>';
}

?>

<!DOCTYPE HTML>
<html lang=es>
	<? $html5->headersection("");?>
<body>
	<? $html5->heading(); ?>
<?
if(!isset($_SESSION['user'])){
	echo '<h1>Los datos no eran correctos</h1>
		<script type="text/javascript">
            setTimeout(\'location.replace("login.php")\',3500);
		</script>';
	}
else {
		echo '<h1>Has iniciado sesión</h1>
		<script type="text/javascript">
            setTimeout(\'location.replace("index.php")\',5500);
		</script>';
}
?>
	<? $html5->pagfooter(); ?>
</body>
</html>

