<?php
include("config.inc.php");
//get latest blog post :him:
$getnewid = "SELECT MAX(id) as 'maxid' FROM blogposts";
$result = $conn->query($getnewid);

if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
                $large = $row["maxid"];
        }
}
?>

<div class="header">
    <div class="leftBar">
    <?php echo $name; ?>'s Blog | Latest post: <?php echo $large; ?>
    </div>
    <div class="rightBar">
        Today is: <?php echo date("d/m/Y");?>
    </div>
</div>