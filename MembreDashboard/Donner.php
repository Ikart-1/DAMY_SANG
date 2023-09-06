<?php
require('../connexion.php');
session_start();
if (isset($_SESSION['cin'])) {
  $cin = $_SESSION['cin'];
  $idem = $_GET['idem'];
  $req2 = "select m.id_membre, m.nom_membre, m.prenom_membre, d.id_demande, m.type_sang, d.deadline ,c.nom_centre 
  from demande d, centre c, membre m
  where d.id_membre=m.id_membre and d.id_centre = c.id_centre and  id_demande = $idem";
  $res2 = $pdo->query($req2);
  $row2 = $res2->fetch(PDO::FETCH_ASSOC);
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
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <!-- tttt -->
    <!-- Template Main CSS File -->
    <link href="style_membre.css?s=<?php echo date(time()) ?>" rel="stylesheet">
    <link rel="stylesheet" href="styleajout.css">
    <style>
      .form-control:disabled,
      .form-control[readonly] {
        background-color: transparent;
        color: var(--font1-color);
      }
    </style>
  </head>

  <body>
    <main id="main">
      <?php include('navbar.php') ?>
      <!-- ======= demandes Section ======= -->
      <section id="besoin" class="demandes ">
        <div class="container mt-5" data-aos="fade-up">

          <header class="section-header">
            <h1>Votre don de sang peut sauver des vies!</h1>
            <h2>Prenez votre ticket et devenez un héros en offrant ce précieux cadeau qui peut faire toute
              la différence</h2>
          </header>
          <form method="post" class="no-styles" action="">
    <div class="row mt-2">
        <div class="col-md-12 mb-2">
            <label class="labels">Demandeur</label>
            <input disabled type="text" class="form-control my-2" name="demandeur" placeholder=""
                value="<?= $row2['prenom_membre'] . " " . $row2['nom_membre'] ?>">
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-6 mb-2">
            <label class="labels">Type de sang</label>
            <input disabled type="text" class="form-control my-2" name="sang" placeholder=""
                value="<?= $row2['type_sang'] ?>">
        </div>
        <div class="col-md-6 mb-2">
            <label class="labels">Date limite</label>
            <input disabled type="text" class="form-control my-2" placeholder="" name="deadline"
                value="<?= $row2['deadline'] ?>">
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12 mb-2">
            <label class="labels">Centre</label>
            <input disabled type="text" class="form-control my-2" placeholder="" name="centre"
                value="<?= $row2['nom_centre'] ?>">
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12 d-flex justify-content-center">
            <?php
            $req = "SELECT * FROM membre WHERE cin_membre='$cin'";
            $res = $pdo->query($req);
            $row = $res->fetch(PDO::FETCH_ASSOC);

            $currentDate = new DateTime();
            $birthDate = new DateTime($row['date_naiss']);
            $age = $currentDate->diff($birthDate)->y;
            $dateDernierDon = DateTime::createFromFormat('Y-m-d', $row['date_dernier_don']);

            // Calculate the difference in days
            $interval = $currentDate->diff($dateDernierDon);
            $diffInDays = $interval->days;
            
            if (16 >= $age || $age >= 65) {
                ?>
                <button type="button" name="" class="btn" disabled>
                    <i class="fa-sharp fa-solid fa-triangle-exclamation"></i>Votre âge ne permet pas de faire un don.
                </button>
            <?php
            } else if ($diffInDays <= 56) {
                ?>
                <button type="button" name="" class="btn" disabled>
                    <i class="fa-sharp fa-solid fa-triangle-exclamation"></i>Il n'est pas encore temps de faire un autre don.
                </button>
            <?php
            } else {
                ?>
               <a href="ticket.php?idem=<?= $row2['id_demande'] ?>" class="btn">Prenez</a>

            <?php
            }
            ?>
        </div>
    </div>
</form>
        <section id="contact-details" class="section-p1 px-5 d-flex  justify-content-between">
          <div class="details col-lg-6">
            <h2>Centre regional de transfusion</h2>
            <h3>MARRAKECH</h3>
            <div>
              <li class="d-flex">
                <i class="bi bi-geo-alt-fill me-4"></i>
                <p>RUE 6 OCTOBRE N'6 APPT 3 ETG 3 BD MASSIRA CASABLANCA</p>
              </li>
              <li class="d-flex">
                <i class="bi bi-telephone-fill me-4"></i>
                <p>+212660281190</p>
              </li>
            </div>
          </div>
          <div class="map col-lg-6">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3326.299986530272!2d-7.64396891770142!3d33.51958530053073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda62d06c1cb1919%3A0x3c6f08bb317e9e59!2sWork%20Place%20Business%20Center!5e0!3m2!1sar!2sma!4v1661866732254!5m2!1sar!2sma"
              width="800" height="300" style="border:0;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>
        </section>
      </section>
      </div>
      </div>


      <!-- End deandes Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php
    // echo $age." ".$daysDifference;
    include('footer.html') ?>
    <!-- Vendor JS Files -->
    <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>


    <!-- Template Main JS File -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    
    <script>
      $(document).ready(function () {
        $('search').selectpicker();
      })


    </script>

  </body>

  </html>
<?php } else {
  header('location:../login.php');
} ?>