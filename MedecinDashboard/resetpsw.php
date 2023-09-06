<?php
require('../connexion.php');
session_start();
if (isset($_POST['btnok'])) {
    $psw = $_POST['psw'];
    if ($psw == $_POST['psw2']) {
        $req = "UPDATE medecin SET password='$psw' WHERE id_medecin=".$_GET['id'] ;
        $res = $pdo->query($req);
        echo "<div class=\"message\"><i class=\"fa-solid fa-check\"></i><p>Mot de passe réinitialisé</p></div>";
        header('location:loginmedecin.php');
        exit;
    } else {
        echo "<div class=\"message\"><i class=\"fa-sharp fa-solid fa-triangle-exclamation\"></i><p>Les mots de passe ne correspondent pas.</p></div>";
    }
   
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation MP</title>
    <link rel="shortcut icon" href="../assets/img/icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/fonts/css/all.css">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/css/signup.css?s=<?php echo time(); ?>" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link rel="shortcut icon" href="../assets/img/iconRed.svg" type="image/x-icon">
</head>
<style>
    .signup-form h2::before, .signup-form h2::after {
        display: none;
        content: "";
        height: 2px;
        width: 30%;
        background: #d4d4d4;
        position: absolute;
        top: 50%;
        z-index: 2;
    }
</style>
<body>
    <section class="d-flex align-items-center justify-content-between" style="height: 95vh;">
        <div class="signup-form">
            <form action="" method="POST" class="">
                <div class="row">
                    <h2>Réinitialisation de mot de passe</h2>
                </div>
                <div class="form-group d-flex flex-column justify-content-between" style="height: 100px;">
                    <div class="d-flex align-items-center">
                        <i class="fa-sharp fa-solid fa-eye-slash pe-2" id="togglePassword"></i>
                        <input type="password" id="password" class="form-control" name="psw" placeholder="Nouveau mot de passe
                            required=" required >
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fa-sharp fa-solid fa-eye-slash pe-2" id="togglePassword2"></i>
                        <input type="password" id="password2" class="form-control" name="psw2" placeholder="Confirmation de mot de passe"
                            required="required">
                    </div>
                </div>

                <div class="form-group d-grid">
                    <button type="submit" class="btn  m-0" name="btnok">Réinitialiser</button>
                </div>

            </form>
        </div>
    </section>
    <div style="height: 5vh; font-size: 10px; text-align: center; color:var(--bg1-color);">Damy &copy; 2023
    </div>
    <script>
        const togglePassword2 = document.querySelector("#togglePassword2");
        const password2 = document.querySelector("#password2");

        togglePassword2.addEventListener("click", function () {
            // toggle the type attribute
            const type = password2.getAttribute("type") === "password" ? "text" : "password";
            password2.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("fa-eye");
        });
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("fa-eye");
        });
    </script>
</body>

</html>
