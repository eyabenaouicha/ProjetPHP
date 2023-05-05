<?php
include_once("../connexion.php");
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
                <a href="../utilisateur/index.php">
                    <i class='bx bx-box'></i>
                    <span class="links_name">User</span>
                </a>
            </li>
            <li>
                <a href="../Reservation/index.php">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Reservation</span>
                </a>
            </li>
            <li>
                <a href="index.php" class="active">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Room</span>
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
            $pdo = new connect();
            if(isset($_POST['submit'])){
                if(!empty($_POST['categorie'])) {
                $selected = $_POST['categorie'];
                // var_dump($selected);
            $querycategorieid="select id from categorie where type="."'".$selected."'";
            // var_dump($querycategorieid);
            $pdostmtcategorieid = $pdo->prepare($querycategorieid);
            $pdostmtcategorieid->execute();
            $categorieid = $pdostmtcategorieid->fetchAll(PDO::FETCH_ASSOC);
            $categorieidd = $categorieid[0]["id"];
            // var_dump($categorieid[0]["id"]);
            if (!empty($_POST["inputnum"]) && !empty($_POST["inputprix"])) {
                
                $query = "insert into chambre(num,prix,idCategorie) values(:num,:prix,$categorieidd)";
                $pdostmt = $pdo->prepare($query);
                $pdostmt->execute(["num" => $_POST["inputnum"], "prix" => $_POST["inputprix"]]);
                $pdostmt->closeCursor(); //liberer pdostmt
                header("location:index.php"); 
            }}}
            ?>

            <div class="sales-boxes">
                <div class="recent-sales box">
                    <div class="title">Add Room</div>
                    <br>
                    <div class="sales-details">

                        <div class="wrapper">
                            <div class="registration_form">
                                <form action="create.php" method="post">
                                    <div class="form_wrap">
                                        <div class="input_grp">
                                            <div class="input_wrap">
                                                <label for="num">Room Number</label>
                                                <input type="text" name="inputnum">
                                            </div>
                                            <div class="input_wrap">
                                                <label for="prix">Price</label>
                                                <input type="text" name="inputprix">
                                            </div>
                                        </div>
                                        <div>
                                            <?php
                                            // $pdo = new connect();
                                            $queryc = "select type from categorie";
                                            $pdostmtc = $pdo->prepare($queryc);
                                            $pdostmtc->execute();
                                            ?>
                                            <label for="categorie">Choose a categorie </label> <br>
                                            <select name="categorie" id="categorie">
                                                <?php
                                                $ligne = $pdostmtc->fetchAll(PDO::FETCH_ASSOC);
                                                // var_dump($ligne);
                                                foreach ($ligne as $value) {
                                                ?>
                                                    <option value="<?php echo $value["type"]; ?>"><?php echo $value["type"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                    </div><br>

                                    <div class="button">
                                        <a href="#"><input type="submit" name="submit" value="Add" class="submit_btn" style="background: #0d6bd700;border:none;color:white">
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