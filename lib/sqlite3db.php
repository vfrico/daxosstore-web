
<?php
class dbinter {
    
	function abrirbase () {
		$db = new SQLite3('lib/apps.db');
		return $db;
	}

	function createapptable() {
		$base = $this->abrirbase();
		$base->exec('CREATE TABLE apps (id integer UNIQUE PRIMARY KEY, name VARCHAR(30), category VARCHAR(20), url TEXT, image TEXT, tags TEXT, info TEXT)');
		$base->close();
		
	}
	
	function createuserstable() {
		$base = $this->abrirbase();
		$base->exec('CREATE TABLE users (id integer UNIQUE PRIMARY KEY, name VARCHAR(30), status INTEGER, password VARCHAR(200), info TEXT)');
		$base->close();
		
	}
	
	function anadirapp ($nombre, $category, $url, $pathimg, $tags, $info) {
		$base = $this->abrirbase();
		$base->exec("INSERT INTO apps VALUES (NULL,'".$nombre."','".$category."','".$url."','".$pathimg."', '".$tags."' , '".$info."')");
		$base->close();
	}
	
	function anadiruser ($nombre, $password, $info) {
		//The status of user is 1, admin is 0
		//The new users aren't administrator
		$status = 1;
		$base = $this->abrirbase();
		$base->exec("INSERT INTO users VALUES (NULL,'".$nombre."',".$status.",'".$password."', '".$info."')");
		$base->close();
	}

	function readapps($category){
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
		$pass = md5($pass);
		//~ print $pass;
		$base = $this->abrirbase();
		$resultado = $base->query("SELECT password FROM users WHERE name='".$user."'");
		$times = 0;
		while ( $row = $resultado->fetchArray(SQLITE3_ASSOC)) {
			$last = $row['password'];
			//~ echo $last;
			$times++;
		}
		if (isset($last) && $times <= 2){
			if($pass == $last) {
				//~ echo "Usuario válido";
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

