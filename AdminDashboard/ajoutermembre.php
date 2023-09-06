<?php
if (isset($_POST['btn'])) {
    require('../connexion.php');
    $nom = trim(strtoupper($_POST['nom']));
    $prenom = trim(ucfirst($_POST['prenom']));
    $cin = trim(strtoupper($_POST['cin']));
    $dateNaiss = trim(ucfirst($_POST['dateNaiss']));
    $dateDon = trim(ucfirst($_POST['dateDon']));
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $ville = $_POST['ville'];
    $typeSang = $_POST['typeSang'];
    $sexe = $_POST['sexe'];
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $conPass = trim($_POST['confirm_password']);

    //img membre 
	$num = rand(0, 10000000000000);
    $img="../imgsmembre&medecin&projets/imgmembres/$nom$prenom"."-".date("Y.m.d")."-".date("h.i.sa").".jpeg";
    $image=move_uploaded_file($_FILES["imgmembre"]["tmp_name"],$img);

    // Input verification using regex
    $phoneRegex = "/^\+212[5-7]\d{8}$/";
    $emailRegex = "/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/";

    if (preg_match($phoneRegex, $phone) && preg_match($emailRegex, $email)) {
        $req = "INSERT INTO membre (cin_membre, nom_membre, prenom_membre, date_naiss,image_membre, sexe_membre, type_sang, ville, email, num_tel, date_dernier_don, login, password) 
        VALUES ('$cin', '$nom', '$prenom', '$dateNaiss','$img', '$sexe', '$typeSang', '$ville', '$email', '$phone', '$dateDon', '$login', '$password')";

        if ($password == $conPass) {
            $res = $pdo->query($req);
            header('Location:membres.php');
            exit();
        } else {
            echo "<div class=\"message\"><i class=\"fa-sharp fa-solid fa-triangle-exclamation\"></i><p>Mots de passe ne correspondent pas.</p></div>";
        }
    } else {
        echo "<div class=\"message\"><i class=\"fa-sharp fa-solid fa-triangle-exclamation\"></i><p>Numéro de téléphone ou adresse email invalide.</p></div>";

    }
}
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
    <link href="styleAjout.css?s=<?php echo date(time()) ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css"
        integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
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
    <title>Ajouter Membre</title>
</head>

<body>

    <?php include('sidebar.php') ?>
    <section class="ajout-form">
        <div class="container-lg">
            <form action="" method="post" class="no-styles" enctype="multipart/form-data">
                <div class="row">
                    <div class="col mb-4 ">
                        <h1>Membres <i class="fa-solid fa-angle-right"></i> Ajouter</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-4"><input type="text" class="form-control" name="nom" placeholder="Nom" require>
                    </div>
                    <div class="col mb-4"><input type="text" class="form-control" name="prenom" placeholder="Prenom"
                            require></div>
                    <div class="col mb-4"><input type="text" class="form-control" name="cin" placeholder="CIN" require>
                    </div>
                    <div class="col mb-4">
                                    <label for="imguser" class="img-input form-label d-flex flex-row justify-content-between form-control">
                                    <p id="imgLabel"> Ajouter Photo</p>
                                    <i class="fa-sharp fa-regular fa-image"></i>
                                    </label>
                                    <input class="" name="imgmembre" type="file" id="imguser" style="display: none; visibility: none;">
                                </div>
                </div>

                <div class="row">
                    <div class="col mb-4 search d-flex align-items-center justify-content-between">
                        <label for="typeSang">Type de sang</label>
                        <select class="selectpicker" name="typeSang" data-live-search="true" required>
                            <option disabled="disabled" selected="selected">Choose</option>
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
                    <div class="col mb-4 search d-flex align-items-center justify-content-between">
                        <label for="ville">Ville</label>
                        <select class="selectpicker" data-live-search="true" name="ville" style="width: 10px;" required>
                            <option disabled="disabled" selected="selected">Choisir</option>
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
                        </select>
                    </div>
                    <div class="col mb-4 search d-flex align-items-center justify-content-between">
                        <label for="gender" class="label">Sexe</label>
                        <label class="d-flex align-items-center">Homme<input class="ms-3 sexe" type="radio" name="sexe"
                                value="Homme" required></label>
                        <label class="d-flex align-items-center">Femme<input class="ms-3 sexe" type="radio" name="sexe"
                                value="Femme" required></label>
                    </div>

                </div>
                <div class="row">
                    <div class="col mb-4"><label for="exampleInputPassword1">Date de naissance</label><input type="date"
                            name="dateNaiss" class="form-control" placeholder="Date" require></div>
                    <div class="col mb-4"><label for="exampleInputPassword1">Date du dernier don
                        </label><input type="date" name="dateDon" class="form-control" placeholder="Date"></div>
                </div>
                    <div class="row">
                        <div class="col mb-4"><input type="text" class="form-control" name="email" placeholder="Email"
                                require></div>
                        <div class="col mb-4"><input type="text" class="form-control" id="phone-input" value="+212" name="phone" placeholder="Phone"
                                require></div>
                    </div>
                <div class="row">
                    <div class="col mb-4"><input type="text" class="form-control" name="login"
                            placeholder="Nom de l'utilisateur" minlength="6" maxlength="20" required></div>
                    <div class="col mb-4"><input type="password" class="form-control" name="password"
                            placeholder="Mot de pass" minlength="6" maxlength="20" required></div>
                    <div class="col mb-4"><input type="password" class="form-control" name="confirm_password"
                            placeholder="Confirmer le mot de passe" minlength="6" maxlength="20" required></div>
                </div>
                <div class="row">
                    <div class="col-12 mb-4 d-flex justify-content-center">
                        <button type="submit" name="btn" class="btn btn-primary m-0 ">Ajouter</button>
                    </div>
                </div>

        </div>
        </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/bootstrap-select.min.js"></script>
    <script>
document.getElementById('phone-input').addEventListener('keydown', function(event) {
  var inputValue = this.value;
  var keyCode = event.keyCode || event.which;

  // Vérifier si la touche pressée est la touche de suppression (Backspace ou Delete)
  if (keyCode === 8 || keyCode === 46) {
    var regex = /^\+212/;
    if (regex.test(inputValue)) {
      // Vérifier si l'indicatif "+212" est au début de la valeur
      if (this.selectionStart === 4 && this.selectionEnd === 4) {
        event.preventDefault(); // Empêcher la suppression de l'indicatif /l'événement de suppression sera annulé
      }
    }
  }
});
</script>
    <script>
    // // Récupérer l'élément input et l'élément label
    const input = document.getElementById('imguser');
    const label = document.getElementById('imgLabel');

    // Ajouter un événement change à l'input
    input.addEventListener('change', function() {
        // Vérifier s'il y a un fichier sélectionné
        if (input.files.length > 0) {
            // Récupérer le nom du fichier
            const fileName = input.files[0].name;
            // Afficher le nom du fichier dans le label
            label.textContent = fileName;
        } else {
            // Aucun fichier sélectionné, réinitialiser le label
            label.textContent = 'Ajouter Photo';
        }
    });
</script>

</body>

</html>