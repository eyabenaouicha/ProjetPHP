<?php
 include_once("connexion.php");
?>
<html>
    
    <head>

    </head>
    <body>
        <?php
            $db = new connect();
            $query = "SELECT * FROM `categorie`";
            $stmt = $db->prepare($query);
            $stmt->execute();
            // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // var_dump($result)
           
?>
<br>
<a href="createuser.php"><button>Ajouter</button></a>
        <table>
            <tr>
                <th>id</th>
                <th>type</th>
            </tr>
            <?php
        $ligne = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($ligne as $value) {
        ?>
            <tr>
                <td> <?php echo $value["id"]; ?></td>
                <td><?php echo $value["type"]; ?></td>

                <td><a href="updateuser.php?id=<?php echo $value["id"] ?>">Modifier</a></td>
                <td><a href="deleteuser.php?id=<?php echo $value["id"] ?>">Supprimer</a></td>
            </tr>
        <?php } ?>
        </table>
    </body>
</html>