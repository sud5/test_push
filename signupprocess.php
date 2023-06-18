<?php
include("connect.php");
include("lib.php");
extract($_POST);
if ($pass != $cpass) {
    echo "Password and confirm password didnn't match";
    exit;
}
$countryArray = countryArray();
$isd_code = $countryArray[$isd]['code'];
$country_name = $countryArray[$country]['name'];
$pass = md5($pass);

$sql = mysqli_query($conn, "SELECT * FROM ramo_users where Email='$email'");
if (mysqli_num_rows($sql) > 0) {
    echo "Email Id Already Exists";
    exit;
} else {
    $query = "INSERT INTO ramo_users(firstname, lastname, email, password, pincode, isd, mobile, fax, phone, state, country, city) VALUES ('$first_name', '$last_name', '$email', '$pass', '$pincode', '$isd_code', '$mobile', '$fax', '$phone', '$state', '$country_name', '$city')";
    $sql = mysqli_query($conn, $query)or die("Could Not Perform the Query");
    header("Location: index.php?status=success");
}

?>