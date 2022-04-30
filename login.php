<!doctype html>
<html>
    <head>
        <title>web1</title>
    </head>
    <body>
        <form action="fact.php" method="post">
            <small>
            <?php
             session_start();
            if(!empty($_SESSION['msg'])){
                $msg=$_SESSION['msg'];
            ?>  
            <?=$msg?>  
            <?php 
            }
            ?>
            </small>
            <br>
            NAME:<input type="text" name="name">
            <br>
            <br>
            PASSWORD:<input type="password" name="pass">
            <br>
       
            <br><input type="submit" name="login" >
        </form>
        <a href="form1.php">REGISTER</a>
    </body>
</html>
<?php 
 session_destroy();
 ?>
