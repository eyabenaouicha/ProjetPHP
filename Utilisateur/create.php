<?php
include_once("../connexion.php");
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">

    <head>
        <meta charset="UTF-8">
        <title>THE 7 </title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/addUser.css">
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
                    <a href="../chambre/index.php">
                        <i class='bx bx-pie-chart-alt-2'></i>
                        <span class="links_name">Room</span>
                    </a>
                </li>
                <li>
                    <a href="../categorie/index.php">
                        <i class='bx bx-coin-stack'></i>
                        <span class="links_name">Category</span>
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

                <div class="profile-details">
                    <img src="../fonts/user-solid.svg" alt="" style="height: 28px; width: 28px;">
                    <span class="admin_name"><?= $_SESSION['nom'] ?> <?= $_SESSION['prenom'] ?></span>
                </div>
            </nav>

            <div class="home-content" style="width: 100%!important;">
                <?php
                if (!empty($_POST["inputnom"]) && !empty($_POST["inputprenom"]) && !empty($_POST["inputemail"]) && !empty($_POST["inputemail"]) && !empty($_POST["inputnumero"]) && !empty($_POST["inputcin"]) && !empty($_POST["inputtype"]) && !empty($_POST["inputmdp"])) {
                    $pdo = new connect();
                    $query = "insert into utilisateur(nom,prenom,email,numero,cin,type,mdp) values(:nom,:prenom,:email,:numero,:cin,:type,:mdp)";
                    $pdostmt = $pdo->prepare($query);
                    $pdostmt->execute(["nom" => $_POST["inputnom"], "prenom" => $_POST["inputprenom"], "email" => $_POST["inputemail"], "numero" => $_POST["inputnumero"], "cin" => $_POST["inputcin"], "type" => $_POST["inputtype"], "mdp" => $_POST["inputmdp"]]);
                    $pdostmt->closeCursor(); //liberer pdostmt
                    header("location:index.php"); //redirection vers test.php
                }
                ?>

                <!-- <div class="sales-boxes">
                <div class="recent-sales box">
                    <div class="title">Add User</div>
                    <br>
                    <div class="sales-details">

                        <div class="wrapper">
                            <div class="registration_form">
                                <form action="create.php" method="post">
                                    <div class="form_wrap">
                                        <div class="input_grp">
                                            <div class="input_wrap">
                                                <label for="fname">Family Name</label>
                                                <input type="text" name="inputnom">
                                            </div>
                                            <div class="input_wrap">
                                                <label for="lname">Name</label>
                                                <input type="text" name="inputprenom">
                                            </div>
                                        </div>
                                        <div class="input_wrap">
                                            <label for="email">Email Adress</label>
                                            <input type="text" name="inputemail">
                                        </div>
                                        <div class="input_wrap">
                                            <label for="city">Phone Number</label>
                                            <input type="text" name="inputnumero">
                                        </div>
                                        <div class="input_wrap">
                                            <label for="country">CIN</label>
                                            <input type="text" name="inputcin">
                                        </div>
                                        <div class="input_wrap">
                                            <label for="country">Type</label>
                                            <input type="text" name="inputtype">
                                        </div>
                                        <div class="input_wrap">
                                            <label for="country">Password</label>
                                            <input type="text" name="inputmdp">
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

            </div> -->
                <form action="create.php" method="post">
                    <div class="wrapper" style="margin-left: 20%;">
                        <div class="title">
                            Add User
                        </div>
                        <div class="form">
                            <div class="inputfield">
                                <label>First Name</label>
                                <input type="text" name="inputnom" class="input">
                            </div>
                            <div class="inputfield">
                                <label>Last Name</label>
                                <input type="text" name="inputprenom" class="input">
                            </div>
                            <div class="inputfield">
                                <label>Email Address</label>
                                <input type="text" name="inputemail" class="input">
                            </div>
                            <div class="inputfield">
                                <label>Phone Number</label>
                                <input type="text" name="inputnumero" class="input">
                            </div>
                            <div class="inputfield">
                                <label>ID Number</label>
                                <input type="text" name="inputcin" class="input">
                            </div>
                            <div class="inputfield">
                                <label>Type</label>
                                <div class="custom_select">
                                    <select name="inputtype">
                                        <option value="" disabled selected>Select</option>
                                        <option value="admin">Admin</option>
                                        <option value="client">Client</option>
                                    </select>
                                </div>
                            </div>
                            <div class="inputfield">
                                <label>Password</label>
                                <input type="password" name="inputmdp" class="input">
                            </div>
                            <div class="inputfield">
                                <a href="#"><input type="submit" name="submit" value="Add User" class="btn">
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