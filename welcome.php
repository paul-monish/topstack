
<?php include 'fact.php';

session_start();
$n=$_SESSION['n'];

$f=getIMG();
// echo "<pre>";
// print_r($f);
// echo "</pre>";


//echo $n;
//if(empty($n)){
    //header("location:login.php");
//}
//else{
?>
<!doctype html>
<html>
    <head>
        <title>
            web1
        </title>
    </head>
    <body>
        welcome <?=$_SESSION['n']?>
        <?php foreach ($f as $i){?>
        <img src="upload/<?=$i['name']?>" height="200" width="200">
            <?php } ?>
        <br>
        <table border="1px">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>

            <?php foreach($users as $u){ ?>
            <tr>
                <td> <?php echo $u['id'];?> </td>
                <td> <?=$u['name']?> </td>
                <td> <?=$u['email']?> </td>
                <td>
                    <form action="fact.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $u['id'];?>">
                        <input type="submit" name="del" value="delete">
                    </form>
                    <a href="edit_user.php?id=<?php echo $u['id'];?>">Edit</a>
                </td>
            </tr>
            <?php } ?>

        </table>
    </body>
</html>
<?php 
//}
//session_destroy();
?>