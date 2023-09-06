<?php
require('../connexion.php');
session_start();
if(isset($_SESSION['id_medecin'])){
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
    <title>Demandes</title>
</head>
<body >
<?php include('sidebar.php') ?>
<?php
require('../connexion.php');

  $req3 = "SELECT id_centre from medecin  where id_medecin =$id";
  $res3 = $pdo -> query($req3);
  $row3 = $res3 -> fetch(PDO :: FETCH_ASSOC);
  $idcm = $row3['id_centre'];
  
?>
<section class="px-1 ">
      <div class="container-xl">
        <div class="table-responsive">
          <div class="table-wrapper">
            <div class="table-title">
              <div class="row">
                <div class="col-sm-8">
                  <h1>Demandes</h1>
                </div>
                <?php
                // had 2 req katijib num ela wed num row dyl search
                $req2 = "SELECT d.id_demande AS id, m.nom_membre AS nom, m.prenom_membre AS prenom, d.deadline AS date, m.type_sang AS tsang from demande d, membre m where 
                d.id_membre=m.id_membre and d.id_centre='$idcm'";
              $req = "SELECT d.id_demande AS id, m.nom_membre AS nom,d.type_sang, m.prenom_membre AS prenom, d.deadline AS date, m.type_sang AS tsang, m.cin_membre AS cin
                     FROM demande d
                     INNER JOIN membre m ON d.id_membre = m.id_membre
                     INNER JOIN centre c ON d.id_centre = c.id_centre
                     WHERE c.id_centre = $idcm";
                $search = '';
                if (isset($_GET['search-btn'])) {
                  $search = trim($_GET['search']);
                  $req2 .= " and  (m.nom_membre like '%$search%' OR m.prenom_membre like '%$search%' OR d.id_demande = '$search')";
                  $req .= " and  (m.nom_membre like '%$search%' OR m.prenom_membre like '%$search%' OR d.id_demande = '$search')";
                }
                
                ?>
                <div class="col-sm-4">
                  <div class="search-box">
                    <form action="" method="get" class="">
                      <input type="search" name="search" value="<?= $search ?>" placeholder="ID, Nom, Prénom ...">
                      <button type="submit" name="search-btn" class="search-btn"><i
                          class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <table class="table">
              <thead>
                <tr class="searchs">
                  <th>ID</th>
                  <th>Demandeur</th>
                  <th>Date limite</th>
                  <style>
                    .search .bootstrap-select>.dropdown-toggle {
                      width: 10%;
                    }

                    .bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
                      width: max-content;
                    }

                    .bootstrap-select>.dropdown-toggle.bs-placeholder,
                    .bootstrap-select>.dropdown-toggle.bs-placeholder:active,
                    .bootstrap-select>.dropdown-toggle.bs-placeholder:focus,
                    .bootstrap-select>.dropdown-toggle.bs-placeholder:hover {
                      color: var(--font1-color);
                    }

                    .search .btn {
                      border: none;
                    }

                    .page-item.active .page-link {
                      z-index: 3;
                      color: #fff;
                      background-color: #bb1a2c;
                      border: none;
                    }

                    .page-item.active .page-link:focus {
                      border: none;

                    }

                    @media (max-width: 767px) {
                      #x {
                        color: var(--font1-color);
                        /* Change color to red when screen width is less than 768px */
                      }
                    }

                    #MessageDelete .container {
                      max-width: 540px;
                    }
                  </style>
                  <th class="search">
                    <?php
                    $search_sang = '';
                    if (isset($_GET['search-sang'])) {
                      $search_sang = $_GET['search-sang-type'];
                      if ($search_sang != 'Tous') {
                        $req .= " and m.type_sang like '%$search_sang%'";
                        $req2 .= " and m.type_sang like '%$search_sang%'";
                      }
                    }
                    
                    ?>
                    <form action="" method="get">
                      <select class="selectpicker" style="width: 10px;" name="search-sang-type">
                        <?php if (empty($search_sang)) { ?>
                          <option value="Tous" selected alt="Sélectionné">Tous</option>
                          <option value="A+">A+</option>
                          <option value="A-">A-</option>
                          <option value="B+">B+</option>
                          <option value="B-">B-</option>
                          <option value="AB+">AB+</option>
                          <option value="AB-">AB-</option>
                          <option value="O+">O+</option>
                          <option value="O-">O-</option>
                        <?php } else if ($search == 'Tous') { ?>
                            <option value="<?= $search_sang ?>" selected alt="Sélectionné"><?= $search_sang ?></option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        <?php } else { ?>
                          <option value="<?= $search_sang ?>" selected alt="Sélectionné"><?= $search_sang ?></option>
                            <option value="Tous">Tous</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        <?php } ?>
                       
                      </select>
                      <button type="submit" name="search-sang" title="Filtrer par type de sang"><i
                          class="fa-solid fa-heart"></i></button>
                    </form>
                  </th>

                  <th>Afficher</th>
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
                $req .= " ORDER BY d.id_demande DESC limit $start_from,$num_per_page";
                
                $res = $pdo->query($req);
                $row = $res->fetchAll(PDO::FETCH_ASSOC);
                $count = $res->rowCount();
                if($count > 0){
                  foreach ($row as $data) {
                    if($data['nom']  == 'Admin'){ ?>
                      <tr>
                      <td>
                        <?= $data['id'] ?>
                      </td>
                      <td>
                        <?= $data['nom'] ?>
                      </td>
                      <td>
                        <?= $data['date'] ?>
                      </td>
                      <td>
                        <?= $data['type_sang'] ?>
                      </td>
                      <td class="d-flex justify-content-around align-items-center">
                      <a href="operations_demande.php?action=view&id=<?=$data['id']?>" class="view" title="View" data-toggle="tooltip"><i class="fa-solid fa-circle-info"></i></a>
                    </td>
                    </tr>
  
                   <?php } else { ?>
                    <tr>
                      <td>
                        <?= $data['id'] ?>
                      </td>
                      <td>
                        <?= $data['prenom'] . " " . $data['nom'] ?>
                      </td>
                      <td>
                        <?= $data['date'] ?>
                      </td>
                      <td>
                        <?= $data['tsang'] ?>
                      </td>
                      <td class="d-flex justify-content-around align-items-center">
                      <a href="operations_demande.php?action=view&id=<?=$data['id']?>" class="view" title="View" data-toggle="tooltip"><i class="fa-solid fa-circle-info"></i></a>
                    </td>
                    </tr>
                   <?php } ?>
                   
                  <?php } }
                   else { ?>
                    <tr>
                      <td colspan="6" class="text-center p-5">Aucun demandes !</td>
                    </tr>
      
                  <?php  } ?>
  
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
                echo "<a href='demandes.php?page=" . $i . "' class='btn  m-1 pagination-link $activeClass'>$i</a>";
              }
              echo "</center>";

              ?>
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
</script>


</body>
</html>
<?php }else{
    header('location:loginmedecin.php');
} ?>