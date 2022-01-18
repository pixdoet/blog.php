<?php
//browse.php for infinite scrolling :trolL:
include("includes/config.inc.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> - Ian's Blog</title>
        <meta property="og:title" content="Browse - Ian's Blog"/>
        <meta property="og:description" content="Personal homepage of Ian Hiew"/>
        <meta property="og:url" content="https://cleantalk.cf/blog.php/manage.php">
        
        <link rel="stylesheet" href="assets/styles/style.css">
    </head>
    <body class="indexBodyHolder">
        <div class="titleHolder">
            <h1>Browse blog posts</h1>
        </div>
        <div class="contentHolder">
            <?php include("includes/header.php");?>
            <!-- put your html/code here -->
            <?php
                // LOOK IAN IM DOING IT!!! - nycrite
                //$conn = new mysqli("localhost","root","","blogposts");
    
                if (isset($_GET['page']))
                {
                    $pageno = $_GET['page'];
                }
                else
                {
                    $pageno = 1;
                }
                $no_of_records_per_page = 6;
                $offset = ($pageno-1) * $no_of_records_per_page;

                // same thing, in prepared statement style
                $pgs_sql = $conn->prepare("SELECT COUNT(*) FROM blogposts AS id");
                $pgs_sql->execute();
                $pgs_res = $pgs_sql->get_result();
                $pgs_arr = $pgs_res->fetch_assoc();
                $pgs_id = $pgs_arr['id'];

                /*
                $total_pages_sql = "SELECT COUNT(*) FROM testrants";
                $result = mysqli_query($conn,$total_pages_sql);
                $total_rows = mysqli_fetch_array($result)[0];
                */
                
                $total_pages = ceil($pgs_id / $no_of_records_per_page);
                // did the statements for ya -ian
                $sql = $conn->prepare("SELECT * FROM testrants ORDER BY id DESC LIMIT ?,?");
                $sql->bind_param("ii",$offset,$no_of_records_per_page); //ii means integers -ian
                $sql->execute();
                
                $res_data = $sql->get_result();
                while($row = $res_data->fetch_assoc()){
                    // do your output code here -ian
                    // tHIS IS NOT SEX............................... yet - nycrite
                    $title = $row['title'];
                    $content = $row['content'];
                    ?>
                    <div class="scrollHolder">
                        <h3 class="h3Title"><?php echo $title;?></h3>
                        <p class="pContent"><?php echo $content;?></p>
                    </div>
            <?php }?>
        <?php include("includes/footer.php");?>
    </body>
</html>
