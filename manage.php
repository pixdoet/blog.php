<?php
/* 
    TODO: Make all of these become functions that you can
    include indo with a simple file.

    Also redo styling
    8/10/2021 ddmmyyyy
*/

//manage.php for managing blog posts and etc
include("includes/config.inc.php");
session_start();
$err = "";

if(isset($_SESSION['username']) && isset($_SESSION['loggedin']))
{
    if($_SESSION['loggedin'] == true){
        // Post new blog
        if(isset($_POST['newBlogSubmit']))
        {
            if(isset($_POST['blogTitleInput']))
            {
                if(isset($_POST['blogInput']))
                {
                    //vars
                    $blogTitle = $_POST['blogTitleInput'];
                    $blogContent = $_POST['blogInput'];

                    $blogInsert = $conn->prepare("INSERT INTO `blogposts`(title,content) VALUES (?,?)");
                    $blogInsert->bind_param("ss",$blogTitle,$blogContent);
                    $blogInsert->execute();
                    if($blogInsert)
                    {
                        $err = "Blog post successfully posted!";
                    }
                    else{
                        $err = "SQL query failed for some reason";
                    }
                }
                else
                {
                    $err = "No content was entered!";
                }
            }
            else
            {
                $err = "No blog title was specified!";
            }
        }
?>
    
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Manage - Ian's Blog</title>
        <meta property="og:title" content=" - Ian's Blog"/>
        <meta property="og:description" content="Personal homepage of Ian Hiew"/>
        <link rel="stylesheet" href="assets/styles/style.css">
    </head>
    <body class="indexBodyHolder">
        <?php include("includes/header.php");?>
        <!-- put your html/code here -->
        <div class="titleHolder">
            <h1>Manage blog posts</h1>
            <div class="manageAction newBlogPost">
                <h3>New blog post</h3>
                <form method="post" action="manage.php">
                    <label for="blogTitleInput" class="label blogTitleInputLabel">Title: </label><br>
                    <input type="text" name="blogTitleInput" class="input blogTitleInput"></br>
                    <label for="blogInput" class="label blogInputLabel">Enter blog content: </label><br>
                    <textarea class="textarea blogInput" name="blogInput" id="blogInput"></textarea><br>
                    <input type="submit" name="newBlogSubmit" value="Post!">
                </form>
                <div class="responseMessageHolder"><?php echo $err;?></div>
            </div>
        </div>
        <?php include("includes/footer.php");?>
    </body>
</html>

<?php
}
    else{
        header("Location: index.php");
    }
}
else{
    header("Location: index.php");
}
?>