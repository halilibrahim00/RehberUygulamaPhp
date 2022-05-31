<?php
try{
    $db = new PDO('mysql:host=localhost;dbname=deneme','root','');
}catch(PDOException $e){
   echo  $e->getMessage();
} 

?>