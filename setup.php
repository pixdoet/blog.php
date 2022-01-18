<?php
include("includes/config.inc.php");

$username = "";
$password = "";

$password_hash($password,PASSWORD_DEFAULT);
$register = $conn->prepare("INSERT INTO `users`(username,password) VALUES (?,?)");
$register->bind_param("ss",$username,$password_hash);
$register->execute();
?>