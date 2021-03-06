<?
/*
 * 		file "login.php" - daxosstore-web project
 * 		This page is for login into the web
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
include_once('lib/forms.php');
$html5 = new htmlpage();
@$option = $_GET['opt'];
?>

<!DOCTYPE HTML>
<html lang=es>
	<? $html5->headersection("");?>
<body>
	<? $html5->heading(); ?>
	<div class=medio>
		<h1 style="text-align:center;">Registrarse como usuario</h1>
		<? 
		if($option == 'register'){
			registro();
		}
		else{
			loginform(true);
		}
		?>
	</div>
	<? $html5->pagfooter(); ?>
</body>
</html>

