<?php
    $url='localhost';
    $username='root';
    $password='';
    $conn=mysqli_connect($url,$username,$password,"ramo1");
    if(!$conn){
        die('Could not Connect My Sql:' .mysql_error());
    }