<form autocomplete="off" action="<?php echo BASE_URL;?>/login/authentication_login" method="post">
    <?php 
        if(isset($message['msg'])){
        ?>
            <span style="color: green;"><?php echo $message['msg'];?></span>
        <?php 
        }
        ?>
    <table>
    <tr>
        <td>Username</td>
        <td><input type="text" required="1" name="username" ></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><input required="1" type="password" name="password" ></td>
    </tr>
    <tr>
        <td><input type="submit" value="Login" name="login"></td>
    </tr>
</table>
</form>
