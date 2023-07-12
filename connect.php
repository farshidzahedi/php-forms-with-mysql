<?php 

function connect_db(){
    try{
        $pdo= new PDO("mysql:host=mysql;dbname=phptest","root","v!M6m2RG4Y!7");
    }
    catch(Exception $e){
       echo $e->getMessage();
    }
    
    return $pdo;

}

