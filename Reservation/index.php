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
          <a href="#"  class="active">
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
      <div class="profile-details">
        <img src="../fonts/user-solid.svg" alt="" style="width:25px;heigth:20px">
        <span class="admin_name">Prem Shahi</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    <div class="home-content" style="width: 147%!important;">
    <?php
$pdo = new connect();
$query = "select reservation.id as idr, utilisateur.id as idu, chambre.id as idc, nom,prenom,email,cin,numero,dateDebut,dateFin,num,prix,utilisateur.type as typeu, categorie.type as typec
  from utilisateur,reservation,categorie, chambre where utilisateur.id=reservation.idUtilisateur and chambre.id=reservation.idChambre and categorie.id=chambre.idCategorie";
$pdostmt = $pdo->prepare($query);
$pdostmt->execute();

?>

      <div class="sales-boxes" >
        <div class="recent-sales box">
          <br>
          <div class="title"> <a href="create.php" ><img src="../fonts/plus-solid.svg"  style="width:20px;heigth:20px"alt=""></a>  Reservations</div>
         <br>
         <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">



          <div class="sales-details">
            
           <table  id="myTable">
            <tr class="header">
                <!-- <th>Id</th> -->
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <!-- <th>CIN</th> -->
                <th>Numero</th>
                <th>type</th>
                <th>Date Debut</th>
                <th>Date Fin</th>
                <th>Numero Chambre</th>
                <th>Type Chambre</th>
                <th>Prix</th>
                <th>Operations</th>
            </tr>
            <?php
        $ligne = $pdostmt->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($ligne);
        foreach ($ligne as $value) {
        ?>
            <tr>
                <td><?php echo $value["nom"]; ?></td>
                <td><?php echo $value["prenom"]; ?></td>
                <td><?php echo $value["email"]; ?></td>
                <td><?php echo $value["numero"]; ?></td>
                <td><?php echo $value["typeu"]; ?></td>
                <td><?php echo $value["dateDebut"]; ?></td>
                <td><?php echo $value["dateFin"]; ?></td>
                <td><?php echo $value["num"]; ?></td>
                <td><?php echo $value["typec"]; ?></td>
                <td><?php echo $value["prix"]; ?></td>
                <td><a href="update.php?id=<?php echo $value["idr"] ?>"><img src="../fonts/pen-to-square-solid.svg"  style="width:25px;heigth:25px"alt=""></a> <a href="delete.php?id=<?php echo $value["idr"] ?>"><img src="../fonts/trash-solid.svg"  style="width:20px;heigth:20px"alt=""></a></td>
                <td></td>
            </tr>
        <?php } ?>
           </table>
          </div>
          <div class="button">
            <a href="#">See All</a>
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
 </script>

</body>
</html>