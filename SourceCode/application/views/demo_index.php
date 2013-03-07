<html>
    <body> 
        <img width="300" src="<?php echo $source;?>">
        
        <?php 
        
        for($i=0;$i<count($result);$i++) 
        {
        ?>
        <img id="image" width="300" src="<?php echo $result[$i];?>">
        <?php 
        }        
        ?>
        
    </body>
</html>