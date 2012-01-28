<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Language" content="es-ES" />
	<meta http-equiv="content-type" content="text/html;charset=UTF-8">
	<title>Dax OS Store</title>
	<link href='src/css/style.css' rel="stylesheet" type="text/css" media="all">
</head>
<body>
	<nav>
		<ul id="navegacion">
			<li><a href="http://www.socialnet.zobyhost.com/"><img class="navigationimages" alt="Linux Dax Web" src="images/header/logo-daxweb.png"></a></li>
			<li><img class="navigationimages" alt="Actualizar Dax OS" src="images/header/daxos-update.png"></li>
			<li><a href="http://www.socialnet.zobyhost.com/buscador/site/index_es.html"><img class="navigationimages" alt="Buscador" src="images/header/buscador.png"></a></li>
			<li><a href="version.html"><img class="navigationimages" alt="Versión" title="Versión 0.3" src="images/header/daxosstore-info.png"></a></li>
		</ul>
	</nav>
	<br>
	<br>
	<br>
	<header>
		<h1><img class="cabezal" alt="" src="images/header/cabezal.png"></h1>
	</header> 
            <?
include('lib/sqlite3db.php');
$varget = $_GET["cat"];

//~ switch ($varget) {
    //~ case "Other":
        //~ echo "Print Other";
        //~ break;
    //~ case "Internet":
        //~ echo "Caso internet";
        //~ break;
    //~ case "Accesories":
		//~ echo "Accesorios";
		//~ break;
//~ }


$base = new SQLite3('lib/apps.db');
//~ $base = new dbinter;
//~ $varget = "Accesories";
$salida =  $base->query("SELECT * FROM apps WHERE category='".$varget."'");


//~ for ($i=1; $i <= 10; $i++) {
while ($row = $salida->fetchArray(SQLITE3_ASSOC)) {
	
	//~ $salida =  $base->query("SELECT * FROM apps WHERE category='".$varget."'");
	echo "<h1><a href='".$row['url']."'>".$row['name']."</a></h1>";
	echo "<h2>Categoria: ".$row['category']."</h2>";
	//~ $salida = $base->readapps($varget);
	//~ $arrayexit = $salida->fetchArray(SQLITE3_ASSOC);
	//~ print_r($row);
	var_dump($row);
	echo "<br>";
}
//~ $base->close();
//~ $base->close();
//~ echo count($salida);
//~ for($i=0;$i<count($salida);$i++) {
    //~ echo $salida['name'];
    //~ echo "<br>";
    //~ echo $i;
//~ }
?>
	<footer>
		<img src="images/header/logo-daxweb.png" alt="Dax Web" class="navigationimages" style="margin: -10px 0px"/>
		Dax OS Store es un proyecto de Dax Web, está registrado bajo la licencia GPL

	</footer>
</body>
</html>

