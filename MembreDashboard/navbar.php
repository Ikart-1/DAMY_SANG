<?php
// require('../connexion.php');
// session_start();
// hado comment het session ghtfteh 2  fois 
if(isset($_SESSION['cin'])){
  $cin=$_SESSION['cin'];
  $req = "SELECT * FROM membre WHERE cin_membre='$cin'";
  $res = $pdo->query($req);
  $row = $res->fetch(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="../assets/fonts/css/all.css">
<style>
 .img-container {
  position: relative;
  width: 23px;
  height: 23px;
  border-radius: 50%;
  overflow: hidden;

}

.img-container img {
cursor: pointer;
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
object-fit: cover;
transition: .5s;
}
.img-container img:hover {
  transform: scale(1.2);
}
  .notification-menu{
    z-index: 1000;
    display: none;
    font-family: "Nunito", sans-serif;
      display: ;
      position: absolute;
      top: 10%;
      right:  7%;
      width: 300px;
      background-color: var(--bg1-color);
      border-radius: 5px;
      transition: ease 5s;
      box-shadow: var(--shadow--color);
    }
    .notification-menu.active{
      display: block;
    }
    .notification-menu h1{
      color: #fff;
      font-size: 20px;
      font-weight: 700
    }
  
    .notification-menu p{
      color: #fff;
      font-weight: 400;
      font-size: 15px;
    }
    .notification-menu .time{
      font-size: 10px;
    }
    .fa-circle-exclamation:hover{
      color: #fff;
    }
    @keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
  }

  /* Apply the animation to the menu */
  #notification-menu {
    animation: fadeIn 0.5s;
  }
</style>

<header id="header" class="header fixed-top">
  <div class="container-fluid py-2 d-flex align-items-center justify-content-between">

    <a href="index.php" class="logo d-flex align-items-center">
      <img src="../assets/img/IconWhite.svg" alt="Demy" srcset="" title="Demy">
      <!-- <span>BLOOD DONATION</span> -->
    </a>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto" href="index.php">À propos</a></li>
        <li><a class="nav-link scrollto" href="Besoindesang.php">Besoin de sang</a>
        <li><a class="nav-link scrollto" href="Demandes.php">Demandes</a>
        <li><a class="nav-link scrollto" href="campagne.php">Campagne</a>
        <li><a class="nav-link scrollto" href="Invite.php">Invitation au don de sang</a>
        <li><a class="nav-link scrollto" href="contact.php">Contact</a></li>
      </ul>


      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

    <div class="d-flex align-items-center profil">
      <div class="mx-2">
        <i class="fa-solid fa-sun" id="toggleDark" title="Changer mode"></i>
      </div>
      <div class="dropdown ms-2 me-3">
      <a href="#" class="notification mx-2 " id="notif-toggel">
                <i class="fa-solid fa-bell" ></i>
                <span class="numnotif position-absolute d-flex justify-content-center align-items-center">
                  <?php
                  require('../connexion.php');

                  $req2 = "SELECT * FROM notification WHERE active = 1 and id_membre=".$row['id_membre'];
                  $res2 = $pdo->query($req2);
                  $num = $res2->rowCount();
                  echo $num;
                  ?>

                </span>
              </a>
      </div>
      
      <!-- <div class="mx-2"><a href="profile.php"><i class="bi bi-person-fill" title="Profile"></i></a></div> -->
      <div class="mx-2 img-container"><a href="profile.php">
        <img src="<?= $row['image_membre']?>" alt="Profile" title="<?=$row['nom_membre']." ".$row['prenom_membre']?>"></a>
      </div>
      <div class="mx-2">
       <a href="logOut.php"> <i class="fas fa-sign-out-alt " title="LogOut"></i></a>
      </div>
    </div>

  </div>

</header>
<div class="notification-menu px-4 py-2" id="notification-menu">
      <div class="container px-2 py-1">
        <?php  $req2 .= " limit 3";
        if($num > 0){
          while($row2 = $res2->fetch(PDO::FETCH_ASSOC)){ ?>
            <div class="row">
              <h1 class=" m-0"><i class="fa-solid fa-angles-right pe-2 "></i><?= $row2['notif_name'] ?></h1>
            </div>
            <div class=" row">
               <p class=" mb-1 m-0 time"><?= $row2['notif_date'] ?></h1></p>
                <p><?= $row2['notif_message'] ?></h1></p>
          </div>
            <?php } 
          } else { ?>
          <h1 class=" text-center">Aucune notification. <br><i class="fa-solid fa-circle-exclamation" ></i></h1>
         <?php }?>
       
       
    </div>
  </div>

<script>
  const notificationMenu = document.getElementById('notification-menu');
function toggleNotificationMenu() {
  notificationMenu.classList.toggle('active');
  <?php 
  $req2 = "update notification set active = 0 where id_membre=".$row['id_membre'];
  $res2 = $pdo -> query($req2);
  ?>
}

const toggleButton = document.getElementById('notif-toggel');
toggleButton.addEventListener('click', toggleNotificationMenu);
  
  const toggle = document.getElementById('toggleDark');
  const body = document.querySelector('body');
  toggle.addEventListener('click', function () {
    this.classList.toggle('fa-moon');
    body.classList.toggle('dark-mode');
    body.style.transition = "1s";

    var theme;
    if (toggle.classList.contains("fa-moon")) {
      console.log("Dark mode");
      theme = "DARK";
    } else {
      console.log("Light mode");
      theme = "LIGHT";
    }

    localStorage.setItem("PageTheme", JSON.stringify(theme));
  });

  let getTheme = JSON.parse(localStorage.getItem("PageTheme"));
  console.log(getTheme);

  if (getTheme === "DARK") {
    body.classList.add('dark-mode');
  } else {
    body.classList.remove('dark-mode');
  }
  document.addEventListener("DOMContentLoaded", function (event) {
    // Retrieve the theme from localStorage
    let getTheme = JSON.parse(localStorage.getItem("PageTheme"));
    console.log(getTheme);

    // Apply the theme based on the retrieved value
    if (getTheme === "DARK") {
      toggle.classList.add('fa-moon');
      body.classList.add('dark-mode');
    } else {
      toggle.classList.remove('fa-moon');
      body.classList.remove('dark-mode');
    }
  });


</script>
<?php }
else{
  header('location:../login.php');
}