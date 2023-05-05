<?php
include_once("../connexion.php");
$pdo = new connect();
$query = "select * from utilisateur";
$pdostmt = $pdo->prepare($query);
$pdostmt->execute();
$c = "select distinct reservation.idChambre, chambre.id as idchambre,prix,num,type from chambre,reservation,categorie where chambre.idCategorie=categorie.id and chambre.id <> reservation.idChambre";
$pdostmtc = $pdo->prepare($c);
$pdostmtc->execute();
if(!empty($_POST)){
  $queryadd="insert into reservation(idUtilisateur,idChambre,dateDebut,dateFin,formule,idFacture,etat) values(:idUtilisateur,:idChambre,:iddateDebut,:dateFin,:formule,:facture,:etat)";
  $pdostmtadd=$pdo->prepare($queryadd);
  // var_dump($_POST["inputUtilisateur"],$_POST["inputChambre"],$_POST["inputdateDebut"],$_POST["inputdateFin"],$_POST["inputetat"],$_POST["inputidFacture"],$_POST["inputformule"]);
  $pdostmtadd->execute(["idUtilisateur"=>$_POST["inputUtilisateur"],"idChambre"=>$_POST["inputChambre"],"iddateDebut"=>$_POST["inputdateDebut"],"dateFin"=>$_POST["inputdateFin"],"formule"=>$_POST["inputformule"],"facture"=>$_POST["inputidFacture"],"etat"=>$_POST["inputetat"]]);
  $pdostmtadd->closeCursor(); 
  // header("location:index.php"); 
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
          <a href="../dashboard.php" >
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="../Utilisateur/index.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Utilisateur</span>
          </a>
        </li>
        <li>
        <a href="index.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Reservation</span>
          </a>
        </li>
        <li>
          <a href="../chambre/index.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Chambre</span>
          </a>
        </li>
        <li>
          <a href="../categorie/index.php">
            <i class='bx bx-coin-stack' ></i>
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
      <!-- <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div> -->
      <div class="profile-details">
        <img src="images/profile.jpg" alt="">
        <span class="admin_name">Prem Shahi</span>
        <i class="fa-solid fa-user"></i>
      </div>
    </nav>

    <div class="home-content">
  

      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Utilisateur</div><br>
          <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
<br>
          <div class="sales-details">
         
          <table  id="myTable">
            <tr class="header">
                <th>Id</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>CIN</th>
                <th>Numero</th>
                <th>type</th>
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
          <div class="title">Chambres Disponibles</div>
          <input type="text" id="myInputc" onkeyup="myFunctionc()" placeholder="Search for type..">

          <table  id="myTablec">
            <tr class="header">
                <th>Id</th>
                <th>Numero</th>
                <th>Type</th>
                <th>Prix</th>
            </tr>
            <?php
        $lignec = $pdostmtc->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($ligne);
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
      <div class="wrapper">
                            <div class="registration_form">
                                        <form action="create.php" method="post">
                                            <div class="form_wrap">
                                                <div class="input_grp">
                                                        <div class="input_wrap">
                                                            <label for="ftype">id utilisateur</label>
                                                            <?php
                                                            $queryu = "select id from utilisateur";
                                                            $pdostmtu = $pdo->prepare($queryu);
                                                            $pdostmtu->execute();
                                                            ?>
                                                            <select id="ftype" name="inputUtilisateur">
                                                            <?php
                                                              $ligne = $pdostmtu->fetchAll(PDO::FETCH_ASSOC);
                                                              // var_dump($ligne);
                                                              foreach ($ligne as $value) {
                                                              ?>
                                                            <option value="<?php echo $value["id"]; ?>" name="inputidUtilisateur"><?php echo $value["id"]; ?></option>
                                                            <?php } ?>
                                                            </select>
                                                            <!-- <input type="text" id="ftype" name="inputidUtilisateur"> -->
                                                        </div>
                                                        <div class="input_wrap">
                                                            <label for="ftype">id Chambre</label>

                                                            <?php
                                                            $querycc = "select id from chambre";
                                                            $pdostmtcc = $pdo->prepare($querycc);
                                                            $pdostmtcc->execute();
                                                            ?>
                                                            <select id="ftype" name="inputChambre">
                                                            <?php
                                                              $ligne = $pdostmtcc->fetchAll(PDO::FETCH_ASSOC);
                                                              // var_dump($ligne);
                                                              foreach ($ligne as $value) {
                                                              ?>
                                                            <option value="<?php echo $value["id"]; ?>" name="inputidChambre"><?php echo $value["id"]; ?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="input_wrap">
                                                            <label for="ftype">Date Debut</label>
                                                            <input type="date" id="ftype" name="inputdateDebut">
                                                        </div>
                                                        <div class="input_wrap">
                                                            <label for="ftype">Date Fin</label>
                                                            <input type="date" id="ftype" name="inputdateFin">
                                                        </div>
                                                        <div class="input_wrap">
                                                            <label for="ftype">formule</label>
                                                            <select id="ftype" name="inputformule">
                                                            <option value="pensionComplete">pensionComplete</option>
                                                            <option value="demiPension">demiPension</option>
                                                            <option value="bedBreakfast">bedBreakfast</option>
                                                            <option value="bedOnly">bedOnly</option>
                                                            </select>
                                                        </div>
                                                        <div class="input_wrap">
                                                            <label for="ftype">facture</label>
                                                            <input type="text" id="ftype" name="inputidFacture">
                                                        </div>
                                                        <div class="input_wrap">
                                                            <label for="ftype">etat</label>
                                                            <select  id="ftype" name="inputetat">
                                                              <option value="En Attente">En Attente</option>
                                                              <option value="confirmer">confirmer</option>
                                                              <option value="annuler">annuler</option>

                                                        </div>
                                                </div>
                                                    
                                                       
                                                           
                                            </div><br>
                                  
                    <div class="button">
                        <a href="#"><input type="submit" value="Ajouter" class="submit_btn" >
</a>
                    </div>
                    </form>
                            </div>
                        </div>
    </div>
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
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