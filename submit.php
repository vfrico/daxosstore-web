<?
/*
 * 		file "submit.php" - daxosstore-web project
 * 		With this file you can submit a new app to the "store"
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
$html5 = new htmlpage();

?>
<!DOCTYPE HTML>
<html>
<? $html5->headersection(""); ?>
<body>
	<? $html5->heading(); ?>
    <div>
        <form action="appsubmit.php" method="post" enctype="multipart/form-data"	>
            Aplicación: <input type="text" name="appname" /><br>
<!--
            <input type="text" name="category" />
-->
            Categoría: 
                <select name=category>
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
                
                <br>
            URL de la Aplicación: <input type="text" name="appurl" /> <br>
            <INPUT TYPE=FILE NAME="imagefile" id=imagefile>
            <input type="submit">
        </form>
	</div>
<? $html5->pagfooter(); ?>
</body>
</html>
