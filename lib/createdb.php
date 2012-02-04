<?$base = new SQLite3('apps.db');
    $base->exec('CREATE TABLE apps (id integer UNIQUE PRIMARY KEY, name TEXT, category TEXT, url TEXT, image TEXT)');
        $base->exec("INSERT INTO apps VALUES (NULL,'holamundo','Other','url','imagepath')");
        $base->close();
        ?>
