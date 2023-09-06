<?php
require('../connexion.php');
session_start();
if (isset($_SESSION['cin'])) {
  $cin = $_SESSION['cin'];
  $req = "SELECT * FROM membre WHERE cin_membre='$cin'";
  $res = $pdo->query($req);
  $row = $res->fetch(PDO::FETCH_ASSOC);
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css"
      integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous" />
    <link rel="shortcut icon" href="../assets/img/iconRed.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <link rel="shortcut icon" href="../assets/img/iconRed.svg" type="image/x-icon">
    <link rel="stylesheet" href="../assets/fonts/css/all.css">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="styleajout.css">

    <script src="..assets/js/bootstrap.min.js"></script>
    <link href="style_membre.css?s=<?php echo date(time()) ?>" rel="stylesheet">
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

  </head>

  <body>
    <?php include('navbar.php') ?>
    <div class="container mt-5">

      <div class="row  pt-5 ">
        <div class="col-md-10 mb-3">
          <h1 class="page-title">Profile</h1>
        </div>
        <div class="col-md-2 ">
          <button class="btn add">
            <a href="ModifierProfile.php" class=" text-decoration-none">Modifier</a>
          </button>
        </div>

        <div class="row">

          <div class="col-md-3 d-flex flex-column align-items-center mt-3 p-3 py-5 imgprofile">
            <img src="<?= $row['image_membre'] ?>" alt="" srcset="">
          </div>

          <div class="col-md-5 border-right">
            <div class="p-3 py-5">
              <!-- <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div> -->
              <div class="row">
                <div class="profile-title"><span>Personal informations</span></div><br>
              </div>
              <div class="row mt-2">
                <div class="col-md-6 mb-2"><label class="labels">Nom</label><input disabled type="text"
                    class="form-control my-2" placeholder="" value="<?= $row['nom_membre'] ?>"></div>
                <div class="col-md-6 mb-2"><label class="labels">Prénom</label><input disabled type="text"
                    class="form-control my-2" value="<?= $row['prenom_membre'] ?>" placeholder=""></div>
              </div>
              <div class="row mt-2">
                <div class="col-md-6 mb-2"><label class="labels">Date de naissance</label><input disabled type="date"
                    class="form-control my-2" placeholder="" value="<?= $row['date_naiss'] ?>"></div>
                <div class="col-md-6 mb-2"><label class="labels">Date du dernier don</label><input disabled type="date"
                    class="form-control my-2" value="<?= $row['date_dernier_don'] ?>" placeholder=""></div>
              </div>
              <div class="row mt-2">
                <div class="col-md-6 mb-2"><label class="labels">Ville</label><input disabled type="text"
                    class="form-control my-2" placeholder="" value="<?= $row['ville'] ?>"></div>
                <div class="col-md-6 mb-2"><label class="labels">Type de sang</label><input disabled type="text"
                    class="form-control my-2" value="<?= $row['type_sang'] ?>" placeholder=""></div>
              </div>
              <div class="row mt-2">
                <div class="col-md-6 mb-2"><label class="labels">Numéro de téléphone</label><input disabled type="text"
                    class="form-control my-2" placeholder="Phone" value="<?= $row['num_tel'] ?>"></div>
                <div class="col-md-6 mb-2"><label class="labels">CIN</label><input disabled type="text"
                    class="form-control my-2" placeholder="" value="<?= $row['cin_membre'] ?>" id="code" disabled></div>
              </div>
              <div class="row mt-2">
                <div class="col-md-12 mb-2"><label class="labels">Email</label><input disabled type="email"
                    class="form-control my-2" placeholder="" value="<?= $row['email'] ?>"></div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="p-3 py-5">
              <div class="profile-title"><span>Login informations</span></div><br>
              <div class="col-md-12"><label class="labels">Nom d'utilisateur</label><input disabled type="text"
                  class="form-control my-2" placeholder="" value="<?= $row['login'] ?>"></div> <br>
              <div class="col-md-12"><label class="labels">Mots de pass</label><input disabled type="password"
                  class="form-control my-2" placeholder="" value="<?= $row['password'] ?>"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/bootstrap-select.min.js"></script>

  </body>

  </html>
<?php } else {
  header('location:loginmembre.php');
}