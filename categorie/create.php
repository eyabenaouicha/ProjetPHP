<?php 
include_once("connexion.php");
if(!empty($_POST["inputnom"])&&!empty($_POST["inputprenom"])&&!empty($_POST["inputemail"])){
    $pdo=new connect();
    $query="insert into categorie(type) values(:nom,:prenom,:email)";
    $pdostmt=$pdo->prepare($query);
    $pdostmt->execute(["nom"=>$_POST["inputnom"],"prenom"=>$_POST["inputprenom"],"email"=>$_POST["inputemail"]]);
    // $pdostmt->bindValue(":nom",$_POST["inputnom"],PDO::PARAM_STR);
    // $pdostmt->bindValue(":prenom",$_POST["inputprenom"],PDO::PARAM_STR);
    // $pdostmt->bindValue(":email",$_POST["inputemail"],PDO::PARAM_STR);
    // $pdostmt->execute();
    $pdostmt->closeCursor(); //liberer pdostmt
    header("location:index.php"); //redirection vers test.php
}
?>
<html>
    <head>

    </head>
    <body>
        <form action="createuser.php" method="post">
            <input type="text" name="inputnom" placeholder="nom">
            <input type="text" name="inputprenom" placeholder="prenom">
            <input type="text" name="inputemail" placeholder="email">
            <input type="submit" name="submit" value="Ajouter">
        </form>
      
    </body>
</html>