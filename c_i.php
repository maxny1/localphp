<?php
$servername = "sql9.freesqldatabase.com";
$username = "sql9150947";
$password = "2JdvCsqPPz";
$dbname = "sql9150947";
$name = $_POST['name'];
$expance = $_POST['expance'];
$ids = "budget".$_POST['ids'];

$active= $_POST['active'];
$tdate= $_POST['tdate'];
$ttime= $_POST['ttime'];
$trnid= $_POST['trnid'];
$upd= $_POST['upd'];
$balance= $_POST['balance'];
$description= $_POST['description'];
$income= $_POST['income'];
$mobile= $_POST['mobile'];
$moddate= $_POST['moddate'];
$devid= $_POST['devid'];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO ".$ids." (name,active,tdate,ttime,trnid,expance,upd,balance,description,income,mobile,moddate,devid)
VALUES
('$name','$active','$tdate','$ttime','$trnid','$expance','$upd','$balance','$description','$income','$mobile','$moddate','$devid')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
