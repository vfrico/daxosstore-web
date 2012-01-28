<?php
include('lib/sqlite3db.php');
//Conectamos base de datos:
$base = new dbinter;
//Enviamos datos a la base
$base->anadirapp($_POST["appname"],$_POST["category"],$_POST["appurl"]);

?>

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
            Aplicación: <? echo $_POST["appname"]; ?> <br>
            Categoría: <? echo $_POST["category"]; ?> <br>
            URL de la Aplicación: <? echo $_POST["appurl"]; ?> <br>
	<footer>
		<img src="images/header/logo-daxweb.png" alt="Dax Web" class="navigationimages" style="margin: -10px 0px"/>
		Dax OS Store es un proyecto de Dax Web, está registrado bajo la licencia GPL

	</footer>
</body>
</html>
