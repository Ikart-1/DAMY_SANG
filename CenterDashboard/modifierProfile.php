<?php
require('../connexion.php');
session_start();
if(isset($_SESSION['id'])){
  $id = $_SESSION['id'];
  $req = "SELECT * FROM centre WHERE id_centre='$id'";
  $res = $pdo->query($req);
  $row = $res->fetch(PDO::FETCH_ASSOC);
  if(isset($_POST['btn'])){
    $nom_direc = trim(strtoupper($_POST['nom']));
    $prenom_direc = trim(ucfirst($_POST['prenom']));
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    
    // Input verification using regex
    $phoneRegex = "/^\+212[5-7]\d{8}$/";
    $emailRegex = "/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/";
    
  
    if (preg_match($phoneRegex, $phone) && preg_match($emailRegex, $email)) {
      $req2 = "UPDATE centre SET
      nom_directeur = '$nom_direc',
      prenom_directeur = '$prenom_direc',
      email_centre = '$email',
      numtel_centre = '$phone',
      login = '$login',
      password = '$password'
    WHERE id_centre='$id'";
    $res2 = $pdo->query($req2);
    header('location:profile.php');
      } else {
          echo "<div class=\"message\"><i class=\"fa-sharp fa-solid fa-triangle-exclamation\"></i><p>Numéro de téléphone ou adresse email invalide.</p></div>";
  
      }
  }
  else  echo "<div class=\"message\"><i class=\"fa-sharp fa-solid fa-triangle-exclamation\"></i><p>Pas Modifier.</p></div>";
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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css"
    integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <link rel="shortcut icon" href="../assets/img/iconRed.svg" type="image/x-icon">
  <link rel="stylesheet" href="../assets/fonts/css/all.css">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="styleajout.css">

  <script src="..assets/js/bootstrap.min.js"></script>
  <style>
    .profile-title {
      color: var(--font1-color);
      padding: 0;
      padding-bottom: 10px;
      border-bottom: 1px solid var(--font1-color);
    }

    .page-title {
      color: var(--font3-color);
      margin: 8px 0 0;
      font-size: 22px;
    }

    .btn-check:focus+.btn,
    .btn:focus {
      outline: 0;
      box-shadow: none;
    }

    .form-control::placeholder {
      color: var(--font1-color);
    }

    .form-control:disabled,
    .form-control[readonly] {
      background-color: transparent;
      color: var(--font1-color);
    }
    
  </style>

</head>

<body>
  <?php include('sidebar.php') ?>
  <form class="no-styles" action="" method="post">
  <div class="container mt-5 mb-5">
    <div class="row">
      <div class="col-md-12 mb-3">
        <h1 class="page-title">Profile <i class="fa-solid fa-angle-right"></i> Modifer</h1>
      </div>
      <div class="row">

<div class="col-md-4 border-right">
  <div class="p-3 py-5">
    <div class="row">
      <div class="profile-title"><span>Centre informations</span></div><br>
    </div>
    <div class="row mt-2">
      <div class="col-md-12 mb-2"><label class="labels">Nom</label><input type="text" class="form-control my-2"
          placeholder="" value="<?= $row['nom_centre'] ?>" disabled></div>

    </div>
    
    <div class="row mt-2">
      <div class="col-md-12 mb-2"><label class="labels">Email</label><input type="email" name="email"
          class="form-control my-2" placeholder="" value="<?= $row['email_centre'] ?>" ></div>
    </div>
    <div class="row mt-2">
    <div class="col-md-12 mb-2"><label class="labels">Phone</label><input type="text" class="form-control my-2"
    name="phone"placeholder="Phone" value="<?= $row['numtel_centre'] ?>" ></div>
    </div>
    <div class="row mt-3">
      <div class="col-md-6 mb-2 search d-flex align-items-center justify-content-between">
        <label for="ville" class="labels">Ville</label>
        <select class="selectpicker " data-live-search="true" style="width: 10px;" disabled >
          <option value="<?= $row['ville'] ?>" selected="selected"><?= $row['ville'] ?></option>
          <option value="1">Agadir</option>
          <option value="2">Casabalnca</option>
          <option value="3">Essaouira</option>
          <option value="4">Safi</option>
          <option value="5">Marrakech</option>
          <option value="6">Berkan</option>
          <option value="8">Tanger</option>
          <option value="2">Laayoun</option>
          <option value="1">Salé</option>
          <option value="2">Fes</option>
          <option value="3">Méknes</option>
          <option value="1">El jadida</option>
          <option value="2">Ouarzazate</option>
          <option value="3">Berrchid</option>
          <option value="1">Settat</option>
          <option value="2">Dakhla</option>
        </select>
      </div>
    </div>
  </div>
</div>
<div class="col-md-4">
  <div class="p-3 py-5">
    <div class="profile-title"><span>Directeur informations</span></div><br>
    <div class="col-md-12"><label class="labels">Nom</label><input type="text" class="form-control my-2" name="nom"
        placeholder="" value="<?= $row['nom_directeur'] ?>" ></div> <br>
    <div class="col-md-12"><label class="labels">Prénom</label><input type="text" class="form-control my-2" name="prenom"
        placeholder="" value="<?= $row['prenom_directeur'] ?>" ></div>
  </div>
</div>
<div class="col-md-4">
  <div class="p-3 py-5">
    <div class="profile-title"><span>Login informations</span></div><br>
    <div class="col-md-12"><label class="labels">Login</label><input type="text" class="form-control my-2" name="login"
        placeholder="" value="<?= $row['login'] ?>" ></div> <br>
    <div class="col-md-12"><label class="labels">Mots de pass</label><input type="password" name="password"
        class="form-control my-2" placeholder="" value="<?= $row['password'] ?>" ></div>
  </div>
</div>
</div>
      <div class="row ">
        <div class="mt-2  d-flex justify-content-center"><button class="btn " type="button" id="enregistrerBtn"
            onclick="ShowMessageDelete()"> Enregistrer les modifications</button></div>
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
            <h1 class="text-center mb-3">Êtes-vous sûr de vouloir enregistrer ces modifications ? </h1>
            <p class="text-center"> Cette action est irréversible et toutes ces informations seront définitivement
              modifiées.</p>
          </div>
          <div class="row mb-5 d-flex justify-content-around align-items-center">
          <div class="row ">
                        <div class="col-sm-6 d-flex justify-content-center">
                          <button class="btn"  onclick="ShowMessageDelete()">Annuler</a>
                        </div>
                        <div class="col-sm-6 ">
                          <button class="btn" name="btn" type="submit">Modifier</a>
                        </div>
                      </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  </form>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
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
    function ShowMessageDelete() {
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
  header('location:logincentre.php');
} ?>