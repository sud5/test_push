<?php

include("connect.php");
include("lib.php");
session_start();
$userid = $_SESSION['Id'];
$ticketid = $_GET ["ticketid"];
$details = $_POST ["details"];
$status = $_POST ["status-selection"];
$priority = $_POST ["priority-selection"];

$query = "UPDATE reported_incidence SET details = '$details', status = '$status', priority = '$priority' where id = '$ticketid'";
$sql = mysqli_query($conn, $query)or die("Could Not Perform the Update");
header("Location: home.php?status=success");
?>