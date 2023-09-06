<?php
if (isset($_POST['btn'])) {
    require('../connexion.php');
    session_start();
    $date = date("Y-m-d");
    $deadline = $_POST['deadline'];
    $centre = $_POST['Centre'];
    $typeSang = $_POST['typeSang'];
    $idadmn = $_SESSION['id_admine'];
    $req = "insert into demande (date_demande, id_centre, id_membre ,deadline, type_sang ) values ('$date', $centre, $idadmn , '$deadline', '$typeSang')";
        $res = $pdo->query($req);
    header('Location:demandes.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <link href="styleAjout.css?s=<?php echo date(time()) ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css"
        integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous" />
    <link rel="shortcut icon" href="../assets/img/iconRed.svg" type="image/x-icon">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="../assets/fonts/css/all.css">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">


    <script src="..assets/js/bootstrap.min.js"></script>
    <title>Ajouter Demande</title>
    <style>
    .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
  width: max-content;
}
</style>
</head>
 <body>
<?php include('sidebar.php') ?>
<section class="ajout-form">
    <div class="container-lg">
        <form action="" method="post" class="no-styles">
            <div class="row">
                <div class="col mb-4 ">
                    <h1>Demandes <i class="fa-solid fa-angle-right"></i> Ajouter</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-4 mb-4 search d-flex align-items-center justify-content-between">
                    <label for="typeSang">Type de sang</label>
                    <select class="selectpicker" name="typeSang" required>
                        <option disabled="disabled" selected="selected">Choose</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                </div>
                <div class="col-8 mb-4 search d-flex align-items-center justify-content-between">
                    
                    <label for="Centre">Centre</label>
                    <select class="selectpicker" data-live-search="true" name="Centre" required>
                        <?php $req = "SELECT * FROM centre";
                        $res = $pdo->query($req);
                        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <option value="<?= $row['id_centre'] ?>"><?= $row['nom_centre'] ?></option>
                        <?php } ?>
                    </select>
                </div>

            </div>
            <div class="row">
                <div class="col mb-4"><label for="exampleInputPassword1">Date limite</label><input type="date"
                        name="deadline" class="form-control" placeholder="Date limite" require></div>
            </div>
            <!-- <div class="row">
                        <div class="col mb-4"><input type="text" class="form-control" name="phone" placeholder="Phone"
                                require></div>
                    </div> -->
            <!-- <div class="row">
                <label for="exampleInputPassword1">Date limite</label>
                                <div class="col mb-4"><textarea class="form-control texterea" id="exampleFormControlTextarea1" ></textarea></div>
                            </div> -->
            <div class="row">
                <div class="col-12 mb-4 d-flex justify-content-center">
                    <button type="submit" name="btn" class="btn btn-primary m-0 ">Ajouter</button>
                </div>
            </div>
    </div>
    </form>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="../assets/js/bootstrap-select.min.js"></script>



</body>

</html>