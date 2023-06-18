<?php
session_start();
unset($_SESSION["Id"]);
unset($_SESSION["Email"]);
unset($_SESSION["First"]);
unset($_SESSION["Last"]);
header("Location:index.php");
?>