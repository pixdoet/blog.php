<?php
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Read</title>
        <link rel="stylesheet" href="assets/styles/style.css">
        <meta charset="utf-8">
        <meta property="og:title" content="Read - Ian's Blog"/>
        <meta property="og:description" content="Read stuff I write because of idk." />
    </head>
    <body class="date-30092021 site-misaligned-center site-allow-adverts site-not-active site-id-valid exp-kevlar-settings exp-invert-logo exp-hitchhiker-disabled not-nirvana-dogfood not-ian-hiew">
        <?php include("includes/header.php");?>
        <div class="titleHolder">
            <h1>Ian's Blog</h1>
        </div>
        <div class="contentHolder">
            <h3>The blog gets better when you put an ID!</h3>
            <p>You've reached the "noid" page, where you want to read a blog post but haven't put an ID. No worries!</p>
            <p>Put an id below and click Read. You can start reading there!</p>
            <form class="noidForm" method="get" action="read.php">
                <label for="inputId" class="inputIdLabel">Post ID: </label><br>
                <input type="text" class="inputId" name="id" id="id"><br>
                <input type="submit" class="submit" name="submit" value="Read"><br>
            </form>
        <?php include("includes/footer.php");?>
    </body>
</html>