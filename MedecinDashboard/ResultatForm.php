<?php
require('../connexion.php');
require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
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
    <link href="styleajout.css?s=<?php echo date(time()) ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <link rel="shortcut icon" href="../assets/img/iconRed.svg" type="image/x-icon">
    <link rel="stylesheet" href="../assets/fonts/css/all.css">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


<script src="..assets/js/bootstrap.min.js"></script>
    <title>Envoyer analyse</title>
</head>
<style>
    .form-control:disabled, .form-control[readonly] {
	background-color: transparent;
	opacity: 1;
  }
  .para{
    color: var(--font1-color);
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
      input[type="checkbox"] {
  appearance: none; /* Supprime l'apparence par défaut */
  
  border: 2px solid var(--bg1-color); /* Bordure de la case à cocher */
  border-radius: 5px; /* Coins arrondis */
  outline: none; /* Supprime la mise en évidence lors du focus */
  transition: all 0.3s ease-in-out; /* Animation de transition fluide */
  cursor: pointer; /* Curseur en forme de main au survol */
}
/* Style de la coche lorsque la case est cochée */
input[type="checkbox"]:checked {
  background-color: var(--bg1-color); /* Couleur de fond lorsque la case est cochée */
  border-color: var(--bg1-color); /* Couleur de la bordure lorsque la case est cochée */
}

/* Style de la coche (le point) */
input[type="checkbox"]:checked::before {
  content: ""; /* Pas de contenu */
  display: block;
  border-radius: 50%; /* Forme de la coche */
  background-color:var(--bg2-color); /* Couleur de la coche */
}

/* Style au survol de la case à cocher */
input[type="checkbox"]:hover {
  border-color: var(--bg3-color); /* Couleur de la bordure au survol */
}
input[type="checkbox"]:focus {
  box-shadow: 0 0 3px 3px rgba(255, 0, 0, 0.3); /* Mise en évidence */
}

input[type="radio"] {
  appearance: none; /* Supprime l'apparence par défaut */
  
  border: 2px solid var(--bg1-color); /* Bordure de la case à cocher */
  border-radius: 5px; /* Coins arrondis */
  outline: none; /* Supprime la mise en évidence lors du focus */
  transition: all 0.3s ease-in-out; /* Animation de transition fluide */
  cursor: pointer; /* Curseur en forme de main au survol */
}
/* Style de la coche lorsque la case est cochée */
input[type="radio"]:checked {
  background-color: var(--bg1-color); /* Couleur de fond lorsque la case est cochée */
  border-color: var(--bg1-color); /* Couleur de la bordure lorsque la case est cochée */
}

/* Style de la coche (le point) */
input[type="radio"]:checked::before {
  content: ""; /* Pas de contenu */
  display: block;
  border-radius: 50%; /* Forme de la coche */
  background-color:var(--bg2-color); /* Couleur de la coche */
}

/* Style au survol de la case à cocher */
input[type="radio"]:hover {
  border-color: var(--bg3-color); /* Couleur de la bordure au survol */
}
input[type="radio"]:focus {
  box-shadow: 0 0 3px 3px rgba(255, 0, 0, 0.3); /* Mise en évidence */
}
input[type=number] {
  -moz-appearance: textfield;
}
</style>
<body >
<?php include('sidebar.php') ;
$idm = $id;
?>
  <section class="">
      <div class="container-xl">
          <div class="table-responsive">
              <div class="table-wrapper">
                  <div class="table-title">
                      <div class="row">
                          <div class="col-sm-4">
                            <h1>Envoyer analyse</h1>
                          </div>
                      </div>
                  </div>
                  <table class="table table-striped table-hover table-bordered">
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-group mb-4">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <input type="number" name="iddon" class="form-control"  placeholder="Entrer ID de don"required>  
                                </div>
                                <div class="col-md-6">
                                  <button type="submit" name="submit" class="btn btn-primary">Trouver</button>
                                </div>
                            </div>
                        </div>
                        </form>
                        <?php
                        if(isset($_POST['submit'])){
                            $iddon=$_POST['iddon'];
                            $req3 = " SELECT    do.id_don as iddon,
                            me.nom_membre as nomdon,me.id_membre as idmembre,me.prenom_membre as prenomdon,me.sexe_membre as sexdon,me.num_tel as phonedon,me.email as emaildon,
                            me.date_naiss as datenaissdon,me.type_sang as type_sang
                            FROM don do
                            INNER JOIN membre me ON me.id_membre=do.id_membre
                            where id_don=$iddon";
                            $res3 = $pdo->query($req3);
                            $count = $res3->rowCount();
                            $row3 = $res3->fetch(PDO::FETCH_ASSOC);
                            if ($count > 0) {
                        echo '
                        <form method="POST" action="'.$_SERVER['PHP_SELF'].'">
                        <div class="form-group mb-4">
                        <div class="row">
                                  <div class="profile-title"><span>Informations du Donneur</span></div><br>
                              </div>
                              <div class="row mt-2">
                              <input type="hidden" name="iddon" value="'.$iddon.'">
                            <div class="col-md-6 mb-2"><label class="labels">Nom Donneur</label><input disabled type="text"
                                class="form-control my-2" placeholder="" value="'.$row3['nomdon'].'"></div>
                            <div class="col-md-6 mb-2"><label class="labels">Prenom Donneur</label><input disabled type="text"
                                class="form-control my-2" value="'.$row3['prenomdon'].'" placeholder=""></div>
                          </div>
                          <div class="row mt-2">
                            <div class="col-md-6 mb-2"><label class="labels">Email Donneur</label><input disabled type="email"
                                class="form-control my-2" placeholder="" value="'.$row3['emaildon'].'"></div>
                            <div class="col-md-6 mb-2"><label class="labels">Telephone Donneur</label><input disabled type="email"
                                class="form-control my-2" value="'.$row3['phonedon'].'" placeholder=""></div>
                          </div>
                          <div class="row mt-2">
                            <div class="col-md-7 mb-2 search d-flex justify-content-between">
                            <label for="typeSang">Vous pouvez changer le type de sang s\'il est incorrect</label>
                            <select class="selectpicker" name="typeSang" required>
                                <option value="'.$row3['type_sang'].'" selected="selected">'.$row3['type_sang'].'</option>
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
                        <div class="form-group mb-4">
                            <div class="row">
                                <div class="col-md-12">
                                <div class="profile-title">
                                    <span>Serologie :</span>
                                </div><br>
                                <div class="d-flex flex-column">
                                    <div class="form-check">
                                    <input type="radio" required name="serologie" value="Negative" class="form-check-input">
                                    <label class="form-check-label d-flex justify-content-between align-items-center mr-5">
                                    Négatif
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input type="radio" required name="serologie" value="Positive" class="form-check-input">
                                    <label class="form-check-label d-flex justify-content-between align-items-center mr-5">
                                    Positive
                                    </label>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                <div class="profile-title">
                                    <span>Maladies :</span>
                                </div>
                                <br>
                                <div class="d-flex flex-column">
                                    <div class="form-check">
                                    <input type="checkbox" name="maladies[]" value="Diabete" class="form-check-input">
                                    <label class="form-check-label d-flex justify-content-between align-items-center mr-5">
                                        Diabète
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input type="checkbox" name="maladies[]" value="Anemie" class="form-check-input">
                                    <label class="form-check-label d-flex justify-content-between align-items-center mr-5" >
                                        Anémie
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input type="checkbox" name="maladies[]" value="Hepatite" class="form-check-input">
                                    <label class="form-check-label d-flex justify-content-between align-items-center mr-5">
                                        Hépatite
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input type="checkbox" name="maladies[]" value="Hypercholesterolemie" class="form-check-input">
                                    <label class="form-check-label d-flex justify-content-between align-items-center mr-5">
                                         Hypercholestérolémie
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input type="checkbox" name="maladies[]" value="Maladie renale" class="form-check-input">
                                    <label class="form-check-label d-flex justify-content-between align-items-center mr-5">
                                        Maladie rénale
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input type="checkbox" name="maladies[]" value="Leucemie" class="form-check-input">
                                    <label class="form-check-label d-flex justify-content-between align-items-center mr-5">
                                        Leucémie
                                    </label>
                                    </div>
                                  </div>

                                </div>
                            </div>
                        </div>
                        
                        <input type="hidden" name="idmembre" value="'.$row3['idmembre'].'">
                        <button type="submit" name="btnok" class="btn btn-primary">Envoyer</button>
                    </form>';
                    } else { ?> <p class="text-center" style="color:var(--font1-color)"> Aucun résultat!</p> <?php }}?>
                </table>
              </div>
          </div>  
      </div> 
  </section>
  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
  <script src="../assets/js/bootstrap-select.min.js"></script>



</body>
</html>
<?php
require('../assets/fpdf/fpdf.php');
require('../connexion.php');
if(isset($_POST['btnok'])){
$iddon = $_POST['iddon'];
$idmembre = $_POST['idmembre'];
// $maladies = $_POST['maladies'];
$etat = $_POST['serologie'];
$typeSang=$_POST['typeSang'];
$type="UPDATE `membre` SET `type_sang`='$typeSang' WHERE id_membre=$idmembre";
$restype = $pdo->query($type);


// Vérifier si le tableau des maladies est défini et est un tableau
if (isset($_POST['maladies']) && is_array($_POST['maladies'])) {
  $maladies = $_POST['maladies'];
} else {
  $maladies = array(); // Définir un tableau vide si aucune maladie n'est choisie
}

$req = " SELECT    do.id_don as iddon  ,do.date_don as datedon  , c.nom_centre as centre ,c.numtel_centre as numtel_centre ,
  c.email_centre as email_centre ,c.adresse_centre as adresse_centre ,
  m.nom_medecin as nommed, m.prenom_medecin as prenommed,m.email_medecin as emailmed, me.id_membre,
  me.nom_membre as nomdon,me.prenom_membre as prenomdon,me.sexe_membre as sexdon,me.num_tel as phonedon,me.email as emaildon,
  me.date_naiss as datenaissdon
  FROM don do
  INNER JOIN centre c ON c.id_centre=do.id_centre
  INNER JOIN medecin m  ON m.id_medecin=do.id_medecin
  INNER JOIN membre me ON me.id_membre=do.id_membre
  where id_don=$iddon";
  $res = $pdo->query($req);
  $row2 = $res->fetch(PDO::FETCH_ASSOC);

  if($row2['sexdon']=='Homme'){
   $sex='Monsieur';
  }
  else if($row2['sexdon']=='Femme'){
    $sex='Madame';
  }

// Create a new PDF instance
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetMargins(20, 20,20 );

// Add a header with your organization's logo
$pdf->Image('../assets/img/iconRed.jpg',20, 10, 40);
$pdf->Ln(20);
$pdf->SetFont('Arial', '', 10);
$pdf ->Cell(40, 5,'www.damy.ma',0,1, 'C');
$pdf->Image('../assets/img/sante.png',160, 10, 30);

$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 20);
$pdf->SetFillColor(187, 26, 40); // Set background color
$pdf->SetTextColor(255, 255, 255); // Set text color
$centre_before = $row2['centre'];
$centre_after =str_replace("é", "e", $centre_before);

$adresse_before = $row2['adresse_centre'];
$adresse_after =str_replace("é", "e", $adresse_before);
$pdf->Cell(0, 10, 'Serologie '." ".$etat , 0, 2, 'C', true); // Pass `true` as the last argument to fill the cell background


$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', 'B', 15);
$pdf->Ln(10);
$pdf ->Cell(120, 5,'Centre',0,1);
$pdf->SetFont('Arial', '', 10);
$pdf ->Cell(120, 5,'Nom :           '." ".$centre_after,0,1);
$pdf ->Cell(0, 5,'Telephone : '." ". $row2['numtel_centre'],0,1);
$pdf ->Cell(0, 5,'Email :         '." ". $row2['email_centre'],0,1);
$pdf ->Cell(0, 5,'Adresse :     '." ". $adresse_before,0,1);

$pdf->Ln(6);
// Set font for the content
$pdf->SetFont('Arial', 'B', 15);
$pdf ->Cell(110, 5,'Donneur',0,0);
$pdf ->Cell(0, 5,'Medecin',0,1);
$pdf->SetFont('Arial', '', 10);
$pdf ->Cell(110, 5,'Prenom :      '." ".$row2['prenomdon'],0,0);
$pdf ->Cell(0, 5,'Prenom :      '." ".$row2['prenommed'],0,1);
$pdf ->Cell(110, 5,'Nom :           '." ".$row2['nomdon'],0,0);
$pdf ->Cell(0, 5,'Nom :           '." ".$row2['nommed'],0,1);
$pdf ->Cell(110, 5,'Email :           '." ".$row2['emaildon'],0,0);
$pdf ->Cell(110, 5,'Email :           '." ".$row2['emailmed'],0,1);
$pdf ->Cell(110, 5,'Type sang :           '." ".$typeSang,0,1);
$pdf ->ln(18);

$pdf->SetFont('Arial', '', 13);
$pdf ->Cell(0, 5,'A '.$sex.' :  '." ".$row2['prenomdon']." ".$row2['nomdon'],0,1);
$pdf ->ln(3);
$pdf ->Cell(0, 5,'Vous avez fait don de votre sang, et nous vous remercions chaleureusement ',0,1);
$pdf ->Cell(0, 5,'pour cet acte humanitaire.',0,1);



if ( empty($maladies)) {
    $pdf->Cell(0, 5, 'Apres les analyses effectuees suite a chaque don, il a ete determine', 0, 1);
    $pdf->Cell(0, 5, 'que votre sang ne presente aucune des maladies suivantes qui ont ete depistees :', 0, 1);
    $pdf->ln(3);

    $allMaladies = array("Diabete", "Anemie", "Hepatite", "Hypercholesterolemie", "Maladie renale", "Leucemie");
    $pdf->SetFont('Arial', 'B', 13);
    foreach ($allMaladies as $maladie) {
        if (!in_array($maladie, $maladies)) {
            $pdf->Cell(0, 10, '- ' . ucfirst($maladie), 0, 1);
        }
    }
}

if (!empty($maladies)) {
    $pdf->SetFont('Arial', '', 13);
    $pdf->ln(3);
    $pdf->Cell(0, 5, 'Nous tenons egalement a vous informer que vous etes porteur des maladies suivantes :', 0, 1);
    $pdf->SetFont('Arial', 'B', 13);
    foreach ($maladies as $maladie) {
        $pdf->Cell(0, 10, '- ' . ucfirst($maladie), 0, 1);
    }
}



$pdf->SetFont('Arial', '', 13);
$pdf ->ln(3);
$pdf ->Cell(0, 5,'Nous tenons egalement a vous informer que vous pouvez faire un don de sang',0,1,'C');
$pdf ->Cell(0, 5,'tous les trois mois en nous rendant visite au '.$centre_after.',',0,1,'C');
$pdf ->Cell(0, 5,'situe a '.$adresse_after.'.',0,1,'C');
$pdf ->Cell(0, 5,'Les dons sont possibles du lundi au vendredi, de 8h30 a 15h00.',0,1,'C');
$pdf ->ln(3);
$pdf ->Cell(0, 5,'Pour plus d\'informations, veuillez contacter le numero suivant : '." ".$row2['numtel_centre'],0,1,'C');








$pdf->SetLineWidth(1);
$pdf->SetDrawColor(187,26,44); 
$pdf->Line(20,125,190,125); 
$pdf->Rect(5, 5, 200, 280);


// Récupérer les dimensions de la page A4
$pageWidth = $pdf->GetPageWidth();
$pageHeight = $pdf->GetPageHeight();

// Définir les dimensions et la position du rectangle
$rectWidth = $pageWidth;
$rectHeight = 8; // Hauteur du rectangle
$rectX = 0; // Position X du coin supérieur gauche
$rectY = $pageHeight - $rectHeight; // Position Y du coin supérieur gauche (bas de la page)

// Dessiner le rectangle en utilisant les coordonnées x, y, largeur et hauteur
$pdf->Rect($rectX, $rectY, $rectWidth, $rectHeight, 'F', array(), array(187, 26, 40));

// // Enregistrer le PDF
// header('Content-Type: application/pdf');
// header('Content-Disposition: attachment; filename="analyse.pdf"');
// $pdf->Output('php://output', 'F');
// Enregistrer le PDF dans un fichier
$pdf->Output('../imgsmembre&medecin&projets/pdfanalyse/analyse.pdf', 'F');
//exit;
$to = $row2['emaildon'];
$subject = 'Resultats d\'analyses  du don de sang';
$message = 'Bonjour '.$sex.' :  '." ".$row2['prenomdon']." ".$row2['nomdon'].
'<br>Veuillez trouver ci-joint le compte-rendu de votre don de sang  du '.$row2['datedon'].'<br>'
.$centre_after.'<br>
'.$adresse_after.'<br>
Pour plus d\'informations, veuillez contacter le numero suivant : '." ".$row2['numtel_centre'];

$mail = new PHPMailer(true);
try {
  // Configurer SMTP
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'damydonsang@gmail.com';
  $mail->Password = 'jdndbbzdneixfmxi';
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;

   // Set up sender and recipient
   $mail->setFrom('damydonsang@gmail.com', 'DAMY');
   $mail->addAddress($to);
   $mail->isHTML(true);

   // Set email subject and body
   $mail->Subject = $subject;
   $mail->Body = $message;

  // Joindre le fichier PDF
  $pdfPath = '../imgsmembre&medecin&projets/pdfanalyse/analyse.pdf';
  $mail->addAttachment($pdfPath, 'analyse.pdf');

  // Envoyer l'e-mail
        $notif =$row2['prenomdon']." ".$row2['nomdon']. " votre résultat d\'analyse  suite à votre don de sang le ".$row2['datedon']." est " .$etat." pour plus d\'informations vérifier votre boîte e-mail." ;
        $req_notif = "insert into notification (notif_name, notif_message, active,id_membre) values('Résultats d\'analyse', '$notif',1,".$row2['id_membre'].")";
        $res_notif = $pdo -> query($req_notif);
  $mail->send();

  echo '<div class="message"><i class="fa-solid fa-check"></i><p>Email envoyé.</p></div>';
} catch (Exception $e) {
  echo '<div class="message"><i class="fa-sharp fa-solid fa-triangle-exclamation"></i><p>Échec de l\'envoi de l\'e-mail. ' . $mail->ErrorInfo . '</p></div>';
}

}


}else{
    header('location:loginmedecin.php');
} ?>