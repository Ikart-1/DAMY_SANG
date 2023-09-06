<?php
session_start();
session_destroy();
header('Location:logincentre.php');
exit();
?>