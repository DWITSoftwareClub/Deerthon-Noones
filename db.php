<?php
include('settings.php');
$connection=new mysqli($mysql_host,$mysql_username,$mysql_password,$mysql_database);
if($connection->connect_error) {
    echo "Failed to connect to MySQL" . $connection->connect_error;
}
?>
