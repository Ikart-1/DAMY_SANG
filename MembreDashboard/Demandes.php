<?php
require('../connexion.php');
session_start();
if (isset($_SESSION['cin'])) {
  $cin = $_SESSION['cin'];
  $req = "SELECT * FROM membre WHERE cin_membre='$cin'";
  $res = $pdo->query($req);
  $row = $res->fetch(PDO::FETCH_ASSOC);
  // $villemembre = $row['ville'];
  $imgmembre = $row['image_membre'];
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

    <!-- tttt -->
    <!-- Template Main CSS File -->
    <link href="style_membre.css?s=<?php echo date(time()) ?>" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
      /* .person {
              position: relative;
              width: 23px;
              height: 23px;
              border-radius: 50%;
              overflow: hidden;

            }*/

      .person img {
        cursor: pointer;
        border-radius: 50%;
        width: 17px;
        height: 17px;
        object-fit: cover;
        transition: .5s;
        margin-right: 6px;
      }

      .person img:hover {
        transform: scale(1.2);
      }

      select {
        width: 300px;
      }
    </style>

  </head>

  <body>

    <?php include('navbar.php') ?>
    <main id="main">
      <!-- ======= demandes Section ======= -->
      <section id="demandes" class="demandes ">
        <div class="container mt-5" data-aos="fade-up">
          <?php
          $req2 = "SELECT m.cin_membre, d.type_sang AS tsangAdmin, m.nom_membre, m.ville, m.prenom_membre, m.type_sang, d.deadline, d.date_demande, d.id_demande, c.nom_centre, c.ville_centre
  FROM demande d  
  INNER JOIN membre m ON m.id_membre = d.id_membre
  INNER JOIN centre c ON c.id_centre = d.id_centre
  WHERE d.deadline > CURDATE()
  ";
          $req3 = "SELECT m.cin_membre, d.type_sang AS tsangAdmin, m.nom_membre, m.ville, m.prenom_membre, m.type_sang, d.deadline, d.date_demande, d.id_demande, c.nom_centre, c.ville_centre
  FROM demande d  
  INNER JOIN membre m ON m.id_membre = d.id_membre
  INNER JOIN centre c ON c.id_centre = d.id_centre
  WHERE d.deadline > CURDATE() 
  ";

          // Check if the search form has been submitted
  
if (isset($_GET['submit-search'])) {
  $idc = $_GET['centre'];
  if ($idc !== "Tous") {
    $req2 .= " AND c.id_centre = $idc";
    $req3 .= " AND c.id_centre = $idc";
  }
}
// hadi dyl oreder
$req3 .= " ORDER BY d.date_demande DESC";
$selectedOption = isset($_GET['centre']) ? $_GET['centre'] : "Tous";
?>

<header class="section-header">
  <h1>Demandes du sang urgents</h1>
  <h2 class="mb-4">Ces demandes concernent différentes villes du royaume. Vous pouvez choisir une ville spécifique.</h2>
  <form method="get" class="no-styles" action="Demandes.php?centre=<?= $selectedOption ?>">
    <select name="centre" class="form-control" style="width: max-content; height: 42px; margin-right: 20px;">
      <?php if (!isset($search_sang)) { ?>
        <option value="Tous" selected alt="Sélectionné">Tous les centres</option>
      <?php } else { ?>
        <option value="Tous">Tous</option>
      <?php } ?>
      <?php
      $req = "SELECT * FROM centre";
      $res = $pdo->query($req);
      while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <option value="<?= $row['id_centre'] ?>" <?= isset($selectedOption) && $selectedOption === $row['id_centre'] ? "selected" : "" ?>>
          <?= $row['nom_centre'] ?>
        </option>
      <?php } ?>
    </select>

    <button type="submit" name="submit-search" class="btn">Rechercher</button>
  </form>
</header>



          <div class="row mt-4 align-items-center justify-content-around ">
            <?php

            $resultsPerPage = 6;
            if (isset($_GET["page"])) {
              $page = $_GET["page"];
            } else {
              $page = 1;
            }
            $start_from = ($page - 1) * $resultsPerPage;
            $req3 .= " limit $start_from, $resultsPerPage";
            $res3 = $pdo->query($req3);
            while ($row3 = $res3->fetch(PDO::FETCH_ASSOC)) {
              if ($row3['cin_membre'] == $cin) {
                ?>
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <p>
                        <?php

                        // Assuming $row3['date_demande'] contains the date from the database
                        $dateDemande = strtotime($row3['date_demande']);
                        $currentDate = time();
                        $secondsDiff = $currentDate - $dateDemande;

                        // Calculate the time difference in days
                        $daysDiff = floor($secondsDiff / (60 * 60 * 24));

                        if ($daysDiff == 0) {
                          // Output the formatted string
                          echo "Demande publiee aujourd'hui.";
                        } else if ($daysDiff == 1) {
                          // Output the formatted string
                          echo "Demande publiee hier.";
                        } else {
                          // Output the formatted string
                          echo "Demande publiee il y a " . $daysDiff . " jours.";
                        }
                        ?>
                      </p>
                      </p>

                    </div>

                    <div class="header">
                      <h5 class="">
                        <?= $row3['type_sang'] . "/" . $row3['nom_centre'] ?>
                      </h5>

                    </div>

                    <div class="person info">
                      <!-- <i class="bi bi-person-circle"></i> -->
                      <img src="<?= $imgmembre ?>" alt="Profile"
                        title="<?= $row['nom_membre'] . " " . $row['prenom_membre'] ?>">
                      <h2>Vous</h2>
                    </div>
                    <div class="local info">
                      <i class="bi bi-geo-alt-fill"></i>
                      <h2>
                        <?= $row3['ville_centre'] ?>
                      </h2>
                    </div>
                    <div class="deadline info ">
                      <i class="bi bi-hourglass-split"></i>
                      <h2>Avant
                        <?= $row3['deadline'] ?>
                      </h2>
                    </div>

                    <a href="" style="width:230px;"
                      class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                      <span>Votre demande</span>
                      <i class="bi bi-heart-fill"></i>
                    </a>
                    <!-- Icônes de partage social -->
                    <div class="share-icons mt-2">
                      <!-- Partager sur Facebook -->
                      <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode('https://www.example.com/article?id=' . $row3['id_demande']) ?>"
                        target="_blank" style="color: #1877F2;" class="share-icon">
                        <i class="bi bi-facebook"></i>
                      </a>

                      <!-- Partager sur WhatsApp -->
                      <a href="https://api.whatsapp.com/send?text=<?= urlencode('https://www.example.com/article?id=' . $row3['id_demande']) ?>"
                        target="_blank" style="color: #25D366;" class="share-icon">
                        <i class="bi bi-whatsapp"></i>
                      </a>

                      <!-- Partager sur Instagram -->
                      <a href="https://www.instagram.com/?url=<?= urlencode('https://www.example.com/article?id=' . $row3['id_demande']) ?>"
                        target="_blank" style="color: #E4405F;" class="share-icon">
                        <i class="bi bi-instagram"></i>
                      </a>

                      <!-- Partager sur Messenger -->
                      <a href="https://www.messenger.com/share?url=<?= urlencode('https://www.example.com/article?id=' . $row3['id_demande']) ?>"
                        target="_blank" style="color: #0084FF;" class="share-icon">
                        <i class="bi bi-messenger"></i>
                      </a>

                      <!-- Partager par e-mail -->
                      <a href="mailto:?subject=<?= urlencode('Regardez cet événement') ?>&body=<?= urlencode('Découvrez cet événement intéressant : https://www.example.com/article?id=' . $row3['id_demande']) ?>"
                        style="color: #D44638;" class="share-icon">
                        <i class="bi bi-google"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <?php
              } else if ($row3['nom_membre'] == "Admin") { ?>
                  <div class="card mb-4">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <p>
                          <?php

                          $dateDemande = strtotime($row3['date_demande']);
                          $currentDate = time();
                          $secondsDiff = $currentDate - $dateDemande;

                          $daysDiff = floor($secondsDiff / (60 * 60 * 24));

                          if ($daysDiff == 0) {

                            echo "Demande publiee aujourd'hui.";
                          } else if ($daysDiff == 1) {
                            echo "Demande publiee hier.";
                          } else {
                            echo "Demande publiee il y a " . $daysDiff . " jours.";
                          }
                          ?>
                        </p>
                      </div>

                      <div class="header">
                        <h5 class="">
                        <?= $row3['tsangAdmin'] . "/" . $row3['nom_centre'] ?>
                        </h5>

                      </div>

                      <div class="person info">
                        <i class="bi bi-person-circle"></i>
                        <h2>
                          Par
                        <?= $row3['nom_membre'] ?>
                        </h2>
                      </div>
                      <div class="local info">
                        <i class="bi bi-geo-alt-fill"></i>
                        <h2>
                        <?= $row3['ville_centre'] ?>
                        </h2>
                      </div>
                      <div class="deadline info ">
                        <i class="bi bi-hourglass-split"></i>
                        <h2>Avant
                        <?= $row3['deadline'] ?>
                        </h2>
                      </div>

                      <a href="Donner.php?idem=<?= $row3['id_demande'] ?>"
                        class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                        <span>Donner</span>
                        <i class="bi bi-heart-fill"></i>
                      </a>
                      <!-- Icônes de partage social -->
                      <div class="share-icons mt-2">
                        <!-- Partager sur Facebook -->
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode('https://www.example.com/article?id=' . $row3['id_demande']) ?>"
                          target="_blank" style="color: #1877F2;" class="share-icon">
                          <i class="bi bi-facebook"></i>
                        </a>

                        <!-- Partager sur WhatsApp -->
                        <a href="https://api.whatsapp.com/send?text=<?= urlencode('https://www.example.com/article?id=' . $row3['id_demande']) ?>"
                          target="_blank" style="color: #25D366;" class="share-icon">
                          <i class="bi bi-whatsapp"></i>
                        </a>

                        <!-- Partager sur Instagram -->
                        <a href="https://www.instagram.com/?url=<?= urlencode('https://www.example.com/article?id=' . $row3['id_demande']) ?>"
                          target="_blank" style="color: #E4405F;" class="share-icon">
                          <i class="bi bi-instagram"></i>
                        </a>

                        <!-- Partager sur Messenger -->
                        <a href="https://www.messenger.com/share?url=<?= urlencode('https://www.example.com/article?id=' . $row3['id_demande']) ?>"
                          target="_blank" style="color: #0084FF;" class="share-icon">
                          <i class="bi bi-messenger"></i>
                        </a>

                        <!-- Partager par e-mail -->
                        <a href="mailto:?subject=<?= urlencode('Regardez cet événement') ?>&body=<?= urlencode('Découvrez cet événement intéressant : https://www.example.com/article?id=' . $row3['id_demande']) ?>"
                          style="color: #D44638;" class="share-icon">
                          <i class="bi bi-google"></i>
                        </a>
                      </div>
                    </div>
                  </div>
              <?php } else {
                ?>
                  <div class="card mb-4">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <p>
                          <?php

                          $dateDemande = strtotime($row3['date_demande']);
                          $currentDate = time();
                          $secondsDiff = $currentDate - $dateDemande;

                          $daysDiff = floor($secondsDiff / (60 * 60 * 24));

                          if ($daysDiff == 0) {

                            echo "Demande publiee aujourd'hui.";
                          } else if ($daysDiff == 1) {
                            echo "Demande publiee hier.";
                          } else {
                            echo "Demande publiee il y a " . $daysDiff . " jours.";
                          }
                          ?>
                        </p>
                      </div>

                      <div class="header">
                        <h5 class="">
                        <?= $row3['type_sang'] . "/" . $row3['nom_centre'] ?>
                        </h5>

                      </div>

                      <div class="person info">
                        <i class="bi bi-person-circle"></i>
                        <h2>
                        <?= $row3['prenom_membre'] . " " . $row3['nom_membre'] ?>
                        </h2>
                      </div>
                      <div class="local info">
                        <i class="bi bi-geo-alt-fill"></i>
                        <h2>
                        <?= $row3['ville_centre'] ?>
                        </h2>
                      </div>
                      <div class="deadline info ">
                        <i class="bi bi-hourglass-split"></i>
                        <h2>Avant
                        <?= $row3['deadline'] ?>
                        </h2>
                      </div>

                      <a href="Donner.php?idem=<?= $row3['id_demande'] ?>"
                        class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                        <span>Donner</span>
                        <i class="bi bi-heart-fill"></i>
                      </a>
                      <!-- Icônes de partage social -->
                      <div class="share-icons mt-2">
                        <!-- Partager sur Facebook -->
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode('https://www.example.com/article?id=' . $row3['id_demande']) ?>"
                          target="_blank" style="color: #1877F2;" class="share-icon">
                          <i class="bi bi-facebook"></i>
                        </a>

                        <!-- Partager sur WhatsApp -->
                        <a href="https://api.whatsapp.com/send?text=<?= urlencode('https://www.example.com/article?id=' . $row3['id_demande']) ?>"
                          target="_blank" style="color: #25D366;" class="share-icon">
                          <i class="bi bi-whatsapp"></i>
                        </a>

                        <!-- Partager sur Instagram -->
                        <a href="https://www.instagram.com/?url=<?= urlencode('https://www.example.com/article?id=' . $row3['id_demande']) ?>"
                          target="_blank" style="color: #E4405F;" class="share-icon">
                          <i class="bi bi-instagram"></i>
                        </a>

                        <!-- Partager sur Messenger -->
                        <a href="https://www.messenger.com/share?url=<?= urlencode('https://www.example.com/article?id=' . $row3['id_demande']) ?>"
                          target="_blank" style="color: #0084FF;" class="share-icon">
                          <i class="bi bi-messenger"></i>
                        </a>

                        <!-- Partager par e-mail -->
                        <a href="mailto:?subject=<?= urlencode('Regardez cet événement') ?>&body=<?= urlencode('Découvrez cet événement intéressant : https://www.example.com/article?id=' . $row3['id_demande']) ?>"
                          style="color: #D44638;" class="share-icon">
                          <i class="bi bi-google"></i>
                        </a>
                      </div>
                    </div>
                  </div>
              <?php }
            } ?>
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
            $totalResults = $pdo->query($req2)->rowCount();
            $totalPages = ceil($totalResults / $resultsPerPage);
            $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
            $startIndex = ($currentPage - 1) * $resultsPerPage;
            for ($page = 1; $page <= $totalPages; $page++) {
              $params = $_GET;
              $params['page'] = $page;
              $queryString = http_build_query($params);
              $activeClass = ($page == $currentPage) ? ' active' : '';
              echo '<a style="color:white" href="Demandes.php?' . $queryString . '&centre=' . $selectedOption . '" class="btn m-1 pagination-link' . $activeClass . '">' . $page . '</a>';
            }
            ?>
          </div>


        </div>

      </section>
      <!-- End deandes Section -->
    </main><!-- End #main -->
    <?php include('footer.html') ?>
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
      document.addEventListener("DOMContentLoaded", function (event) {

        const showNavbar = (toggleId, navId, bodyId, headerId) => {
          const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId)

          // Validate that all variables exist
          if (toggle && nav && bodypd && headerpd) {
            toggle.addEventListener('click', () => {
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

        showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

        /*===== LINK ACTIVE =====*/
        const linkColor = document.querySelectorAll('.nav_link')

        function colorLink() {
          if (linkColor) {
            linkColor.forEach(l => l.classList.remove('active'))
            this.classList.add('active')
          }
        }
        linkColor.forEach(l => l.addEventListener('click', colorLink))
      });

      let Menu = document.getElementById('Menu');
      function toggleMenu() {
        Menu.classList.toggle("open-menu");
      }

    </script>

  </body>

  </html>
<?php } else {
  header('location:loginmembre.php');
} ?>