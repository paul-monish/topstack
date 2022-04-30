<?php 
include 'dao.php';
$id=$_GET['id'];
echo $id;
$u=getUser($id);
// echo "<pre>";
//  print_r($u);
// echo "</pre>";
?>

<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <form action="fact.php" method="post">
            <input type="text" name="name" value="<?=$u['name']?>">
            <input type="email" name="email" value="<?=$u['email']?>">
            <input type="hidden" name="id" value="<?=$u['id']?>">
            <input type="submit" name="edit" value="Update">
        </form>
    </body>
</html>