<?php
include_once("connexion.php");
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

?>


  <!DOCTYPE html>
  <html lang="en" dir="ltr">

  <head>
    <meta charset="UTF-8">
    <title>THE 7 </title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
    <div class="sidebar">
      <div class="logo-details">
        <a href="indexAdmin.php" style="text-decoration: none;">
          <i class='bx bxl-c-plus-plus'></i>
          <span class="logo_name">The 7</span>
        </a>
      </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class='bx bx-grid-alt'></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="Utilisateur/index.php">
            <i class='bx bx-box'></i>
            <span class="links_name">User</span>
          </a>
        </li>
        <li>
          <a href="Reservation/index.php">
            <i class='bx bx-list-ul'></i>
            <span class="links_name">Reservation</span>
          </a>
        </li>
        <li>
          <a href="chambre/index.php">
            <i class='bx bx-pie-chart-alt-2'></i>
            <span class="links_name">Room</span>
          </a>
        </li>
        <li>
          <a href="categorie/index.php">
            <i class='bx bx-coin-stack'></i>
            <span class="links_name">Categorie</span>
          </a>
        </li>
        <li class="log_out">
          <a href="login/logout.php">
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
          <img src="fonts/user-solid.svg" alt="" style="height: 28px; width: 28px;">
          <span class="admin_name"><?= $_SESSION['nom'] ?> <?= $_SESSION['prenom'] ?></span>
          <i class="fa-solid fa-user"></i>
        </div>
      </nav>

      <div class="home-content">
        <?php
        $pdo = new connect();
        // statistique utilisateurs 
        $queryUser = "select count(*) as countUser from utilisateur";
        $pdostmtUser = $pdo->prepare($queryUser);
        $pdostmtUser->execute();
        $countUser = $pdostmtUser->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($countUser[0]["countUser"]);


        // statistique reservation
        $queryReservation = "select count(*) as countReservation from reservation";
        $pdostmtReservation = $pdo->prepare($queryReservation);
        $pdostmtReservation->execute();
        $countReservation = $pdostmtReservation->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($countReservation[0]["countReservation"]);


        // statistique chambre
        $queryChambre = "select count(*) as countChambre from chambre";
        $pdostmtChambre = $pdo->prepare($queryChambre);
        $pdostmtChambre->execute();
        $countChambre = $pdostmtChambre->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($countChambre[0]["countChambre"]);


        // statistique categorie
        $queryCategorie = "select count(*) as countCategorie from categorie";
        $pdostmtCategorie = $pdo->prepare($queryCategorie);
        $pdostmtCategorie->execute();
        $countCategorie = $pdostmtCategorie->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($countCategorie[0]["countCategorie"]);

        ?>
        <div class="overview-boxes">
          <div class="box">
            <div class="right-side">
              <div class="box-topic">User</div>
              <div class="number"><?php echo $countUser[0]["countUser"]; ?></div>
            </div>
            <i class='bx bx-cart-alt cart'></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Reservation</div>
              <div class="number"><?php echo $countReservation[0]["countReservation"]; ?></div>
            </div>
            <i class='bx bxs-cart-add cart two'></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Room</div>
              <div class="number"><?php echo $countChambre[0]["countChambre"]; ?></div>
            </div>
            <i class='bx bx-cart cart three'></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Categorie</div>
              <div class="number"><?php echo $countCategorie[0]["countCategorie"]; ?></div>
            </div>
            <i class='bx bxs-cart-download cart four'></i>
          </div>
        </div>
        <?php
        $queryreser = "select reservation.id as idr, facture.id idf, facture.prix as prixf,utilisateur.id as idu, chambre.id as idc, formule,nom,prenom,email,cin,numero,dateDebut,dateFin,num,chambre.prix as prixc,utilisateur.type as typeu, categorie.type as typec
  from utilisateur,reservation,categorie, chambre,facture where utilisateur.id=reservation.idUtilisateur and chambre.id=reservation.idChambre and categorie.id=chambre.idCategorie and facture.id=reservation.idFacture";
        $pdostmtreser = $pdo->prepare($queryreser);
        $pdostmtreser->execute();

        ?>
        <div class="sales-boxes">
          <div class="recent-sales box">
            <div class="title">Recent Reservations</div>
            <div class="sales-details">
              <table id="myTable">
                <tr class="header">
                  <th>Email</th>
                  <th>Formule</th>
                  <th>Date Debut</th>
                  <th>Date Fin</th>
                  <th>Type Chambre</th>
                  <th>Facture</th>
                </tr>
                <?php
                $ligne = $pdostmtreser->fetchAll(PDO::FETCH_ASSOC);
                foreach ($ligne as $value) {
                ?>
                  <tr>
                    <td><?php echo $value["email"]; ?></td>
                    <td><?php echo $value["formule"]; ?></td>
                    <td><?php echo $value["dateDebut"]; ?></td>
                    <td><?php echo $value["dateFin"]; ?></td>
                    <td><?php echo $value["typec"]; ?></td>
                    <td><?php echo $value["prixf"]; ?></td>
                    <td></td>
                  </tr>
                <?php } ?>
              </table>
            </div><br>
            <div class="button">
              <a href="Reservation/index.php">See All</a>
            </div>
          </div>
          <div class="top-sales box">
            <div class="title">Rooms</div>
             
              
              <table id="myTable">
              <tr class="header">
                <th>Id</th>
                <th>Room Number</th>
                <th>Categorie</th>
                <th>Price</th>

              </tr>
              <?php
                 $queryc = "select chambre.id as idc, categorie.id as idca, prix, type,num from chambre, categorie where chambre.idCategorie=categorie.id";
                 // $queryc = "select *  from chambre";
                 $pdostmtc = $pdo->prepare($queryc);
                 $pdostmtc->execute();
                 $countc = $pdostmtc->fetchAll(PDO::FETCH_ASSOC);
              foreach ($countc as $value) {
              ?>
                <tr>
                  <td> <?php echo $value["idc"]; ?></td>
                  <td><?php echo $value["num"]; ?></td>
                  <td><?php echo $value["type"]; ?></td>
                  <td><?php echo $value["prix"]; ?></td>
                  <td><a href="update.php?id=<?php echo $value["idc"] ?>"><img src="../fonts/pen-to-square-solid.svg" style="width:25px;heigth:25px" alt=""></a> <a href="delete.php?id=<?php echo $value["idc"] ?>"><img src="../fonts/trash-solid.svg" style="width:20px;heigth:20px" alt=""></a></td>
                </tr>
              <?php } ?>
              </table> <br>
              <div class="button">
            <a href="chambre/index.php">See All</a>
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
    </script>

  </body>

  </html>
<?php } else {
  header("Location: login/login.php");
  exit;
}
?>