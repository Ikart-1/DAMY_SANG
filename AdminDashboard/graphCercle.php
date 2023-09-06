<canvas id="myChart" style="width:150%;max-width:600px" height="400px"></canvas>
<script>
  <?php
  $Ap = "select count(*) from membre where type_sang='A+'";
  $resAp = $pdo -> query($Ap);
  $countAp = $resAp -> fetch(PDO :: FETCH_ASSOC);

  $Am = "select count(*) from membre where type_sang='A-'";
  $resAm = $pdo -> query($Am);
  $countAm = $resAm -> fetch(PDO :: FETCH_ASSOC);

  $Bp = "select count(*) from membre where type_sang='B+'";
  $resBp = $pdo -> query($Bp);
  $countBp = $resBp -> fetch(PDO :: FETCH_ASSOC);
  
  $Bm = "select count(*) from membre where type_sang='B-'";
  $resBm = $pdo -> query($Bm);
  $countBm = $resBm -> fetch(PDO :: FETCH_ASSOC);
  
  $ABp = "select count(*) from membre where type_sang='AB+'";
  $resABp = $pdo -> query($ABp);
  $countABp = $resABp -> fetch(PDO :: FETCH_ASSOC);

  $ABm = "select count(*) from membre where type_sang='AB-'";
  $resABm = $pdo -> query($ABm);
  $countABm = $resABm -> fetch(PDO :: FETCH_ASSOC);

  
  $Op = "select count(*) from membre where type_sang='O+'";
  $resOp = $pdo -> query($Op);
  $countOp = $resOp -> fetch(PDO :: FETCH_ASSOC);

  $Om = "select count(*) from membre where type_sang='O-'";
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
