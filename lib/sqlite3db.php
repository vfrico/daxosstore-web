
<?php
class dbinter {
    
	function abrirbase () {
		//abre base de datos de aplicaciones y usuarios	
		$db = new SQLite3('lib/apps.db') or die ("NO se puede abrir la base de datos");
		return $db;
	}
	
	function abrirbasetxt () {
		//Abre base de datos para info
		$db = new SQLite3('lib/textos.db') or die ("NO se puede abrir la base de datos");
		return $db;
	}
	
	function createapptable() {
		//Crea la tabla en la base de datos apps.db
		$base = $this->abrirbase();
		$base->exec('CREATE TABLE apps (id integer UNIQUE PRIMARY KEY, name VARCHAR(30), category VARCHAR(20), url TEXT, image TEXT, tags TEXT, info TEXT, byuser VARCHAR(30), active INTEGER)');
		$base->close();
		
	}
	
	function createuserstable() {
		//Crea tabla de usuarios en apps.db
		$base = $this->abrirbase();
		$base->exec('CREATE TABLE users (id integer UNIQUE PRIMARY KEY, name VARCHAR(30), status INTEGER, password VARCHAR(250), info TEXT, email TEXT)');
		$base->close();
		
	}
	
	function anadirapp ($nombre, $category, $url, $pathimg, $tags, $info, $byuser) {
		//Añade a la tabla apps de apps.db una nueva aplicación		
		$active = 1;
		$base = $this->abrirbase();
		echo "<br>";
		echo "INSERT INTO apps VALUES (NULL,'".$nombre."','".$category."','".$url."','".$pathimg."', '".$tags."' , '".$info."' , '".$byuser."' , 1)";
		$base->exec("INSERT INTO apps VALUES (NULL,'".$nombre."','".$category."','".$url."','".$pathimg."', '".$tags."' , '".$info."' , '".$byuser."' , 1)") or die ("<br>Fallo en sqlite3db.php");
		$base->close();
	}
	
	function anadiruser ($nombre, $password, $info, $email) {
		//The status of user is 1, admin is 0
		//The new users aren't administrator
		$status = 1;
		$password = md5($password);
		$base = $this->abrirbase();
		$base->exec("INSERT INTO users VALUES (NULL,'".$nombre."',".$status.",'".$password."', '".$info."','".$email."')");
		$base->close();
	}
	function edituseremail ($nombre, $email) {
		//Cambia el email de un usuario
		$password = md5($password);
		$base = $this->abrirbase();
		$base->exec("UPDATE users SET password='".$email."' WHERE user='".$nombre."'");
		$base->close();
	}
	
	function edituserinfo ($nombre, $info) {
		//cambia la información de un usuario
		$password = md5($password);
		$base = $this->abrirbase();
		$base->exec("UPDATE users SET info='".$info."' WHERE user='".$nombre."'");
		$base->close();
	}
	
	function editpassword ($nombre, $password) {
		//Cambia la contraseña de un usuario
		$password = md5($password);
		$base = $this->abrirbase();
		$base->exec("UPDATE users SET password='".$password."' WHERE user='".$nombre."'");
		$base->close();
	}

	function readapps($category){
		//Devuelve un array
		$base = $this->abrirbase();
		$resultado = $base->query("SELECT * FROM apps WHERE category='".$category."'");
		//~ $arrayexit = $resultado->fetchArray(SQLITE3_NUM);
		$base->close();
		//~ print_r($arrayexit);
		echo "<br>";
		//~ echo "SELECT * FROM apps WHERE category LIKE '%".$category."%'";
		return $arrayexit;
	}
	
	function query($query) {
		$base = $this->abrirbase();
		$resultado = $base->query($query);
		
		return $resultado;
		$base->close();
	}
	function checkuser($user,$pass) {
		//Comprueba si la contraseña de un usuario es correcta
		$pass = md5($pass);
		//~ print $pass;
		$base = $this->abrirbase();
		$resultado = $base->query("SELECT password FROM users WHERE name='".$user."'");
		$times = 0;
		while ( $row = $resultado->fetchArray(SQLITE3_ASSOC)) {
			//Extrae de la base de datos la contraseña asociada al usuario dado
			$last = $row['password'];//última contraseña "escaneada"
			//~ echo $last;
			$times++; //devuelve cuántas veces está el usuario en la base de datos (para evitar errores)
		}
		if (isset($last) && $times <= 2){ //Si existe una contraseña asociada a un usuario && y aparece menos de 2 veces
			if($pass == $last) { //las contraseñas coinciden
				//~ echo "Usuario válido";
				return true;
			}
			else{
				//~ echo "Usuario no válido";
				return false;
			}
		}
	}
	
	function isanadmin($user){
		//Devuelve boleano según si el usuario sea admin o no
		$base = $this->abrirbase();
		$resultado = $base->query("SELECT status,password FROM users WHERE name='".$user."'");
		$times = 0;
		while ( $row = $resultado->fetchArray(SQLITE3_ASSOC)) { //Comprobamos que el usuario no exista varias veces
			$last = $row['status'];
			//~ echo $last;
			$times++;
		}
		if (isset($last) && $times <= 2){ 
			if($last == 0) {
				//~ echo "Es admin";
				return true;
			}
			else{
				//~ echo "Usuario no válido";
				return false;
			}
		}
	}
}
?>
<!--
$db = new SQLite3('apps.db');

//~ $db->exec('CREATE TABLE foo (bar STRING)');
$db->exec("INSERT INTO foo (bar) VALUES ('This is a test')");

$result = $db->query('SELECT bar FROM foo');
echo "\n";
echo $result->fetchArray();
//~ var_dump($result->fetchArray());
$db->close();
-->

