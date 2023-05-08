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
<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">
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

	    if (!empty($_POST["inputnomreg"]) && !empty($_POST["inputprenomreg"]) && !empty($_POST["inputemailreg"])&& !empty($_POST["inputnumeroreg"]) && !empty($_POST["inputcinreg"]) && !empty($_POST["inputmdpreg"])) {
        $pdo = new connect();
        // $pass = password_hash($_POST["inputmdp"], PASSWORD_DEFAULT);
        $pass = $_POST["inputmdpreg"];
        $query = "insert into utilisateur(nom,prenom,email,numero,cin,type,mdp) values(:nom,:prenom,:email,:numero,:cin,:type,:mdp)";
        $pdostmt = $pdo->prepare($query);
        $pdostmt->execute(["nom" => $_POST["inputnomreg"], "prenom" => $_POST["inputprenomreg"], "email" => $_POST["inputemailreg"], "numero" => $_POST["inputnumeroreg"], "cin" => $_POST["inputcinreg"], "type" => "client", "mdp" => $pass]);
		$pdostmt->closeCursor();
        // header("location:login.php"); 
    }

	session_start();
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
            
       
 } }}}
    ?>
		<div class="signup">
			<form action="login.php" method="post">
				<label for="chk" aria-hidden="true">Register now!</label>
				<input type="text" name="inputnomreg" required placeholder="Enter your first Name">
				<input type="text" name="inputprenomreg" required placeholder="Enter your last name">
				<input type="email" name="inputemailreg" required placeholder="Enter your Email">
				<input type="text" name="inputnumeroreg" required placeholder="Enter your Number">
				<input type="text" name="inputcinreg" required placeholder="Enter your CIN">
				<input type="password" name="inputmdpreg" required placeholder="Enter your password">
				<!-- <input type="submit" name="submit" value="register now" > -->
				<button type="submit" name="submit">Register</button>
			</form>
		</div>

			<div class="login">
				<form method="post">
					<label for="chk" aria-hidden="true">Login </label>
					<input type="email" name="inputemail" required placeholder="Enter your email">
                    <input type="password" name="inputmdp" required placeholder="Enter your password">
					<button>Login</button>
				</form>
			</div>
	</div>
</body>
</html>