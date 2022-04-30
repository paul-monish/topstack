<?php
include 'db.php' ;

function login($user){
    $con=$GLOBALS['con'];
    $n=$user['name'];
    $p=$user['pass'];
    $e_p=md5($p);
    $sql="select name,password from users where name=? and password=?";
    $st=$con->prepare($sql);
    $st->bind_param("ss",$n,$e_p);
    if($st->execute()){
        $res=$st->get_result();
        if($res->num_rows>0){
            return true;
        }
    }
    else{
        echo $con->error;
    }
}

function addUser($user){
    $n=$user['name'];
    $e=$user['email'];
    $p=$user['pass'];
    $e_p=md5($p);
    $con=$GLOBALS['con'];
    $sql="insert into users values (null,?,?,?)";
    $st=$con->prepare($sql);
    $st->bind_param("sss",$n, $e, $e_p);
      if($st->execute()){
         //header("location:welcome.php?n=$name");
         return true;
      }
      else{
          return false;
          //echo  $con->error;
      }
}


function getUsers(){
    $con=$GLOBALS['con'];
    $sql="select * from users";
    $result=$con->query($sql);
    $users=array();
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $users[]=$row;
        }
    }
//    echo "<pre>";
//    print_r($users);
//    echo "</pre>";
    return  $users;
}

function getUser($id){
    $con=$GLOBALS['con'];
    $sql="select * from users where id=?";
    $st=$con->prepare($sql);
    $st->bind_param("i",$id);
    if($st->execute()){
        $result=$st->get_result();
        if($result->num_rows > 0){
            if($row=$result->fetch_assoc()){
                // echo "<pre>";
                // print_r($row);
                // echo "</pre>";
                return $row;
            }
        }
    }
    else{
        echo $con->error;
    }

}

function deleteUser($id){

    $con=$GLOBALS['con'];
    $sql="delete from users where id=?";
   $st=$con->prepare($sql);
   $st->bind_param("i",$id);
   if($st->execute()){
       return true;
   }
   else{
       echo $con->error;
   }
}

function editUser($user){
    $con=$GLOBALS['con'];
    $name=$user['name'];
    $email=$user['email'];
    $id=$user['id'];

    $sql="update users set name=?,email=? where id=?";

    $st=$con->prepare($sql);
    $st->bind_param("ssi",$name,$email,$id);
    if($st->execute()){
        return true;
    }
    else{
        echo $con->error;
    }
}

?>