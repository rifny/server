<?php
$username= $_POST['username'];
$useremail= $_POST['useremail'];
$message= $_POST['message'];
$body= "
Name : $username <br/>
Email: $useremail <br/>
Message: $message <br/>
";

function Send_Mail($to,$subject,$body)
{
require 'PHPmailer/class.phpmailer.php';

$useremail= $_POST['useremail'];
$mail = new PHPMailer();
$mail->IsSMTP(true); // SMTP
$mail->SMTPAuth   = true;  // SMTP authentication
$mail->Host= "mail.dfour.site";
$mail->SMTPSecure = 'tls';
$mail->Port = 587; 
$mail->SetFrom("cs@dfour.site","email sender");
$mail->Username = "cs@dfour.site";  // username gmail yang akan digunakan untuk mengirim email
$mail->Password = "bismillah@76";  // Password email
$mail->SetFrom($useremail, 'user');
$mail->AddReplyTo($useremail,'user');
$mail->Subject = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);
$mail->AddAddress($useremail);
if(!$mail->Send())
return false;
else
return true;
}

$to = "telconit@gmail.com"; //email tujuan
$subject = "contact dfour baru"; // subject email

Send_Mail($to,$subject,$body);


include 'koneksi.php';

$username= $_POST['username'];
$useremail= $_POST['useremail'];
$message= $_POST['message'];

$sql = "insert into daftarcontact values('','$username','$useremail','$message')";
mysqli_query($conn, $sql);

echo"<br/><br/><center><h3>Data <b>$_POST[username]</b> telah terkirim</h3>"; 
echo"<br/><h4>Terima kasih telah menghubungi kami"; 
echo"<br/>Respon cepat hubungi Whatsapp/ Telegram kami</h4> </center>"; 

echo "<br/><a href=index.html>Kembali</a>";

//header('location:tampil.php');
?>