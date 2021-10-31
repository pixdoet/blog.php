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
        // get latest id :husk:
        $getnewid = "SELECT MAX(id) as 'maxid' FROM blogposts";
        $result = $conn->query($getnewid);

        if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $large = $row["maxid"];
            }
        }
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
                        header("Location: read.php?id=" . $large++); // not the most elegant solution but works for now
                    }
                    else
                    {
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
        //delete blog entry
        elseif (isset($_POST['deleteBlogEntry']))
        {
            if (isset($_POST['deleteBlogEntryInput']))
            {
                $deleteId = $_POST['deleteBlogEntryInput'];

                //process the removal of life
                $delete = $conn->prepare("DELETE FROM `blogposts` WHERE ID = ?");
                $delete->bind_param("i",$deleteId);
                $delete->execute();

                if($delete)
                {
                    $err = "Blog post has been deleted!";
                }
                else
                {
                    $err = "SQL Query failed when deleting blog post";
                }
            }
            else
            {
                $err = "No blog id was provided!";
            }
        }
        
?>
    
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Manage - <?php echo $name; ?>'s Blog</title>
        <meta property="og:title" content=" - <?php echo $name; ?>'s Blog"/>
        <meta property="og:description" content="Personal homepage of <?php echo $fullName; ?>"/>
        <meta property="og:url" content="https://cleantalk.cf/blog.php/manage.php">
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
                <form method="post" action="manage.php">
                    <label for="deleteBlogEntryLabel" class="label deleteBlogEntryLabel">Delete blog id: </label><br>
                    <input type="text" name="deleteBlogEntryInput" class="input deleteBlogEntryInput"><br>
                    <input type="submit" name="deleteBlogEntry" value="Delete!">
                </form>
                <div class="responseMessageHolder"><?php echo $err;?></div>
            </div>
        </div>
        <?php include("includes/footer.php");?>
    </body>
</html>

<?php
}
    else
    {
        header("Location: index.php");
    }
}
else
{
    header("Location: index.php");
}
?>
