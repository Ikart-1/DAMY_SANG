<?php
require('../connexion.php');
session_start();
if(isset($_SESSION['id_admine'])){
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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css"
    integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <link rel="shortcut icon" href="../assets/img/iconRed.svg" type="image/x-icon">
  <link rel="stylesheet" href="../assets/fonts/css/all.css">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">


  <script src="..assets/js/bootstrap.min.js"></script>
  <title>Membres</title>
</head>

<body>
  <?php include('sidebar.php') ?>
  <section class="">
    <div class="container-xl">
      <div class="table-responsive">
        <div class="table-wrapper">
          <div class="table-title">
            <div class="row">
              <div class="col-sm-4">
                <h1>Membres</h1>
              </div>
              <div class="col-sm-4">
                <button class="btn add">
                  <a href="ajouterMembre.php" class=" text-decoration-none">Ajouter Membre</a>
                </button>
              </div>
              <?php
              // had 2 req katijib num ela wed num row dyl search
              $req2 = "SELECT id_membre as id, nom_membre AS nom, prenom_membre AS prenom , image_membre AS img ,type_sang AS sang, ville from membre where userlevel=0 ";
              $req = "SELECT id_membre as id,nom_membre AS nom, prenom_membre AS prenom, image_membre AS img  ,type_sang AS sang, ville , date_naiss as date from membre where userlevel=0";
              $search = '';
              if (isset($_GET['search-btn'])) {
                $search = trim($_GET['search']);
                $req2 .= " and  (nom_membre like '%$search%' OR prenom_membre like '%$search%' OR id_membre = '$search')";
                $req .= " and  (nom_membre like '%$search%' OR prenom_membre like '%$search%' OR id_membre = '$search' )";
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
                <th>Nom</th>
                <th>Photo</th>
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
                      $req .= " and type_sang like '%$search_sang%'";
                      $req2 .= " and type_sang like '%$search_sang%'";
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
                <th class="search">
                  <?php
                  $search_ville = '';
                  if (isset($_GET['search-ville'])) {
                    $search_ville = $_GET['search_ville'];
                    if ($search_ville != 'Tous') {
                      $req .= " and ville like '%$search_ville%'";
                      $req2 .= " and ville like '%$search_ville%'";
                    }
                  }
                  ?>
                  <form action="" method="get">
                    <select class="selectpicker" data-live-search="true" style="width: 10px;" name="search_ville">
                      <?php if (empty($search_ville)) { ?>
                        <option value="Tous" selected alt="Sélectionné">Tous</option>
                        <option value="Agadir">Agadir</option>
                        <option value="Rabat">Rabat</option>
                        <option value="Casablanca">Casablanca</option>
                        <option value="Essaouira">Essaouira</option>
                        <option value="Safi">Safi</option>
                        <option value="Marrakech">Marrakech</option>
                        <option value="Berkan">Berkan</option>
                        <option value="Tanger">Tanger</option>
                        <option value="Laayoun">Laayoun</option>
                        <option value="Salé">Salé</option>
                        <option value="Fès">Fès</option>
                        <option value="Meknès">Meknès</option>
                        <option value="El Jadida">El Jadida</option>
                        <option value="Ouarzazate">Ouarzazate</option>
                        <option value="Berrchid">Berrchid</option>
                        <option value="Settat">Settat</option>
                        <option value="Dakhla">Dakhla</option>

                      <?php } else if ($search == 'Tous') { ?>
                          <option value="<?= $search_ville ?>" selected alt="Sélectionné"><?= $search_ville ?></option>
                          <option value="Agadir">Agadir</option>
                          <option value="Rabat">Rabat</option>
                          <option value="Casablanca">Casablanca</option>
                          <option value="Essaouira">Essaouira</option>
                          <option value="Safi">Safi</option>
                          <option value="Marrakech">Marrakech</option>
                          <option value="Berkan">Berkan</option>
                          <option value="Tanger">Tanger</option>
                          <option value="Laayoun">Laayoun</option>
                          <option value="Salé">Salé</option>
                          <option value="Fès">Fès</option>
                          <option value="Meknès">Meknès</option>
                          <option value="El Jadida">El Jadida</option>
                          <option value="Ouarzazate">Ouarzazate</option>
                          <option value="Berrchid">Berrchid</option>
                          <option value="Settat">Settat</option>
                          <option value="Dakhla">Dakhla</option>
                      <?php } else { ?>
                          <option value="<?= $search_ville ?>" selected alt="Sélectionné"><?= $search_ville ?></option>
                          <option value="Tous">Tous</option>
                          <option value="Agadir">Agadir</option>
                          <option value="Rabat">Rabat</option>
                          <option value="Casablanca">Casablanca</option>
                          <option value="Essaouira">Essaouira</option>
                          <option value="Safi">Safi</option>
                          <option value="Marrakech">Marrakech</option>
                          <option value="Berkan">Berkan</option>
                          <option value="Tanger">Tanger</option>
                          <option value="Laayoun">Laayoun</option>
                          <option value="Salé">Salé</option>
                          <option value="Fès">Fès</option>
                          <option value="Meknès">Meknès</option>
                          <option value="El Jadida">El Jadida</option>
                          <option value="Ouarzazate">Ouarzazate</option>
                          <option value="Berrchid">Berrchid</option>
                          <option value="Settat">Settat</option>
                          <option value="Dakhla">Dakhla</option>
                      <?php } ?>

                    </select>
                    <button type="submit" name="search-ville" title="Filtrer par ville"><i class="fa-solid fa-city"></i></button>
                  </form>
                </th>
                <th>Age</th>

                <th>Opérations</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $num_per_page = 8;
              if (isset($_GET["page"])) {
                $page = $_GET["page"];
              } else {
                $page = 1;
              }
              $start_from = ($page - 1) * $num_per_page;
              $req .= " ORDER BY prenom_membre ASC limit $start_from,$num_per_page";
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
                    <?= $data['prenom']." ". $data['nom'] ?>
              </td>
                  <td>
                    <img src="<?= $data['img'] ?>" style="width: 25px; height:25px;" alt="">
                  </td>
                  <td>
                    <?= $data['sang'] ?>
                  </td>
                  <td>
                    <?= $data['ville'] ?>
                  </td>
                  <td><?php 
                  $dateOfBirth = $data['date'];
                  
                  $currentDate = new DateTime();
                  $birthDate = new DateTime($dateOfBirth);
                  $age = $currentDate->diff($birthDate)->y;
                  echo $age;
                  ?></td>
                  <td class="d-flex justify-content-around align-items-center">
                      <a href="operations_membre.php?action=view&id=<?=$data['id']?>" class="view" title="View" data-toggle="tooltip"><i class="fa-solid fa-user"></i></a>
                    <a href="operations_membre.php?action=Edit&id=<?=$data['id']?>" class="edit" title="Edit" data-toggle="tooltip"><i class="fa-solid fa-user-pen"></i></a>
                    <a href="operations_membre.php?action=Delete&id=<?=$data['id']?>" class="delete" title="Delete" data-toggle="tooltip"><i class="fa-solid fa-user-xmark"></i></a>
                  </td>
                </tr>
              <?php }}  else { ?>
              <tr>
                <td colspan="7" class="text-center p-5">Aucun membres !</td>
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
              echo "<a href='membres.php?page=" . $i . "' class='btn  m-1 pagination-link $activeClass'>$i</a>";
            }
            echo "</center>";

            ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  

  <style>
    #Update .bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
      width: 0;
    }
  </style>
  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
  <script src="../assets/js/bootstrap-select.min.js"></script>
  <script>
    $(document).ready(function () {
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
    function ShowProfil() {
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
    function ShowMessageDelete() {
      if (MessageDelete.style.display === "none") {
        MessageDelete.style.display = "block";
      } else {
        MessageDelete.style.display = "none";
      }

    };
    const Update = document.getElementById("Update");
    function HideUpdate() {

      if (Update.style.display === "none") {
        Update.style.display = "block";
      } else {
        Update.style.display = "none";
      }
    }
    function ShowUpdate() {
      if (Update.style.display === "none") {
        Update.style.display = "block";
      } else {
        Update.style.display = "none";
      }

    };



  </script>


</body>

</html>
<?php }
else{
  header('location:loginadmin.php');
} ?>