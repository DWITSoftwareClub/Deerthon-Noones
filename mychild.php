<?php
//Page only visible to logged in users
session_start();
if (!isset($_SESSION['name'])){
  $_SESSION['message']="You have to login to view the requested page. Please Login";
  header('Location:login.php');
  session_write_close();
}
else{
  $uid=$_SESSION['id'];
  session_write_close();
  include('menu.php');
}?>
<html>
  <head>
    <!-- Google Visualization Library -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable(
        //Pulling child information of logged in user from database using PHP and passing to javascript
        <?php
          include('db.php');
          $data = $connection->query("SELECT uid,bmi,insert_date FROM child_info WHERE uid=$uid");
          $dataItems=array();
          array_push($dataItems,array('BMI Index','Date'));
          while($child=$data->fetch_assoc()){
            array_push($dataItems, array($child['insert_date'],(float)$child['bmi']));
          }
          //Encode the data from array in JSON format
          echo json_encode($dataItems);
       ?>);

      var view = new google.visualization.DataView(data);
      var options = {
        title: "<?php echo $_SESSION['name']."'s";?> Child | Nutrition History",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
  }
  </script>
  <title>Child | Nutrition History</title>
  </head>
  <body>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <div id="barchart_values" style="width: 900px; height: 300px;"></div>
      </div>
    </div>
  </body>
</html>
