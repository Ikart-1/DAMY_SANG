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

  <title>Damy</title>
  <meta content="" name="description">

  <meta content="" name="keywords">
   <!-- Favicons -->
  <link rel="shortcut icon" href="../assets/img/icon.svg" type="image/x-icon">

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

</head>

<body>
<?php include('navbar.php')?>
  <main id="main">
    
    <!-- ======= About Section ======= -->
    < <section id="about" class="about">

<div class="container" data-aos="fade-up">
  <div class="row gx-0">

    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
      <div class="content">
        <h3>Qui nous sommes ?</h3>
        <h2>Nous sommes un site web dédié au don de sang au Maroc. Notre plateforme vise à faciliter la mise en relation entre les donneurs et les centres de collecte de sang à travers le pays.</h2>
        <p>
        Nous encourageons les citoyens marocains à faire don de leur sang et à sauver des vies grâce à une interface conviviale et sécurisée. Avec notre système de gestion des dons, les utilisateurs peuvent facilement trouver des centres de collecte près de chez eux, prendre rendez-vous et suivre leur historique de dons. Rejoignez notre communauté de bienfaiteurs et contribuez à faire une différence positive dans la vie de nombreux patients au Maroc.
         </p>
        <div class="text-center text-lg-start">
          <a href="../readmore.html" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
            <span>En savoir plus</span>
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>

    <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
      <img src="assets/img/about-illustration.svg" class="img-fluid" alt="">
    </div>

  </div>
</div>

</section><!-- End About Section -->

    <!-- ======= demandes Section ======= -->
    <!-- <section id="demandes" class="demandes ">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h1>Demandes du sang urgents</h1>
          <h2>Ces demandes sont dans différentes villes du Royaume</h2>
        </header>
        <div class="row">
          <div class="card mb-4" style="width: 35rem;">
            <div class="card-body">
            <p>Demande publiee il y a 24 heures </p>
              <div class="header">
              <h5 class="">O+ / Centre regional de transfusion MARRAKECH</h5>
              <i class="bi bi-three-dots-vertical"></i>
              </div>
              
              <div class="person info"> 
                    <i class="bi bi-person-circle"></i>
                    <h2 >Mohammed ben</h2>
              </div>
              <div class="local info"> 
                    <i class="bi bi-geo-alt-fill"></i>
                    <h2 >Marrakech</h2>
              </div>
              <div class="deadline info "> 
                    <i class="bi bi-hourglass-split"></i>
                    <h2 >Avant 30/01/2023</h2>
              </div>
              
              
              <a href="#" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Donner</span>
                <i class="bi bi-heart-fill"></i>
              </a>
            </div>
          </div>
          <div class="card mb-4" style="width: 35rem;">
            <div class="card-body">
            <p>Demande publiee il y a 24 heures </p>
              <div class="header">
              <h5 class="">O+ / Centre regional de transfusion MARRAKECH</h5>
              <i class="bi bi-three-dots-vertical"></i>
              </div>
              
              <div class="person info"> 
                    <i class="bi bi-person-circle"></i>
                    <h2 >Mohammed ben</h2>
              </div>
              <div class="local info"> 
                    <i class="bi bi-geo-alt-fill"></i>
                    <h2 >Marrakech</h2>
              </div>
              <div class="deadline info "> 
                    <i class="bi bi-hourglass-split"></i>
                    <h2 >Avant 30/01/2023</h2>
              </div>
              
              
              <a href="#" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Donner</span>
                <i class="bi bi-heart-fill"></i>
              </a>
            </div>
          </div>
          <div class="card mb-4" style="width: 35rem;">
            <div class="card-body">
            <p>Demande publiee il y a 24 heures </p>
              <div class="header">
              <h5 class="">O+ / Centre regional de transfusion MARRAKECH</h5>
              <i class="bi bi-three-dots-vertical"></i>
              </div>
              
              <div class="person info"> 
                    <i class="bi bi-person-circle"></i>
                    <h2 >Mohammed ben</h2>
              </div>
              <div class="local info"> 
                    <i class="bi bi-geo-alt-fill"></i>
                    <h2 >Marrakech</h2>
              </div>
              <div class="deadline info "> 
                    <i class="bi bi-hourglass-split"></i>
                    <h2 >Avant 30/01/2023</h2>
              </div>
              
              
              <a href="#" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Donner</span>
                <i class="bi bi-heart-fill"></i>
              </a>
            </div>
          </div>
          <div class="card mb-4" style="width: 35rem;">
            <div class="card-body">
            <p>Demande publiee il y a 24 heures </p>
              <div class="header">
              <h5 class="">O+ / Centre regional de transfusion MARRAKECH</h5>
              <i class="bi bi-three-dots-vertical"></i>
              </div>
              
              <div class="person info"> 
                    <i class="bi bi-person-circle"></i>
                    <h2 >Mohammed ben</h2>
              </div>
              <div class="local info"> 
                    <i class="bi bi-geo-alt-fill"></i>
                    <h2 >Marrakech</h2>
              </div>
              <div class="deadline info "> 
                    <i class="bi bi-hourglass-split"></i>
                    <h2 >Avant 30/01/2023</h2>
              </div>
              
              
              <a href="#" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Donner</span>
                <i class="bi bi-heart-fill"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!-- End deandes Section -->

    

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h1>Les bienfaits du don de sang pour la santé</h1>
          <h2>Le don de sang améliore non seulement la vie du receveur, mais aide également le donneur à rester en bonne santé.</h2>
        </header>

        <div class="row">

          <div class="col-lg-6">
            <img src="../assets/img/bienfaits-illustration.svg" class="img-fluid" alt="">
          </div>

          <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
            <div class="row align-self-center gy-4">

              <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
                <div class="feature-box d-flex align-items-center">
                  <i class="bi bi-check"></i>
                  <h3>Réduisez les réserves de fer nocives</h3>
                </div>
              </div>

              <div class="col-md-6" data-aos="zoom-out" data-aos-delay="300">
                <div class="feature-box d-flex align-items-center">
                  <i class="bi bi-check"></i>
                  <h3>Préserver la santé cardiovasculaire</h3>
                </div>
              </div>

              <div class="col-md-6" data-aos="zoom-out" data-aos-delay="400">
                <div class="feature-box d-flex align-items-center">
                  <i class="bi bi-check"></i>
                  <h3>Réduire le risque de crise cardiaque</h3>
                </div>
              </div>

              <div class="col-md-6" data-aos="zoom-out" data-aos-delay="500">
                <div class="feature-box d-flex align-items-center">
                  <i class="bi bi-check"></i>
                  <h3>Réduisez le risque de cancer</h3>
                </div>
              </div>

              <div class="col-md-6" data-aos="zoom-out" data-aos-delay="600">
                <div class="feature-box d-flex align-items-center">
                  <i class="bi bi-check"></i>
                  <h3>Aide le foie à rester en bonne santé</h3>
                </div>
              </div>

              <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
                <div class="feature-box d-flex align-items-center">
                  <i class="bi bi-check"></i>
                  <h3>Développer de nouvelles cellules sanguines</h3>
                </div>
              </div>

            </div>
          </div>

        </div> <!-- / row -->





      </div>

    </section><!-- End Features Section -->


    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h1>Quelques informations utiles à propos du don de sang</h1>
          <!-- <h2>Frequently Asked Questions</h2> -->
        </header>

        <div class="row">
          <div class="col-lg-6">
            <!-- F.A.Q List 1-->
            <div class="accordion accordion-flush" id="faqlist1">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                    Les conditions qui vous rendent éligible à donner du sang
                  </button>
                </h2>
                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="accordion-body">
                        <ul>
                            <li>Vous devez avoir au moins 17 ans</li>
                            <li>Vous devez peser au moins 50 kg.</li>
                            <li>Il faut que le pourcentage d'hémoglobine soit adapté au don.</li>
                            <li>Les femmes enceintes ne sont pas éligibles au don, attendez 6 semaines après l'accouchement.</li>
                            <li>Le donneur doit être exempt de certaines maladies qui empêchent le don.</li>
                        </ul>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                  Ce que le donneur est censé faire avant de faire un don
                  </button>
                </h2>
                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                <div class="accordion-body">
                        <ul>
                            <li>Vous devez avoir au moins 17 ans</li>
                            <li>Vous devez peser au moins 50 kg.</li>
                            <li>Il faut que le pourcentage d'hémoglobine soit adapté au don.</li>
                            <li>Les femmes enceintes ne sont pas éligibles au don, attendez 6 semaines après l'accouchement.</li>
                            <li>Le donneur doit être exempt de certaines maladies qui empêchent le don.</li>
                        </ul>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                  Les Contre-indications au don
                  </button>
                </h2>
                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                <div class="accordion-body">
                        <ul>
                            <li>Vous devez avoir au moins 17 ans</li>
                            <li>Vous devez peser au moins 50 kg.</li>
                            <li>Il faut que le pourcentage d'hémoglobine soit adapté au don.</li>
                            <li>Les femmes enceintes ne sont pas éligibles au don, attendez 6 semaines après l'accouchement.</li>
                            <li>Le donneur doit être exempt de certaines maladies qui empêchent le don.</li>
                        </ul>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <div class="col-lg-6">

            <!-- F.A.Q List 2-->
            <div class="accordion accordion-flush" id="faqlist2">

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-1">
                  Combien de temps dure le processus de don
                  </button>
                </h2>
                <div id="faq2-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                <div class="accordion-body">
                        <ul>
                            <li>Vous devez avoir au moins 17 ans</li>
                            <li>Vous devez peser au moins 50 kg.</li>
                            <li>Il faut que le pourcentage d'hémoglobine soit adapté au don.</li>
                            <li>Les femmes enceintes ne sont pas éligibles au don, attendez 6 semaines après l'accouchement.</li>
                            <li>Le donneur doit être exempt de certaines maladies qui empêchent le don.</li>
                        </ul>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-2">
                  Quelques recommandations pour après le processus de don
                  </button>
                </h2>
                <div id="faq2-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                <div class="accordion-body">
                        <ul>
                            <li>Vous devez avoir au moins 17 ans</li>
                            <li>Vous devez peser au moins 50 kg.</li>
                            <li>Il faut que le pourcentage d'hémoglobine soit adapté au don.</li>
                            <li>Les femmes enceintes ne sont pas éligibles au don, attendez 6 semaines après l'accouchement.</li>
                            <li>Le donneur doit être exempt de certaines maladies qui empêchent le don.</li>
                        </ul>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-3">
                  Pourquoi devrais-je être un donneur de sang?
                  </button>
                </h2>
                <div id="faq2-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                <div class="accordion-body">
                        <ul>
                            <li>Vous devez avoir au moins 17 ans</li>
                            <li>Vous devez peser au moins 50 kg.</li>
                            <li>Il faut que le pourcentage d'hémoglobine soit adapté au don.</li>
                            <li>Les femmes enceintes ne sont pas éligibles au don, attendez 6 semaines après l'accouchement.</li>
                            <li>Le donneur doit être exempt de certaines maladies qui empêchent le don.</li>
                        </ul>
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>

      </div>

    </section><!-- End F.A.Q Section -->

<!-- ======= Counts Section ======= -->
<section id="counts" class="counts">
      <?php 
      $req = "select * from don";
      $res = $pdo ->query($req);
      $dooneur = $res -> rowCount();

      $req2 = "select * from demande";
      $res2 = $pdo ->query($req2);
      $demande = $res2 -> rowCount();

      $req4 = "select * from campagne";
      $res4 = $pdo ->query($req4);
      $campagne = $res4 -> rowCount();

      
      ?>
       <header class="section-header">
          <h1>Nos réalisations</h1>
        </header>
      <div class="container" id="realisations" data-aos="fade-up">

        <div class="row gy-4" id="box_realisations">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="<?= $dooneur ?>" data-purecounter-duration="1" class="purecounter"></span>
                <p>Donneurs</p>
              </div>
            </div>
          </div>

          


          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-heart-pulse-fill"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="<?= $demande ?>" data-purecounter-duration="1" class="purecounter"></span>
                <p>Bénéficiaires</p>
              </div>
            </div>
          </div>


          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-gear-wide-connected"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="<?= $campagne ?>" data-purecounter-duration="1" class="purecounter"></span>
                <p>Projets</p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    

    <!-- ======= Recent Blog Posts Section ======= -->
    <!-- <section id="recent-blog-posts" class="recent-blog-posts">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h1>Projets urgents</h1>
        </header>

        <div class="row">

          <div class="col-lg-4">
            <div class="post-box">
              <div class="post-img"><img src="../assets/img/blog/blog1.jpg" class="img-fluid" alt=""></div>
              <span class="post-date">Tue, September 15</span>
              <h3 class="post-title">Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit</h3>
              <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="post-box">
              <div class="post-img"><img src="../assets/img/blog/blog2.jpg" class="img-fluid" alt=""></div>
              <span class="post-date">Fri, August 28</span>
              <h3 class="post-title">Et repellendus molestiae qui est sed omnis voluptates magnam</h3>
              <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="post-box">
              <div class="post-img"><img src="../assets/img/blog/blog3.jpg" class="img-fluid" alt=""></div>
              <span class="post-date">Mon, July 11</span>
              <h3 class="post-title">Quia assumenda est et veritatis aut quae</h3>
              <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

        </div>

      </div>

    </section> -->
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
<link rel="stylesheet" href="styles.css">

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
  header('location:loginmembre.php');
} ?>