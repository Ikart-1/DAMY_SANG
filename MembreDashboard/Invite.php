<?php
// email site : damydonsang@gmail.com
// psw : damypfe23
 require('../connexion.php');
 session_start();
// require '../vendor/autoload.php';
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

 if (isset($_SESSION['cin'])) {
   $cin = $_SESSION['cin'];
//   $req = "SELECT * FROM membre WHERE cin_membre='$cin'";
//   $res = $pdo->query($req);
//   $row = $res->fetch(PDO::FETCH_ASSOC);

//   if (isset($_POST['submit'])) {
//     $nom = trim(strtoupper($_POST['nom']));
//     $email = $_POST['email'];
//     $deadline = $_POST['deadline'];
  
//     if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
//   // hadi ktverfier wesh domain kyn olala
//       list(, $domain) = explode('@', $email);
//       if (checkdnsrr($domain, 'MX')) {
//         $to = $email;
//         $subject = 'Demande de don de sang pour ' . $row['prenom_membre'] . ' ' . $row['nom_membre'];
//         $message = 'Bonjour ' . $nom . ',
  
//   Nous avons une urgence de don de sang. Veuillez trouver ci-dessous les détails de la demande :
  
//   Type de sang : ' . $row['type_sang'] . '
//   Date limite : ' . $deadline . '
//   Téléphone de demandeur :' . $row['num_tel'] . '
  
//   Pour plus d\'informations visitez nous www.damy.ma
//   Merci de votre générosité.
  
//   Cordialement,
//   DAMY';
  
//         // Create a new PHPMailer instance
//         $mail = new PHPMailer(true);
  
//         try {
//           // Set up SMTP
//           $mail->isSMTP();
//           $mail->Host = 'smtp.gmail.com';
//           $mail->SMTPAuth = true;
//           $mail->Username = 'damydonsang@gmail.com';
//           $mail->Password = 'jdndbbzdneixfmxi';
//           $mail->SMTPSecure = 'tls';
//           $mail->Port = 587;
  
//           // Set up sender and recipient
//           $mail->setFrom('damydonsang@gmail.com', 'DAMY');
//           $mail->addAddress($to, $nom);
  
//           // Set email subject and body
//           $mail->Subject = $subject;
//           $mail->Body = $message;
  
//           // Send the email
//           $mail->send();
  
//           echo '<div class="message"><i class="fa-solid fa-check"></i><p>Email envoyé</p></div>';
//         } catch (Exception $e) {
//           echo '<div class="message"><i class="fa-sharp fa-solid fa-triangle-exclamation"></i><p>Échec de l\'envoi de l\'e-mail.' . $mail->ErrorInfo . '</p></div>';
//         }
//       } else {
//         echo '<div class="message"><i class="fa-sharp fa-solid fa-triangle-exclamation"></i><p>Adresse e-mail invalide</p></div>';
//       }
//     }
//   }
  
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css"
      integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous" />
    <link rel="shortcut icon" href="../assets/img/iconRed.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="../assets/fonts/css/all.css">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet">
    <link href="style_membre.css?s=<?php echo date(time()) ?>" rel="stylesheet">
    <link rel="stylesheet" href="styleAjout.css">
    <link rel="stylesheet" href="styles.css">
    <script src="../assets/js/bootstrap.min.js"></script>
    <title>Invité</title>
  </head>

  <body>
    <?php include('navbar.php') ?>
    <section class="">
      <div class="container mt-5">
        <header class="section-header">
          <h1>Invitation au don de sang</h1>
          <h2>pour partager avec un ami la récompense de faire un don de sang. Il vous suffit de nous fournir ses
            coordonnées, et il recevra un message en votre nom pour le motiver à faire un don de sang !</h2>
        </header>
        <div class="row">
          <!-- <div class="table-wrapper"> -->
          <table class="table table-striped table-hover table-bordered">
            <form method="post" action="envoyer_sms.php">
              <div class="form-group mb-4">
                <div class="row">
                  <div class="col-md-12">
                    <!-- <label for="exampleInputPassword1">Nom et prénom</label>
                    <input name="nom" type="text" class="form-control" placeholder="Entrez le nom et le prénom" required> -->
                     <label for="exampleInputPassword1">num</label>
                    <input name="numero" type="text" class="form-control" placeholder="Entrez le nom et le prénom" required>
                  </div>
                </div>

              </div>
              <div class="form-group mb-4">
                <div class="row">
                  <div class="col-md-12">
                    <!-- <label for="exampleInputPassword1">Email</label>
                    <input name="email" type="email" class="form-control" placeholder="Email" required> -->
                    <label for="exampleInputPassword1">message</label>
                    <input name="message" type="text" class="form-control">
                  </div>
                </div>
              </div>
              <div class="form-group mb-4">
                <div class="row">
                  <div class="col-sm-12 d-flex flex-column align-items-start justify-content-center">
                    <!-- <label for="exampleInputPassword1">Date Limite</label>
                    <input type="date" name="deadline" class="form-control" placeholder="Entrez la date limite" required> -->
                  </div>
                </div>
              </div>

              <button type="submit" name="submit" class="btn ">Envoyer</button>
            </form>
          </table>
        </div>
      </div>
    </section>
    <?php include('footer.html') ?>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/bootstrap-select.min.js"></script>


  </body>

  </html>

  <?php
} else {
  header('location:loginmembre.php');
}
?>