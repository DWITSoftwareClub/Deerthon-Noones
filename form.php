<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form method="post" action="form_process.php">
  <p><strong>Child Details</strong></p>
  <p>
    <label for="District">Districts</label>
    <select name="district" id="District" required>

      <option value="" disabled>Choose District</option>
      <?php
        $dbhost="localhost";
        $dbuser="root";
        $dbpass="";
        $dbname="deerthon2";
        $connection=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Couldn't connect");
        $query="SELECT * from district";
        $result=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($result)){
          echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
        }
      ?>
    </select>
  </p>
  <p>
    <label for="choose sex" required>Child Sex</label>
    <select name="sex" id="sex">
      <option value="" disabled>Choose sex</option>
      <option value="M">M</option>
      <option value="F">F</option>
    </select>
  </p>
  <p>
    <label for="age" required>Child Age</label>
    <select name="age" id="age">
      <option value="" disabled>Choose an age</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
    </select>

  </p>
  <p>
    <label for="muac">Mid upper arm circumference</label>
    <input type="number" name="muac" id="muac">
  </p>
  <p>

    <label for="Height">Height
    <input type="text" name="height" id="Height" placeholder="In cm"/> cm</label>
  </p>
  <p>
    <label for="Weight">Weight
    <input type="text" name="weight" id="Weight" placeholder="In kg" /> kg </label>
  </p>


  <input type="submit" name="submit" value="ENTER DATA">
</form>
</body>
</html>
