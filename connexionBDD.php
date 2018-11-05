<?php

    $user="root";
    $pass="";
    $ok="true";
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    
    try{
    $bdd=new PDO('mysql:host=localhost;dbname=gsbapplifrais;charset=utf8',$user,$pass,$options);
    }

?>