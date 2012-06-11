<?
/*
 * 		file "lib/forms.php" - daxosstore-web project
 * 		This file has functions to print some forms
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
function loginform($label) {
	?>
	<form action="session.php" method="post" >
		<?
		if ($label) {
			echo '<label for="usuario">Usuario:</label>';
		}
		?>
	<input class="inputxt" id="usuario" type="text" name="usuario" placeholder="Usuario" size=7 />
		<?
		if ($label) {
			echo '<label for="contrasena">Contraseña:</label>';
		}
		?>
	<input class=inputxt id="contrasena" type="password" name="contrasena" placeholder="Contraseña" size=7 /><br>
	<center><input class=inputbut type="submit" value="Entrar"> | <a href="login.php?opt=register"><input class=inputbut type=button  value="Registrar"></a></center>
	</form>
	<?
}

function appform() {
	?>
	        <form action="appsubmit.php" method="post" enctype="multipart/form-data"	>
				<label for="appname">Aplicación:</label>
				<input class=inputxt type="text" name="appname" /><br>
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
                
                <label for="appurl">URL de la aplicación:</label>
                <input class=inputxt type="text" name="appurl" /> 
                <br>
                <label for="appname">Imagen de la Aplicación:</label>
                <input  class=inputxt type=FILE name="imagefile" id=imagefile> 
                <br>
                <label for="appname">Etiquetas:</label>
                <input class=inputxt type="text" name="tags" /> 
                <br>
                <label for="appname">Información:</label>
                <input class=inputxt type="text" name="info" /> 
                <br>
            <input class=inputbut type="submit" value=Enviar>
        </form>
	<?
}

function registro(){
		?>
	        <center>
	        <form action="register.php" method="post">
				<label for="username">Nombre de Usuario:</label>
				<input class=inputxt type="text" name="username" />
				<br>
                <label for="passwd">Contraseña:</label>
                <input class=inputxt type="password" name="passwd" /> 
                <br>
                <label for="passwd2">Repita contraseña:</label>
                <input class=inputxt type="password" name="passwd2" /> 
                <br>
                <label for="usermail">Correo Electrónico:</label>
				<input class=inputxt type="text" name="usermail" />
				<br>
                <label for="userinfo">Información:</label>
				<textarea class=inputxt style="display:block; height: 60px; width: 230px; " name="userinfo"> </textarea>
				<br>
            <input class=inputbut type="submit" value=Enviar>
        </form>
<!--
        <b>Nota: Está en pleno desarrollo, por favor, no lo uses, podría ocurrir que tu contraseña no se guardara encriptada.</b>
-->
        </center>
	<?
}

function actualizaremail(){
		?>
		<center>
	        <form action="register.php?opt=editmail" method="post">
				<label for="username">Nombre de Usuario:</label>
				<input class=inputxt type="text" name="username" />
				<br>
                <label for="passwd">Contraseña:</label>
                <input class=inputxt type="password" name="passwd" /> 
                <br>
                <label for="passwd2">Repita contraseña:</label>
                <input class=inputxt type="password" name="passwd2" /> 
                <br>
                <label for="usermail">Correo Electrónico:</label>
				<input class=inputxt type="text" name="usermail" />
				<br>
                <label for="userinfo">Información:</label>
				<textarea class=inputxt style="display:block; height: 60px; width: 230px; " name="userinfo"> </textarea>
				<br>
            <input class=inputbut type="submit" value=Enviar>
        </form>
        </center>
	<?
}
?>
