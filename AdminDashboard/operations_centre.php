<?php 
ob_start() 
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
    <h1 class="page-title">Centre</h1>
  </div>
  <?php
  $req = "SELECT * FROM centre 
  where id_centre=$id";
  $res = $pdo->query($req);
  $row = $res->fetch(PDO::FETCH_ASSOC);
  ?>
  <div class="row">

  <div class="row">
  

    <div class="col-md-12 border-right">
      <div class="p-3 py-3">
      <div class="row">
                    <div class="col mb-4"><label class="labels">Nom</label></label> <input type="text" class="form-control" value="<?= $row['nom_centre'] ?>" name="nom" placeholder="nom centre" require>
                    </div>
                    <div class="col mb-4"> <label class="labels">Adresse</label><input type="text" class="form-control" value="<?= $row['adresse_centre'] ?>"  name="adresse" placeholder="Adresse"
                                require></div>
                    <div class="col mb-4">
                        <label for="ville">Ville</label>
                        <input disabled type="text" class="form-control" placeholder="" value="<?= $row['ville_centre'] ?>">
                    </div>
                </div>
                    <div class="row">
                        <div class="col mb-4"><label class="labels">Email</label><input type="text" class="form-control" value="<?= $row['email_centre'] ?>" name="email" placeholder="Email"
                                require></div>
                        <div class="col mb-4"><label class="labels">Fix</label><input type="text" class="form-control" value="<?= $row['numtel_centre'] ?>" id="phone-input"  name="phone" placeholder="Phone"
                                require></div>
                    </div>

                    <div class="row">
                        <div class="col mb-4"><label class="labels">Nom du directeur</label><input type="text" class="form-control" value="<?= $row['nom_directeur'] ?>" name="nomdire" placeholder="Nom du directeur"
                                require></div>
                        <div class="col mb-4"><label class="labels">Prenom du directeur</label><input type="text" class="form-control" value="<?= $row['prenom_directeur'] ?>"  name="prenomdire" placeholder="Preom du directeur"
                                require></div>
                    </div>
                
                <div class="row">
                    <div class="col mb-4"><label class="labels">Nom d'utilisateur</label><input type="text" class="form-control" name="login"
                            placeholder="Nom de l'utilisateur" value="<?= $row['login'] ?>"  minlength="6" maxlength="20" required></div>
                    <div class="col mb-4"><label class="labels">Mots de pass</label><input type="password" class="form-control" name="password"
                            placeholder="Mot de pass" minlength="6" value="<?= $row['password'] ?>"  maxlength="20" required></div>
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
   <!-- <form class="no-styles" id ="form"  action="" method="post"  enctype="multipart/form-data"> -->
  <div class="container mt-5 mb-5">

<div class="row">
  <div class="col-md-10 mb-3">
    <h1 class="page-title">Modier Centre</h1>
  </div>
  <?php
  $req = "SELECT * FROM centre 
  where id_centre=$id";
  $res = $pdo->query($req);
  $row = $res->fetch(PDO::FETCH_ASSOC);
  ?>
  <div class="row">

  <div class="row">
  

    <div class="col-md-12 border-right">
      <div class="p-3 py-3">
      <div class="row">
                    <div class="col mb-4"><label class="labels">Nom</label></label> <input type="text" class="form-control" value="<?= $row['nom_centre'] ?>" name="nom" placeholder="nom centre" require>
                    </div>
                    <div class="col mb-4"> <label class="labels">Adresse</label><input type="text" class="form-control" value="<?= $row['adresse_centre'] ?>"  name="adresse" placeholder="Adresse"
                                require></div>
                    <div class="col mb-4">
                        <label for="ville">Ville</label>
                        <input disabled type="text" class="form-control" placeholder="" value="<?= $row['ville_centre'] ?>">
                    </div>
                </div>
                    <div class="row">
                        <div class="col mb-4"><label class="labels">Email</label><input type="text" class="form-control" value="<?= $row['email_centre'] ?>" name="email" placeholder="Email"
                                require></div>
                        <div class="col mb-4"><label class="labels">Fix</label><input type="text" class="form-control" value="<?= $row['numtel_centre'] ?>" id="phone-input"  name="phone" placeholder="Phone"
                                require></div>
                    </div>

                    <div class="row">
                        <div class="col mb-4"><label class="labels">Nom du directeur</label><input type="text" class="form-control" value="<?= $row['nom_directeur'] ?>" name="nomdire" placeholder="Nom du directeur"
                                require></div>
                        <div class="col mb-4"><label class="labels">Prenom du directeur</label><input type="text" class="form-control" value="<?= $row['prenom_directeur'] ?>"  name="prenomdire" placeholder="Preom du directeur"
                                require></div>
                    </div>
                
                <div class="row">
                    <div class="col mb-4"><label class="labels">Nom d'utilisateur</label><input type="text" class="form-control" name="login"
                            placeholder="Nom de l'utilisateur" value="<?= $row['login'] ?>"  minlength="6" maxlength="20" required></div>
                    <div class="col mb-4"><label class="labels">Mots de pass</label><input type="password" class="form-control" name="password"
                            placeholder="Mot de pass" minlength="6" value="<?= $row['password'] ?>"  maxlength="20" required></div>
                </div>
    </div>
    <div class="col-sm-6 " >
                <button name ="btn" type="submit" class="btn btn-primary">Modifer</button>
                </div>
    
    
  </div>
</div>
</div>
</div>
</div>
<!-- </form> -->
  <?php
  if(isset($_POST['btnedit'])){
    $iddemande=$_POST['nvid'];
    $datelimite=$_POST['datelimite'];
    $centre=$_POST['centre'];

    $reqedit="UPDATE centre
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
            <h1 class="text-center mb-3">Êtes-vous sûr de vouloir supprimer ce centre ? </h1>
            <p class="text-center">Cette action est irréversible et toutes les informations associées à ce centre
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
    $reqdelet="DELETE FROM centre where id_centre=$id";
    $resdelet = $pdo->query($reqdelet);
    header("location:Centres.php");
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
    
</script>
<?php ob_end_flush(); ?>
</body>

</html>