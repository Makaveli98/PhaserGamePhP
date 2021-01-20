<?php


require_once 'db.php';

$user = $_POST["user"];
$email = $_POST["email"];

$s = "SElECT * FROM aanmelden WHERE name = '$user' or email = '$email'";
$result = mysqli_query($db, $s);

$num = mysqli_num_rows($result);
if ($num == 1) {
    echo "usename Alredy taken";
} else {
    $reg = "INSERT INTO aanmelden(name, email) values ('$user','$email') ";
    mysqli_query($db,$reg);
    header('location: ../Login.html');
}

$check = mysqli_query($db,"SElECT * FROM aanmelden WHERE name = '$user'") ;

if(mysqli_num_rows($check) > 0 ){
    $_SESSION["loggedin"] = $user;
    echo "welcom";
}else{
    echo "you do not registered yet";
}
?>