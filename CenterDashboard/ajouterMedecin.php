<?php
require('../connexion.php');
require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();
if (isset($_SESSION['id'])) {
    $id=$_SESSION['id'];
    $req = "SELECT * FROM centre WHERE id_centre='$id'";
    $res = $pdo->query($req);
    $row = $res->fetch(PDO::FETCH_ASSOC);
    if (isset($_POST['btn'])) {
        $email = $_POST['email'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // hadi ktverfier wesh domain kyn olala
                list(, $domain) = explode('@', $email);
                if (checkdnsrr($domain, 'MX')) {
            $to = $email;
            $subject = 'Invitation a rejoindre '.$row['nom_centre'].' de don de sang';
            $sub_before = $subject;
            $sub_after =str_replace("é", "e", $sub_before);
            
            $message = '
            Cher(e) professionnel(le) de la santé,
            
            J\'espère que cette lettre vous trouve en bonne santé et de bonne humeur. Je me permets de vous contacter au nom de l\'équipe de DAMY, un nouveau site web dédié au don de sang. Nous serions honorés de vous avoir parmi nous en tant que médecin bénévole au sein de notre centre.
            
            Chez DAMY, notre objectif est de faciliter le processus de don de sang en connectant les donneurs potentiels aux centres de don les plus proches de chez eux. Nous sommes convaincus que votre expertise et votre dévouement joueront un rôle crucial dans la réalisation de notre mission.
            <br>
            En tant que médecin au sein de notre centre de don de sang, vous jouerez un rôle essentiel dans le processus de collecte.
            <br>
            Votre présence permettra de garantir que les donneurs sont en bonne santé et éligibles au don. De plus, votre expertise médicale sera précieuse pour répondre aux questions des donneurs potentiels et les rassurer tout au long du processus.
            
            Si vous souhaitez vous joindre à notre équipe, veuillez remplir le formulaire d\'inscription en suivant ce lien : <br><br>
                <button class="btn" style="width:120px; height: 30px; background-color:#bb1a2c; border: none; outline: none; border-radius: 10px;">
                <a href="http://localhost/server/PFE/MedecinDashboard/signup.php?id=' . $id. '" style="color:#fff; text-decoration:none;">Cliquez ici</a>
                </button> <br><br>
            Le formulaire ne vous prendra que quelques minutes à compléter, mais votre engagement envers DAMY aura un impact durable sur la vie de nombreuses personnes.
            
            Nous serions honorés de vous compter parmi les médecins de notre centre de don de sang et de travailler ensemble pour sauver des vies. Votre participation et votre expertise sont inestimables et contribueront grandement à notre mission.
            
            N\'hésitez pas à nous contacter si vous avez des questions ou si vous avez besoin de plus d\'informations. Nous sommes impatients de vous accueillir au sein de notre équipe.
            
            Cordialement, <br><br>'
            .$row['prenom_directeur'].' '.$row['nom_directeur'].' <br>
            L\'équipe DAMY
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
                $mail->Subject = $sub_after;
                $mail->Body = $message;

                // Send the email
                $mail->send();
                $notif =$row['nom_centre']."a invité  $email à être son médecin. ";
                $req_notif = "insert into notification (notif_name, notif_message, active, id_membre) values('Invitation d\'un médecin', '$notif', 1, 10)";
                $res_notif = $pdo -> query($req_notif);
                echo '<div class="message"><i class="fa-solid fa-check"></i><p>Email envoyé.</p></div>';
            } catch (Exception $e) {
                echo '<div class="message"><i class="fa-sharp fa-solid fa-triangle-exclamation"></i><p>Échec de l\'envoi de l\'e-mail. ' . $mail->ErrorInfo . '</p></div>';
            }
        }
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
        <title>Ajouter Medecin</title>
    </head>

    <body>
        <?php include('sidebar.php') ?>
        <section class="">
            <div class="container-xl">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h1>Médecins <i class="fa-solid fa-angle-right"></i> Inviter</h1>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered">
                            <form method="POST">
                                <div class="form-group mb-4">
                                    <div class="row">
                                        <div class="col"><input type="email" name="email" class="form-control"
                                                placeholder="Enter email du médecin"></div>
                                    </div>
                                </div>
                                <button type="submit" name="btn" class="btn btn-primary">Inviter</button>
                            </form>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
        <script src="../assets/js/bootstrap-select.min.js"></script>



    </body>

    </html>
<?php } else {
    header('location:logincentre.php');
} ?>