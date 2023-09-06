<?php
require('../connexion.php');
session_start();
if(isset($_SESSION['cin'])){
    $cin=$_SESSION['cin'];
    $req = "SELECT * FROM membre WHERE cin_membre='$cin'";
    $res = $pdo->query($req);
    $row = $res->fetch(PDO::FETCH_ASSOC);
    $idmembre=$row['id_membre'];
    if(isset($_POST['submit'])){
        $centre = $_POST ['centre'];
        $deadline = $_POST['deadline'];
        $date = date("Y-m-d");
        $req = "insert into demande (date_demande, id_centre,
        id_membre, deadline ) values ('$date', $centre, $idmembre, '$deadline')";
        $res = $pdo->query($req);
        header('location:Demandes.php');
    }

   
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous"/>
    <link rel="shortcut icon" href="../assets/img/iconRed.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="../assets/fonts/css/all.css">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="style_membre.css?s=<?php echo date(time()) ?>" rel="stylesheet">
  <link rel="stylesheet" href="styleAjout.css">
  <link rel="stylesheet" href="styles.css">
<script src="..assets/js/bootstrap.min.js"></script>
    <title>Ajouter Demande</title>
</head>
<body >
<?php include('navbar.php') ?>
  <section class="">
      <div class="container mt-5">
      <header class="section-header">
          <h1>Besoin de sang</h1>
          <h2>pour partager avec un ami la récompense de faire un don de sang. Il vous suffit de nous fournir ses coordonnées, et il recevra un message en votre nom pour le motiver à faire un don de sang !</h2>
        </header>
          <div class="row">
              <!-- <div class="table-wrapper"> -->
                  <table class="table table-striped table-hover table-bordered">
                    <form method="post" action="">
                        <div class="form-group mb-4">
                            <div class="row">
                                <div class="col-sm-12 search d-flex align-items-center justify-content-start">
                                    <label style="margin-right: 20px;" for="ville">Centre</label>
                                    <!--hado li kidiro l'ererur  class="selectpicker " data-live-search="true"-->
                                    <select  name="centre" class="form-control" style="width: max-content; height: 42px;">
                                    <option disabled="disabled" selected="selected">Choisir</option>
                                    <?php
                                    $req2 = "SELECT * FROM centre";
                                    $res2 = $pdo->query($req2);
                                    while ($row2 = $res2->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        
						                <option value="<?=$row2['id_centre']?>"><?=$row2['nom_centre']?></option>
                                        <?php } ?>
					                </select>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group mb-4">
                            <div class="row">
                                <div class="col-sm-12 d-flex flex-column align-items-start justify-content-center"><label for="exampleInputPassword1">Date Limite</label><input type="date" name="deadline"  class="form-control"  placeholder="Enter date limite"></div>
                            </div>
                        </div>
                        
                        <button type="submit" name="submit" class="btn ">Demander</button>
                    </form>
                </table>
          </div>  
      </div> 
  </section>
  <?php 
  include('footer.html')?>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
  <script src="../assets/js/bootstrap-select.min.js"></script>



</body>
</html>
<?php }
else{
  header('location:../login.php');
} ?>