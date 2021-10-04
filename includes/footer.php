<div class="footer">
    <div class="copyright">
        <?php 
            $currentYear = date("Y");
            if ($currentYear == 2021){
        ?>
        ©2021 Ian Hiew. All rights reserved
        <?php
            }else{
        ?>
        © 2021 - <?php echo $currentYear;?> Ian Hiew. All rights reserved.
        <?php } ?>
    </div>
    <div class="more">
        <div class="homepage">
            <a href="/">Home</a>
        </div>
        <div class="rol">
            <a href="/rant">Rant Out Loud</a>
        </div>
        <div class="srdl">
            <a href="/srdl">SubRocks Downloader</a>
        </div>
        <div class="currentpage blog">
            <a href="/blog.php">Blog</a>
        </div>
    </div>
</div>