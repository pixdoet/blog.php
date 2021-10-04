<?php
//browse.php for infinite scrolling :trolL:
?>
<?php
                // LOOK IAN IM DOING IT!!! - nycrite
                $conn = new mysqli("localhost","root","","testrants");
 
                if (isset($_GET['page'])) {
                    $pageno = $_GET['page'];
                } else {
                    $pageno = 1;
                }
                $no_of_records_per_page = 6;
                $offset = ($pageno-1) * $no_of_records_per_page;

                $conn=mysqli_connect("localhost","root","","affc");
                // Check connection
                if (mysqli_connect_errno()){
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    die();
                }

                $total_pages_sql = "SELECT COUNT(*) FROM testrants";
                $result = mysqli_query($conn,$total_pages_sql);
                $total_rows = mysqli_fetch_array($result)[0];
                $total_pages = ceil($total_rows / $no_of_records_per_page);

                // did the statements for ya -ian
                $sql = $conn->prepare("SELECT * FROM testrants ORDER BY id DESC LIMIT ?,?");
                $sql->bind_param("ii",$offset,$no_of_records_per_page); //ii means integers -ian
                $sql->execute();
                
                $res_data = $sql->get_result();
                while($row = $res_data->fetch_assoc()){
                    // do your output code here -ian
                    // tHIS IS NOT SEX............................... yet - nycrite
                    ?>
                     
               <?php }?>