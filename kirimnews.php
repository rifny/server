<?php
$subsemail= $_POST['subsemail'];
$body= "
Email: $subsemail <br/>
";

function Send_Mail($to,$subject,$body)
{
require 'PHPmailer/class.phpmailer.php';

$subsemail= $_POST['subsemail'];
$mail = new PHPMailer();
$mail->IsSMTP(true); // SMTP
$mail->SMTPAuth   = true;  // SMTP authentication
$mail->Host= "mail.dfour.site";
$mail->SMTPSecure = 'tls';
$mail->Port = 587; 
$mail->SetFrom("cs@dfour.site","email sender");
$mail->Username = "cs@dfour.site";  // username gmail yang akan digunakan untuk mengirim email
$mail->Password = "bismillah@76";  // Password email
$mail->SetFrom($subsemail, 'user');
$mail->AddReplyTo($subsemail,'user');
$mail->Subject = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);
$mail->AddAddress($subsemail);
if(!$mail->Send())
return false;
else
return true;
}

$to = "telconit@gmail.com"; //email tujuan
$subject = "contact dfour baru"; // subject email

Send_Mail($to,$subject,$body);


include 'koneksi.php';

$subsemail= $_POST['subsemail'];

$sql = "insert into daftarnews values('','subsemail')";
mysqli_query($conn, $sql);

echo"<br/><br/><center><h3>Data <b>$_POST[subsemail]</b> telah terkirim</h3>"; 
echo"<br/><h4>Terima kasih telah berlangganan artikel kami"; 

echo "<br/><a href=index.html>Kembali</a>";

//header('location:tampil.php');
?>