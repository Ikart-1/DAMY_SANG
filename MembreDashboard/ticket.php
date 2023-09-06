<?php
require('../connexion.php');
session_start();
$cin = $_SESSION['cin'];
$req = "SELECT id_membre, nom_membre, prenom_membre, num_tel, email FROM membre WHERE cin_membre='$cin'";
$res = $pdo->query($req);
$row = $res->fetch(PDO::FETCH_ASSOC);

require('../assets/fpdf/fpdf.php');

$id_dem = $_GET['idem'];
$req2 = "SELECT m.id_membre, m.num_tel, m.cin_membre, d.deadline, m.nom_membre, c.email_centre, c.adresse_centre,c.numtel_centre , c.nom_centre, m.prenom_membre
          FROM membre m, demande d, centre c
          WHERE d.id_membre = m.id_membre
          AND d.id_centre = c.id_centre
          AND d.id_demande = $id_dem";

$res2 = $pdo->query($req2);
$row2 = $res2->fetch(PDO::FETCH_ASSOC);

// Create a new PDF instance
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetMargins(20, 20,20 );

// Set font for the title

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
$centre_before = $row2['nom_centre'];
$centre_after =str_replace("é", "e", $centre_before);
$pdf->Cell(0, 10, 'RECU POUR DON DU SANG', 0, 2, 'C', true); // Pass `true` as the last argument to fill the cell background

$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', 'B', 15);
$pdf->Ln(10);
$pdf ->Cell(120, 5,'Centre',0,1);
$pdf->SetFont('Arial', '', 10);
$pdf ->Cell(120, 5,'Nom :           '." ".$centre_after,0,1);
$pdf ->Cell(0, 5,'Telephone : '." ". $row2['numtel_centre'],0,1);
$pdf ->Cell(0, 5,'Email :         '." ". $row2['email_centre'],0,1);
$pdf ->Cell(0, 5,'Adresse :     '." ". $row2['adresse_centre'],0,1);

$pdf->Ln(10);
// Set font for the content
$pdf->SetFont('Arial', 'B', 15);
$pdf ->Cell(110, 5,'Donneur',0,0);
$pdf ->Cell(0, 5,'Demandeur',0,1);

$pdf->SetFont('Arial', '', 10);
$pdf ->Cell(110, 5,'ID :               '." ". $row['id_membre'],0,0);
$pdf ->Cell(0, 5,'ID :               '." ". $row2['id_membre'],0,1);

$pdf ->Cell(110, 5,'Prenom :      '." ".$row['prenom_membre'],0,0);
$pdf ->Cell(0, 5,'Prenom :      '." ".$row2['prenom_membre'],0,1);

$pdf ->Cell(110, 5,'Nom :           '." ".$row['nom_membre'],0,0);
$pdf ->Cell(0, 5,'Nom :           '." ".$row2['nom_membre'],0,1);

$pdf ->Cell(110, 5,'Telephone : '." ".$row['num_tel'],0,0);
$pdf ->Cell(0, 5,'Telephone : '." ".$row2['num_tel'],0,1);
$pdf ->ln(10);

$pdf->SetLineWidth(1);
$pdf->SetDrawColor(187,26,44); 
$pdf->Line(20,130,190,130); 
$pdf->Rect(5, 5, 200, 135);
$pdf ->Cell(170, 0,'Veuillez conserver ce recu et l\'apporter avec vous le jour du don de sang, car il est necessaire et ne doit pas etre perdu !',0,1, 'C');
$pdf ->ln(15);
$pdf ->Cell(170, 0,'- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ',0,1, 'C');
$pdf ->ln(10);
$pdf ->Cell(170, 0,'Avant de donner du sang : ',0,1, 'L');
$pdf ->ln(5);
$pdf ->Cell(170, 0,'1- Assurez-vous d\'avoir mange un repas equilibre et nutritif avant le don de sang pour maintenir votre energie.',0,1, 'L');
$pdf ->ln(5);
$pdf ->Cell(170, 0,'2- Hydratez-vous en buvant suffisamment d\'eau avant le don pour faciliter le prelevement sanguin.',0,1, 'L');
$pdf ->ln(5);
$pdf ->Cell(170, 0,'3- Accordez-vous une nuit de sommeil suffisante pour vous sentir repose et alerte lors du don.',0,1, 'L');
$pdf ->ln(5);
$pdf ->Cell(170, 0,'4- Evitez de fumer ou de consommer de l\'alcool avant le don, car cela peut affecter la qualite de votre sang.',0,1, 'L');
$pdf ->ln(5);
$pdf ->Cell(170, 0,'5- Informez l\'equipe medicale de tous les medicaments que vous prenez actuellement, y compris les supplements',0,1, 'L');
$pdf ->ln(5);
$pdf ->Cell(170, 0,' ou les traitements.',0,1, 'L');
$pdf ->ln(5);
$pdf ->Cell(170, 0,'6- Portez des vetements confortables et amples qui permettent un acces facile a votre bras.',0,1, 'L');
$pdf ->ln(5);
$pdf ->Cell(170, 0,'7- Evitez les activites physiques intenses avant le don de sang pour eviter la fatigue excessive.',0,1, 'L');
$pdf ->ln(5);
$pdf ->Cell(170, 0,'8- Ne donnez pas de sang si vous avez des symptOmes de maladie, tels que fievre, toux ou maux de tete.',0,1, 'L');
$pdf ->ln(5);
$pdf ->Cell(170, 0,'9- Si vous avez voyage recemment dans une zone ou des maladies infectieuses sont presentes,',0,1, 'L');
$pdf ->ln(5);
$pdf ->Cell(170, 0,' informez-en l\'equipe medicale.',0,1, 'L');
$pdf ->ln(5);
$pdf ->Cell(170, 0,'10- Repondez honnetement aux questions de l\'entretien pre-don sur votre sante et votre historique medical.',0,1, 'L');
$pdf ->ln(5);
$pdf ->Cell(170, 0,'11- Evitez de consommer des aliments gras ou lourds avant le don pour faciliter la digestion.',0,1, 'L');
$pdf ->ln(5);
$pdf ->Cell(170, 0,'12- Assurez-vous d\'avoir une piece d\'identite valide avec vous lors du don de sang.',0,1, 'L');
$pdf ->ln(5);
$pdf ->Cell(170, 0,'13- Suivez attentivement les instructions de l\'equipe medicale tout au long du processus de don',0,1, 'L');
$pdf ->ln(5);
$pdf ->Cell(170, 0,' et n\'hesitez pas a poser des questions si necessaire.',0,1, 'L');
$pdf ->ln(10);
$pdf ->Cell(170, 0,'En respectant ces recommandations, vous contribuez a garantir un don de sang sur et efficace,',0,1, 'L');
$pdf ->ln(5);
$pdf ->Cell(170, 0,' permettant ainsi d\'aider ceux qui en ont besoin.',0,1, 'L');

// $pdf->SetFillColor(187, 26, 40);
// $pdf->Cell(210, 20, ' ', 0, 2, 'C', true);


// Récupérer les dimensions de la page A4
$pageWidth = $pdf->GetPageWidth();
$pageHeight = $pdf->GetPageHeight();

// Définir les dimensions et la position du rectangle
$rectWidth = $pageWidth;
$rectHeight = 15; // Hauteur du rectangle
$rectX = 0; // Position X du coin supérieur gauche
$rectY = $pageHeight - $rectHeight; // Position Y du coin supérieur gauche (bas de la page)

// Dessiner le rectangle en utilisant les coordonnées x, y, largeur et hauteur
$pdf->Rect($rectX, $rectY, $rectWidth, $rectHeight, 'F', array(), array(187, 26, 40));




header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="DONTICKET.pdf"');
$notif = "Téléphone : " . $row['num_tel'] . '<br>' . "Email : " . $row['email'];
$req_notif = "INSERT INTO notification (notif_name, notif_message, active, id_membre) VALUES ('" . $row['prenom_membre'] . " " . $row['nom_membre'] . " veut vous faire une don .', '" . $notif . "', 1, '" . $row2['id_membre'] . "')";
$res_notif = $pdo -> query($req_notif);
$pdf->Output('php://output', 'F');
exit;
?>
