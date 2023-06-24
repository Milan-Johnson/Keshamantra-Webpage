<?php 

$serverName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "keshamantra_db";

$conn = mysqli_connect($serverName, $dbUser, $dbPassword, $dbName);

if(!$conn){
    die("Connection Failed".mysqli_connect_error());

}
else
    //echo 'ok';
    //echo $conn;
    return $conn;

?>