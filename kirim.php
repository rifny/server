<?php
$name= $_POST['name'];
$email= $_POST['email'];
$hp= $_POST['hp'];
$date= $_POST['date'];
$time= $_POST['time'];
$reqs= $_POST['reqs'];
$body= "
Name : $name <br/>
Email: $email <br/>
HP: $hp <br/>
Date: $date <br/>
Time: $time <br/>
Request: $reqs <br/>
";

function Send_Mail($to,$subject,$body)
{
require 'PHPmailer/class.phpmailer.php';

$email= $_POST['email'];
$mail = new PHPMailer();
$mail->IsSMTP(true); // SMTP
$mail->SMTPAuth   = true;  // SMTP authentication
$mail->Host= "mail.arcellindo.com";
$mail->SMTPSecure = 'tls';
$mail->Port = 587; 
$mail->SetFrom("cs@dfour.site","email sender");
$mail->Username = "cs@dfour.site";  // username gmail yang akan digunakan untuk mengirim email
$mail->Password = "bismillah@76";  // Password email
$mail->SetFrom($email, 'user');
$mail->AddReplyTo($email,'user');
$mail->Subject = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);
$mail->AddAddress($email);
if(!$mail->Send())
return false;
else
return true;
}

$to = "telconit@gmail.com"; //email tujuan
$subject = "pesanan dfour baru"; // subject email

Send_Mail($to,$subject,$body);


include 'koneksi.php';

$name= $_POST['name'];
$email= $_POST['email'];
$hp= $_POST['hp'];
$date= $_POST['date'];
$time= $_POST['time'];
$req= $_POST['reqs'];

$sql = "insert into daftarpesanan values('','$name','$email','$hp','$date','$time','$reqs')";
mysqli_query($conn, $sql);

echo"<br/><br/><center><h3>Data <b>$_POST[name]</b> telah terkirim</h3>"; 
echo"<br/><h4>Tunggu pemberitahuan dari kami untuk konfirmasi pesanan Anda"; 
echo"<br/>Respon cepat hubungi Whatsapp/ Telegram kami</h4> </center>"; 

echo "<br/><a href=index.html>Kembali</a>";

//header('location:tampil.php');
?>