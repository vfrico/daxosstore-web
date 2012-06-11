<?
/*
 * 		file "register.php" - daxosstore-web project
 * 		This file shows the apps by category
 * 
 * 		Copyright (C) 2012 - by Víctor Fernández Rico <vfrico@gmail.com>
 * 		Released under GPL3 license (See COPYNG file or http://www.gnu.org/copyleft/gpl.html)
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
?>
<!DOCTYPE HTML>
<html>
<? $html5->headersection("Admin page"); ?>
<body>
	<? $html5->heading(); ?>
<?
switch (@$_GET['opt']) {
	case "change":
		echo "Hello world";
		break;
	default:
		echo "nada";
		break;
}

if (@$_GET['opt']=='change') {
	
}

else
{
	if(@$_POST['passwd'] == @$_POST['passwd2'] && @$_POST['passwd'] != "" && @$_POST['passwd2'] != "")
	{
		$_PRG_passwd = true;
	}
	else{
		$_PRG_passwd = false;
	}

	if(comprobar_email(@$_POST['usermail'])){
		$_PRG_mail = true;
	}
	else{
		$_PRG_mail = false;
	}

	if ($_PRG_passwd && $_PRG_mail){
		$base = new dbinter();
		$base->anadiruser($_POST['username'],$_POST['passwd'],$_POST['userinfo'],$_POST['usermail']);
		messagereplace("Te has registrado correctamente","index.php",0);
	}
	else {
			?>
			<div style="text-align: center;">
			 <?
		if(@$_POST['passwd'] == @$_POST['passwd2'] && @$_POST['passwd'] != "" && @$_POST['passwd2'] != "")
		{
			$_PRG_passwd = true;
		}
		else{
			$_PRG_passwd = false;
		}

		if(comprobar_email(@$_POST['usermail'])){
			$_PRG_mail = true;
		}
		else{
			$_PRG_mail = false;
		}

		if ($_PRG_passwd && $_PRG_mail){
			$base = new dbinter();
			$base->anadiruser($_POST['username'],$_POST['passwd'],$_POST['userinfo'],$_POST['usermail']);
			messagereplace("Te has registrado correctamente","index.php",0);
		}
		else {
			?>
			 <div style="text-align: center;">
			<?
			messagereplace("Has hecho algo mal. Revisa lo siguiente:","login.php?opt=register",10000);
			if($_PRG_mail == false):
				echo "El correo no está bien<br>";
			endif;
			if($_PRG_passwd == false):
				echo "Las contraseñas no coinciden<br>";
			endif;
			echo "En 10 segundos volverás a poder rellenar el formulario<br><br><br>";
			?>
			 </div>
			<?
		}

		//~ messagereplace("Has hecho algo mal. Revisa lo siguiente:","login.php?opt=register",10000);
		//~ if($_PRG_mail == false):
			//~ echo "El correo no está bien<br>";
		//~ endif;
		//~ if($_PRG_passwd == false):
			//~ echo "Las contraseñas no coinciden<br>";
		//~ endif;
		//~ echo "En 10 segundos volverás a poder rellenar el formulario<br><br><br>";
		?>
<!--
		 </div>
-->
		<?
	}
}
?>
	<? $html5->pagfooter(); ?>
</body>
</html>
