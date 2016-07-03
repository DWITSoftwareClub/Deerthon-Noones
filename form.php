<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Form</title>
<?php include('menu.php'); ?>
</head>

<body>
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <div class="well">
        <form method="post" action="form_process.php">
          <h4 class="text-primary text-center">Child Details</h4>
          <div>
            <label for="District">Districts</label>
            <select name="district" id="District" required>
              <option value="" selected="true" disabled="disabled" >Choose District</option>
              <!-- imports the districts from database-->
              <?php
                include('db.php');
                $result=$connection->query("SELECT * from district");
                while($row=$result->fetch_assoc()){
                  echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                }
              ?>
            </select>
          </div>
          <div>
            <label for="choose sex" required>Child Sex</label>
            <select name="sex" id="sex">
              <option value="" selected="true" disabled="disabled" >Choose sex</option>
              <option value="M">M</option>
              <option value="F">F</option>
            </select>
          </div>
          <div>
            <label for="age" required>Child Age</label>
            <select name="age" id="age">
              <option value="" selected="true" disabled="disabled" >Choose an age</option>
              <option value="1">1</option>
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
          </div>
          <div>
            <!--muac is only used for child for age 5 and below-->
            <label for="muac" id="muacl" style="display:none">Mid upper arm circumference</label>
            <input type="number" name="muac" id="muac" placeholder="In mm" style="display:none">
          </div>
          <div>
            <label for="Height">Height</label>
            <input type="text" name="height" id="Height" placeholder="In cm"/>
          </div>
          <div>
            <label for="Weight">Weight</label>
            <input type="text" name="weight" id="Weight" placeholder="In kg" />
          </div>
          <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary">
            <span><i class="fa fa-user-md"></i> Submit</span>
          </div>
        </form>
      </div>
    </div>
</body>
</html>
<script>
//toggles the display muac when dropdownlist(ddl) is changed
var ddl = document.getElementById("age");
ddl.onchange=newAge;
function newAge()
{
    var selectedValue = ddl.options[ddl.selectedIndex].value;

    //display muac if age selected is 5 or less
    if (selectedValue <=5)
    {   document.getElementById("muac").style.display = "";
        document.getElementById("muacl").style.display = "";
    }
    //otherwise do not display
    else
    {
       document.getElementById("muac").style.display = "none";
       document.getElementById("muacl").style.display = "none";
    }
}
</script>
