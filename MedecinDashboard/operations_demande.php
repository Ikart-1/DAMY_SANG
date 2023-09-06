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
  $req = "SELECT d.id_demande AS id, m.nom_membre AS nom, m.prenom_membre AS prenom, d.deadline AS date, m.type_sang AS tsang, c.nom_centre as centre, m.cin_membre AS cin
  , m.num_tel AS phone
  FROM demande d
  INNER JOIN membre m ON d.id_membre = m.id_membre
  INNER JOIN centre c ON d.id_centre = c.id_centre
  where id_demande=$id";
  $res = $pdo->query($req);
  $row = $res->fetch(PDO::FETCH_ASSOC);
  ?>
  <div class="row">

  <div class="row">
  

    <div class="col-md-12 border-right">
      <div class="p-3 py-3">
      <div class="row">
                <div class="profile-title"><span>Informations du Demande</span></div><br>
            </div>
        <div class="row mt-2">
          <div class="col-md-4 mb-2"><label class="labels">id</label><input disabled type="text"
              class="form-control my-2" placeholder="" value="<?= $row['id'] ?>"></div>
          <div class="col-md-4 mb-2"><label class="labels">Date Limite</label><input disabled type="date"
              class="form-control my-2" value="<?= $row['date']?>" placeholder=""></div>
        
        <div class="col-md-4 mb-2"><label class="labels">Centre</label><input disabled type="text"
              class="form-control my-2" placeholder="" value="<?= $row['centre'] ?>"></div>
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
              class="form-control my-2" placeholder="" value="<?= $row['nom'] ?>"></div>
          <div class="col-md-6 mb-2"><label class="labels">Prenom Demandeur</label><input disabled type="text"
              class="form-control my-2" value="<?= $row['prenom']?>" placeholder=""></div>
        </div>
        <div class="row mt-2">
          <div class="col-md-6 mb-2"><label class="labels">Cin Demandeur</label><input disabled type="text"
              class="form-control my-2" placeholder="" value="<?= $row['cin'] ?>"></div>
          <div class="col-md-6 mb-2"><label class="labels">Telephone Demandeur</label><input disabled type="text"
              class="form-control my-2" value="<?= $row['phone']?>" placeholder=""></div>
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