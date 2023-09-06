<?php
require('../connexion.php');
session_start();
require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if(isset($_SESSION['cin'])){
  $cin=$_SESSION['cin'];
  $sql="SELECT * FROM membre Where cin_membre='$cin'";
  $resu = $pdo->query($sql);
  $row = $resu->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['btnmail'])){
  $name = $_POST['name'];
  $email=$row['email'];
  $message="Nom : ".$name."<br> Email :".$email."<br>".$_POST['message'];
  $subject=$_POST['subject'];


  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // hadi ktverfier wesh domain kyn olala
        list(, $domain) = explode('@', $email);
        if (checkdnsrr($domain, 'MX')) {
    $sub_before = $subject;
    $sub_after =str_replace("é", "e", $sub_before);
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
        $mail->addAddress('damydonsang@gmail.com');
        $mail->isHTML(true);

        // Set email subject and body
        $mail->Subject = $sub_after;
        $mail->Body = $message;

        // Send the email
        $mail->send();

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
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Damy</title>
  <meta content="" name="description">

  <meta content="" name="keywords">
   <!-- Favicons -->
  <link rel="shortcut icon" href="../assets/img/iconRed.svg" type="image/x-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" >
  
  <!-- tttt -->
  <!-- Template Main CSS File -->
  <link href="style_membre.css?s=<?php echo date(time()) ?>" rel="stylesheet">
  <link rel="stylesheet" href="../assets/fonts/css/all.css">
  <link rel="stylesheet" href="styleAjout.css">
  <link rel="stylesheet" href="styles.css">

</head>

<body>
<?php include('navbar.php')?>
  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h1>Contact</h1>
        </header>

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Adresse</h3>
                  <p>Lycée technique <br>Chichaoua, Maroc</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-telephone"></i>
                  <h3>Appelez-nous</h3>
                  <p>+212 707-430485<br>+212 631-554079</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-envelope"></i>
                  <h3>Envoyez-nous un e-mail</h3>
                  <p>damydonsang@gmail.com<br>ilyasskarroum54@gmail.com<br>sakizakaria7@gmail.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-clock"></i>
                  <h3>Heures d'ouverture</h3>
                  <p>Lundi - Samedi<br>8:30AM - 6:30PM</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <form action="" method="POST" class="form">
              <div class="row gy-4">

                <div class="col-md-12">
                  <input type="text" name="name" style="width: 400px;" class="form-control" placeholder="Your Name" required>
                </div>

                <div class="col-md-12 ">
                  <input type="email" class="form-control" style="width: 400px;" name="email" placeholder="Your Email" required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" style="width: 400px;" name="subject" placeholder="Subject" required>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" style="width: 400px; height: 100px;" name="message" rows="10" placeholder="Message" required></textarea>
                </div>

                  <button type="submit" name="btnmail" class="btn" style="width:max-content;">Envoyer</button>
                </div>

              </div>
            </form>

          </div>

        </div>

      </div>

    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  <?php include('footer.html')?>
  <!-- Vendor JS Files -->
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script>
        document.addEventListener("DOMContentLoaded", function(event) {
   
   const showNavbar = (toggleId, navId, bodyId, headerId) =>{
   const toggle = document.getElementById(toggleId),
   nav = document.getElementById(navId),
   bodypd = document.getElementById(bodyId),
   headerpd = document.getElementById(headerId)
   
   // Validate that all variables exist
   if(toggle && nav && bodypd && headerpd){
   toggle.addEventListener('click', ()=>{
   // show navbar
   nav.classList.toggle('show')
   // change icon
   toggle.classList.toggle('bx-x')
   // add padding to body
   bodypd.classList.toggle('body-pd')
   // add padding to header
   headerpd.classList.toggle('body-pd')
   })
   }
   }
   
   showNavbar('header-toggle','nav-bar','body-pd','header')
   
   /*===== LINK ACTIVE =====*/
   const linkColor = document.querySelectorAll('.nav_link')
   
   function colorLink(){
   if(linkColor){
   linkColor.forEach(l=> l.classList.remove('active'))
   this.classList.add('active')
   }
   }
   linkColor.forEach(l=> l.addEventListener('click', colorLink))
   });
   
   let Menu = document.getElementById('Menu');
   function toggleMenu(){
    Menu.classList.toggle("open-menu");
   }
   
    </script>

</body>

</html>
<?php }
else{
  header('location:../login.php');
} ?>