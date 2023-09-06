<?php
require('../connexion.php');
session_start();
if(isset($_SESSION['cin'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BLOOD DONATION</title>
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
  <style>
   

  </style>

</head>

<body>

<?php include('navbar.php')?>
  <main id="main">
<!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">

      <div class="container mt-5" data-aos="fade-up">

        <header class="section-header">
          <h1>Campagne de don de sang</h1>
          <h2>Participez activement à nos Campagnes et faites la différence dès aujourd'hui !</h2>
        </header>

        <div class="row mb-5">
          <?php 
          $req="SELECT * FROM campagne
          NATURAL JOIN centre";
          $num_per_page = 3;
            if (isset($_GET["page"])) {
              $page = $_GET["page"];
            } else {
              $page = 1;
            }
            $start_from = ($page - 1) * $num_per_page;
            $req .= " limit $start_from,$num_per_page";
            $res = $pdo->query($req);
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
          ?>

          <div class="col-lg-4">
            <div class="post-box">
              <div class="post-img"><img src="<?= $row['photo_campagne'] ?>" class="img-fluid" alt=""></div>
              <span class="post-date">
                <?php
                // ce code est pour afficher  la date en francais a cet forme samedi 13 mars 2023
                $date =$row['date_campagne'];
                $date_obj = strtotime($date);
                $jour_semaine_anglais = strftime("%A", $date_obj);
                $jours_semaine_fr = [
                    'Monday'    => 'lundi',
                    'Tuesday'   => 'mardi',
                    'Wednesday' => 'mercredi',
                    'Thursday'  => 'jeudi',
                    'Friday'    => 'vendredi',
                    'Saturday'  => 'samedi',
                    'Sunday'    => 'dimanche'
                ];
                $jour_semaine_fr = $jours_semaine_fr[$jour_semaine_anglais];
                $date_formatte = $jour_semaine_fr . strftime(" %d %B %Y", $date_obj);
                echo $date_formatte;
               ?>
               </span>
              <span class="post-date"><?= $row['nom_centre'] ?></span>
              <h3 class="post-title"><?= $row['titre_campagne'] ?></h3>
           <!-- Icônes de partage social -->
            <div class="share-icons">
              <!-- Partager sur Facebook -->
              <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode('https://www.example.com/article?id=' . $row['id_campagne']) ?>" target="_blank"  style="color: #1877F2;" class="share-icon">
                <i class="bi bi-facebook"></i>
              </a>

              <!-- Partager sur WhatsApp -->
              <a href="https://api.whatsapp.com/send?text=<?= urlencode('https://www.example.com/article?id=' . $row['id_campagne']) ?>" target="_blank"  style="color: #25D366;" class="share-icon">
                <i class="bi bi-whatsapp"></i>
              </a>

              <!-- Partager sur Instagram -->
              <a href="https://www.instagram.com/?url=<?= urlencode('https://www.example.com/article?id=' . $row['id_campagne']) ?>" target="_blank"  style="color: #E4405F;" class="share-icon">
                <i class="bi bi-instagram"></i>
              </a>

              <!-- Partager sur Messenger -->
              <a href="https://www.messenger.com/share?url=<?= urlencode('https://www.example.com/article?id=' . $row['id_campagne']) ?>" target="_blank"  style="color: #0084FF;" class="share-icon">
                <i class="bi bi-messenger"></i>
              </a>

              <!-- Partager par e-mail -->
              <a href="mailto:?subject=<?= urlencode('Regardez cet événement') ?>&body=<?= urlencode('Découvrez cet événement intéressant : https://www.example.com/article?id=' . $row['id_campagne']) ?>" style="color: #D44638;" class="share-icon">
                <i class="bi bi-google"></i>
              </a>
            </div>

              <!-- <a href="#" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a> -->
            </div>
          </div>

          <?php }
             ?>
        </div>
        <style>
            .pagination-link.active {
              z-index: 3;
              color: #fff;
              background-color: var(--hover-color);
              border: none;
            }
          </style>
        <div class="clearfix">
            <?php
            $req="SELECT * FROM campagne
            NATURAL JOIN centre";
            $res = $pdo->query($req);
            $total_records = $res->rowCount();
            $total_pages = ceil($total_records / $num_per_page);
            //echo $total_pages
            echo "<center>";
            for ($i = 1; $i <= $total_pages; $i++) {
              $activeClass = ($i == $page) ? 'active' : ''; // Add active class if current page
              echo "<a href='campagne.php?page=" . $i . "' class='btn m-1 pagination-link $activeClass'>$i</a>";
            }
            ?>
          </div>
      </div>

    </section>
    <!-- End Recent Blog Posts Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
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