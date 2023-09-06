<style>
.graphe-container>* {
               padding-right: 0; 
                padding-left: 0;
}
.container-satat{
    margin: 0;
    padding: 0;
}
</style>
<div class="container">
<section id="counts" class="counts ">
<?php 
$req1 ="select id_centre from medecin where id_medecin =".$id;
$res1 = $pdo->query($req1);
$row1 = $res1->fetch(PDO::FETCH_ASSOC);

      $req = "select * from don WHERE id_centre= ".$row1['id_centre'];
      $res = $pdo ->query($req);
      $dooneur = $res -> rowCount();

      $req2 = "select * from demande WHERE id_centre= ".$row1['id_centre'];
      $res2 = $pdo ->query($req2);
      $demande = $res2 -> rowCount();

      $req4 = "select * from campagne WHERE id_centre= ".$row1['id_centre'];
      $res4 = $pdo ->query($req4);
      $campagne = $res4 -> rowCount();

      
      ?>
          <h1 class="mb-3">Nos réalisations</h1>
      <div class="container-satat " id="realisations" data-aos="fade-up">

        <div class="row gy-4 d-flex flex-row justify-content-around align-items-center" id="box_realisations">

          <div class="col-lg-3 col-md-6 p-0 mx-1" >
            <div class="count-box d-flex align-items-center justify-content-center p-4">
              <i class="bi bi-emoji-smile"></i>
              <div>
              <span class="fw-bold num text-center" data-val="<?= $dooneur ?>" data-purecounter-duration="1" class="purecounter"></span>
                <p>Donneurs</p>
              </div>
            </div>
          </div>

          


          <div class="col-lg-3 col-md-6 p-0 mx-1">
            <div class="count-box d-flex align-items-center justify-content-center p-4">
              <i class="bi bi-heart-pulse-fill"></i>
              <div>
              <span class="fw-bold num text-center" data-val="<?= $demande ?>" data-purecounter-duration="1" class="purecounter"></span>
                <p>Bénéficiaires</p>
              </div>
            </div>
          </div>


          <div class="col-lg-3 col-md-6 p-0 mx-1">
            <div class="count-box d-flex align-items-center justify-content-center p-4">
              <i class="bi bi-gear-wide-connected"></i>
              <div>
              <span class="fw-bold num text-center" data-val="<?= $campagne ?>" data-purecounter-duration="1" class="purecounter"></span>
                <p>Projets</p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>
        <div class="graphe-container row  d-flex justify-content-around  align-items-center ">
            <div class="col-lg-6 gy-4" >
                <div class="card p-2 ">
                    <div class="graphe-title pb-2 mb-2">
                        <p>Comparaison mensuelle entre les donneurs et les bénéficiers.</p>
                    </div>
                    <div class="card-body">
                        <?php include_once('graphBar.php')?>
                   </div>
                </div>
            </div>
            <div class="col-lg-4 gy-4" >
            <div class="card p-2 ">
                    <div class="graphe-title pb-2 mb-2">
                        <p>Pourcentages des types de sang des membres.</p>
                    </div>
                    <div class="card-body">
                        <?php include_once('graphCercle.php')?>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <script>
       let valueDisplays = document.querySelectorAll(".num");
let interval = 1000;
valueDisplays.forEach((valueDisplay) => {
  let startValue = 0;
  let endValue = parseInt(valueDisplay.getAttribute("data-val"));
  let duration = Math.floor(interval / endValue);

  if (endValue === 0) {
    valueDisplay.textContent = endValue; // Set the text immediately to 0
  } else {
    let counter = setInterval(function() {
      startValue += 1;
      valueDisplay.textContent = startValue;

      if (startValue === endValue) {
        clearInterval(counter);
      }
    }, duration);
  }
});

    </script>

