<?php
  //establish connection to database
  include('db.php');
  // verify when data is passed by submit form
  if(isset($_POST["submit"])){
    $age=$_POST['age'];
    $sex=$_POST['sex'];
    $height=$_POST['height'];
    $weight=$_POST['weight'];
    $district=$_POST['district'];
    $nutrition_status=0;

    //calculate body mass index
    $bmi=$weight/(($height/100)*($height/100));

    //these two values are used only if the user is logged in
    $date_today=null;
    $uid=null;

    //start session and check if the user is logged in
    session_start();
    if(isset($_SESSION['name'])){
      $date_today= date("Y-m-d");
      $uid=$_SESSION['id'];
      session_write_close();
    }

    //mid upper arm circumference is used to determine nourishment in child below
    //5 years
    if($age>5){
      $muac=null;
    }
    else{
      $muac=$_POST['muac'];
    }

    //calculate and set the nutrition status of child per the bmi or muac
    if($bmi<16 || $muac<110){
      $nutrition_status=1;
    }
    elseif ($bmi<17 || $muac<125) {
      $nutrition_status=3;
    }
    elseif($bmi<18.5 || $muac<135){
      $nutrition_status=2;
    }
    elseif($bmi<25 || $muac<300){
      $nutrition_status=4;
    }
    else{
      $nutrition_status=5;
    }

    //enter the above data into child_info database table
    $connection->query("INSERT INTO child_info (id, district, age, sex, weight, height, bmi, muac,nutrition_status,uid,insert_date) values (null,'$district','$age','$sex','$weight','$height','$bmi','$muac','$nutrition_status','$uid','$date_today')") or die($connection->error);

    //for updating the nutrition_status of a district we need to verify if there is any data on the district already present
    $district_present=0;
    $districtResult = $connection->query("SELECT * FROM nutrition_status WHERE district=$district");

    if($districtResult->num_rows!==0){
      // this district is present in the table
      $district_present=1;
    }
    if ($nutrition_status==1){
      if($district_present==0){
        //for district not present in the table
        //we insert new data
        $selectResult=$connection->query("INSERT INTO nutrition_status(id, district,severe_malnutrition,mild_malnutrition,moderate_malnutrition,well_nourished,over_weight) values (null,'$district','1','0','0','0','0')") or die($connection->error);
      }
      else{
        //if district is present in the table we only update the values
        $connection->query("UPDATE nutrition_status set severe_malnutrition=severe_malnutrition+1 WHERE district=$district") or die($connection->error);
      }
    }
    //same process is reapeted for all possible nutrition status
    elseif ($nutrition_status==2){
      if($district_present==0){
        $connection->query("INSERT INTO nutrition_status(id, district,severe_malnutrition,mild_malnutrition,moderate_malnutrition,well_nourished,over_weight) values (null,'$district','0','1','0','0','0')") or die($connection->error);
      }
      else{
        $connection->query("UPDATE nutrition_status set mild_malnutrition=mild_malnutrition+1 WHERE district=$district") or die($connection->error);
      }
    }
    elseif ($nutrition_status==3){
      if($district_present==0){
        $connection->query("INSERT INTO nutrition_status(id, district,severe_malnutrition,mild_malnutrition,moderate_malnutrition,well_nourished,over_weight) values (null,'$district','0','0','1','0','0')") or die($connection->error);
      }
      else{
        $connection->query("UPDATE nutrition_status set moderate_malnutrition=moderate_malnutrition+1 WHERE district=$district") or die($connection->error);
      }
    }
    elseif ($nutrition_status==4){
      if($district_present==0){
        $connection->query("INSERT INTO nutrition_status(id, district,severe_malnutrition,mild_malnutrition,moderate_malnutrition,well_nourished,over_weight) values (null,'$district','0','0','0','1','0')") or die($connection->error);
      }
      else{
        $connection->query("UPDATE nutrition_status set well_nourished=well_nourished+1 WHERE district=$district") or die($connection->error);
      }
    }
    else{
      if($district_present==0){
        $connection->query("INSERT INTO nutrition_status(id, district,severe_malnutrition,mild_malnutrition,moderate_malnutrition,well_nourished,over_weight) values (null,'$district','0','0','0','0','1')") or die($connection->error);
      }
      else{
        $conection->query("UPDATE nutrition_status set over_weight=over_weight+1 WHERE district=$district") or die($connection->error);
      }
    }

    //to update ranking table we see if the district is already in the table
$district_present=0;
$districtResult = $connection->query("SELECT * FROM ranking WHERE district=$district");
if($districtResult->num_rows!==0){
  //district present
  $district_present=1;
}
  //select nutrition data of the district and calculate malnutrition percentage
  $selectResult=$connection->query("SELECT * from nutrition_status where district=$district") or die($connection->error);
  $row=$selectResult->fetch_assoc();
  //number of malnutritioned child in the district
  $malnutritioned=$row['severe_malnutrition']+$row['mild_malnutrition']+$row['moderate_malnutrition'];
  //total no of childs in our data of the district
  $total=$row['severe_malnutrition']+$row['mild_malnutrition']+$row['moderate_malnutrition']+$row['well_nourished']+$row['over_weight'];
  $malnutrition_perc=0;

  //if there is no malnutritioned child malnutrition percentage is 0
  if($malnutritioned>0){
    $malnutrition_perc=($malnutritioned/$total)*100;
  }
  if($district_present==0){
    //if the district was not present in the table new data is inserted
    $connection->query("INSERT INTO ranking (id,district,malnutrition_percent) values(null,'$district','$malnutrition_perc')") or die($connection->error);
  }
  else{
    //if the district was present only the row is updated
    $connection->query("UPDATE ranking set malnutrition_percent=$malnutrition_perc where district=$district") or die($connection->error);
  }
  //redirect to the output file to provide output to the user
  header("Location: output.php?age=$age&bmi=$bmi&muac=$muac&district=$district&weight=$weight&height=$height&nutrition=$nutrition_status");;
}
?>
