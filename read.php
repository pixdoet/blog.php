<?php
include("includes/config.inc.php");
//read.php for reading stuff
if(isset($_GET['id'])){
    $id = $_GET['id'];
    //retrieve blog data
    $get_blog_data = $conn->prepare("SELECT * FROM blogposts WHERE id = ?");
    $get_blog_data->bind_param("i",$id);
    $get_blog_data->execute();
    $get_blog_result = $get_blog_data->get_result();
    
    if($get_blog_result->num_rows > 0){
        $get_blog_assoc = $get_blog_result->fetch_assoc();
        $title = $get_blog_assoc['title'];
        $content = $get_blog_assoc['content'];
        $date = $get_blog_assoc['date'];
        $getId = $get_blog_assoc['id'];
        
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta property="og:title" content="<?php echo $title;?> - Ian's Blog"/>
        <meta property="og:description" content="Read stuff I write because of idk." />
        <title><?php echo $title;?> - Ian's Blog</title>
        <link rel="stylesheet" href="assets/styles/style.css">
    </head>
    <body class="date-30092021 site-misaligned-center site-allow-adverts site-not-active site-id-valid exp-kevlar-settings exp-invert-logo exp-hitchhiker-disabled not-nirvana-dogfood not-ian-hiew">
    <?php include("includes/header.php");?>    
    <div class="titleHolder">    
            <h1><?php echo $title;?></h1>
        </div>
        <div class="contentHolder">
            <div class="dateTimeHolder">
                <p class="dateTime">Posted on <?php echo $date; ?></p>
            </div>
            <div class="contentHolder2">
                <?php echo $content; ?>
            </div>
        </div>
        <?php include ("includes/footer.php");?>
    </body>
</html>
<?php
    //exit line 11
    }else{
        include("includes/noid.php");
    }
}else{
    include("includes/noid.php");
}
?>