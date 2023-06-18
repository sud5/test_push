<?php

include("connect.php");
include("lib.php");
session_start();
$userid = $_SESSION['Id'];
$incidentid = get_incidentid();
$details = $_POST ["details"];
$status = $_POST ["status-selection"];
$priority = $_POST ["priority-selection"];
$timecreated = time();

$query = "INSERT INTO reported_incidence(incidentid, userid, details, status, priority, timecreated ) VALUES ('$incidentid', '$userid', '$details', '$status', '$priority', '$timecreated')";
$sql = mysqli_query($conn, $query)or die("Could Not Perform the Query");
header("Location: home.php?status=success");
?>