<?php
require('../connexion.php');
session_start();
if(isset($_SESSION['id_medecin'])){
  $id =$_SESSION['id_medecin'];
  $req = "SELECT * FROM medecin WHERE id_medecin='$id'";
  $res = $pdo->query($req);
  $row = $res->fetch(PDO::FETCH_ASSOC);
  // hadi req2 ktjib ville
  $req2 = "SELECT nom_centre from centre where id_centre=" . $row['id_centre'];
  $res2 = $pdo->query($req2);
  $row2 = $res2->fetch(PDO::FETCH_ASSOC);

  if (isset($_POST['btn'])) {
    $nom = trim(strtoupper($_POST['nom']));
    $prenom = trim(ucfirst($_POST['prenom']));
    $email = trim($_POST['email']);
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $img = $_POST['oldimg'];
    if(is_uploaded_file($_FILES["imgmedecin"]["tmp_name"])){
      unlink($img);
      $nameimg="../imgsmembre&medecin&projets/imgmedecins/$nom$prenom"."-".date("Y.m.d")."-".date("h.i.sa").".jpeg";
      $image=move_uploaded_file($_FILES["imgmedecin"]["tmp_name"],$nameimg);  
      $img=$nameimg;
    }
    $emailRegex = "/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/";
    if (preg_match($emailRegex, $email)) {
      $req3 = "UPDATE medecin SET
      nom_medecin = '$nom',
      prenom_medecin = '$prenom',
      image_medecin = '$img',
      email_medecin = '$email',
      login = '$login',
      password = '$password'
    WHERE  id_medecin='$id'";
    $res3 = $pdo->query($req3);
    header('location:profile.php');
      } else {
          echo "<div class=\"message\"><i class=\"fa-sharp fa-solid fa-triangle-exclamation\"></i><p>Adresse email invalide.</p></div>";
  
      }
      // if(!$req3) echo "<div class=\"message\"><i class=\"fa-sharp fa-solid fa-triangle-exclamation\"></i><p>Pas Modifier.</p></div>";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Profile</title>
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
    <link rel="stylesheet" href="styleajout.css">

<script src="..assets/js/bootstrap.min.js"></script>
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

 .profile-title{
  color: var(--font1-color);
  padding: 0;
  padding-bottom: 10px;
  border-bottom: 1px solid var(--font1-color);
}
.page-title{
  color: var(--font3-color);
    margin: 8px 0 0;
    font-size: 22px;
}
.btn-check:focus+.btn, .btn:focus {
    outline: 0;
    box-shadow: none;
}
.form-control::placeholder {
  color: var(--font1-color);
}
.form-control:disabled, .form-control[readonly] {
  background-color: transparent;
  color: var(--font1-color);
}
  </style>
  
</head>
<body>
  <?php include('sidebar.php') ?>
  <form class="no-styles" id ="form"  action="" method="post"  enctype="multipart/form-data">
    <div class="container mt-5 mb-5">

      <div class="row">
      <div class="col-md-12 mb-3">
                            <h1 class="page-title">Profile <i class="fa-solid fa-angle-right"></i> Modifer</h1>
        </div>
        <div class="row">
        <div class="col-md-3 d-flex flex-column align-items-center mt-3 p-3 py-5 ">
          <div class="imgprofile">
          <img src="<?=$row['image_medecin']?>" alt="" srcset="">
          </div>
        
          <label for="image"><i class="far fa-edit mb-5" title="Changer la photo de profile"
                    style="cursor:pointer;"></i></label>
                <input id="image" type="file" name="imgmedecin"style="display: none; visibility: none;" accept=".jpg, .jpeg, .png">
                <input type="hidden" name="oldimg" value="<?=$row['image_medecin']?>">
        </div>

          <div class="col-md-5 border-right">
            <div class="p-3 py-5">
              <div class="row">
                <div class="profile-title"><span>Personal informations</span></div><br>
              </div>
              <div class="row mt-2">
                <div class="col-md-6 mb-2"><label class="labels">Nom</label><input type="text" name="nom"
                    class="form-control my-2" placeholder="" value="<?= $row['nom_medecin'] ?>"></div>
                <div class="col-md-6 mb-2"><label class="labels">Prénom</label><input type="text" name="prenom"
                    class="form-control my-2" value="<?= $row['prenom_medecin'] ?>" placeholder=""></div>
              </div>
              <div class="row mt-2">
                <div class="col-md-12 mb-2"><label class="labels">Email</label><input type="email" name="email"
                    class="form-control my-2" placeholder="" value="<?= $row['email_medecin'] ?>"></div>
                
              </div>
              <div class="row mt-2">
              <div class="col-md-12 mb-2"><label class="labels">Centre</label><input disabled  type="text"
                    class="form-control my-2" placeholder="" value="<?= $row2['nom_centre'] ?>"></div>
              </div>


            </div>
          </div>
          <div class="col-md-4">
            <div class="p-3 py-5">
              <div class="profile-title"><span>Login informations</span></div><br>
              <div class="col-md-12"><label class="labels">Login</label><input type="text" name="login"
                  class="form-control my-2" placeholder="" value="<?= $row['login'] ?>"></div> <br>
              <div class="col-md-12"><label class="labels">Mots de pass</label><input type="password" name="password"
                  class="form-control my-2" placeholder="" value="<?= $row['password'] ?>"></div>
            </div>
          </div>
        </div>
  
        <div class="row ">           
           <div class="mt-2  d-flex justify-content-center"><button class="btn " type="button" id="enregistrerBtn" onclick="ShowMessageDelete()"> Enregistrer les modifications</button></div>
        </div>
        </div>
    </div>
        </div>
      </div>
      <section id="MessageDelete" class="hide">
    <div class="container py-5  position-absolute top-50 start-50 translate-middle">
        <div class=" mb-4">
          <div class="card mb-3" style="border-radius: .5rem;">
            <div class="x-mark pt-2 px-2">
                <i class="fa-sharp fa-solid fa-circle-xmark" title="Fermer" id="x" onclick="HideMessageDelete()"></i>
          </div>
          <div class="title px-5 pt-5 ">
            <h1 class="text-center mb-3">Êtes-vous sûr de vouloir enregistrer ces modifications  ? </h1>
            <p class="text-center"> Cette action est irréversible et toutes ces informations seront définitivement modifiées.</p>
          </div>
          <div class="row mb-5 d-flex justify-content-around align-items-center">
          <div class="row ">
            <div class="col-sm-6 d-flex justify-content-center" >
                   <button class="btn btn-primary" onclick="ShowMessageDelete()">Annuler</button>
                </div>
                <div class="col-sm-6 " >
                <button name ="btn" type="submit" class="btn btn-primary">Modifer</button>
                </div>
            </div>
          </div>
          </div>
        </div>
      </div>
      </section>
      </form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/bootstrap-select.min.js"></script>
    <script>
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
<?php }else{
    header('location:loginmedecin.php');
} ?>
