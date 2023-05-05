<?php
include_once("../connexion.php");
if(!empty($_GET["id"])){
    // var_dump($_GET["id"]);
    $pdo=new connect();
    $query="select * from utilisateur where id=:id";
    $pdostmt=$pdo->prepare($query);
    $pdostmt->execute(["id"=>$_GET["id"]]);
    // while($row=$pdostmt->fetchAll(PDO::FETCH_ASSOC)):
    $row=$pdostmt->fetch(PDO::FETCH_ASSOC);
    // var_dump($row);
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>THE 7 </title>
    <link rel="stylesheet" href="../css/style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bxl-c-plus-plus'></i>
            <span class="logo_name">The 7</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="../dashboard.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="index.php" class="active">
                    <i class='bx bx-box'></i>
                    <span class="links_name">Utilisateur</span>
                </a>
            </li>
            <li>
                <a href="../Reservation/index.php">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Reservation</span>
                </a>
            </li>
            <li>
                <a href="../chambre/index.php">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Chambre</span>
                </a>
            </li>
            <li>
                <a href="../categorie/index.php">
                    <i class='bx bx-coin-stack'></i>
                    <span class="links_name">Categorie</span>
                </a>
            </li>
            <li class="log_out">
                <a href="#">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="dashboard">Dashboard</span>
            </div>
            <div class="profile-details">
                <img src="images/profile.jpg" alt="">
                <span class="admin_name">Prem Shahi</span>
                <i class='bx bx-chevron-down'></i>
            </div>
        </nav>

        <div class="home-content" style="width: 147%!important;">
            <?php
            if (!empty($_POST)) {
                $query = "update utilisateur set nom=:nom,prenom=:prenom,email=:email,numero=:numero,cin=:cin,type=:type,mdp=:mdp where id=:id";
                $pdostmt = $pdo->prepare($query);
                $pdostmt->execute(["nom" => $_POST["inputnom"], "prenom" => $_POST["inputprenom"], "email" => $_POST["inputemail"], "numero" => $_POST["inputnumero"], "cin" => $_POST["inputcin"], "type" => $_POST["inputtype"], "mdp" => $_POST["inputmdp"],"id"=>$_POST["inputid"]]);
                $pdostmt->closeCursor(); //liberer pdostmt
                header("location:index.php"); //redirection vers test.php
            }
            ?>

            <div class="sales-boxes">
                <div class="recent-sales box">
                    <div class="title">Modifier Utilisateur</div>
                    <br>
                    <div class="sales-details">

                        <div class="wrapper">
                            <div class="registration_form">
                                <form method="post">
                                    <div class="form_wrap">
                                        <div class="input_grp">
                                            <div class="input_wrap">
                                            <input type="hidden" placeholder="id" name="inputid" id="inputid" value="<?php echo $row["id"]?>">
                                                <label for="fname">Nom</label>
                                                <input type="text" name="inputnom"  value="<?php echo $row["nom"]?>">
                                            </div>
                                            <div class="input_wrap">
                                                <label for="lname">Prenom</label>
                                                <input type="text" name="inputprenom"  value="<?php echo $row["prenom"]?>">
                                            </div>
                                        </div>
                                        <div class="input_wrap">
                                            <label for="email">Email Address</label>
                                            <input type="text" name="inputemail"  value="<?php echo $row["email"]?>">
                                        </div>
                                        <div class="input_wrap">
                                            <label for="city">Numero</label>
                                            <input type="text" name="inputnumero"  value="<?php echo $row["numero"]?>">
                                        </div>
                                        <div class="input_wrap">
                                            <label for="country">CIN</label>
                                            <input type="text" name="inputcin"  value="<?php echo $row["cin"]?>">
                                        </div>
                                        <div class="input_wrap">
                                            <label for="country">Type</label>
                                            <input type="text" name="inputtype"  value="<?php echo $row["type"]?>">
                                        </div>
                                        <div class="input_wrap">
                                            <label for="country">Mot de passe</label>
                                            <input type="text" name="inputmdp"  value="<?php echo $row["mdp"]?>">
                                        </div>
                                    </div><br>

                                    <div class="button">
                                        <a href="#"><input type="submit" name="submit" value="Modify" class="submit_btn" style="background: #0d6bd700;border:none;color:white">
                                        </a>
                                    </div>
                                </form>
                                <?php

if(!empty($_POST)){
    $query="update utilisateur set nom=:nom, prenom=:prenom, email=:email, numero=:numero , cin=:cin, type=:type, mdp=:mdp where id=:id";
    $pdostmt=$pdo->prepare($query);
    $pdostmt->execute(["nom"=>$_POST["inputnom"],"prenom"=>$_POST["inputprenom"],"email"=>$_POST["inputemail"],"numero" => $_POST["inputnumero"], "cin" => $_POST["inputcin"], "type" => $_POST["inputtype"], "mdp" => $_POST["inputmdp"],"id"=>$_POST["inputid"]]);
    header("location:index.php");
}
?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }

        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

</body>

</html>