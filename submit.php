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
    <div>
        <form action="appsubmit.php" method="post">
            Aplicación: <input type="text" name="appname" /><br>
<!--
            <input type="text" name="category" />
-->
            Categoría: 
                <select name=category>
                 <option value="Accesories">Accesories</option>
                 <option value="Internet">Internet</option>
                 <option value="Graphics">Graphics</option>                 
                 <option value="Games">Games</option>
                 <option value="Multimedia">Multimedia</option>
                 <option value="Office">Office</option>
                 <option value="Education">Education</option>
                 <option value="System">System</option>
                 <option value="Other">Other</option>
                 <option value="GOnline">Games Online</option>
                 <option value="Cloud">Apps en la nube</option>
                </select>
                
                <br>
            URL de la Aplicación: <input type="text" name="appurl" /> <br>
            <input type="submit">
        </form>
	</div>
	<footer>
		<img src="images/header/logo-daxweb.png" alt="Dax Web" class="navigationimages" style="margin: -10px 0px"/>
		Dax OS Store es un proyecto de Dax Web, está registrado bajo la licencia GPL

	</footer>
</body>
</html>
