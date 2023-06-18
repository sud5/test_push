<?php

session_start();
include 'connect.php';
$id = $_GET["ticketid"];
$sql = mysqli_query($conn, "SELECT * FROM reported_incidence where id=$id");
$row = mysqli_fetch_array($sql);
$userid = $row['userid'];
if($_SESSION["Id"] == $userid){
if(mysqli_query($conn, "DELETE FROM reported_incidence where id=$id")){
    echo "Incident Deleted successfuly";
}else{
   echo "There is some error while deleting this incident, Pleae try again later!!"; 
}
}else{
   echo "You don't have permission to update this ticket";  
}

?>
<div class="text-center"><br><a href="home.php">Go Back Home</a></div>