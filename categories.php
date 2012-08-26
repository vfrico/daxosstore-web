<?
/*
 * 		file "categories.php" - daxosstore-web project
 * 		This file shows the apps by category
 * 
 * 		Copyright (C) 2011 - 2012 - by Víctor Fernández Rico <vfrico@gmail.com>
 * 		Released under GPL3 license (See COPYNG file or http://www.gnu.org/copyleft/gpl.html)
 * 
 *      This file is the main on the project
 * 
 *      This program is free software; you can redistribute it and/or modify
 *      it under the terms of the GNU General Public License as published by
 *      the Free Software Foundation; either version 2 of the License, or
 *      (at your option) any later version.
 *      
 *      This program is distributed in the hope that it will be useful,
 *      but WITHOUT ANY WARRANTY; without even the implied warranty of
 *      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *      GNU General Public License for more details.
 *      
 *  	You should have received a copy of the GNU General Public License
 * 	    along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *      
 */
 session_start();
include('lib/html5.php');
$html5 = new htmlpage();
?>
<!DOCTYPE HTML>
<html>
<? $html5->headersection(""); ?>
<body>
	<? $html5->heading(); ?>
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
?>
<div id=applist>
	<article>
		<table cellspacing=1px>
<?

//~ for ($i=1; $i <= 10; $i++) {
while ($row = $salida->fetchArray(SQLITE3_ASSOC)) {
if($row['active'] == 1){
	?>
		<tr>
			<td class="applogo">
				<? 	echo "<img src='"."uploadedimgs/".$row['image']."' class=logo />"; ?>
				<br>
				<? echo "<a href='".$row['url']."'>Instalar</a>"; ?>
			</td>
			<td class="container">
			<header class="nameapp">
				<? 	
				echo "<h1><a href='apps.php?id=".$row['id']."'>".$row['name']."</a></h1>";
				//~ echo "<h2>Categoria: ".$row['category']."</h2>";
				?>
			</header>
			<section class="information">
				<? echo $row['info']; ?>
			</section>
			</td>
		</tr>

	<?
	//~ $salida =  $base->query("SELECT * FROM apps WHERE category='".$varget."'");
	//~ echo "<h1><a href='".$row['url']."'>".$row['name']."</a></h1>";
	//~ echo "<img src='"."uploadedimgs/".$row['image']."' class=logo />";
	//~ echo "<h2>Categoria: ".$row['category']."</h2>";
	//~ $salida = $base->readapps($varget);
	//~ $arrayexit = $salida->fetchArray(SQLITE3_ASSOC);
	//~ print_r($row);
	//~ var_dump($row);
}
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
		</table>
	</article>
	</div>
	<? $html5->pagfooter(); ?>
</body>
</html>

