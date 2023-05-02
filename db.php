<?php

$server="localhost";
$db="mentoriasdb";
$username="root";
$password="";

try{
    $con=new PDO("mysql:host=$server; dbname=$db", $username,$password);
}catch(Exception $ex){
    echo $ex->getMessage();
}

?>