<?$base = new SQLite3('apps.db');
    $base->exec('CREATE TABLE apps (id integer UNIQUE PRIMARY KEY, name TEXT, category TEXT, url TEXT)');
        $base->exec("INSERT INTO apps VALUES (NULL,'holamundo','Other','Esomismo')");
        $base->close();
        ?>
