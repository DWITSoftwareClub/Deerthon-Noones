<?php

 //include database details
include('settings.php');

//connect to the database as specified in settings.php
$connection=new mysqli($mysql_host,$mysql_username,$mysql_password,$mysql_database);

//echo connection error if connection fails
if($connection->connect_error) {
    echo "Failed to connect to MySQL" . $connection->connect_error;
}
?>
