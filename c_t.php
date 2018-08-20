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
$email="";
$st="";
//end declare
$accid =$_GET['accid'];
$server =$_GET['server'];
$custom =$_GET['custom'];
$param1 = "budget".$_GET["param"];

$param2 = $_GET['param2'];

$td = $_GET['td'];
$email =$_GET['email'];
$trnid = $_GET['trnid'];
$desc = $_GET['desc'];

$devid = $_GET['devid'];
$st =$_GET['status'];
$csv_export = '';

$idsc = "ids".$_GET["param"];

// Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection



if (!$conn) {

    die("Connection failed: ".mysql_connect_error());
}

if ($param2=='1') {

    $sql = "CREATE TABLE ".$param1." (name TEXT,expance REAL,income REAL,tdate DATE,ttime TIME,balance REAL,upd TINYINT,active TINYINT,mobile TINYINT,description TEXT,moddate DATE,devid INTEGER,trnid INTEGER PRIMARY KEY)";

    if (mysqli_query($conn, $sql)) {

        echo "Table ".$param1." created successfully";
    } else {

        echo "Error creating table: " . mysqli_error($conn);
    }
}







if ($param2=='2') {

    $sql = "SELECT * FROM ".$param1;

    $result = mysqli_query($conn, $sql);

    $fp = fopen('php://output','w');

//fputcsv($fp, array('name','expance','income','tdate','balance','upd','active','mobile','description','trnid'));



    while ($row = mysqli_fetch_assoc($result))
        fputcsv($fp, $row,';');

// newline (seems to work both on Linux & Windows servers)
//echo  $row['name']."_".$row['tdate']."_".$row['expance']."_".$row['id'];
//echo "\n";
}

if ($param2=='3') {

    $sql = "CREATE TABLE ".$idsc." (trnid int PRIMARY KEY)";

    if (mysqli_query($conn,$sql)) {

        echo "Table ".$idsc." created successfully";
    } else {

        echo "Error creating table: ".mysqli_error($conn);
    }
}



if ($param2=='4') {

    $sql = "SELECT * FROM ".$param1." WHERE moddate >= "."'".$td."'"." OR active=0";

    $result = mysqli_query($conn,$sql);

    $fp = fopen('php://output','w');

//fputcsv($fp, array('name','expance','income','tdate','balance','upd','active','mobile','description','trnid'));



    while ($row = mysqli_fetch_assoc($result))
        fputcsv($fp, $row,';');

// newline (seems to work both on Linux & Windows servers)
//echo  $row['name']."_".$row['tdate']."_".$row['expance']."_".$row['id'];
//echo "\n";
}

if ($param2=='5') {

    $sql = "UPDATE ".$param1." SET active=0 WHERE trnid=".$trnid;

    $result = mysqli_query($conn,$sql);

    $fp = fopen('php://output','w');

//fputcsv($fp, array('name','expance','income','tdate','balance','upd','active','mobile','description','trnid'));
//while ($row = mysqli_fetch_assoc($result)) fputcsv($fp,$row,';');
// newline (seems to work both on Linux & Windows servers)
//echo  $row['name']."_".$row['tdate']."_".$row['expance']."_".$row['id'];
//echo "\n";
}

if ($param2=='6') {

    $sql = "UPDATE ".$param1." SET active=0,devid=".$devid." WHERE description LIKE "."'".$desc."'";

    $result = mysqli_query($conn,$sql);

    $fp = fopen('php://output','w');

//fputcsv($fp, array('name','expance','income','tdate','balance','upd','active','mobile','description','trnid'));
//while ($row = mysqli_fetch_assoc($result)) fputcsv($fp,$row,';');
// newline (seems to work both on Linux & Windows servers)
//echo  $row['name']."_".$row['tdate']."_".$row['expance']."_".$row['id'];
//echo "\n";
}

if ($param2=='7') {

    $sql = "UPDATE ".$param1." SET active=1,moddate=curdate() WHERE trnid = "."'".$trnid."'";

    $result = mysqli_query($conn,$sql);

    $fp = fopen('php://output','w');

//fputcsv($fp, array('name','expance','income','tdate','balance','upd','active','mobile','description','trnid'));
//while ($row = mysqli_fetch_assoc($result)) fputcsv($fp,$row,';');
// newline (seems to work both on Linux & Windows servers)
//echo  $row['name']."_".$row['tdate']."_".$row['expance']."_".$row['id'];
//echo "\n";
}

	if ($param2=='8') {

    $sql = "insert into users(id,devid,email,status) values(".$accid.",".$devid.","."'".$email."'".",".$st.")";

    if (mysqli_query($conn,$sql)) {

        echo "User ".$email." with ".$devid." created successfully";
    } else {

        echo "Error creating table: ".mysqli_error($conn);
        
    }
}
	if($param2=='9') {
	 $sql = "select * from users where email='".$email."'";
      $result= mysqli_query($conn,$sql);
      while ($row = mysqli_fetch_assoc($result))
        echo "id=".$row['id']."\n"."devid=".$row['devid'];   
		
		
	}
if ($param2=='10') {

    $sql = "update users set server="."'".$server."'"." ,custom="."'".$custom."'";

    if (mysqli_query($conn,$sql)) {

        echo "server has being updated";
    } else {

        echo "Error creating table: ".mysqli_error($conn);
        
    }
}

if($param2=='11') {
	 $sql = "select * from users limit 1";
      $result= mysqli_query($conn,$sql);
      while ($row = mysqli_fetch_assoc($result))
        echo $row['server'];   
		
		
	}

echo($csv_export);

mysqli_close($conn);
?>
