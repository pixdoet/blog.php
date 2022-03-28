<?php
include("includes/config.inc.php");
$currentPage = "c";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Index - Ian's blog</title>
    <meta property="og:title" content="Index - Ian's Blog" />
    <meta property="og:description" content="Personal homepage of Ian Hiew" />

    <link rel="stylesheet" href="assets/styles/style.css">
</head>

<body class="indexBodyHolder">
    <?php include("includes/header.php"); ?>
    <div class="titleHolder">
        <h1>Ian's Blog</h1>
    </div>
    <div class="contentHolder">
        <p>Welcome! This is a blog thingy that I wrote for fun.</p>
        <p>Start reading <a href="read.php">now</a>!</p>
    </div>
    <?php include("includes/footer.php"); ?>
</body>

</html>