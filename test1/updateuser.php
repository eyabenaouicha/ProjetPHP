<?php
include_once("connexion.php");
if(!empty($_GET["id"])){
    // var_dump($_GET["id"]);
    $pdo=new connect();
    $query="select * from user where id=:id";
    $pdostmt=$pdo->prepare($query);
    $pdostmt->execute(["id"=>$_GET["id"]]);
    // while($row=$pdostmt->fetchAll(PDO::FETCH_ASSOC)):
    $row=$pdostmt->fetch(PDO::FETCH_ASSOC);
    // var_dump($row);

?>

<h1>Modifier l'utilisateur</h1>
<form action="" method="POST">
    <input type="hidden" placeholder="id" name="inputid" id="inputid" value="<?php echo $row["id"]?>">
    <input type="text" placeholder="nom" name="inputnom" id="inputnom" value="<?php echo $row["nom"]?>" required>
    <input type="text" placeholder="prenom" name="inputprenom" id="inputprenom" value="<?php echo $row["prenom"]?>" required>
    <input type="email" placeholder="email" name="inputemail" id="inputemail" value="<?php echo $row["email"]?>" required>
    <button type="submit"> Modifier</button>
</form>
<?php
    // endwhile;
}
if(!empty($_POST)){
    $query="update user set nom=:nom, prenom=:prenom, email=:email  where id=:id";
    $pdostmt=$pdo->prepare($query);
    $pdostmt->execute(["nom"=>$_POST["inputnom"],"prenom"=>$_POST["inputprenom"],"email"=>$_POST["inputemail"],"id"=>$_POST["inputid"]]);
    header("location:index.php");
}
?>