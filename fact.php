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

  // if(isset($_POST['submit'])){
  //     $name=$_POST['name'];
  //     $email=$_POST['email'];
  //     $pass=$_POST['pass'];
  //     //echo $name." ".$email;
  //       //$re=;
  //       $user=array("name"=>$name,"email"=>$email,"pass"=>$pass);
  //       if(addUser($user)){
  //         session_start();
  //         //$_SESSION['e']=$email;
  //         $_SESSION['n']=$name;
  //         header("location:welcome.php");
  //       }
  //       else{
  //         header("location:form1.php");
  //       }
   
  // }

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
  

  if(isset($_POST['submit']) && $_FILES['profile']){
    // echo "<pre>";
    // print_r($_FILES['profile']);
    // echo "</pre>";
    $file=$_FILES['profile'];
    $name=$file['name'];
    $type=$file['type'];
    $size=$file['size'];
    $error=$file['error'];
    $tmp_name=$file['tmp_name'];
    
    if($error == 0){
      if($size<1250000){
        $ext=pathinfo($name,PATHINFO_EXTENSION);
        $ext_l=strtolower($ext);
        $n_name=uniqid("IMG-",true).".".$ext_l;
        $path='upload/'.$n_name;
       if(uploadFile($n_name)){
         if(move_uploaded_file($tmp_name,$path)){
         
                  header("location:welcome.php");
         }
       }
       else{
         echo "false";
       }
      }
      else{
        echo "it exist maximum file size";
      }
    }
    else{
      echo "something went wrong!!";
    }
  }

  function getIMG(){
    $i=getFiles();
    return $i;
  }

?>