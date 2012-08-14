<?        $base = 	new SQLite3('apps.db');
$base->exec("INSERT INTO apps VALUES (NULL,'esomismo','Accesories','Esomismo', 'ruta', 'tags,tags2','ejemplo de una aplicación')");
$base->close();
        ?>
