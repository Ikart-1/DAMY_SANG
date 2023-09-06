<?php
require('../connexion.php');
require '../vendor/autoload.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['btn'])) {
    $email = $_POST['email'];
    // echo $email;
    $req = "SELECT id_medecin, email_medecin FROM medecin WHERE email_medecin = '$email' ";
    $res = $pdo->query($req);
    $row = $res ->fetch(PDO :: FETCH_ASSOC);
    $count = $res->rowCount();
    // echo $count;
    if ($count > 0) {
        $to = $email;
        $subject = 'Reinitialiser le mot de passe.';
        $message = 'Nous avons bien reçu votre demande de réinitialisation de mot de passe pour votre compte.
        <br>
        Cliquez sur le button suivant pour accéder à la page de réinitialisation de mot de passe :
        <br>
        <br>
        <center>
        <button class="btn" style="width:120px; height: 30px; background-color:#bb1a2c; border: none; outline: none; border-radius: 10px;">
            <a href="http://localhost/server/PFE/MedecinDashboard/resetpsw.php?id='.$row['id_medecin'].'" style="color:#fff; text-decoration:none;">Cliquez ici</a>
        </button> 
    </center>
    
        ';

        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);

        try {
            // Set up SMTP
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

            // Send the email
            $mail->send();

            echo '<div class="message"><i class="fa-solid fa-check"></i><p>Email envoyé.</p></div>';
        } catch (Exception $e) {
            echo '<div class="message"><i class="fa-sharp fa-solid fa-triangle-exclamation"></i><p>Échec de l\'envoi de l\'e-mail. ' . $mail->ErrorInfo . '</p></div>';
        }
    } else {
        echo "<div class=\"message\"><i class=\"fa-sharp fa-solid fa-triangle-exclamation\"></i><p>Nous ne trouvons pas cet e-mail !</p></div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MP Oublié</title>
    <link rel="shortcut icon" href="../assets/img/icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/fonts/css/all.css">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/css/signup.css?s=<?php echo time(); ?>" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link rel="shortcut icon" href="assets/img/iconRed.svg" type="image/x-icon">
</head>
<style>
    .signup-form h2::before, .signup-form h2::after {
        display: none;
  content: "";
  height: 2px;
  width: 30%;
  background: #d4d4d4;
  position: absolute;
  top: 50%;
  z-index: 2;
}
</style>
<body>
    <section class="d-flex align-items-center justify-content-between" style="height: 95vh;">
        <div class="signup-form">
            <form action="" method="POST" class="">
                <div class="row">
                    <h2>Mot de passe oublié</h2>
                    <p>Veuillez saisir votre adresse email pour récupérer votre compte.</p>
                </div>
                <div class="form-group d-flex flex-column justify-content-between" style="height: 100px;">
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-envelope pe-2"></i>
                        <input type="email" class="form-control" name="email" placeholder="votreemail@gmail.com"
                            required="required">
                    </div>
                </div>

                <div class="form-group d-grid">
                    <button type="submit" name="btn" class="btn m-0" name="btnok">Renvoyer</button>
                </div>
            </form>
        </div>
    </section>
    <div style="height: 5vh; font-size: 10px; text-align: center; color:var(--bg1-color);">Damy &copy; 2023
    </div>
</body>

</html>