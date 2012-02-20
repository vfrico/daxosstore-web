<?
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
	<input class="inputxt id="contrasena" type="password" name="contrasena" placeholder="Contraseña" size=7 /><br>
	<center><input class=inputbut type="submit" value="Entrar"> | <a href="login.php"><input class=inputbut type=button  value="Registrar"></a></center>
	</form>
	<?
}
?>
