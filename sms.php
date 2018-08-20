<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';



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

	if (!$conn) {

    die("Connection failed: ".mysqli_connect_error());
    
}

$sql = "select * from users";
 $from = "ymcodeinfo@gmail.com";
$from = "ymcodeinfo@gmail.com";
$headers .= "Reply-To: ymcodeinfo@gmail.com"."\r\n";
$headers .= "Return-Path: ymcodeinfo@gmail.com"."\r\n";
$headers .= "From: \"ymcode info\" <ymcodeinfo@gmail.com>". "\r\n";
$headers .= "Organization: ymcode budget 2"."\r\n";
$headers .= "MIME-Version: 1.0"."\r\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
$headers .= "Content-Transfer-Encoding: binary";
$headers .= "X-Priority: 1"."\r\n";
$headers .= "X-Mailer: PHP". phpversion() ."\r\n";

$result= mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($result))
{
	$devid=$row["devid"];
$id=$row["id"];
$st=$row["status"];
$subject = "Budget 2 application transactions summary";
$sql1 = "select * from budget".$id." LEFT JOIN users ON budget".$id.".devid=users.devid where moddate=curdate() or active=2";
$result1= mysqli_query($conn1,$sql1);

while ($row1=mysqli_fetch_array($result1))
{
	
$row_count=mysqli_num_rows($result1);

if ($row1["expance"]>0 ){

$message.= $row1["name"]." ". $row1["expance"]."\n";

}

if ($row1["income"]>0){


$message.= $row1["name"]." ". $row1["income"]."\n";
}

if ($row1["active"]==2){


$message.= "balance is $".$row1["balance"]."\n";
}

}

if (strpos($row["email"],"@")>=0){
$email=$row["email"] ;
$to = $email;

try {
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

//Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'ymcodeinfo@gmail.com';                 // SMTP username
    $mail->Password = 'm29111978';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;   

 
    //Recipients
    $mail->setFrom('ymcodeinfo@gmail.com', 'ym code');
    $mail->addAddress($to, 'budget 2 user');     // Add a recipient
    $mail->addAddress($to);               // Name is optional
    $mail->addReplyTo('ymcodeinfo@gmail.com', 'ym code');
  //  $mail->addCC('cc@example.com');
  //  $mail->addBCC('bcc@example.com');

    //Attachments
 //   $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
 //   $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'budget 2 daily summary';
    $mail->Body    = $message;
  //  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
	}
	
if (strpos($row["email"],"@")===false){
$email=$row["email"] ;
$to = $email."@tmomail.net";

try {
 
 $mail = new PHPMailer(true);                              // Passing `true` enables exceptions

//Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'ymcodeinfo@gmail.com';                 // SMTP username
    $mail->Password = 'm29111978';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;   

    //Recipients
    $mail->setFrom('ymcodeinfo@gmail.com', 'ym code');
    $mail->addAddress($to, 'budget 2 user');     // Add a recipient
    $mail->addAddress($to);               // Name is optional
    $mail->addReplyTo('ymcodeinfo@gmail.com', 'ym code');
  //  $mail->addCC('cc@example.com');
  //  $mail->addBCC('bcc@example.com');

    //Attachments
 //   $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
 //   $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(false);                                  // Set email format to HTML
    $mail->Subject = 'budget 2 daily summary';
    $mail->Body    = $message;
  //  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
	}	
$message="";


}
?>
