<?php 
include_once 'header.php' ;

if(!isset($_SESSION['login'])){
    header("location:login.php");
}else{

    echo '<h4>خوش آمدین</h4>'.$_SESSION['login'];
}


?>