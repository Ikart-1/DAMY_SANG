<canvas id="myChart" style="width:150%;max-width:600px" height="400px"></canvas>
<script>
  <?php
  $Ap = "SELECT COUNT(DISTINCT d.id_don) AS distinct_count
  FROM don d
  JOIN membre m ON d.id_membre = m.id_membre
  JOIN centre c ON d.id_centre = c.id_centre
  WHERE m.type_sang = 'A+'
  AND c.id_centre =" . $_SESSION['id'];
  
  $resAp = $pdo->query($Ap);
  $countAp = $resAp->fetch(PDO::FETCH_ASSOC);
  
  $Am = "SELECT COUNT(DISTINCT d.id_don) AS distinct_count
  FROM don d
  JOIN membre m ON d.id_membre = m.id_membre
  JOIN centre c ON d.id_centre = c.id_centre
  WHERE m.type_sang = 'A-'
  AND c.id_centre =" . $_SESSION['id'];
  $resAm = $pdo->query($Am);
  $countAm = $resAm->fetch(PDO::FETCH_ASSOC);
  
  $Bp = "SELECT COUNT(DISTINCT d.id_don) AS distinct_count
  FROM don d
  JOIN membre m ON d.id_membre = m.id_membre
  JOIN centre c ON d.id_centre = c.id_centre
  WHERE m.type_sang = 'B+'
  AND c.id_centre =" . $_SESSION['id'];
  $resBp = $pdo->query($Bp);
  $countBp = $resBp->fetch(PDO::FETCH_ASSOC);
  
  $Bm = "SELECT COUNT(DISTINCT d.id_don) AS distinct_count
  FROM don d
  JOIN membre m ON d.id_membre = m.id_membre
  JOIN centre c ON d.id_centre = c.id_centre
  WHERE m.type_sang = 'B-'
  AND c.id_centre =" . $_SESSION['id'];
  $resBm = $pdo->query($Bm);
  $countBm = $resBm->fetch(PDO::FETCH_ASSOC);
  
  $ABp = "SELECT COUNT(DISTINCT d.id_don) AS distinct_count
  FROM don d
  JOIN membre m ON d.id_membre = m.id_membre
  JOIN centre c ON d.id_centre = c.id_centre
  WHERE m.type_sang = 'AB+'
  AND c.id_centre =" . $_SESSION['id'];
  $resABp = $pdo->query($ABp);
  $countABp = $resABp->fetch(PDO::FETCH_ASSOC);
  
  $ABm = "SELECT COUNT(DISTINCT d.id_don) AS distinct_count
  FROM don d
  JOIN membre m ON d.id_membre = m.id_membre
  JOIN centre c ON d.id_centre = c.id_centre
  WHERE m.type_sang = 'AB-'
  AND c.id_centre =" . $_SESSION['id'];
  $resABm = $pdo->query($ABm);
  $countABm = $resABm->fetch(PDO::FETCH_ASSOC);
  
  
  $Op = "SELECT COUNT(DISTINCT d.id_don) AS distinct_count
  FROM don d
  JOIN membre m ON d.id_membre = m.id_membre
  JOIN centre c ON d.id_centre = c.id_centre
  WHERE m.type_sang = 'O+'
  AND c.id_centre =" . $_SESSION['id'];
  $resOp = $pdo->query($Op);
  $countOp = $resOp->fetch(PDO::FETCH_ASSOC);
  
  $Om = "SELECT COUNT(DISTINCT d.id_don) AS distinct_count
  FROM don d
  JOIN membre m ON d.id_membre = m.id_membre
  JOIN centre c ON d.id_centre = c.id_centre
  WHERE m.type_sang = 'O-'
  AND c.id_centre =" . $_SESSION['id'];
  $resOm = $pdo->query($Om);
  $countOm = $resOm->fetch(PDO::FETCH_ASSOC);
  ?>
  
  var sangetypes = ["A+", "B+", "AB+", "O+", "A-", "B-", "AB-", "O-"];
  var pourcentage = [
    <?php echo $countAp['distinct_count']; ?>,
    <?php echo $countBp['distinct_count']; ?>,
    <?php echo $countABp['distinct_count']; ?>,
    <?php echo $countOp['distinct_count']; ?>,
    <?php echo $countAm['distinct_count']; ?>,
    <?php echo $countBm['distinct_count']; ?>,
    <?php echo $countABm['distinct_count']; ?>,
    <?php echo $countOm['distinct_count']; ?>
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
