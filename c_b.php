<?php
$servername = "sql9.freesqldatabase.com";
$username = "sql9150947";
$password = "2JdvCsqPPz";
$dbname = "sql9150947";
$idc = "budget".$_GET['ids'];

$tdate= $_GET['tdate'];
$balance= $_GET['balance'];
$moddate= $_GET['moddate'];
$devid= $_GET['devid'];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "UPDATE ".$idc." SET balance='$balance',tdate='$tdate',moddate='$moddate',devid='$devid'  WHERE active=2";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
