
<?php
include_once("../connexion.php");
if(!empty($_GET["id"])){
    // var_dump($_GET["id"]);
    $pdo=new connect();
    $query="select * from categorie where id=:id";
    $pdostmt=$pdo->prepare($query);
    $pdostmt->execute(["id"=>$_GET["id"]]);
    // while($row=$pdostmt->fetchAll(PDO::FETCH_ASSOC)):
    $row=$pdostmt->fetch(PDO::FETCH_ASSOC);


?>

<h1>Modifier le categorie</h1>
<form action="" method="POST">
    <input type="hidden" placeholder="id" name="inputid" id="inputid" value="<?php echo $row["id"]?>">
    <input type="text" placeholder="type" name="inputtype" id="inputtype" value="<?php echo $row["type"]?>" required>
    <button type="submit"> Modifier</button>
</form>
<?php
    // endwhile;
}
if(!empty($_POST)){
    $query="update categorie set type=:type  where id=:id ";
    $pdostmt=$pdo->prepare($query);
    $pdostmt->execute(["type"=>$_POST["inputtype"],"id"=>$_POST["inputid"]]);
    header("location:index.php");
}
?>