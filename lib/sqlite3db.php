
<?php
/*
 * 		file "sqlite3db.php" - daxosstore-web project
 * 		Este archivo maneja la base de datos que necesita el programa
 * 
 * 		Copyright (C) 2011 -2012 - by Víctor Fernández Rico <vfrico@gmail.com>
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
class dbinter {
    
	function abrirbase () {
		//abre base de datos de aplicaciones y usuarios	
		$db = new SQLite3('lib/apps.db') or die ("NO se puede abrir la base de datos aplicaciones");
		return $db;
	}
	
	function abrirbaseuser () {
		//Abre base de datos para info
		$db = new SQLite3('lib/users.db') or die ("NO se puede abrir la base de datos usuario");
		return $db;
	}

	function abrirbasesys () {
		//Abre base de datos para almacenar datos del sistema
		$db = new SQLite3('lib/system.db') or die ("NO se puede abrir la base de datos Textos");
		return $db;
	}
	
	function createapptable() {
		//Crea la tabla en la base de datos apps.db
		$base = $this->abrirbase();
		$base->exec('CREATE TABLE apps (id integer UNIQUE PRIMARY KEY, name VARCHAR(30), category VARCHAR(20), url TEXT, image TEXT, tags TEXT, info TEXT, byuser VARCHAR(30), active INTEGER)');
		$base->close();
		
	}
	
	function createuserstable() {
		//Crea tabla de usuarios en apps.db
		$base = $this->abrirbaseuser();
		$base->exec('CREATE TABLE users (id integer UNIQUE PRIMARY KEY, name VARCHAR(30), status INTEGER, password VARCHAR(250), info TEXT, email TEXT)');
		$base->close();
		
	}
	
	function createsystemtable() {
		//Crea tabla de usuarios en apps.db
		$base = $this->abrirbasesys();
		$base->exec('CREATE TABLE config (id integer UNIQUE PRIMARY KEY, propiedad VARCHAR(100), valor VARCHAR(170)');
		$base->close();
		
	}
	
	function getcss(){
		//Obtener el campo email del usuario seleccionado
		$base = $this->abrirbasesys();
		$resultado = $base->query("SELECT valor FROM config WHERE propiedad='css'");
		$times = 0;
		while ( $row = $resultado->fetchArray(SQLITE3_ASSOC)) { 
			$last = $row['valor'];
			$times++;
		}
		return $last;
		$base->close();
	}
	function setcss($sheet){
		$base = $this->abrirbasesys();
		$Accion = $base->exec("INSERT INTO config VALUES (NULL,'css','".$sheet."')");
		if ($Accion) return true;
		else return false;
		$base->close();
	}
	function anadirapp ($nombre, $category, $url, $pathimg, $tags, $info, $byuser,$active) {
		//Añade a la tabla apps de apps.db una nueva aplicación		
		// $active = 1;
		$base = $this->abrirbase();
		//~ echo "<br>";
		//~ echo "INSERT INTO apps VALUES (NULL,'".$nombre."','".$category."','".$url."','".$pathimg."', '".$tags."' , '".$info."' , '".$byuser."' , 1)";
		$base->exec("INSERT INTO apps VALUES (NULL,'".$nombre."','".$category."','".$url."','".$pathimg."', '".$tags."' , '".$info."' , '".$byuser."' , ".$active.")") or die ("<br>Fallo en sqlite3db.php");
		$base->close();
	}
	
	function updateapp ($nombre, $category, $url, $pathimg, $tags, $info, $byuser, $id, $active) {
		//Añade a la tabla apps de apps.db una nueva aplicación		
		// $active = 1;
		$base = $this->abrirbase();
		//~ echo "<br>";	
		if ($pathimg == false){
			$base->exec("UPDATE apps SET name='".$nombre."' , category='".$category."'  , url='".$url."' , tags='".$tags."' , info='".$info."', byuser='".$byuser."' , active='".$active."' WHERE id=".$id) or die ("<br>Fallo en sqlite3db.php");		
		}
		else {
			$base->exec("UPDATE apps SET name='".$nombre."' , category='".$category."'  , url='".$url."' , image='".$pathimg."', tags='".$tags."' , info='".$info."', byuser='".$byuser."' , active='".$active."' WHERE id=".$id) or die ("<br>Fallo en sqlite3db.php");	
		}	
		$base->close();
	}
	
	function anadiruser ($nombre, $password, $info, $email) {
		//The status of user is 1, admin is 0
		//The new users aren't administrator
		$status = 1;
		$password = md5($password);
		$base = $this->abrirbaseuser();
		$Accion = $base->exec("INSERT INTO users VALUES (NULL,'".$nombre."',".$status.",'".$password."', '".$info."','".$email."')");
		if ($Accion) return true;
		else return false;
		$base->close();
	}
	function edituseremail($nombre, $email) {
		//Cambia el email de un usuario
		$base = $this->abrirbaseuser();
		$Accion = $base->exec("UPDATE users SET email='".$email."' WHERE name='".$nombre."'");
		if ($Accion) return true;
		else return false;
		$base->close();
	}
	
	function edituserinfo($nombre, $info) {
		//cambia la información de un usuario
		$base = $this->abrirbaseuser();
		$Accion = $base->exec("UPDATE users SET info='".$info."' WHERE name='".$nombre."'");
		if ($Accion) return true;
		else return false;
		$base->close();
	}
	
	function editpassword($nombre, $password) {
		//Cambia la contraseña de un usuario
		$password = md5($password);
		$base = $this->abrirbaseuser();
		$Accion = $base->exec("UPDATE users SET password='".$password."' WHERE name='".$nombre."'");
		if ($Accion) return true;
		else return false;
		$base->close();
	}

	function readapps($category){
		//Devuelve un array
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
		//Comprueba si la contraseña de un usuario es correcta
		$pass = md5($pass);
		//~ print $pass;
		$base = $this->abrirbaseuser();
		$resultado = $base->query("SELECT password FROM users WHERE name='".$user."'");
		$times = 0;
		while ( $row = $resultado->fetchArray(SQLITE3_ASSOC)) {
			//Extrae de la base de datos la contraseña asociada al usuario dado
			$last = $row['password'];//última contraseña "escaneada"
			//~ echo $last;
			$times++; //devuelve cuántas veces está el usuario en la base de datos (para evitar errores)
		}
		if (isset($last) && $times <= 2){ //Si existe una contraseña asociada a un usuario && y aparece menos de 2 veces
			if($pass == $last) { //las contraseñas coinciden
				//~ echo "Usuario válido";
				return true;
			}
			else{
				//~ echo "Usuario no válido";
				return false;
			}
		}
		else {
			return false;
		}
	}

	function getAppFromId($id){
		//Obtener el campo información del usuario seleccionado
		$base = $this->abrirbase();
		$resultado = $base->query("SELECT * FROM apps WHERE id='".$id."'");
		$times = 0;
		while ( $row = $resultado->fetchArray(SQLITE3_ASSOC)) { 
			$id = $row['id'];
			$name = $row['name'];
			$category = $row['category'];
			$url = $row['url'];
			$image = $row['image'];
			$tags = $row['tags'];
			$info = $row['info'];
			$byuser = $row['byuser'];
			$active = $row['active'];
			$times++;
		}
		$salida = array(
			"id" => $id,
			"name"=>$name,
			"category"=>$category,
			"url"=>$url,
			"image"=>$image,
			"tags"=>$tags,
			"info"=>$info,
			"byuser"=>$byuser,
			"active"=>$active
			);
		return $salida;
	}

	function getinfo($user){
		//Obtener el campo información del usuario seleccionado
		$base = $this->abrirbaseuser();
		$resultado = $base->query("SELECT info FROM users WHERE name='".$user."'");
		$times = 0;
		while ( $row = $resultado->fetchArray(SQLITE3_ASSOC)) { 
			$last = $row['info'];
			$times++;
		}
		return $last;
	}

	function getemail($user){
		//Obtener el campo email del usuario seleccionado
		$base = $this->abrirbaseuser();
		$resultado = $base->query("SELECT email FROM users WHERE name='".$user."'");
		$times = 0;
		while ( $row = $resultado->fetchArray(SQLITE3_ASSOC)) { 
			$last = $row['email'];
			$times++;
		}
		return $last;
	}

	function isanadmin($user){
		//Devuelve boleano según si el usuario sea admin o no
		$base = $this->abrirbaseuser();
		$resultado = $base->query("SELECT status,password FROM users WHERE name='".$user."'");
		$times = 0;
		while ( $row = $resultado->fetchArray(SQLITE3_ASSOC)) { //Comprobamos que el usuario no exista varias veces
			$last = $row['status'];
			//~ echo $last;
			$times++;
		}
		if (isset($last) && $times == 1){ 
			if($last == 0) {
				//~ echo "Es admin";
				//echo $last;
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
