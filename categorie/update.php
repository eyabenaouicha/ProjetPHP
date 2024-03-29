<?php
include_once("../connexion.php");
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    if (!empty($_GET["id"])) {
        // var_dump($_GET["id"]);
        $pdo = new connect();
        $query = "select * from categorie where id=:id";
        $pdostmt = $pdo->prepare($query);
        $pdostmt->execute(["id" => $_GET["id"]]);
        // while($row=$pdostmt->fetchAll(PDO::FETCH_ASSOC)):
        $row = $pdostmt->fetch(PDO::FETCH_ASSOC);


?>

    <?php
        // endwhile;
    }
    if (!empty($_POST)) {
        $query = "update categorie set type=:type  where id=:id ";
        $pdostmt = $pdo->prepare($query);
        $pdostmt->execute(["type" => $_POST["inputtype"], "id" => $_POST["inputid"]]);
        header("location:index.php");
    }
    ?>

    <!DOCTYPE html>
    <html lang="en" dir="ltr">

    <head>
        <meta charset="UTF-8">
        <title>THE 7 </title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/addCategorie.css">

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
                    <a href=../utilisateur/index.php>
                        <i class='bx bx-box'></i>
                        <span class="links_name">User</span>
                    </a>
                </li>

                <li>
                    <a href="../chambre/index.php">
                        <i class='bx bx-pie-chart-alt-2'></i>
                        <span class="links_name">Room</span>
                    </a>
                </li>
                <li>
                    <a href="index.php" class="active">
                        <i class='bx bx-coin-stack'></i>
                        <span class="links_name">Category</span>
                    </a>
                </li>
                <li>
                    <a href="../Reservation/index.php">
                        <i class='bx bx-list-ul'></i>
                        <span class="links_name">Reservation</span>
                    </a>
                </li>
                <li>
                    <a href="../Facture/index.php">
                        <i class='bx bx-box'></i>
                        <span class="links_name">Facture</span>
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
                    <img src="images/profile.jpg" alt="">
                    <span class="admin_name">Prem Shahi</span>
                    <i class='bx bx-chevron-down'></i>
                </div>
            </nav>

            <div class="home-content" style="width: 147%!important;">

                <form method="post">
                    <div class="wrapper" style="margin-left: 20%;">
                        <div class="title">
                            Modify Category
                        </div>
                        <div class="form">
                            <div class="inputfield">
                                <input type="hidden" placeholder="id" name="inputid" id="inputid" value="<?php echo $row["id"] ?>">
                                <label>Category</label>
                                <input type="text" name="inputtype" class="input" value="<?php echo $row["type"] ?>">
                            </div>

                            <div class="inputfield">
                                <a href="#"><input type="submit" name="submit" value="Modify Category" class="btn">
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
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
<?php } else {
    header("Location: ../login/login.php");
    exit;
}
?>