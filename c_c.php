<?php
$servername = "sql9.freesqldatabase.com";
$username = "sql9150947";
$password = "2JdvCsqPPz";
$dbname = "sql9150947";
$ids = "ids".$_GET['ids'];

$trnid= $_GET['trnid'];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO ".$ids." (trnid)
VALUES
('$trnid')";

if ($conn->query($sql) === TRUE) {
    echo "0";
} else {
    echo "1" ;
}


$conn->close();
?>
