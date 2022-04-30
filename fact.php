<?php
    include 'dao.php';

    if(isset($_POST['login'])){
      $name=$_POST['name'];
      $pass=$_POST['pass'];
      $user=array("name"=>$name,"pass"=>$pass);
      if(login($user)){
        session_start();
        $_SESSION['n']=$name;
        //$_SESSION['e']=$email;
        header("location:welcome.php");
      }
      else{
        session_start();
        $_SESSION['msg']="user credential is wrong!!!";
        header("location:login.php");
      }
    }
  if(isset($_POST['submit'])){
      $name=$_POST['name'];
      $email=$_POST['email'];
      $pass=$_POST['pass'];
      //echo $name." ".$email;
        //$re=;
        $user=array("name"=>$name,"email"=>$email,"pass"=>$pass);
        if(addUser($user)){
          session_start();
          //$_SESSION['e']=$email;
          $_SESSION['n']=$name;
          header("location:welcome.php");
        }
        else{
          header("location:form1.php");
        }
   
  }
  $users=getUsers();

  if(isset($_POST['del'])){
    $id=$_POST['id'];
    if(deleteUser($id)){
      header("location:welcome.php");
    }
    else{
      header("location:form1.php");
    }
  }

  if(isset($_POST['edit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $id=$_POST['id'];

    $user=array('id'=>$id,'name'=>$name, 'email'=>$email);
    if(editUser($user)){
      header("location:welcome.php?id=$id");
    }
    else{
      header("location:edit_user.php?id=$id");
    }
  }
?>