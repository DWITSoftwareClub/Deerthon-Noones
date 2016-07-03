<?php
//Shows nutrition details of children as soon as the data is inserted via form
  include('menu.php');
  include('db.php');
  $height=0;
  $weight=0;
  $nutrition_status=0;
  $age=0;
  $bmi=0;
  $muac=0;
  //set the variables as passed from form_process
  $district=$_GET['district'];
  $height=$_GET['height'];
  $weight=$_GET['weight'];
  $nutrition_status=$_GET['nutrition'];
  $age=$_GET['age'];
  $bmi=$_GET['bmi'];
  $muac=$_GET['muac'];
  $district=$_GET['district'];
  //redirect to form if data is missing
  if($height==0 || $weight==0 || $nutrition_status==0||$age==0||$bmi==0){
    header('Location:form.php');
  }
 ?>
 <html>
  <head>
  <title>Nutritional Details of Your Child</title>
  </head>
  <body>
    <div class="text-center">
      <h2>Child's nutritional details<h2>
    <h3>BMI:<?php echo $bmi;?></h3>
    <?php if($age<=5){
        echo"<h3>MUAC:$muac</h3>";
      }
      ?>
      <?php
          //fetch the nutrition_status name from database via the nutrition_status index
          $selectResult=$connection->query("SELECT * from child_nutrition where id=$nutrition_status") or die($connection->error);
          $row=$selectResult->fetch_assoc();
          echo"<h3>Nutrition Status:".$row['nutrition_status']."</h3>";
        ?>
  </div>
  </body>
 </html>
