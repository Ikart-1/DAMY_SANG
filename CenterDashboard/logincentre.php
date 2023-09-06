<?php
require('../connexion.php');
session_start();

if (isset($_POST['btnok'])) {
    $login = $_POST['username'];
    $password = $_POST['psw'];



    // Vérification si l'utilisateur est un médecin
    $req = "SELECT * FROM centre WHERE login = '$login' AND password = '$password'";
    $res = $pdo->query($req);
    $count = $res->rowCount();

    if ($count > 0) {
        // L'utilisateur est un médecin
        $row = $res->fetch(PDO::FETCH_ASSOC);
        $_SESSION['id'] = $row['id_centre'];
        header('location:index.php');
        exit();
    }

    // // Si aucun compte correspondant n'est trouvé
    echo "<div class=\"message\"><i class=\"fa-sharp fa-solid fa-triangle-exclamation\"></i><p>Nom d'utilisateur ou Mot de passe invalide.</p></div>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <link rel="shortcut icon" href="../assets/img/icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/fonts/css/all.css">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/css/signup.css?s=<?php echo date(time()) ?>" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link rel="shortcut icon" href="assets/img/iconRed.svg" type="image/x-icon">
</head>

<body>
    <section class="d-flex align-items-center justify-content-between" style="height: 95vh;">
        <div class="signup-form">
            <form action="" method="POST" class="">
                <div class="row icon-user">
                    <i class="bi bi-hospital-fill"></i>
                </div>
                <div class="row">
                    <h2>Se connecter</h2>
                </div>
                <div class="form-group d-flex flex-column justify-content-between" style="height: 100px;">
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-envelope pe-2"></i>
                        <input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur"
                            required="required">
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fa-sharp fa-solid fa-eye-slash pe-2" id="togglePassword"></i>
                        <input type="password" id="password" class="form-control" name="psw" placeholder="Mot de passe"
                            required="required">
                    </div>
                </div>

                <div class="form-group d-grid">
                    <button type="submit" class="btn  m-0" name="btnok">Se connecter</button>
                </div>
                <div class="text-center mb-2"><a href="forgotpsw.php">J'ai oublié mon mot de passe ?</a></div>
            </form>


        </div>
    </section>
    <div style="height: 5vh; font-size: 10px; text-align: center; color:var(--bg1-color);">Damy &copy
        Copyrights 2023</div>
    <script>
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