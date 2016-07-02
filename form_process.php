<?php
  //establish connection to database
  $dbhost="localhost";
  $dbuser="root";
  $dbpass="";
  $dbname="deerthon2";
  $connection=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Couldn't connect");
  if(isset("submit")){
    $age=$_POST['age'];
    $sex=$_POST['sex'];
    $height=$_POST['height'];
    $weight=$_POST['weight'];
    $district=$_POST['district'];
    $muac=$_POST['muac'];
    $nutrition_status=0;
    $bmi=$weight/(($height/100)*($height/100));
    $insertquery1="INSERT INTO child_info (id, district, age, gender, weight, height, bmi, muac) values (null,'$district','$age','$gender','$weight','$height','$bmi','$muac')"
    $insertionrslt1=mysqli_query($connection,$insertquery1);
    if($bmi<16 || $muac<110){
      $nutrition_status=1;
    }
    elseif ($bmi<17 || $muac<125) {
      $nutrition_status=3;
    }
    elseif($bmi<18.5 || $muac<135){
      $nutrtion_status=2;
    }
    elseif($bmi<25 || $muac<135){
      $nutrition_status=4;
    }
    else{
      $nutrition_status=5;
    }
  }

?>
