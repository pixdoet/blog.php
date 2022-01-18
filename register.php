<?php
include("includes/config.inc.php");
$username = "ian";
$password = "huskemoji1";
$hashed = password_hash($password,PASSWORD_DEFAULT);
$signup = $conn->prepare("INSERT INTO `user` (username,password) VALUES (?,?)");
$signup->bind_param("ss",$username,$hashed);
$signup->execute();
if($signup){
    echo "Success";
}   
?>