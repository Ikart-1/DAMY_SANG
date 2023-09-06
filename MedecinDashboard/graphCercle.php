<canvas id="myChart" style="width:150%;max-width:600px" height="400px"></canvas>
<script>
  <?php
  $Ap = "select count(*) from membre m, medecin md, don d where d.id_membre=m.id_membre 
  and d.id_medecin =md.id_medecin and m.type_sang='A+' and md.id_medecin =".$_SESSION['id_medecin'];
  $resAp = $pdo -> query($Ap);
  $countAp = $resAp -> fetch(PDO :: FETCH_ASSOC);

  $Am = "select count(*) from membre m, medecin md, don d where d.id_membre=m.id_membre 
  and d.id_medecin =md.id_medecin and m.type_sang='A-' and md.id_medecin =".$_SESSION['id_medecin'];
  $resAm = $pdo -> query($Am);
  $countAm = $resAm -> fetch(PDO :: FETCH_ASSOC);

  $Bp = "select count(*) from membre m, medecin md, don d where d.id_membre=m.id_membre 
  and d.id_medecin =md.id_medecin and m.type_sang='B+' and md.id_medecin =".$_SESSION['id_medecin'];
  $resBp = $pdo -> query($Bp);
  $countBp = $resBp -> fetch(PDO :: FETCH_ASSOC);
  
  $Bm = "select count(*) from membre m, medecin md, don d where d.id_membre=m.id_membre 
  and d.id_medecin =md.id_medecin and m.type_sang='B-' and md.id_medecin =".$_SESSION['id_medecin'];
  $resBm = $pdo -> query($Bm);
  $countBm = $resBm -> fetch(PDO :: FETCH_ASSOC);
  
  $ABp = "select count(*) from membre m, medecin md, don d where d.id_membre=m.id_membre 
  and d.id_medecin =md.id_medecin and m.type_sang='AB+' and md.id_medecin =".$_SESSION['id_medecin'];
  $resABp = $pdo -> query($ABp);
  $countABp = $resABp -> fetch(PDO :: FETCH_ASSOC);

  $ABm = "select count(*) from membre m, medecin md, don d where d.id_membre=m.id_membre 
  and d.id_medecin =md.id_medecin and m.type_sang='AB-' and md.id_medecin =".$_SESSION['id_medecin'];
  $resABm = $pdo -> query($ABm);
  $countABm = $resABm -> fetch(PDO :: FETCH_ASSOC);

  
  $Op = "select count(*) from membre m, medecin md, don d where d.id_membre=m.id_membre 
  and d.id_medecin =md.id_medecin and m.type_sang='O+' and md.id_medecin =".$_SESSION['id_medecin'];
  $resOp = $pdo -> query($Op);
  $countOp = $resOp -> fetch(PDO :: FETCH_ASSOC);

  $Om = "select count(*) from membre m, medecin md, don d where d.id_membre=m.id_membre 
  and d.id_medecin =md.id_medecin and m.type_sang='O-' and md.id_medecin =".$_SESSION['id_medecin'];
  $resOm = $pdo -> query($Om);
  $countOm = $resOm -> fetch(PDO :: FETCH_ASSOC);
  ?>
  
  var sangetypes = ["A+", "B+", "AB+", "O+", "A-", "B-", "AB-", "O-"];
  var pourcentage = [
   <?php echo $countAp['count(*)']; ?>,
   <?php echo $countBp['count(*)']; ?>, 
   <?php echo $countABp['count(*)']; ?>, 
   <?php echo $countOp['count(*)']; ?>, 
   <?php echo $countAm['count(*)']; ?>,
   <?php echo $countAp['count(*)']; ?>, 
   <?php echo $countABm['count(*)']; ?>,
   <?php echo $countOm['count(*)']; ?>
  ];
  var barColors = [
    "#b91d47",
    "#00aba9",
    "#c2b401",
    "#e8c3b9",
    "#1e7145",
    "#b91d47",
    "#00aba9",
    "#2b5797"
  ];

  new Chart("myChart", {
    type: "doughnut",
    data: {
      labels: sangetypes,
      datasets: [{
        backgroundColor: barColors,
        data: pourcentage
      }]
    }
  });
</script>
