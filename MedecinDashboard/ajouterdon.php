<?php
require('../connexion.php');
session_start();
if(isset($_SESSION['id_medecin'])){
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
    <link href="styleajout.css?s=<?php echo date(time()) ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <link rel="shortcut icon" href="../assets/img/iconRed.svg" type="image/x-icon">
    <link rel="stylesheet" href="../assets/fonts/css/all.css">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


<script src="..assets/js/bootstrap.min.js"></script>
    <title>Ajouter Don</title>
</head>
<style>
    .form-control:disabled, .form-control[readonly] {
	background-color: transparent;
	opacity: 1;
  }
  .para{
    color: var(--font1-color);
  }
  .profile-title {
        color: var(--bg1-color);
        padding: 0;
        padding-bottom: 10px;
        border-bottom: 1px solid var(--bg1-color);
      }

      .page-title {
        color: var(--font3-color);
        margin: 8px 0 0;
        font-size: 22px;
      }
</style>
<body >
<?php include('sidebar.php');
    $idmed=$_SESSION['id_medecin'];
    $infosmed="SELECT * FROM medecin WHERE id_medecin=$idmed";
    $resinfosmed = $pdo->query($infosmed);
    $row = $resinfosmed->fetch(PDO::FETCH_ASSOC);
    $idcentremedecin = $row['id_centre'];
    // echo $idmed;
    if(isset($_POST['ok'])){
    $date=$_POST['datedon'];
    $iddon=$_POST['iddon'];
    $cindon=$_POST['cindon'];
    $iddem=$_POST['iddem'];

    $sql="INSERT INTO don(`date_don`, `id_membre`, `id_demande`, `id_centre`, `id_medecin`) 
    VALUES ('$date',$iddon,$iddem,$idcentremedecin,$idmed)";
    $res = $pdo->query($sql);

    }

?>
  <section class="">
      <div class="container-xl">
          <div class="table-responsive">
              <div class="table-wrapper">
                  <div class="table-title">
                      <div class="row">
                          <div class="col-sm-4">
                            <h1>Ajouter Don</h1>
                          </div>
                      </div>
                  </div>
                  <table class="table table-striped table-hover table-bordered">
                    <form action="" method="POST">
                        <div class="form-group mb-3">
                            <div class="row">
                            <div class="profile-title"><span>Informations du Don</span></div><br>
                            </div>
                            <div class="row mt-2">
                               <div class="col-md-4 mb-2"><label class="labels">Date du don</label><input type="date"
                                   class="form-control my-2" name="datedon" placeholder=""></div>
                         </div>
                        </div>

                        <div class="form-group mb-3">
                            <div class="row">
                            <div class="profile-title"><span>Informations du Donneur</span></div><br>
                            </div>
                            <div class="row mt-2">
                              <div class="col-md-6 mb-2"><label class="labels">Id Donneur</label><input type="text"
                                  class="form-control my-2" name="iddon" placeholder=""></div>
                                  <div class="col-md-6 mb-2"><label class="labels">Cin Donneur</label><input type="text"
                                  class="form-control my-2" name="cindon" placeholder=""></div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <div class="row">
                            <div class="profile-title"><span>Informations du Demande</span></div><br>
                            </div>
                            <div class="row mt-2">
                             <div class="col-md-6 mb-1"><label class="labels">Id Demande</label><input  type="text"
                                 class="form-control my-2" name="iddem" placeholder=""></div>
                           </div>
                        </div>


                      
                        

                        <button type="submit" name="ok" class="btn btn-primary">Ajouter</button>
                    </form>
                </table>
              </div>
          </div>  
      </div> 
  </section>
  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
  <script src="../assets/js/bootstrap-select.min.js"></script>



</body>
</html>
<?php }else{
    header('location:loginmedecin.php');
} ?>