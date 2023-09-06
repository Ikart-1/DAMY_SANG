<?php
session_start();
session_destroy();
header('Location:loginadmin.php');
exit();
?>