<?php
session_start();
session_destroy();
header('Location:loginmembre.php');
exit();
?>