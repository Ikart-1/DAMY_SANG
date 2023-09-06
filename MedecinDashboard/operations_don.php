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


  <script src="../assets/js/bootstrap.min.js"></script>
  <title>Operations</title>
</head>

<body>
  <?php include('sideBar.php') ?>
  <style>
     .imgprofile {
        position: relative;
        width: 250px;
        height: 250px;
        border-radius: 50%;
        border: 2px solid var(--font3-color);
        overflow: hidden;
        margin-bottom: 1rem;
      }

      .imgprofile img {
        cursor: pointer;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }

      .profile-title {
        color: var(--bg1-color);
        padding: 0;
        padding-bottom: 10px;
        border-bottom: 1px solid var(--bg1-color);
      }

      .page-title {
        color: var(--font3-color);
        margin: 8px 0 0;
        font-size: 22px;
      }

      .form-control:disabled,
      .form-control[readonly] {
        background-color: transparent;
        color: var(--font1-color);
      }

      /* .btn-check:focus+.btn, .btn:focus {
      outline: 0;
      box-shadow: none;
  } */
    </style>
  <style>
    #Update .bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
      width: 0;
    }
  </style>
   <?php 

if (isset($_GET['action'])) {
  $action = $_GET['action'];

  if ($action === 'view') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
      // echo" Code pour l'action 'view'";
  ?>
   <div class="container mt-5 mb-5">

<div class="row">
  <div class="col-md-10 mb-3">
    <h1 class="page-title">Demande</h1>
  </div>
  <?php
  $req = " SELECT    do.id_don as iddon , do.date_don as datedon , c.nom_centre as centre , m.nom_medecin as nommed,
  m.prenom_medecin as prenommed,
  me.nom_membre as nomdon,me.prenom_membre as prenomdon,me.cin_membre as cindon,me.num_tel as phonedon,
  dem.nom_membre as nomdem ,dem.prenom_membre as prenomdem ,dem.cin_membre as cindem ,dem.num_tel as phonedem 
  FROM don do
  INNER JOIN centre c ON c.id_centre=do.id_centre
  INNER JOIN medecin m  ON m.id_medecin=do.id_medecin
  INNER JOIN membre me ON me.id_membre=do.id_membre
  INNER JOIN demande d ON d.id_demande=do.id_demande
  INNER JOIN membre dem ON dem.id_membre = d.id_membre
  where id_don=$id";
  $res = $pdo->query($req);
  $row = $res->fetch(PDO::FETCH_ASSOC);
  ?>
  <div class="row">

  <div class="row">
  

    <div class="col-md-12 border-right">
      <div class="p-3 py-3">
      <div class="row">
                <div class="profile-title"><span>Informations du Don</span></div><br>
            </div>
        <div class="row mt-2">
          <div class="col-md-4 mb-2"><label class="labels">id</label><input disabled type="text"
              class="form-control my-2" placeholder="" value="<?= $row['iddon'] ?>"></div>
          <div class="col-md-4 mb-2"><label class="labels">Date du don</label><input disabled type="date"
              class="form-control my-2" value="<?= $row['datedon']?>" placeholder=""></div>
        
        <div class="col-md-4 mb-2"><label class="labels">Centre</label><input disabled type="text"
              class="form-control my-2" placeholder="" value="<?= $row['centre'] ?>"></div>
              <div class="col-md-4 mb-2"><label class="labels">Medecin</label><input disabled type="text"
              class="form-control my-2" placeholder="" value="<?= $row['nommed']." ".$row['prenommed'] ?>"></div>
        </div>

      </div>
    </div>
    <div class="col-md-12 border-right">
      <div class="p-3 py-3">
      <div class="row">
                <div class="profile-title"><span>Informations du Donneur</span></div><br>
            </div>
            <div class="row mt-2">
          <div class="col-md-6 mb-2"><label class="labels">Nom Donneur</label><input disabled type="text"
              class="form-control my-2" placeholder="" value="<?= $row['nomdon'] ?>"></div>
          <div class="col-md-6 mb-2"><label class="labels">Prenom Donneur</label><input disabled type="text"
              class="form-control my-2" value="<?= $row['prenomdon']?>" placeholder=""></div>
        </div>
        <div class="row mt-2">
          <div class="col-md-6 mb-2"><label class="labels">Cin Donneur</label><input disabled type="text"
              class="form-control my-2" placeholder="" value="<?= $row['cindon'] ?>"></div>
          <div class="col-md-6 mb-2"><label class="labels">Telephone Donneur</label><input disabled type="text"
              class="form-control my-2" value="<?= $row['phonedon']?>" placeholder=""></div>
        </div>

      </div>
    </div>
    <div class="col-md-12 border-right">
      <div class="p-3 py-3">
      <div class="row">
                <div class="profile-title"><span>Informations du Demandeur</span></div><br>
            </div>
            <div class="row mt-2">
          <div class="col-md-6 mb-2"><label class="labels">Nom Demandeur</label><input disabled type="text"
              class="form-control my-2" placeholder="" value="<?= $row['nomdem'] ?>"></div>
          <div class="col-md-6 mb-2"><label class="labels">Prenom Demandeur</label><input disabled type="text"
              class="form-control my-2" value="<?= $row['prenomdem']?>" placeholder=""></div>
        </div>
        <div class="row mt-2">
          <div class="col-md-6 mb-2"><label class="labels">Cin Demandeur</label><input disabled type="text"
              class="form-control my-2" placeholder="" value="<?= $row['cindem'] ?>"></div>
          <div class="col-md-6 mb-2"><label class="labels">Telephone Demandeur</label><input disabled type="text"
              class="form-control my-2" value="<?= $row['phonedem']?>" placeholder=""></div>
        </div>

      </div>
    </div>
    
  </div>
</div>
</div>
</div>
</div>
  <?php
  } }  
}

?>

  
  
  


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
  <script src="../assets/js/bootstrap-select.min.js"></script>
  <script>
    $(document).ready(function () {
      $('search').selectpicker();
    })



  // </script>
    <script>
  //   $(document).ready(function () {
  //     $('search').selectpicker();
  //   })
    

  //   const MessageDelete = document.getElementById("MessageDelete");
  //   function HideMessageDelete() {

  //     if (MessageDelete.style.display === "none") {
  //       MessageDelete.style.display = "block";
  //     } else {
  //     }
  //   }
    
    



  // </script>

</body>

</html>
<?php }else{
    header('location:loginmedecin.php');
} ?>