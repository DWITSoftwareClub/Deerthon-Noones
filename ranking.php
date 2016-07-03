<?php
  //page to rank the districts according to the malnutrition percentage
  include('db.php');
  include('menu.php');
?>
 <html>
  <head>
    <title>Nutrition Ranking</title>
  </head>
  <body>
    <div>
      <h2 class="text-primary text-center">Nutrition Ranking according to district</h2>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <div class="well">
          <table border="1">
            <tr>
              <th>SN</th>
              <th>District</th>
              <th>Malnutrition Percentage</th>
              <th>Severity</th>
            </tr>
            <?php
              $data=$connection->query("SELECT * FROM ranking INNER JOIN district ON ranking.district=district.id ORDER BY malnutrition_percent DESC");
              $count=1;
              while($nutritionData=$data->fetch_assoc()){
                  echo "<tr>";
                  echo "<td>$count</td>";
                  echo '<td><a href="chart.php?district='.$nutritionData['name'].'">'.$nutritionData['name'].'</a></td>';
                  echo "<td>$nutritionData[malnutrition_percent]</td>";
                  if($nutritionData['malnutrition_percent']>50){
                    $severity="High";
                  }
                  elseif($nutritionData['malnutrition_percent']>20 && $nutritionData['malnutrition_percent']<=50){
                    $severity="Medium";
                  }
                  else{
                    $severity="Low";
                  }
                  echo"<td>$severity</td>";
                  echo "</tr>";
                  $count++;
                }
              ?>
            </table>
        </div>
      </div>
    </div>
