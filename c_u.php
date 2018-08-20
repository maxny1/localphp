<?php
$servername = "sql9.freesqldatabase.com";
$username = "sql9150947";
$password = "2JdvCsqPPz";
$dbname = "sql9150947";
//declare
$param ="";
$param1 = "budget";
$param2 = "";
$td = "";
$trnid = "";
$desc = "";
$devid = "";
//end declare

$param1 = "budget".$_GET["param"];
$param2 = $_GET['param2'];
$td = $_GET['td'];
$trnid = $_GET['trnid'];
$desc = $_GET['desc'];
$devid = $_GET['devid'];
$csv_export = '';
$idsc = "ids".$_GET["param"];
// Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection



if (!$conn) {

    die("Connection failed: ".mysql_connect_error());
}

$sql = "SELECT * FROM ".$param1." where active=2";
$result= mysqli_query($conn,$sql);

while ($row = mysqli_fetch_array($result)) {
echo $row['balance'];
}
?>
