<?php 
session_start();
unset($_SESSION['otp']);

$fullName = $_POST['fullName'];
$email = $_POST['email'];
$pinNumber = $_POST['pinNumber'];

function generatePIN($digits = 8)
    {
        unset($_SESSION['otp']);
        $i = 0; //counter
        $pin = ""; //our default pin is blank.
        while($i < $digits){
            //generate a random number between 0 and 9.
            $pin .= mt_rand(0, 9);
            $i++;
        }
        return $pin;
    }
    
if (!isset($_SESSION['otp'])){
$_SESSION['otp'] =  generatePIN();
}


$_SESSION['username'] = $fullName;

echo $fullName, $email, $pinNumber;
// var_dump($_POST);

require_once 'PHPMailer.php';
require_once 'SMTP.php';
require_once 'Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// if(!empty($_POST['name'])){
//     if(isset($_POST['submit'])){
    $mail = new PHPMailer(true);
    
    // $mail->SMTPDebug = 2;
    
    $mail -> isSMTP();
    
    $mail -> Host = "smtp.ionos.co.uk";
    
    $mail -> SMTPAuth = "true";
    
    $mail -> SMTPSecure = "tls";
    
    $mail -> Port = "587";
    
    $mail -> Username = "support@fintecsolutions.co.uk";
    
    $mail -> Password = "Supp0rt98684!";
    
    $mail -> Subject = "Please verify your account";
    
    $mail -> setFrom('sushant@networksecurity.com','Sushant');
    
    
    $to = $email;
    // $subject = "New DALUS Inquiry";
    $body = "Hello ".strtoupper($fullName)."\r\n";
    $body .= "Welcome to Network Security Project, Please Enter this OTP asap. The expiry for the OTP is 5 mins. \r\n";
    $body .= "\r\n";
    $body .= "Full Name : ".strtoupper($fullName)."\r\n";
    $body .= "PIN : ".$pinNumber.  "\r\n";
    $body .= "OTP : " .$_SESSION['oldOtp']. "\r\n";
    
    $mail -> Body = $body;
    
    $mail -> addAddress($email);
    
    if($mail -> Send())
            {
                echo "Everything went smooth";
                // var_dump($_POST);
            }
            else{
                echo "Error...";
            }
        $mail -> smtpClose();
?>