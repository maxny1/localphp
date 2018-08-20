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
$conn1= mysqli_connect($servername, $username, $password, $dbname);
// Check connection



if (!$conn) {

    die("Connection failed: ".mysqli_connect_error());
}
 $sql = "select * from users";
 $from = "ymcodeinfo@gmail.com";
$from = "ymcodeinfo@gmail.com";
$headers .= "Reply-To: ymcodeinfo@gmail.com \r\n";
$headers .= "Return-Path: ymcode@gmail.com \r\n";
$headers .= "From: \”ymcode info\” <ymcodeinfo@gmail.com> \r\n";
$headers .= "Organization: ymcode budget 2\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
$headers .= "Content-Transfer-Encoding: binary";
$headers .= "X-Priority: 3\r\n";
$headers .= "X-Mailer: PHP”. phpversion() .”\r\n";

$result= mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($result))  
{

$devid=$row["devid"];
$id=$row["id"];
$st=$row["status"];
$subject = "Budget 2 application transactions summary";
$sql1 = "select * from budget".$id." LEFT JOIN users ON budget".$id.".devid=users.devid where moddate=curdate()";
$result1= mysqli_query($conn1,$sql1);

while ($row1=mysqli_fetch_array($result1))
{
	
$row_count=mysqli_num_rows($result1);
//$headers.="MIME-Version: 1.0\n";
//$headers.="Content-type: text/html; charset=iso 8859-1";
if ($row1["expance"]>0){

$message.= $row1["name"]." ". $row1["expance"]."\n";

}

if ($row1["income"]>0){


$message.= $row1["name"]." ". $row1["income"]."\n";
}



}
$email=$row["email"] ;
$to = $email;

mail($to,$subject,$message,$headers);
$message="";
echo $message;
}

?>
