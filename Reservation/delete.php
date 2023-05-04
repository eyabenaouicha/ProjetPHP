<?php
include_once("../connexion.php");
if(!empty($_GET["id"])){
    // var_dump($_GET["id"]);
    $pdo=new connect();
    $query="delete from reservation where id=:id";
    $pdostmt=$pdo->prepare($query);
    $pdostmt->execute(["id"=>$_GET["id"]]);
    $pdostmt->closeCursor();
    header("location:index.php");

}
?>