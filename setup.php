<html>
<!--Setup for the Nutrition Information Aggregator. Anyone would be able to Setup
the system on one's server by executing this script -->
<head>
  <title>Setup | Nutrition Information Aggregator</title>
</head>
<?php

// Name of the file
$filename = 'nutrition.sql';
include('settings.php');
// Connect to MySQL server
$link=mysqli_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server:' . mysqli_error($link));
// Select database
$createDbQuery="CREATE DATABASE IF NOT EXISTS $mysql_database";
mysqli_query($link,$createDbQuery);
$link=mysqli_connect($mysql_host, $mysql_username, $mysql_password,$mysql_database);
// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
// Skip it if it's a comment
if (substr($line, 0, 2) == '--' || $line == '')
    continue;

// Add this line to the current segment
$templine .= $line;
// If it has a semicolon at the end, it's the end of the query
if (substr(trim($line), -1, 1) == ';')
{
    // Perform the query
    mysqli_query($link,$templine) or print('Error performing query \'<strong>' . $templine . '\': ' .die('You may have already installed the system. If you want to install the fresh copy please drop the existing database "'.$mysql_database.'". '. mysqli_error($link)) . '<br /><br />');
    // Reset temp variable to empty
    $templine = '';
}
}
 echo "Setup successfully completed!";
?>
