<?
$base = new SQLite3('apps.db');
		//Crear tabla de aplicaciones
    	$base->exec('CREATE TABLE apps (id integer UNIQUE PRIMARY KEY, name VARCHAR(30), category VARCHAR(20), url TEXT, image TEXT, tags TEXT, info TEXT, byuser VARCHAR(30), active INTEGER)');
    	$base->exec("INSERT INTO apps VALUES (NULL,'esomismo','Accesories','Esomismo', 'ruta', 'tags,tags2','ejemplo de una aplicación', 'admin', 1)");
    	$base->close();
?>
<?
$base = new SQLite3('users.db');
    	//Crear tabla de usuarios
    	$base->exec('CREATE TABLE users (id integer UNIQUE PRIMARY KEY, name VARCHAR(30), status INTEGER, password VARCHAR(250), info TEXT, email TEXT)');
    	$base->exec("INSERT INTO users VALUES (NULL,'admin',0,'21232f297a57a5a743894a0e4a801fc3','Administrador', 'email@example.com')");
        $base->close();
?>
<?
$base = new SQLite3('system.db');
		// Crear tabla de aplicaciones
    	$base->exec('CREATE TABLE config (id integer UNIQUE PRIMARY KEY, propiedad VARCHAR(100), valor VARCHAR(170))');
    	$base->exec("INSERT INTO config VALUES (NULL,'css','src/css/style.css')");
    	$base->close();
?>
