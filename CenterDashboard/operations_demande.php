<?php
ob_start();
require('../connexion.php');
session_start();
if(isset($_SESSION['id'])){
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
  <?php include('sidebar.php') ?>
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
  else if ($action === 'Edit') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        //echo" Code pour l'action 'edit'";
  ?>
   <div class="container mt-5 mb-5">
   <form method="POST" style="display: block;" class="container  py-5 ">
<div class="row">
  <div class="col-md-10 mb-3">
    <h1 class="page-title">Modifier Demande</h1>
  </div>
  <?php
  $req = "SELECT d.id_demande AS id, m.nom_membre AS nom, m.prenom_membre AS prenom, d.deadline AS date, m.type_sang AS tsang, c.nom_centre as centre,c.id_centre as id_centre, m.cin_membre AS cin
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
        <div class="row mt-2 ">
          <div class="col-md-4 mb-2 d-none"><label class="labels">id</label><input  type="text"
              class="form-control my-2" style="height:50%" name="nvid" placeholder="" value="<?= $row['id'] ?>"></div>
          <div class="col-md-6 mb-2"><label class="labels">Date Limite</label><input  type="date"
              class="form-control my-2" style="height:50%" name="datelimite" value="<?= $row['date']?>" placeholder=""></div>
        
        <div class="col-md-6 mb-2"><label class="labels mb-2">Centre</label>
          <!--  -->
          <select  name="centre" class="form-control"  style="height: 39px;">
                                    <option value="<?= $row['id_centre']?>" selected="selected"><?= $row['centre']?></option>
                                    <?php
                                    $reqcentre = "SELECT * FROM centre";
                                    $rescentre = $pdo->query($reqcentre);
                                    while ($rowcentre = $rescentre->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        
						                <option value="<?=$rowcentre['id_centre']?>"><?=$rowcentre['nom_centre']?></option>
                                        <?php } ?>
					                </select>
        </div>
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
              class="form-control my-2" style="height:50%" placeholder="" value="<?= $row['nom'] ?>"></div>
          <div class="col-md-6 mb-2"><label class="labels">Prenom Demandeur</label><input disabled type="text"
              class="form-control my-2" style="height:50%" value="<?= $row['prenom']?>" placeholder=""></div>
        </div>
        <div class="row mt-2">
          <div class="col-md-6 mb-2"><label class="labels">Cin Demandeur</label><input disabled type="text"
              class="form-control my-2" style="height:50%" placeholder="" value="<?= $row['cin'] ?>"></div>
          <div class="col-md-6 mb-2"><label class="labels">Telephone Demandeur</label><input disabled type="text"
              class="form-control my-2" style="height:50%" value="<?= $row['phone']?>" placeholder=""></div>
        </div>

      </div>
      <div class="row ">           
           <!-- <div class="mt-1  d-flex justify-content-center"><button class="btn"  name="btnedit"> Enregistrer les modifications</button></div> -->
           <div class="mt-1  d-flex justify-content-center"><input type="submit" style="width:25px" class="btn" value="Enregistrer les modifications" name="btnedit"/></div>
        </div>
    </div>
    
  </div>
</div>
</div>
</div>
</form>
</div>
  <?php
  if(isset($_POST['btnedit'])){
    $iddemande=$_POST['nvid'];
    $datelimite=$_POST['datelimite'];
    $centre=$_POST['centre'];

    $reqedit="UPDATE demande
    SET id_demande=$iddemande,id_centre=$centre,deadline='$datelimite'
    WHERE id_demande=$id";
    $resedit=$pdo->query($reqedit);
    header('location:Demandes.php');
  }
  } }
  elseif ($action === 'Delete') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
?>
 <!-- <form action=""  method="POST"> -->
  <section id="MessageDelete">
    <form method="POST" style="display: block;" class="container  py-5 ">
      <div class=" mb-4">
        <div class="card mb-3" style="border-radius: .5rem;">
          <!-- <div class="x-mark pt-2 px-2">
            <i class="fa-sharp fa-solid fa-circle-xmark" title="Fermer" id="x" onclick="HideMessageDelete()"></i>
          </div> -->
          <div class="title px-5 pt-5 ">
            <h1 class="text-center mb-3">Êtes-vous sûr de vouloir supprimer cette demande de sang ? </h1>
            <p class="text-center">Cette action est irréversible et toutes les informations associées à cette demande
              seront définitivement effacées.</p>
          </div>
          <div class="row px-5 mb-5 mt-5 d-flex justify-content-center">
              <!-- <div class="col-md-6 mb-3 d-flex justify-content-center">
                <input style="width:10px;"  class="btn" type="submit" value="Annuler" onclick="HideMessageDelete()"/>
              </div> -->
              <div class="col-sm-6 mb-3 d-flex justify-content-center">
                <input style="width:10px;" name="delete" type="submit" value="Supprimer" class="btn"/>
              </div>
          </div>
        </div>
      </div>
    </form>
  </section>
  <?php
  if(isset($_POST['delete'])){
    $reqdelet="DELETE FROM demande where id_demande=$id";
    $resdelet = $pdo->query($reqdelet);
    header("location:Demandes.php");
  }
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
<?php ob_end_flush(); ?>
</body>

</html>
<?php }
else{
  header('location:logincentre.php');
} ?>