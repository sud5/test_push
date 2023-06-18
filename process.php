<?php
session_start();
if(isset($_POST['save']))
{
    extract($_POST);
    include 'connect.php';
    $pass = md5($pass);
    $query = "SELECT * FROM ramo_users where email='$email' and password='$pass'";
    $sql=mysqli_query($conn,$query);
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        $_SESSION["Id"] = $row['id'];
        $_SESSION["Email"]=$row['email'];
        $_SESSION["First"]=$row['firstname'];
        $_SESSION["Last"]=$row['lastname']; 
        header("Location: home.php"); 
    }
    else
    {
        echo "Invalid Email ID/Password";
    }
}
?>