
<?php
class dbinter {
    
	function abrirbase () {
		$db = new SQLite3('lib/apps.db');
		return $db;
	}

	function createapptable() {
		$base = $this->abrirbase();
		$base->exec('CREATE TABLE apps (id integer UNIQUE PRIMARY KEY, name TEXT, category TEXT, url TEXT)');
		$base->close();
		
	}
	
	function anadirapp ($nombre, $category, $url) {
		$base = $this->abrirbase();
		$base->exec("INSERT INTO apps VALUES (NULL,'".$nombre."','".$category."','".$url."')");
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

