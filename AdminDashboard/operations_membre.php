<?php
ob_start();
require('../connexion.php');
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
  <link rel="stylesheet" href="styleAjout.css">
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
            $req = "SELECT * FROM membre where userlevel=0 AND id_membre=$id";
            $res = $pdo->query($req);
            $row = $res->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="container  ">

          <div class="row">
            <div class="col-md-10 mb-3">
            <h1 class="page-title"> Membre <?=$row['prenom_membre']." ".$row['nom_membre']." "?></h1>
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
        <?php
      }
    } else if ($action === 'Edit') {
      if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $req = "SELECT * FROM membre where userlevel=0 AND id_membre=$id";
        $res = $pdo->query($req);
        $row = $res->fetch(PDO::FETCH_ASSOC);
        ?>
         <form class="no-styles" id ="form"  action="" method="post"  enctype="multipart/form-data">
    <div class="container ">
      <div class="row ">
      <div class="col-md-12 mb-3">
                            <h1 class="page-title"> Membre <?=$row['prenom_membre']." ".$row['nom_membre']." "?><i class="fa-solid fa-angle-right"></i> Modifer</h1>
        </div>
        <div class="row">
        
        <div class="col-md-3 d-flex flex-column align-items-center p-3 py-5 ">
          <div class="imgprofile">
          <img src="<?=$row['image_membre']?>" alt="" srcset="">
          </div>
        
         <label for="image"><i class="far fa-edit mb-5" title="Changer la photo de profile"
                    style="cursor:pointer;"></i></label>
                <input id="image" type="file" name="imgmembre"style="display: none; visibility: none;" accept=".jpg, .jpeg, .png">
                <input type="hidden" name="oldimg" value="<?=$row['image_membre']?>">
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
                        <div class="col-md-6 mb-2"><label class="labels">Nom</label><input  type="text" name="nom" class="form-control my-2" placeholder="" value="<?=$row['nom_membre']?>"></div>
                        <div class="col-md-6 mb-2"><label class="labels">Prénom</label><input  type="text" name="prenom" class="form-control my-2" value="<?=$row['prenom_membre']?>" placeholder=""></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6 mb-2"><label class="labels">Date de naissance</label><input  type="date" name="dateNaiss" class="form-control my-2" placeholder="" value="<?=$row['date_naiss']?>"></div>
                        <div class="col-md-6 mb-2"><label class="labels">Date du dernier don</label><input  type="date" name="datedernierdon" class="form-control my-2" value="<?=$row['date_dernier_don']?>" placeholder=""></div>
                    </div>
                    <div class="row mt-2">
                    <div class="col-md-6 search d-flex align-items-center justify-content-between"><label class="labels">Ville</label>
                          <select class="selectpicker" data-live-search="true" style="width: 10px;" name="ville" required>
								            <option value="<?=$row['ville']?>" selected="selected"><?=$row['ville']?></option>
								            <option value="Agadir">Agadir</option>
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
							            </select>
                        </div>
                        <div class="col-md-6 search d-flex align-items-center justify-content-between"><label class="labels">Type de sang</label>
                          <select class="selectpicker" name="typeSang" style="width: 10px;" required>
								            <option value="<?=$row['type_sang']?>" selected="selected"><?=$row['type_sang']?></option>
								            <option value="A+">A+</option>
								            <option value="A-">A-</option>
								            <option value="B+">B+</option>
								            <option value="B-">B-</option>
								            <option value="AB+">AB+</option>
								            <option value="AB-">AB-</option>
								            <option value="O+">O+</option>
								            <option value="O-">O-</option>
							            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-6 mb-2"><label class="labels">Numéro de téléphone</label><input  type="text" name="phone" class="form-control my-2" placeholder="Phone" value="<?=$row['num_tel']?>"></div>
                        <div class="col-md-6 mb-2"><label class="labels">CIN</label><input  type="text" class="form-control my-2" name="cin" placeholder="" value="<?=$row['cin_membre']?>" id="code" ></div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-12 mb-2"><label class="labels">Email</label><input  type="email" name="email" class="form-control my-2" placeholder="" value="<?=$row['email']?>"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="profile-title"><span>Login informations</span></div><br>
                    <div class="col-md-12"><label class="labels">Nom d'utilisateur</label><input type="text" name="login" class="form-control my-2" placeholder="" value="<?=$row['login']?>"></div> <br>
                    <div class="col-md-12"><label class="labels">Mots de pass</label><input type="password" name="password" class="form-control my-2" placeholder="" value="<?=$row['password']?>"></div>
                </div>
            </div>
        </div>
        <div class="row ">           
           <div class="mt-2  d-flex justify-content-center"><button class="btn " name="btnedit" type="submit" id="enregistrerBtn"> Enregistrer les modifications</button></div>
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
          <?php
          if (isset($_POST['btnedit'])) {
            $nom = trim(strtoupper($_POST['nom']));
            $prenom = trim(ucfirst($_POST['prenom']));
            $dateNaiss = $_POST['dateNaiss'];
            $datedernierdon = $_POST['datedernierdon'];
            $email = trim($_POST['email']);
            $phone = trim($_POST['phone']);
            $ville = $_POST['ville'];
            $typeSang = $_POST['typeSang'];
            $login = trim($_POST['login']);
            $password = trim($_POST['password']);
            $img = $_POST['oldimg'];
            if (is_uploaded_file($_FILES["imgmembre"]["tmp_name"])) {
              unlink($img);
              $num = rand(0, 10000000000000);
              $nameimg = "../imgsmembre&medecin&projets/imgmembres/$nom$prenom" . "-" . date("Y.m.d") . "-" . date("h.i.sa") . ".jpeg";
              $image = move_uploaded_file($_FILES["imgmembre"]["tmp_name"], $nameimg);
              $img = $nameimg;
            }

            //img membre 
    
            // Input verification using regex
            $phoneRegex = "/^\+212[5-7]\d{8}$/";
            $emailRegex = "/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/";


            if (preg_match($phoneRegex, $phone) && preg_match($emailRegex, $email)) {
              $reqedit = "UPDATE membre SET
      nom_membre = '$nom',
      prenom_membre = '$prenom',
      date_naiss = '$dateNaiss',
      image_membre = '$img',
      type_sang = '$typeSang',
      ville = '$ville',
      email = '$email',
      num_tel = '$phone',
      date_dernier_don = '$datedernierdon',
      login = '$login',
      password = '$password'
    WHERE id_membre = '$id'";
              $resedit = $pdo->query($reqedit);
              header("location:membres.php");
            } else {
              echo "<div class=\"message\"><i class=\"fa-sharp fa-solid fa-triangle-exclamation\"></i><p>Numéro de téléphone ou adresse email invalide.</p></div>";

            }
            if (!$resedit)
              echo "<div class=\"message\"><i class=\"fa-sharp fa-solid fa-triangle-exclamation\"></i><p>Pas Modifier.</p></div>";
          }
      }
    }
      elseif ($action === 'Delete') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    ?>

   <section id="MessageDelete">
    <form method="POST" style="display: block;" class="container  py-5 ">
      <div class=" mb-4">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="x-mark pt-2 px-2">
            <i class="fa-sharp fa-solid fa-circle-xmark" title="Fermer" id="x" onclick="HideMessageDelete()"></i>
          </div>
          <div class="title px-5 pt-5 ">
            <h1 class="text-center mb-3">Êtes-vous sûr de vouloir supprimer ce membre  ? </h1>
            <p class="text-center">Cette action est irréversible et toutes les informations associées à ce membre
              seront définitivement effacées.</p>
          </div>
          <div style="width: 60%;" class="row mb-5 mt-5 d-flex justify-content-around align-items-center">
            <div class="row ">
              <div class="col-sm-6 mb-3">
                <input style="width: 120px;"  class="btn" type="submit" value="Annuler" onclick="HideMessageDelete()"/>
              </div>
              <div class="col-sm-6 mb-3">
                <input style="width: 120px;" name="delete" type="submit" value="Supprimer" class="btn"/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>
    <?php
      if(isset($_POST['delete'])){
        $reqdeletdon="UPDATE don SET id_membre=10 WHERE id_membre=$id";
        $resdeletdon = $pdo->query($reqdeletdon);

        $reqdeletdem="DELETE FROM demande WHERE id_membre=$id";
    $resdeletdem = $pdo->query($reqdeletdem);

    $reqdeletmem="DELETE FROM membre WHERE id_membre=$id";
    $resdeletmem = $pdo->query($reqdeletmem);
    header("location:membres.php");
  
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



  </script>
  <script>
    $(document).ready(function () {
      $('search').selectpicker();
    })


    const MessageDelete = document.getElementById("MessageDelete");
    function HideMessageDelete() {

      if (MessageDelete.style.display === "none") {
        MessageDelete.style.display = "block";
      } else {
        MessageDelete.style.display = "none";
      }
    }





  </script>
<?php ob_end_flush(); ?>
</body>

</html>