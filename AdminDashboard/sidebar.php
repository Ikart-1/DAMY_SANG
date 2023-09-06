<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="sideBarStyle.css">
<style>
  a {
    text-decoration: none
  }
  .notification-menu{
    font-family: "Open Sans", sans-serif;
      display: none;
      position: absolute;
      top: 10%;
      left: 1450%;
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
<section id="body-pd">
  <header class="header" id="header">
    <div class="header_toggle ">
      <i class="bx bx-menu" id="header-toggle"></i>
    </div>
    <div>
      <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
          <div class="d-flex align-items-center">
            <div class="px-3">
              <a class="nav-link" href="../index.php"> <i class="fa-solid fa-house"></i></a>
            </div>
            <div class="px-3">
              <i class="fa-solid fa-sun" id="toggleDark"></i>
            </div>
            <div class="px-3">
              <a href="#" class="notification mx-2 " id="notif-toggel">
                <i class="fa-solid fa-bell" ></i>
                <span class="numnotif position-absolute d-flex justify-content-center align-items-center">
                  <?php
                  require('../connexion.php');

                  $req = "SELECT * FROM notification WHERE active = 1 and id_membre=10";
                  $res = $pdo->query($req);
                  $num = $res->rowCount();
                  echo $num;
                  ?>

                </span>
              </a>
            </div>
          </div>
        </div>
      </nav>
    </div>

  </header>
  <div class="l-navbar" id="nav-bar">
    <nav class="nav">
      <a href="../index.php" class="nav_logo">
        <img src="../assets/img/IconWhite.svg" class="icon nav_icon" title="Icon"><span class="nav_logo-name">DAMY</span>
      </a>
      <div class="nav_list">
        <a href="index.php" class="nav_link active">
          <i class="fa-solid fa-house"></i>
          <span class="nav_name">Accueil</span>
        </a>
        <a href="demandes.php" class="nav_link">
          <i class="fa-sharp fa-solid fa-heart-circle-exclamation nav_icon"></i>
          <span class="nav_name">Demandes</span>
        </a>
        <a href="membres.php" class="nav_link">
          <i class="fa-solid fa-users nav_icon"></i>
          <span class="nav_name">Membres</span>
        </a>
        <a href="medecins.php" class="nav_link">
          <i class="fa-solid fa-stethoscope nav_icon"></i>
          <span class="nav_name">Medecins</span>
        </a>
        <a href="centres.php" class="nav_link">
        <i class="fa-solid fa-hospital"></i>
          <span class="nav_name">Centres</span>
        </a>
        <a href="projets.php" class="nav_link">
          <i class="fa-solid fa-calendar-plus nav_icon"></i>
          <span class="nav_name">Campagnes</span>
        </a>
        <a href="dons.php" class="nav_link">
          <i class="fa-sharp fa-solid fa-clock-rotate-left"></i>
          <span class="nav_name">Historique des dons</span>
        </a>
      </div>
      <a href="logOut.php" class="nav_link ali mt-4">
        <i class="fas fa-sign-out-alt nav_icon"></i>
        <span class="nav_name">SignOut</span>
      </a>
    </nav>
    <div class="notification-menu px-4 py-2" id="notification-menu">
      <div class="container px-2 py-1">
        <?php  $req .= " limit 3";
        if($num > 0){
          while($row = $res->fetch(PDO::FETCH_ASSOC)){ ?>
            <div class="row">
              <h1 class=" m-0"><i class="fa-solid fa-angles-right pe-2 "></i><?= $row['notif_name'] ?></h1>
            </div>
            <div class=" row">
               <p class=" mb-1 m-0 time"><?= $row['notif_date'] ?></h1></p>
                <p><?= $row['notif_message'] ?></h1></p>
          </div>
            <?php } 
          } else { ?>
           <h1 class=" text-center">Aucune notification. <br><i class="fa-solid fa-circle-exclamation" ></i></h1>
         <?php }?>
       
       
    </div>
  </div>
  </div>
    
  <script>
const notificationMenu = document.getElementById('notification-menu');
function toggleNotificationMenu() {
  notificationMenu.classList.toggle('active');
  <?php 
  $req2 = "update notification set active = 0 where id_membre=10";
  $res2 = $pdo -> query($req2);
  ?>
}

const toggleButton = document.getElementById('notif-toggel');
toggleButton.addEventListener('click', toggleNotificationMenu);
    
    document.addEventListener("DOMContentLoaded", function (event) {

      const showNavbar = (toggleId, navId, bodyId, headerId) => {
        const toggle = document.getElementById(toggleId),
          nav = document.getElementById(navId),
          bodypd = document.getElementById(bodyId),
          headerpd = document.getElementById(headerId)

        // Validate that all variables exist
        if (toggle && nav && bodypd && headerpd) {
          toggle.addEventListener('click', () => {
            // show navbar
            nav.classList.toggle('show')
            // change icon
            toggle.classList.toggle('bx-x')
            // add padding to body
            bodypd.classList.toggle('body-pd')
            // add padding to header
            headerpd.classList.toggle('body-pd')
          })
        }
      }

      showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

      /*===== LINK ACTIVE =====*/
      const linkColor = document.querySelectorAll('.nav_link')

      function colorLink() {
        if (linkColor) {
          linkColor.forEach(l => l.classList.remove('active'))
          this.classList.add('active')
        }
      }
      linkColor.forEach(l => l.addEventListener('click', colorLink))
    });

    //  let Menu = document.getElementById('Menu');
    //  function toggleMenu(){
    //   Menu.classList.toggle("open-menu");
    //  }
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