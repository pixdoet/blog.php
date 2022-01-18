<?php
//login.php
//normally we dont do this in public but apparently this is what we're gonna do
session_start();
$err = "";

include ("includes/config.inc.php"); //need this for master password :husk:
if(isset($_POST['submit']) && isset($_POST['password']) && isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    //$master_hash = password_hash($master,PASSWORD_DEFAULT);
    
    $checkPassword = $conn->prepare("SELECT * FROM user WHERE username = ?");
    $checkPassword->bind_param("s",$username);
    $checkPassword->execute();

    $checkPasswordResult = $checkPassword->get_result();
    if($checkPasswordResult->num_rows > 0){
        $checkRow = $checkPasswordResult->fetch_assoc();
        $sql_password = $checkRow['password'];
        if(password_verify($password,$sql_password)){
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("Location: manage.php");
        }
        else{
            $err = "Wrong username or password!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Login - Ian's Blog</title>
        <meta property="og:title" content=" - Ian's Blog"/>
        <meta property="og:description" content="Personal homepage of Ian Hiew"/>
        
        <link rel="stylesheet" href="assets/styles/style.css">
    </head>
    <body class="date-04102021 site-misaligned-center site-allow-adverts site-not-active site-id-valid exp-kevlar-settings exp-invert-logo exp-hitchhiker-disabled not-nirvana-dogfood not-ian-hiew">
        <?php include("includes/header.php");?>
        <!-- put your html/code here -->
        <div class="titleHolder">
            <h3 class="title">Sign in to the blog system</h3>
        </div>
        <div class="contentHolder">
            <form class="loginForm" method="post" action="login.php">
                <label class="usernameLabel" name="usernameLabel" id="usernameLabel">Username: </label><br>
                <input type="text" name="username" class="username" id="username"><br>
                <label class="passwordLabel" name="usernameLabel" id="passwordLabel">Password: </label><br>
                <input type="password" name="password" class="password" id="password"><br>
                <input type="submit" name="submit" class="submit" value="Login"><br>
                <?php echo $err;?>
            </form>
        </div>
        <?php include("includes/footer.php");?>
    </body>
</html>