<?
/*
 * 		file "submit.php" - daxosstore-web project
 * 		With this file you can submit a new app to the "store"
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
include_once('lib/forms.php');
$html5 = new htmlpage();

?>
<!DOCTYPE HTML>
<html>
<? $html5->headersection(""); ?>
<body>
	<? $html5->heading(); ?>
    <div class=medio>
		<?
			appform();
		?>
	</div>
<? $html5->pagfooter(); ?>
</body>
</html>
