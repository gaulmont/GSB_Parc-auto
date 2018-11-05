<?php
function connexion()
{ 
$dsn='mysql:host=localhost;dbname=gsbapplifrais';
$utilisateur='root';
$motdepasse='';
$ok=true;
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND    => "SET NAMES utf8");
try{
	$bdd=new PDO($dsn,$utilisateur,$motdepasse,$options);
}
catch(PDOException $e){
	$ok=false;
}
return $bdd;
}
?>