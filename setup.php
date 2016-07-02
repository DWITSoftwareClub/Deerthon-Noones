<?php
$filename = 'deerthon2(2).sql';
include('settings.php');
$link=mysqli_connect($mysql_host, $mysql_username, $mysql_password,$mysql_database) or die('Error connecting to MySQL server: ' . mysql_error());
$createDbQuery="CREATE DATABASE IF NOT EXISTS $mysql_database";
mysqli_query($link,$createDbQuery);
$templine = '';
$lines = file($filename);
foreach ($lines as $line)
{
if (substr($line, 0, 2) == '--' || $line == '')
    continue;
$templine .= $line;
if (substr(trim($line), -1, 1) == ';')
{
    mysqli_query($link,$templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
    $templine = '';
}
}
 echo "Setup successfully completed!";
?>
