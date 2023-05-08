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
        <!-- Boxicons CDN Link -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
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
                    <a href="../Utilisateur/index.php">
                        <i class='bx bx-box'></i>
                        <span class="links_name">Utilisateur</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="active">
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

            <div class="home-content" style="width: 147%!important;">
                <?php
                $pdo = new connect();
                $query = "select reservation.id as idr, facture.id idf, facture.prix as prixf,utilisateur.id as idu, chambre.id as idc, formule,nom,prenom,email,cin,numero,dateDebut,dateFin,num,chambre.prix as prixc,utilisateur.type as typeu, categorie.type as typec
                from utilisateur,reservation,categorie, chambre,facture where utilisateur.id=reservation.idUtilisateur and chambre.id=reservation.idChambre and categorie.id=chambre.idCategorie and facture.id=reservation.idFacture";
                $pdostmt = $pdo->prepare($query);
                $pdostmt->execute();


                ?>

                <div class="sales-boxes">
                    <div class="recent-sales box">
                        <br>
                        <div class="title"> Facture</div>
                        <br>
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search..">



                        <div class="sales-details">

                            <table id="myTable">
                                <tr class="header">
                                    <th>Invoice</th>
                                    <th>Room number</th>
                                    <th>Room type</th>
                                    <th>Pension</th>
                                    <th>Last name</th>
                                    <th>First name</th>
                                    <th>CIN</th>
                                    <th>Type</th>
                                </tr>
                                <?php
                                $ligne = $pdostmt->fetchAll(PDO::FETCH_ASSOC);
                                // var_dump($ligne);
                                foreach ($ligne as $value) {
                                ?>
                                    <tr>
                                        <td><?php echo $value["prixf"]; ?></td>
                                        <td><?php echo $value["num"]; ?></td>
                                        <td><?php echo $value["typec"]; ?></td>
                                        <td><?php echo $value["formule"]; ?></td>
                                        <td><?php echo $value["nom"]; ?></td>
                                        <td><?php echo $value["prenom"]; ?></td>
                                        <td><?php echo $value["cin"]; ?></td>
                                        <td><?php echo $value["typeu"]; ?></td>
                                        <td></td>
                                    </tr>
                                <?php } ?>
                            </table>
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
                    td = tr[i].getElementsByTagName("td")[0];
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