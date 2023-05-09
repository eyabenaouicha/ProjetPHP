<?php
include_once("../connexion.php");
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
  $pdo = new connect();
  $query = "select * from utilisateur";
  $pdostmt = $pdo->prepare($query);
  $pdostmt->execute();
  $c = "select distinct chambre.id as idchambre,idChambre,prix,num,type from chambre,reservation,categorie where chambre.idCategorie=categorie.id and chambre.id <> reservation.idChambre";
  $pdostmtc = $pdo->prepare($c);
  $pdostmtc->execute();

  if (!empty($_POST)) {
    if ($_POST["inputformule"] == "pensionComplete") {
      $prixFormule = 150;
    } else if ($_POST["inputformule"] == "demiPension") {
      $prixFormule = 100;
    } else if ($_POST["inputformule"] == "bedBreakfast") {
      $prixFormule = 80;
    } else if ($_POST["inputformule"] == "bedOnly") {
      $prixFormule = 50;
    }
    $querypc = "select prix from chambre where id=:id";
    $pdostmtpc = $pdo->prepare($querypc);
    $pdostmtpc->execute(["id" => $_POST["inputChambre"]]);
    $prixpc = $pdostmtpc->fetchAll(PDO::FETCH_ASSOC);
    // var_dump(floatval($prixpc[0]["prix"]));
    $prixF = $prixFormule + floatval($prixpc[0]["prix"]);
    $queryFact = "insert into facture(prix) values (:prix)";
    $pdostmtFact = $pdo->prepare($queryFact);
    $pdostmtFact->execute(["prix" => $prixF]);
    $n = "select count(*) as countf from facture";
    $pdostmtn = $pdo->prepare($n);
    $pdostmtn->execute();
    $countf = $pdostmtn->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($countf[0]["countf"]);
    $fact = "select * from facture";
    $pdostmtfact = $pdo->prepare($fact);
    $pdostmtfact->execute();
    $facture = $pdostmtfact->fetchAll(PDO::FETCH_ASSOC);
    $idf = $facture[$countf[0]["countf"] - 1]["id"];
    // var_dump($facture[$countf[0]["countf"]-1]["id"]);
    $queryadd = "insert into reservation(idUtilisateur,idChambre,dateDebut,dateFin,formule,idFacture,etat) values(:idUtilisateur,:idChambre,:dateDebut,:dateFin,:formule,:facture,:etat)";
    $pdostmtadd = $pdo->prepare($queryadd);
    // var_dump($_POST["inputUtilisateur"],$_POST["inputChambre"],$_POST["inputdateDebut"],$_POST["inputdateFin"],$_POST["inputetat"],$_POST["inputidFacture"],$_POST["inputformule"]);
    $pdostmtadd->execute(["idUtilisateur" => $_POST["inputUtilisateur"], "idChambre" => $_POST["inputChambre"], "dateDebut" => $_POST["inputdateDebut"], "dateFin" => $_POST["inputdateFin"], "formule" => $_POST["inputformule"], "facture" => $idf, "etat" => $_POST["inputetat"]]);
    $pdostmtadd->closeCursor();
    header("location:index.php");
  }
?>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">

  <head>
    <meta charset="UTF-8">
    <title>THE 7 </title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/addReservation.css">
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
            <span class="links_name">User</span>
          </a>
        </li>
        <li>
          <a href="index.php">
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

      <div class="home-content">


        <div class="sales-boxes">
          <div class="recent-sales box">
            <div class="title">User</div><br>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
            <br>
            <div class="sales-details">

              <table id="myTable">
                <tr class="header">
                  <th>Id</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>ID Number</th>
                  <th>Phone</th>
                  <th>Type</th>
                </tr>
                <?php
                $ligne = $pdostmt->fetchAll(PDO::FETCH_ASSOC);
                // var_dump($ligne);
                foreach ($ligne as $value) {
                ?>
                  <tr>
                    <td> <?php echo $value["id"]; ?></td>
                    <td><?php echo $value["nom"]; ?></td>
                    <td><?php echo $value["prenom"]; ?></td>
                    <td><?php echo $value["email"]; ?></td>
                    <td><?php echo $value["cin"]; ?></td>
                    <td><?php echo $value["numero"]; ?></td>
                    <td><?php echo $value["type"]; ?></td>
                  </tr>
                <?php } ?>
              </table>
            </div>
            <div class="button">
              <a href="#">See All</a>
            </div>
          </div>
          <div class="top-sales box">
            <div class="title">Available Rooms</div>
            <input type="text" id="myInputc" onkeyup="myFunctionc()" placeholder="Search by number...">

            <table id="myTablec">
              <tr class="header">
                <th>Id</th>
                <th>Number</th>
                <th>Type</th>
                <th>Price</th>
              </tr>
              <?php
              $lignec = $pdostmtc->fetchAll(PDO::FETCH_ASSOC);
              // var_dump($lignec);
              foreach ($lignec as $value) {
              ?>
                <tr>
                  <td><?php echo $value["idchambre"]; ?></td>
                  <td><?php echo $value["num"]; ?></td>
                  <td><?php echo $value["type"]; ?></td>
                  <td><?php echo $value["prix"]; ?></td>
                </tr>
              <?php } ?>
            </table>
          </div>
        </div>

        <!-- form -->
        <form action="create.php" method="post">
          <div class="wrapper" style="margin-left: 2%;">
            <div class="title">
              Add Reservation
            </div>
            <div class="form">

              <div class="inputfield">
                <label>ID user</label>
                <?php
                $queryu = "select id from utilisateur";
                $pdostmtu = $pdo->prepare($queryu);
                $pdostmtu->execute();
                ?>
                <div class="custom_select">
                  <select name="inputUtilisateur">
                    <?php
                    $ligne = $pdostmtu->fetchAll(PDO::FETCH_ASSOC);
                    // var_dump($ligne);
                    foreach ($ligne as $value) {
                    ?>
                      <option value="<?php echo $value["id"]; ?>" name="inputidUtilisateur"><?php echo $value["id"]; ?></option>
                    <?php } ?>
                  </select>

                </div>
              </div>

              <div class="inputfield">
                <label>ID Room</label>
                <?php
                $querycc = "select id from chambre";
                $pdostmtcc = $pdo->prepare($querycc);
                $pdostmtcc->execute();
                ?>
                <div class="custom_select">
                  <select id="ftype" name="inputChambre">
                    <?php
                    $ligne = $pdostmtcc->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($ligne as $value) {
                    ?>
                      <option value="<?php echo $value["id"]; ?>" name="inputidChambre"><?php echo $value["id"]; ?></option>
                    <?php } ?>
                  </select>

                </div>
              </div>
              <div class="inputfield">
                <label>Check-in</label>
                <input type="date" name="inputdateDebut" class="input">
              </div>
              <div class="inputfield">
                <label>Check-out</label>
                <input type="date" name="inputdateDebut" class="input">
              </div>
              <div class="inputfield">
                <label>Package</label>
                <div class="custom_select">
                  <select name="inputformule">
                    <option value="" disabled selected>Choose option</option>
                    <option value="pensionComplete">pensionComplete</option>
                    <option value="demiPension">demiPension</option>
                    <option value="bedBreakfast">bedBreakfast</option>
                    <option value="bedOnly">bedOnly</option>
                  </select>
                </div>
              </div>
              <div class="inputfield">
                <label>Status</label>
                <div class="custom_select">
                  <select name="inputetat">
                    <option value="" disabled selected>Choose option</option>
                    <option value="En Attente">En Attente</option>
                    <option value="confirmer">confirmer</option>
                    <option value="annuler">annuler</option>
                  </select>
                </div>
              </div>

              <div class="inputfield">
                <a href="#"><input type="submit" name="submit" value="Add Reservation" class="btn">
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

      function myFunctionc() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInputc");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTablec");
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