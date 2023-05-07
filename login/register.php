<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/login.css">

</head>

<body>
    <?php
    include_once("../connexion.php");

    // $nom = $_POST['inputnom'];
    // $prenom = $_POST['inputprenom'];
    // $email = $_POST['inputemail'];
    // $num = $_POST['inputnumero'];
    // $type = $_POST['inputtype'];
    // $cin = $_POST['inputcin'];
    // $mdp = $_POST['inputmdp'];
    // $data = "nom=" . $nom . "&prenom=" . $prenom . "&email=" . $email . "&num=" . $num . "&prenom=" . $type . "&type=" . $cin . "&cin=";
    // if (empty($nom)) {
    //     $em  = "Family name is required";
    //     header("Location: ../index.php?error=$em&$data");
    //     exit;
    // } else if (empty($prenom)) {
    //     $em = "User name is required";
    //     header("Location: ../index.php?error=$em&$data");
    //     exit;
    // } else if (empty($email)) {
    //     $em = "Email adress is required";
    //     header("Location: ../index.php?error=$em&$data");
    //     exit;
    // } else if (empty($num)) {
    //     $em = "User Number is required";
    //     header("Location: ../index.php?error=$em&$data");
    //     exit;
    // } else if (empty($cin)) {
    //     $em = "User CIN is required";
    //     header("Location: ../index.php?error=$em&$data");
    //     exit;
    // } else if (empty($mdp)) {
    //     $em = "User Password is required";
    //     header("Location: ../index.php?error=$em&$data");
    //     exit;
    // }else{
    //     echo "nice";
    // }


    if (!empty($_POST["inputnom"]) && !empty($_POST["inputprenom"]) && !empty($_POST["inputemail"]) && !empty($_POST["inputemail"]) && !empty($_POST["inputnumero"]) && !empty($_POST["inputcin"]) && !empty($_POST["inputmdp"])) {
        $pdo = new connect();
        $pass = password_hash($_POST["inputmdp"], PASSWORD_DEFAULT);
        $pass = $_POST["inputmdp"];
        $query = "insert into utilisateur(nom,prenom,email,numero,cin,type,mdp) values(:nom,:prenom,:email,:numero,:cin,:type,:mdp)";
        $pdostmt = $pdo->prepare($query);
        $pdostmt->execute(["nom" => $_POST["inputnom"], "prenom" => $_POST["inputprenom"], "email" => $_POST["inputemail"], "numero" => $_POST["inputnumero"], "cin" => $_POST["inputcin"], "type" => "client", "mdp" => $pass]);
        $pdostmt->closeCursor();
        header("location:login.php"); 
    }
    ?>
    <div class="form-container">
        <form action="register.php" method="post">
            <h3>register now</h3>
            <input type="text" name="inputnom" required placeholder="enter your Family Name">
            <input type="text" name="inputprenom" required placeholder="enter your name">
            <input type="email" name="inputemail" required placeholder="enter your Email">
            <input type="text" name="inputnumero" required placeholder="enter your Number">
            <input type="text" name="inputcin" required placeholder="enter your CIN">
            <input type="password" name="inputmdp" required placeholder="enter your password">
            <!-- <input type="password" name="inputcmdp" required placeholder="confirm your password"> -->
         
            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>already have an account? <a href="login.php">login</a></p>
        </form>
    </div>
</body>

</html>