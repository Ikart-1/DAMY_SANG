<?php
require('../assets/fpdf/fpdf.php');
require('../connexion.php');
require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST['btnok'])){
$iddon = $_POST['iddon'];
$maladies = $_POST['maladies'];
$etat = $_POST['serologie'];

$req = " SELECT    do.id_don as iddon  , c.nom_centre as centre ,c.numtel_centre as numtel_centre ,
  c.email_centre as email_centre ,c.adresse_centre as adresse_centre ,
  m.nom_medecin as nommed, m.prenom_medecin as prenommed,m.email_medecin as emailmed,
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

$pdf->Ln(10);
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
$pdf ->Cell(110, 5,'Email :           '." ".$row2['emailmed'],0,0);

$pdf ->Cell(110, 5,'Telephone : '." ".$row2['phonedon'],0,0);

$pdf ->Cell(110, 5,'Date naissance :           '." ".$row2['datenaissdon'],0,0);
$pdf ->ln(18);

$pdf->SetFont('Arial', '', 13);
$pdf ->Cell(0, 5,'A '.$sex.' :  '." ".$row2['prenomdon']." ".$row2['nomdon'],0,1);
$pdf ->ln(3);
$pdf ->Cell(0, 5,'Vous avez fait don de votre sang, et nous vous remercions chaleureusement ',0,1);
$pdf ->Cell(0, 5,'pour cet acte humanitaire.',0,1);
$pdf ->Cell(0, 5,'Apres les analyses effectuees suite a chaque don, il a ete determine',0,1);
$pdf ->Cell(0, 5,'que votre sang ne presente aucune des maladies suivantes qui ont ete depistees :',0,1);
$pdf ->ln(3);

$allMaladies = array("Diabete", "Anemie", "Hepatite", "Hypercholesterolemie", "Maladie renale", "Leucemie");

$pdf->SetFont('Arial', 'B', 13);

foreach ($allMaladies as $maladie) {
    if (!in_array($maladie, $maladies)) {
        $pdf->Cell(0, 10, '- ' . ucfirst($maladie), 0, 1);
    }
}

$pdf->SetFont('Arial', '', 13);
$pdf->ln(3);
$pdf->Cell(0, 5, 'Nous tenons egalement a vous informer que vous etes porteur des maladies suivantes :', 0, 1);
$pdf->SetFont('Arial', 'B', 13);
foreach ($maladies as $maladie) {
    $pdf->Cell(0, 10, '- ' . ucfirst($maladie), 0, 1);
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
$subject = 'Analyse du don de sang';
$message = 'Veuillez trouver ci-joint le fichier PDF contenant l\'analyse du don de sang.';

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
  $mail->send();

  echo '<div class="message"><i class="fa-solid fa-check"></i><p>Email envoyé.</p></div>';
} catch (Exception $e) {
  echo '<div class="message"><i class="fa-sharp fa-solid fa-triangle-exclamation"></i><p>Échec de l\'envoi de l\'e-mail. ' . $mail->ErrorInfo . '</p></div>';
}

}
?>
