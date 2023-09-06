<?php
require('../connexion.php');
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$req3 = "select nom_centre from centre where id_centre=$id";
	$res3 = $pdo->query($req3);
	$row3 = $res3->fetch(PDO::FETCH_ASSOC);
	$center = $row3['nom_centre'];
	if (isset($_POST['btn'])) {
		$nom = trim(strtoupper($_POST['nom']));
		$prenom = trim(ucfirst($_POST['prenom']));
		$cin = trim(strtoupper($_POST['cin']));
		$email = trim($_POST['email']);
		$login = trim($_POST['login']);
		$password = trim($_POST['password']);
		$conPass = trim($_POST['confirm_password']);
		// echo $center;

		//img medecin 
		$img = "../imgsmembre&medecin&projets/imgmedecins/$nom$prenom" . "-" . date("Y.m.d") . "-" . date("h.i.sa") . ".jpeg";
		$image = move_uploaded_file($_FILES["imgmedecin"]["tmp_name"], $img);
		if (isset($_POST['btn'])) {
			$email = $_POST['email'];
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				// hadi ktverfier wesh domain kyn olala
				list(, $domain) = explode('@', $email);
				if (checkdnsrr($domain, 'MX')) {
					$req = "INSERT INTO medecin (cin_medecin, nom_medecin ,prenom_medecin,image_medecin, email_medecin, id_centre, login, password) 
		VALUES ('$cin', '$nom', '$prenom','$img', '$email','$id','$login', '$password')";

					if ($password == $conPass) {
						$res= $pdo->query($req);

						$req_comCentre = "select nom_centre from centre where id_centre= $id";
						$res_comCentre = $pdo->query($req_comCentre);
						$row_comCentre = $res_comCentre->fetch(PDO::FETCH_ASSOC);
						

						$notif_centre = "$prenom $nom est devenu un nouveau médecin au centre. ";
						$req_notif_centre = "insert into notification (notif_name, notif_message, active, id_centre) values('Invitation accepté', '$notif_centre', 1,$id)";
						$res_notif_centre = $pdo -> query($req_notif_centre);

						$notif_admin = $nom . " a inscripé dans le centre " . $row_comCentre['nom_centre'];
						$req_notif_admin = "insert into notification (notif_name, notif_message, active, id_membre) values('Inscription d\'un médecin', '$notif_admin', 1,10)";
						$res_notif_admin = $pdo->query($req_notif_admin);

						header('Location:loginmedecin.php');
						exit();
					} else {
						echo "<div class=\"message\"><i class=\"fa-sharp fa-solid fa-triangle-exclamation\"></i><p>Mots de passe ne correspondent pas.</p></div>";
					}
				}
			} else {
				echo "<div class=\"message\"><i class=\"fa-sharp fa-solid fa-triangle-exclamation\"></i><p>Numéro de téléphone ou adresse email invalide.</p></div>";

			}
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
		<link
			href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
			rel="stylesheet">
		<link rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
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
								<input type="text" disabled class="form-control" name="cin" placeholder="Center"
									value="<?= $center ?>">
							</div>
						</div>
					</div>
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
							<div class="col">
								<input type="email" class="form-control" name="email" placeholder="Adresse e-mail" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col"><input type="text" class="form-control" name="login"
									placeholder="Nom d'utilisateur" required></div>
							<div class="col ">
								<label for="imguser"
									class="img-input form-label d-flex flex-row justify-content-between form-control">
									<p id="imgLabel"> Ajouter Photo</p>
									<i class="fa-sharp fa-regular fa-image"></i>
								</label>
								<input class="" name="imgmedecin" type="file" id="imguser"
									style="display: none; visibility: none;">
							</div>
						</div>

					</div>
					<div class="form-group">
						<div class="row">
							<div class="col"><input type="password" class="form-control" name="password"
									placeholder="Mot de passe" minlength="6" maxlength="20" required></div>
							<div class="col"><input type="password" class="form-control" name="confirm_password"
									placeholder="Confirmer le mot de passe" minlength="6" maxlength="20" required></div>
						</div>
					</div>
					<div class="form-group d-grid">
						<button type="submit" class="btn" name="btn">S'inscrire maintenant</button>
					</div>
				</form>
			</div>
		</section>
		<div style="font-size: 10px; text-align: center; color:var(--bg1-color);" class="mb-3">Blood Donation &copy; 2023
		</div>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
		<script src="../assets/js/bootstrap-select.min.js"></script>
		<script>
			document.getElementById('phone-input').addEventListener('keydown', function (event) {
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
			input.addEventListener('change', function () {
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
	<?php } else
	header('location:loginmedecin.php') ?>
	</body>

	</html>