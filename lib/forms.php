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
	<input class="inputxt" id="usuario" type="text" style="text-align:center;" name="usuario" placeholder="Usuario" size=7 />
		<?
		if ($label) {
			echo '<label for="contrasena">Contraseña:</label>';
		}
		?>
	<input class=inputxt id="contrasena" style="text-align:center;" type="password" name="contrasena" placeholder="Contraseña" size=7 /><br>
	<div style="text-align: center;"><input class=inputbut type="submit" value="Entrar"> | <div class="inputbut" style="display:inline-block;padding:4px 0 0px 0;height: 20px;color:#FDFCFD;"><a href="login.php?opt=register">Registrar</a></div></div>
	</form>
	<?
}

function appform() {
	?>
	        <section style="text-align:center;">
            <header>
                <h1>Enviar una aplicación</h1>
            </header>
            <p>Poder de usuario:
                <? 
                if ($_SESSION['isadmin']) echo "Administrador<br>La aplicación que envíes será visible en cuanto la publiques";
                else echo "Usuario <b>sin permisos de administrador</b>. <br>Necesitarás que un administrador te apruebe la aplicación antes de poder verla disponible para descarga en la tienda. No obstante, podrás cambiar sus datos cuando quieras.";
                ?>
            </p>
            <br>
            
            <form action="appsubmit.php" method="post" enctype="multipart/form-data"	>
				<table style="margin: 0px auto; text-align:left;" id="tablesubmit" >
                    <tr>
                        <td><label for="appname">Aplicación:</label></td>
        				<td><input class=inputxt style="width:150px;" type="text" name="appname" /><br></td>
                    </tr>
            <!--<input type="text" name="category" />
-->
            <tr>
            <td>Categoría: </td>
            <td>
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
            </td>
            </tr>
            <tr>
                <td><label for="appurl">URL de la aplicación:</label></td>
                <td><input class=inputxt style="width:300px;" type="text" name="appurl" /> </td>
            </tr>
            <tr>
                <td><label for="appname">Imagen de la Aplicación:</label></td>
                <td><input  class=inputxt type=FILE name="imagefile" id='imagefile'> </td>
            </tr>
            <tr>
                <td><label for="appname">Etiquetas:</label></td>
                <td><input class=inputxt type="text" style="width:120px;" name="tags" /></td>
            </tr>
            <tr>
                <td><label for="appname">Información:</label></td>
                <td><input class=inputxt type="text" style="width:250px;" name="info" /> </td>
            </tr>

                <? if($_SESSION['isadmin']) { ?>
                <tr><td><label for="active">¿Activa?:</label></td>
                <td class="squaredThree">
                    <input id='squaredThree' type="checkbox" name="active" />
                </td>
                </tr>
                <? } ?>
                
            <tr><td colspan="2" align="center"><input style="margin-top: 20px" class=inputbut type="submit" value="Enviar datos"></td></tr>
        </table>
        </form>
        </section>
	<?
}

function registro(){
		?>
	        <form action="register.php" method="post">
                <table style="margin: 0px auto; text-align:left;" id="tableregistro" >
                    <tr>
        				<td><label for="username" >Nombre de Usuario:</label></td>
        				<td><input class=inputxt style="width:150px;" type="text" name="username" /></td>
    				</tr>
                    <tr>
                        <td><label for="passwd">Contraseña:</label>
                        <td><input class=inputxt type="password" name="passwd" /> </td>
                    <tr>
                        <td><label for="passwd2">Repita contraseña:</label></td>
                        <td><input class=inputxt type="password" name="passwd2" /> </td>
                    </tr>
                    <tr>
                        <td><label for="usermail">Correo Electrónico:</label></td>
        				<td><input class=inputxt type="email" style="width:200px;" name="usermail" /></td>
                    </tr>
                    <tr>
                        <td><label for="userinfo">Información:</label></td>
        				<td><textarea class=inputxt style="display:block; height: 70px; width: 300px; " name="userinfo"> </textarea></td>
    				</tr>
                    <tr><td colspan="2" align="center"><input style="margin-top: 20px" class=inputbut type="submit" value="Registrarme"></td></tr>
                </table>
            
        </form>
<!--
        <b>Nota: Está en pleno desarrollo, por favor, no lo uses, podría ocurrir que tu contraseña no se guardara encriptada.</b>
-->
	<?
}

function actualizarpass(){
		?>
		<article style="text-align: center;">
	        <form action="register.php?opt=editpass" method="post">
                <label for="passwdact">Contraseña actual:</label>
                <input class=inputxt type="password" name="passwdact" /> 
                <br>
                <br>
                <label for="passwd">Nueva contraseña:</label>
                <input class=inputxt type="password" name="passwd" /> 
                <br>
                <label for="passwd2">Repite la contraseña:</label>
                <input class=inputxt type="password" name="passwd2" /> 
                <br>
            <input class=inputbut type="submit" value=Cambiar>
        </form>
        </article>
	<?
}
function actualizaremail($old){
        ?>
        <article style="text-align: center;">
            <form action="register.php?opt=editmail" method="post">
                <label for="usermail">Correo Electrónico:</label>
                <input class=inputxt type="text" style="width: 140px;" placeholder="<? echo $old; ?>"name="usermail" />
                <br>
            <input class=inputbut type="submit" value=Cambiar>
        </form>
        </article>
    <?
}
function actualizarinfo($old){
        ?>
        <article style="text-align: center;">
            <form action="register.php?opt=editinfo" method="post">
                <label for="userinfo">Información:</label>
                <textarea class=inputxt style="display:block; height: 60px; width: 230px; margin: 10px auto; " name="userinfo"> <? echo $old;?></textarea>
                <br>
            <input class=inputbut type="submit" value=Cambiar>
        </form>
        </article>
    <?
}
?>
