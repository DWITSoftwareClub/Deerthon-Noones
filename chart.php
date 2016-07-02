<html>
  <head>
    <?php $district=$_GET['district'] ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php
          include('db.php');
            $data = $connection->query("SELECT * FROM nutrition_status WHERE district=$district");
            $dataItems=array();
            array_push($dataItems,array('District','Severe Malnutrition','Mild Malnutrition','Moderate Malnutrition','Well Nourished'));
            while($nutrition=$data->fetch_assoc()){
              array_push($dataItems, array($district['district'],$district['severe_malnutrition'],$district['mild_malnutrition'],$district['moderate_malnutrition'],['well_nourished']);
            }
          echo json_encode($dataItems);
         ?>);

        var options = {
          title: 'Malnutrition Status of $district';
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
