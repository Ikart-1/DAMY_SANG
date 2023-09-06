<?php
session_start();
session_destroy();
header('Location:loginmedecin.php');
exit();
?>