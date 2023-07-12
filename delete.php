<?php


$id= $_GET['id'];
include_once 'connect.php';

$pdo=connect_db();
$query=$pdo->prepare("DELETE FROM info_tbl WHERE id='$id'");
$query->execute();

header("location:list.php");


?>