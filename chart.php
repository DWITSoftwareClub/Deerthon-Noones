<html>
<?php
 include('menu.php');
 //accept district name via GET
 $district=$_GET['district'];
 include('db.php');
 $distId=$connection->query("SELECT id FROM district WHERE name='$district'");
 echo $connection->error;
 while($dist=$distId->fetch_assoc()){
   //district id corresponding to district name from database
  $districtId=$dist['id'];
}
?>
<meta charset="utf-8">
  <head>
    <!-- Google Visualization Library -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(
          //Pulling nutrition status data from database using PHP and passing to javascript
          <?php include('db.php');
            $data = $connection->query("SELECT severe_malnutrition,mild_malnutrition,moderate_malnutrition,well_nourished,district.name FROM nutrition_status INNER JOIN district ON nutrition_status.district=district.id WHERE district=$districtId");
            $dataItems=array();
            array_push($dataItems,array('Nutrition Status','No. of child'));
            while($nutrition=$data->fetch_assoc()){
              $district=$nutrition['name'];
              array_push($dataItems, array('Severe Malnutrition',(int)$nutrition['severe_malnutrition']),array('Mild Malnutrition',(int)$nutrition['mild_malnutrition']),array('Moderate Malnutrition',(int)$nutrition['moderate_malnutrition']),array('Well Nourished',(int)$nutrition['well_nourished']));
            }
            //Encode the data from array in JSON format
            echo json_encode($dataItems);
         ?>);
        var options = {
          title: 'Nutrition Status of <?php echo $district?>'
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
    <title>Nutrition Status of <?php echo $district?></title>
  </head>
  <body>
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-4">
        <div id="piechart" style="width: 900px; height: 500px;"></div>
      </div>
    </div>
  </body>
</html>
