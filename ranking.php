<?php include('db.php'); ?>
 <html>
  <head>
    <title>Nutrition Ranking</title>
  </head>
  <body>
    <h2>Nutrition Ranking according to district</h2>
    <table border="1">
      <tr>
        <th>SN</th>
        <th>District</th>
        <th>Malnutrition Percentage</th>
      </tr>
      <?php
        $data=$connection->query("SELECT * FROM ranking INNER JOIN district ON ranking.district=district.id");
        $count=1;
        while($nutritionData=$data->fetch_assoc()){
            echo "<tr>";
            echo "<td>$count</td>";
            echo '<td><a href="chart.php?district='.$nutritionData['district'].'">'.$nutritionData['name'].'</a></td>';
            echo "<td>$nutritionData[malnutrition_percent]</td>";
            echo "</tr>";
            $count++;
          }
?>
</table></div>
