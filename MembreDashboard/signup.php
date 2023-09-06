<?php
require('../connexion.php');
if (isset($_POST['btn'])) {
	$nom = trim(strtoupper($_POST['nom']));
	$prenom = trim(ucfirst($_POST['prenom']));
	$cin = trim(strtoupper($_POST['cin']));
	$dateNaiss = $_POST['dateNaiss'];
	$datedernierdon = $_POST['datedernierdon'];
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
		$req = "INSERT INTO membre (cin_membre, nom_membre, prenom_membre, date_naiss,image_membre,sexe_membre, type_sang, ville, email, num_tel,date_dernier_don, login, password) 
		VALUES ('$cin', '$nom', '$prenom', '$dateNaiss','$img','$sexe', '$typeSang', '$ville', '$email', '$phone','$datedernierdon', '$login', '$password')";

		if ($password == $conPass) {
			$res = $pdo->query($req);
			header('Location:loginmembre.php');
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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
	<title>S'inscrire</title>
	<link rel="stylesheet" href="../assets/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/style.css">
	<link href="../assets/css/signup.css?s=<?php echo time(); ?>" rel="stylesheet">
	<link rel="stylesheet" href="assets/fonts/css/all.css">
	<link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
		rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
	<link rel="shortcut icon" href="../assets/img/iconRed.svg" type="image/x-icon">
	<script src="../assets/js/bootstrap.min.js"></script>
</head>

<body>
	<section class="d-flex align-items-center justify-content-between">
		<div class="signup-form">
			<form action="" method="post" enctype="multipart/form-data">
				<h2>Inscription</h2>
				<p class="hint-text">Créez votre compte. C'est gratuit et ne prend qu'une minute.</p>
				<div class="form-group">
					<div class="row">
						<div class="col">
							<input type="text" class="form-control" name="prenom" placeholder="Prénom" required>
						</div>
						<div class="col">
							<input type="text" class="form-control" name="nom" placeholder="Nom" required>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col">
							<input type="text" class="form-control" name="cin" placeholder="Numéro CIN" required>
						</div>
						<div class="col d-flex align-items-center justify-content-between">
							<label for="date" class="label">Date de naissance</label>
							<input type="date" class="form-control p-1" name="dateNaiss" id="" style="font-size:14px">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col d-flex align-items-center justify-content-between">
							<label for="gender" class="label">Sexe</label>
							<label class="d-flex align-items-center">Homme<input class="ms-2 sexe" type="radio"
									name="sexe" value="Homme" required></label>
							<label class="d-flex align-items-center">Femme<input class="ms-2 sexe" type="radio"
									name="sexe" value="Femme" required></label>
						</div>
						<div class="col d-flex align-items-center justify-content-between">
							<label for="date" class="label">Date du dernier don</label>
							<input type="date" class="form-control p-1" name="datedernierdon" id="" style="font-size:14px">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col">
							<input type="email" class="form-control" name="email" placeholder="Adresse e-mail" required>
						</div>
						<div class="col">
							<input type="text" class="form-control" name="phone" id="phone-input"  value="+212"  required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col search d-flex align-items-center justify-content-between">
							<label for="sang" class="me-2">Ville</label>
							<select class="selectpicker" data-live-search="true" style="width: 10px;" name="ville"
								required>
								<option disabled="disabled" selected="selected">Choisir</option>
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
						<div class="col search d-flex align-items-center justify-content-between">
							<label for="sang" class="me-2">Type de sang</label>
							<select class="selectpicker" name="typeSang" style="width: 10px;" required>
								<option disabled="disabled" selected="selected">Choisir</option>
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
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col"><input type="text" class="form-control" name="login" placeholder="Nom d'utilisateur" required></div>
						<div class="col ">
                                    <label for="imguser" class="img-input form-label d-flex flex-row justify-content-between form-control">
                                    <p id="imgLabel"> Ajouter Photo</p>
                                    <i class="fa-sharp fa-regular fa-image"></i>
                                    </label>
                                    <input class="" name="imgmembre" type="file" id="imguser" style="display: none; visibility: none;">
                                </div>
					</div>
					
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col"><input type="password" class="form-control" name="password"
								placeholder="Mot de passe" minlength="6" maxlength="20"  required></div>
						<div class="col"><input type="password" class="form-control" name="confirm_password"
								placeholder="Confirmer le mot de passe"  minlength="6" maxlength="20"  required></div>
					</div>
				</div>
				<div class="form-group d-grid">
					<button type="submit" class="btn" name="btn">S'inscrire maintenant</button>
				</div>
			</form>
			<div class="text-center">Vous avez déjà un compte ? <a href="loginmembre.php">Se connecter</a></div>
		</div>
	</section>
	<div style="font-size: 10px; text-align: center; color:var(--bg1-color);" class="mb-3">Blood Donation &copy; 2023
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
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