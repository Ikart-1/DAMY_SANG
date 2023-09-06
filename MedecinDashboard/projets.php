<?php
require('../connexion.php');
session_start();
if(isset($_SESSION['id_medecin'])){
    $id =$_SESSION['id_medecin'];
  $reqc ="select id_centre from medecin where id_medecin =".$id;
  $rec=$pdo->query($reqc);
  $rowc = $rec->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <link rel="shortcut icon" href="../assets/img/iconRed.svg" type="image/x-icon">
    <link rel="stylesheet" href="../assets/fonts/css/all.css">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


<script src="..assets/js/bootstrap.min.js"></script>
    <title>Projets</title>
</head>
<body >
<?php include('sidebar.php') ?>
  <section class="px-1 ">
      <div class="container-xl">
          <div class="table-responsive">
              <div class="table-wrapper">
                  <div class="table-title">
                      <div class="row">
                          <div class="col-sm-4">
                            <h1>Projets</h1>
                          </div>
                          <div class="col-sm-4">
                            <button class="btn add">
                             <a href="ajoutprojet.php" class=" text-decoration-none">Ajouter Projet</a>
                            </button>
                          </div>
                          <?php
                // had 2 req katijib num ela wed num row dyl search
               $req2 = "SELECT p.id_campagne as id, p.titre_campagne as titre, p.description_campagne as descrip ,p.photo_campagne as img , p.date_campagne as date from campagne p, centre c 
               where p.id_centre=c.id_centre and p.id_centre =".$rowc['id_centre'];
                $req = "SELECT p.id_campagne as id, p.titre_campagne as titre, p.description_campagne as descrip ,p.photo_campagne as img , p.date_campagne as date from campagne p, centre c 
                where p.id_centre=c.id_centre and p.id_centre =".$rowc['id_centre'];
                $search = '';
                if (isset($_GET['search-btn'])) {
                  $search = trim($_GET['search']);
                  $req2 .= " and  (p.titre_campagne like '%$search%' OR p.description_campagne like '%$search%' OR p.id_campagne = '$search')";
                  $req .= " and  (p.titre_campagne like '%$search%' OR p.description_campagne like '%$search%' OR p.id_campagne = '$search')";
                }
                ?>
                <div class="col-sm-4">
                  <div class="search-box">
                    <form action="" method="get" class="">
                      <input type="search" name="search" value="<?= $search ?>" placeholder="ID, Nom, Description ...">
                      <button type="submit" name="search-btn" class="search-btn"><i
                          class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                  </div>
                </div>
                      </div>
                  </div>
                  <table class="table ">
                      <thead>
                          <tr class="searchs">
                              <th>ID</th>
                              <th>Titre</th>
                              <th>Photo</th>
                              <th>Description</th>                            
                              <th>Date</th>
                              <th>Opérations</th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php
                $num_per_page = 6;
                if (isset($_GET["page"])) {
                  $page = $_GET["page"];
                } else {
                  $page = 1;
                }
                $start_from = ($page - 1) * $num_per_page;
                $req .= " limit $start_from,$num_per_page";
                $res = $pdo->query($req);
                $row = $res->fetchAll(PDO::FETCH_ASSOC);
                $count = $res->rowCount();
                if($count > 0){
                  foreach ($row as $data) {
                    ?>
                    <tr>
                      <td>
                        <?= $data['id'] ?>
                      </td>
                      <td>
                        <?= $data['titre'] ?>
                      </td>
                      <td>
                        <img src="<?= $data['img'] ?>" style="width: 25px; height:25px;" alt="">
                      </td>
                      <td>
                      <?= substr($data['descrip'], 0, 50)." ..." ?>
                      </td>
                      <td>
                      <?= $data['date'] ?>
                      </td>
                      <td class="d-flex justify-content-around align-items-center">
                      <a href="operations_projet.php?action=view&id=<?=$data['id']?>" class="view" title="View" data-toggle="tooltip"><i class="fa-solid fa-circle-info"></i></a>
                      <a href="operations_projet.php?action=Edit&id=<?=$data['id']?>" class="edit" title="Edit" data-toggle="tooltip"><i class="fa-solid fa-pen-to-square"></i></a>
                      <a href="operations_projet.php?action=Delete&id=<?=$data['id']?>" class="delete" title="Delete" data-toggle="tooltip"><i class="fa-solid fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php }  }
                   else { ?>
                    <tr>
                      <td colspan="6" class="text-center p-5">Aucun campagnes !</td>
                    </tr>
      
                  <?php  } 
                  ?>

               
               
              </tbody>
            </table>

            <div class="clearfix">
              <style>
                .pagination-link.active {
                  z-index: 3;
                  color: #fff;
                  background-color: var(--hover-color);
                  border: none;
                }
              </style>

              <?php
              $res2 = $pdo->query($req2);
              $total_records = $res2->rowCount();
              $total_pages = ceil($total_records / $num_per_page);
              //echo $total_pages
              echo "<center>";
              echo "<center>";
              for ($i = 1; $i <= $total_pages; $i++) {
                $activeClass = ($i == $page) ? 'active' : ''; // Add active class if current page
                echo "<a href='Demandes.php?page=" . $i . "' class='btn  m-1 pagination-link $activeClass'>$i</a>";
              }
              echo "</center>";

              ?>
            </div>
          </div>  
      </div> 
  </section>
 
  <section id="MessageDelete" class="hide">
    <div class="container py-5  position-absolute top-50 start-50 translate-middle">
        <div class=" mb-4">
          <div class="card mb-3" style="border-radius: .5rem;">
            <div class="x-mark pt-2 px-2">
                <i class="fa-sharp fa-solid fa-circle-xmark" title="Fermer" id="x" onclick="HideMessageDelete()"></i>
          </div>
          <div class="title px-5 pt-5 ">
            <h1 class="text-center mb-3">Êtes-vous sûr de vouloir supprimer ce projet ? </h1>
            <p class="text-center">Cette action est irréversible et toutes les informations associées à ce projet seront définitivement effacées.</p>
          </div>
          <div class="row mb-5 d-flex justify-content-around align-items-center">
          <div class="row ">
                <div class="col-sm-6 d-flex justify-content-center" >
                   <button class="btn" onclick="HideMessageDelete()">Annuler</a>
                </div>
                <div class="col-sm-6 " >
                <button class="btn">Supprimer</a>
                </div>
            </div>
          </div>
          </div>
        </div>
      </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
  <script src="../assets/js/bootstrap-select.min.js"></script>
   <script>
    $(document).ready(function(){
               $('search').selectpicker();
          })
  const profil = document.getElementById("profil");
  function HideProfil() {
  
  if (profil.style.display === "none") {
    profil.style.display = "block";
  } else {
    profil.style.display = "none";
  }
}
function ShowProfil(){
    if (profil.style.display === "none") {
    profil.style.display = "block";
  } else {
    profil.style.display = "none";
  }

};

const MessageDelete = document.getElementById("MessageDelete");
  function HideMessageDelete() {
  
  if (MessageDelete.style.display === "none") {
    MessageDelete.style.display = "block";
  } else {
    MessageDelete.style.display = "none";
  }
}
function ShowMessageDelete(){
    if (MessageDelete.style.display === "none") {
    MessageDelete.style.display = "block";
  } else {
    MessageDelete.style.display = "none";
  }

};



</script>


</body>
</html>
<?php }
else{
    header('location:loginmedecin.php');
} ?>