<?php
//processing for new user signup
include("db.php");
if(isset($_POST['submit'])){
  $email=$_POST['email'];
  $password=hash('sha256',$_POST['password']);
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  //inser new user's detail into database
  $insert=$connection->query("INSERT into user(email,password,fname,lname) VALUES('$email','$password','$fname','$lname')");
  if($insert){
    header('Location:index.php');
  }
  //if error occurs during database insertion
  else{
    echo "Unable to add user".$connection->error;
  }
}
?>
