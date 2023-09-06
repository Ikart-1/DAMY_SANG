<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demy</title>
  <meta content="" name="description">

  <meta content="" name="keywords">
   <!-- Favicons -->
  <link rel="shortcut icon" href="assets/img/iconRed.svg" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous"/>
  
   
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="assets/fonts/css/all.css">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
  <!-- Template Main CSS File -->

  <style>

    .espace{
        width: 300px;
        height: 300px;
        background-color: #bb1a2c;
        border: 0px;
        border-radius: 20px;
        box-shadow: 10px 20px 20px rgba(1, 41, 112, 0.1);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    a{text-decoration: none;}
    .espace:hover{
        transition: 0.5s ;
        background-color: #f2494c;
    }
    .espace i {
        color: #fff;
        font-size: 140px;
    }
    .espace:hover i {
        transition: 0.5s ;
       transform: translateX(5px);
}
    .espace p{
        color: #fff;
        font-size: 22px;
        text-align: center
    }
    .container{
        margin-top: 55px;
    }
    
  </style>
</head>
<body>

    <div class="container" >
    <!-- <h1>Ma page Bootstrap</h1> -->
    
    <div class="row">
      <div class="col-md-4 colspan">
        <a href="MembreDashboard/loginmembre.php" >
            <div class="espace container">
                <i class="bi bi-people-fill"></i>
                <p class="">L'espace pour les membres</p>
            </div>
        </a>
      </div>
      <div class="col-md-4 colspan">
        <a href="MedecinDashboard/loginmedecin.php" >
            <div class="espace container">
                <i class="bi bi-file-medical"></i>
                <p class="">L'espace pour les médecins</p>
            </div>
        </a>
      </div>
      <div class="col-md-4 colspan">
        <a href="CenterDashboard/logincentre.php" >
            <div class="espace container">
                <i class="bi bi-hospital-fill"></i>
                <p class="">L'espace pour les centres de transfusion</p>
            </div>
        </a>
      </div>
    </div>
    
    
  </div>






   
  <script src="assets/js/main.js"></script>
</body>
</html>