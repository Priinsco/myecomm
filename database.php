<?php

$hostname= "localhost";
$username="root";
$dbname="myecomm";
$password="";
$charset = "utf8";

try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$dbname;charset=$charset", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 } catch(PDOException $e){
    echo "Echec de connexion à la base de données: ". $e->getMessage();
 
}