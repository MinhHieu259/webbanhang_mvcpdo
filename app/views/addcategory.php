<form autocomplete="off" action="<?php echo BASE_URL;?>/category/insertcategory" method="post">
    <?php 
        if(isset($message['msg'])){
        ?>
            <span style="color: green;"><?php echo $message['msg'];?></span>
        <?php 
        }
        ?>
    <table>
    <tr>
        <td>Title</td>
        <td><input type="text" required="1" name="title" ></td>
    </tr>
    <tr>
        <td>Description</td>
        <td><input required="1" type="text" name="desc" ></td>
    </tr>
    <tr>
        <td><input type="submit" value="Insert  " name="addcategory"></td>
    </tr>
</table>
</form>
