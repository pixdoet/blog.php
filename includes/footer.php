<div class="footer">
    <div class="copyright">
        <?php 
            $currentYear = date("Y");
            if ($currentYear == 2021){
        ?>
        ©2021 <?php echo $fullName; ?>. All rights reserved
        <?php
            }else{
        ?>
        © 2021 - <?php echo $currentYear;?> <?php echo $fullName; ?>. All rights reserved.
        <?php } ?>
    </div>
</div>