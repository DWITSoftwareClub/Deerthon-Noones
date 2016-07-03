<?php
include('db.php');
    //if data is submitted from login form
    if(isset($_POST['submit'])){
      $email=$_POST['email'];
      //hash the password
      $password=hash('sha256',$_POST['password']);
      //verifythe input data
      $loginResult = $connection->query("SELECT * FROM user WHERE email='$email' && password='$password'");
      while($data=$loginResult->fetch_assoc()){
        $fname=$data['fname'];
        $uid=$data['id'];
      }
      //data is valid
      if($loginResult->num_rows!==0){
        session_start();
        $_SESSION['name']=$fname;
        $_SESSION['id']=$uid;
        session_write_close();
        //redirect to show all available data provided by user
        header('Location:mychild.php');
      }
      //data is invalid
      else{
        session_start();
        $_SESSION['message']="Invalid Username/Password!";
        //redirect to login
        header('Location:login.php');
        session_write_close();
      }
    }
 ?>
