<canvas id="graphBar" style="width:100%;max-width:600px"></canvas>

<?php
$Mois = ["Jan", "Fév", "Mar", "Avr", "Mai", "Juin", "Juil", "Août", "Sept", "Oct", "Nov", "Déc"];
$month = [];
$data = [];
$req = "SELECT DATE_FORMAT(date_demande, '%b') AS month, COUNT(*) AS total_demande FROM demande where id_centre = ".$_SESSION['id']."  GROUP BY month ORDER BY DATE_FORMAT(date_demande, '%m') ASC";
$res = $pdo->query($req);
while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
    $data[$row['month']]['demandes'] = $row['total_demande'];
}
$req2 = "SELECT DATE_FORMAT(date_don, '%b') AS month, COUNT(*) AS total_dons FROM don where id_centre = ".$_SESSION['id']." GROUP BY month ORDER BY DATE_FORMAT(date_don, '%m') ASC";
$res2 = $pdo->query($req2);
while ($row2 = $res2->fetch(PDO::FETCH_ASSOC)) {
    $data[$row2['month']]['dons'] = $row2['total_dons'];
}

foreach ($data as $monthName => $counts) {
    $month[] = $monthName;
    $demandes[] = isset($counts['demandes']) ? $counts['demandes'] : 0;
    $dons[] = isset($counts['dons']) ? $counts['dons'] : 0;
}
?>

<script>
    var month = <?php echo json_encode($month); ?>;
    var demandes = <?php echo json_encode($demandes); ?>;
    var dons = <?php echo json_encode($dons); ?>;

    new Chart("graphBar", {
        type: "bar",
        data: {
            labels: month,
            datasets: [
                {
                    label: 'Demandes',
                    backgroundColor: "#f2494c",
                    data: demandes
                },
                {
                    label: 'Dons',
                    backgroundColor: "#75C0E0",
                    data: dons
                }
            ]
        },
        options: {
            scales: {
                xAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Mois'
                    }
                }],
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Nombre de personnes'
                    },
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            legend: {
                display: true,
                position: "bottom"
            }
        }
    });
</script>