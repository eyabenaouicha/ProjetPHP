
<?php 
include_once("../connexion.php");
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])){
if(!empty($_POST["inputtype"])){
    $pdo=new connect();
    $query="insert into categorie(type) values(:type)";
    $pdostmt=$pdo->prepare($query);
    $pdostmt->execute(["type"=>$_POST["inputtype"]]);
    $pdostmt->closeCursor(); 
    header("location:index.php"); 
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
                <a href=../utilisateur/index.php >
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
                <a href="index.php" class="active">
                    <i class='bx bx-coin-stack'></i>
                    <span class="links_name">Categorie</span>
                </a>
            </li>
            <li class="log_out">
                <a href="../login/logout.php">
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
            <div class="search-box">
                <input type="text" placeholder="Search...">
                <i class='bx bx-search'></i>
            </div>
            <div class="profile-details">
            <img src="../fonts/user-solid.svg" alt="" style="height: 28px; width: 28px;">
        <span class="admin_name"><?=$_SESSION['nom']?> <?=$_SESSION['prenom']?></span>
            </div>
        </nav>

        <div class="home-content" style="width: 147%!important;">
         

            <div class="sales-boxes">
                <div class="recent-sales box">
                    <div class="title">Ajouter categorie</div>
                    <br>
                    <div class="sales-details">

                        <div class="wrapper">
                            <div class="registration_form">
                                        <form action="create.php" method="post">
                                            <div class="form_wrap">
                                                <div class="input_grp">
                                                        <div class="input_wrap">
                                                            <label for="ftype">Type</label>
                                                            <input type="text" id="ftype" name="inputtype">
                                                        </div>
                                                           
                                                </div>
                                                    
                                                       
                                                           
                                            </div><br>
                                  
                    <div class="button">
                        <a href="#"><input type="submit" value="Ajouter" class="submit_btn" style="background: #0d6bd700;border:none;color:white">
</a>
                    </div>
                    </form>
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
<?php }else {
     header ("Location: ../login/login.php");
     exit;
}
   ?>