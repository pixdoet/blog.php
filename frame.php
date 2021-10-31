<?php
//frame.php for copying the html frame(or format if you will)
include("includes/config.inc.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> - <?php echo $name; ?>'s Blog</title>
        <meta property="og:title" content=" - <?php echo $name; ?>'s Blog"/>
        <meta property="og:description" content="Personal homepage of <?php echo $fullName; ?>"/>
        
        <link rel="stylesheet" href="assets/styles/style.css">
    </head>
    <body class="indexBodyHolder">
        <?php include("includes/header.php");?>
        <!-- put your html/code here -->
        <?php include("includes/footer.php");?>
    </body>
</html>