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
	<div>
<?
// switch (@$_GET['opt']) {
// 	case "editmail":
// 		// echo "Editar datos del usuario";
// 		break;
// 	default:
// 		// echo "nada";
// 		break;
// }
$dbinter = new dbinter();

if (@$_GET['opt']=='editmail') 
{ //Cambiar el correo del usuario
	if(isset($_SESSION['user'])){//¿Sesión iniciada?
		if (comprobar_email(@$_POST['usermail'])){ 
			//El correo está bien introducido
			$resultado = $dbinter->edituseremail($_SESSION['user'], $_POST['usermail']);	//Se inserta en la base de datos
			if ($resultado){ //Comprueba si ha habido algún error
				echo "<br>";
				echo "<br>";
				message2("Has cambiado el correo del usuario ".$_SESSION['user']." a <strong>".$_POST['usermail']."</strong>.","admin.php?opt=user",5000);
				echo "<br>";
			}
			else {
				message2("Ha habido un error. Inténtalo de nuevo","admin.php?opt=user",3000);
			}
		}
		else{
			echo "<br>";
			echo "<br>";
			message2("El email ".$_POST['usermail']." no es un email válido","admin.php?opt=user",3000);
			echo "<br>";
		}
		
	}
	else {
		messagereplace("No has iniciado sesión, por lo que no puedes modificar ningún dato","login.php",3000);
	}
}

elseif (@$_GET['opt']=='editpass') 
{ //Cambiar la contraseña del usuario
	if(isset($_SESSION['user'])){ //¿Sesión iniciada?
		$password = $dbinter->checkuser($_SESSION['user'],$_POST['passwdact']);
		if ($password && $_POST['passwd'] == $_POST['passwd2']){ //La contraseña actual debe ser correcta y las contraseñas nuevas han de ser iguales
			$resultado = $dbinter->editpassword($_SESSION['user'], $_POST['passwd2']);
			if ($resultado){
				echo "<br>";
				echo "<br>";
				message2("Has cambiado la contraseña del usuario ".$_SESSION['user'].".","admin.php?opt=user",5000);
				echo "<br>";
			}
			else{
				message2("Ha habido un error. Inténtalo de nuevo","admin.php?opt=user",3000);	
			}
		}

		else{
			echo "<br>";
			echo "<br>";
			message2("Comprueba que la contraseña que has introducido es la que tenías hasta ahora y que las nuevas contraseñas que has introducido coinciden","admin.php?opt=user",6000);
			echo "<br>";
		}
	}
	else {
		echo "<br>";
		echo "<br>";
		messagereplace("No has iniciado sesión, por lo que no puedes modificar ningún dato","login.php",3000);
		echo "<br>";
	}
}
elseif (@$_GET['opt']=='editinfo') 
{ //Cambiar la información del usuario
	if(isset($_SESSION['user'])){//¿Sesión iniciada?
		$resultado = $dbinter->edituserinfo($_SESSION["user"],$_POST['userinfo']);
		if ($resultado) //Se inserta la información en la base de datos
		{
			echo "<br>";
			echo "<br>";
			message2("Has cambiado la información del usuario ".$_SESSION['user']." a <br><p>".$_POST['userinfo']."</p>","admin.php?opt=user",5000);
			echo "<br>";	
		}
		else{
			message2("Ha habido un error. Inténtalo de nuevo","admin.php?opt=user",3000);
		}
		
	}
	else {
		echo "<br>";
		echo "<br>";
		messagereplace("No has iniciado sesión, por lo que no puedes modificar ningún dato","login.php",3000);
		echo "<br>";
	}
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
	</div>
	<? $html5->pagfooter(); ?>
</body>
</html>
