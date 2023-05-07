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
    session_start();
    include_once("../connexion.php");
    if (!empty($_POST["inputemail"])&& !empty($_POST["inputmdp"])){
        $pdo = new connect();
        $uemail = $_POST['inputemail'];
        $umdp = $_POST['inputmdp'];
        $sql = "SELECT * FROM utilisateur WHERE email = ?";
$stmt = $pdo->prepare ($sql);
$stmt->execute([$uemail]);
// var_dump($stmt->rowCount());
if($stmt->rowCount() >0){
    $user = $stmt->fetch();
    $nom = $user['nom'];
    $prenom = $user['prenom'];
    $email = $user['email'];
    $num = $user['numero'];
    $type = $user['type'];
    $cin = $user['cin'];
    $mdp = $user['mdp'];
    $id = $user['id'];
    if($email==$uemail){
        // var_dump( password_verify($mdp, $umdp));
        if($mdp==$umdp){
            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;
            $_SESSION['email'] = $email;
            $_SESSION['num'] = $num;
            $_SESSION['type'] = $type;
            $_SESSION['cin'] = $cin;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['id'] = $id;
            if($type == "admin"){
                header("Location: ../dashboard.php");
            }else{
                header("Location: ../index.html");
            }
            
            echo "Logged in";
       
 } }}}
    ?>
    <div class="form-container">
        <form  method="post">
            <h3>login now</h3>
            <input type="email" name="inputemail" required placeholder="enter your email">
            <input type="password" name="inputmdp" required placeholder="enter your password">
            <input type="submit" name="submit" value="Login Now" class="form-btn">
            <p>You don't have an account? <a href="register.php"> Register</a></p>

        </form>
    </div>
</body>

</html>