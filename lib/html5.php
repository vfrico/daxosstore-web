<?php
/*
 * 		file "lib/html5.php" - daxosstore-web project
 * 		Permite que todas las páginas sean iguales entre sí
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
include_once('forms.php');
include_once('sqlite3db.php');
class htmlpage {
	function headersection($title) {
		if ($title =="") {
			$title = "Dax OS Store";
		}
		else {
			$title = "Dax OS Store | ".$title;
		}
		?>
		<head>
			<meta charset="UTF-8">
			<title><? echo $title; ?></title>
			<link href='<? $dbuser = new dbinter();	echo $dbuser->getcss(); ?>' id="hojaestilo" rel="stylesheet" type="text/css" media="all">
			<link rel="shortcut icon" href="favicon.ico">
			<script type="text/javascript" src="src/js/cambiarcss.js"></script>
		</head>
		<?
	}
	
	function heading() {
		?>
		<nav>
		<ul id="navegacion">
<!--
			<li><a href="http://www.socialnet.zobyhost.com/"><img class="navigationimages" alt="Linux Dax Web" src="images/header/logo-daxweb.svg"></a></li>
-->
			<li><a href="http://www.daxos.org/buscador/site/index_es.html"><img class="navigationimages" alt="Buscador" src="images/header/search.svg"></a></li>
			<li><a href="info.php?id=version"><img class="navigationimages" alt="Versión" title="Versión 0.3" src="images/header/engine.svg"></a></li>
			<li><a href="admin.php"><img class="navigationimages" alt="Versión" src="images/header/manage.svg"></a></li>
		</ul>
		</nav>
		<div id="login" class="fondogeneral" style="padding: 10px 20px">
			
		<?
		if (!isset($_SESSION['user'])){
			loginform(false);
		}
		else {
			echo "Has iniciado sesión como: ".$_SESSION['user'];
			echo "<br><center><a href=\"logout.php\">Cerrar sesión</a>";
		}
		?>		
		</div>

		<header id="brand">
			<h1><a href="index.php"><img class="cabezal" alt="Dax OS Store" src="images/header/cabezal.svg"></a></h1>
		</header>
		<?
	}
	
	function pagfooter() {
		?>
		<footer>
		<img src="images/header/logo-daxweb.svg" alt="Dax Web" class="navigationimages" style="margin: -10px 0px"/>
		Dax OS Store es un proyecto de Dax Web, está registrado bajo la licencia GPL
		</footer>
		<?
	}
} // Close class

function notadmin() {
	?>
	<h1>No estás autorizado a ver esta página</h1>
	<script type="text/javascript">
		setTimeout('location.replace("index.php")',5500);
	</script>
	<?
}
function messagereplace($mensaje,$pagina,$tiempo) {
	?>
	<div style="text-align: center;" class="messystem">
	<h1><? echo $mensaje;?></h1>
	<? if ($tiempo != 0 || $tiempo > 0){  ?> 
	<script type="text/javascript">
		setTimeout('location.replace("<? echo $pagina;?>")',<? echo $tiempo;?>);
	</script>
	</div>
	<?
}
}
function message2($mensaje,$pagina,$tiempo) {
	?>
	<div style="text-align: center;" class="messystem2">
	<h2><? echo $mensaje;?></h2>
	<? if ($tiempo != 0 || $tiempo > 0){ //El mensaje no se quita si pones tiempo 0 ?> 
	<script type="text/javascript">
		setTimeout('location.replace("<? echo $pagina;?>")',<? echo $tiempo;?>);
	</script>
	</div>
	<?
}
}
function comprobar_email($email){
	//Extraída de Desarrollo web (http://www.desarrolloweb.com/articulos/990.php)
    $mail_correcto = 0;
    //compruebo unas cosas primeras
    //  Mayor de 6 caracteres      sólo una arrova                      
    if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){
       if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) {
          //miro si tiene caracter .
          if (substr_count($email,".")>= 1){
             //obtengo la terminacion del dominio
             $term_dom = substr(strrchr ($email, '.'),1);
             //compruebo que la terminación del dominio sea correcta
             if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){
                //compruebo que lo de antes del dominio sea correcto
                $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1);
                $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1);
                if ($caracter_ult != "@" && $caracter_ult != "."){
                   $mail_correcto = 1;
                }
             }
          }
       }
    }
    if ($mail_correcto)
       return 1;
    else
       return 0;
} 
?>
