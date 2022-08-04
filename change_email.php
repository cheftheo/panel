<?php
include('session.php');
require_once('phpmailer/PHPMailerAutoload.php');
require_once "PHPMailer.php";
if(!(isset($_SESSION['Username']))) return go('/');
$new_email = mysqli_real_escape_string($db,$_POST['new_email']);
$current_pass = mysqli_real_escape_string($db,$_POST['current_password']);
$checkPass = $db->query("SELECT * from `users` WHERE name='".$_SESSION['Username']."'");
$selectPassword = $checkPass->fetch_assoc();

if($current_pass == $selectPassword["password"]) {
	$token = getToken(32);
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->Host       = "smtp.gmail.com";
	$mail->SMTPDebug  = 2;
	$mail->SMTPAuth   = true;
	$mail->SMTPSecure   = 'ssl';
	$mail->Port       = 465;
	$mail->Username   = ""; //Adresa ta GMAIL
	$mail->Password   = ""; //Parola la contul tau GMAIL
	$mail->SetFrom($mail->Username, ''.$serverName.' - No-reply');
	$mail->AddAddress($_SESSION['Email'], $_SESSION['Email']);
	$mail->isHTML(true);

	$mail->Subject = 'Change email '.$serverName.'';
	$mail->Body    = '
			You have received this email because a change of email<br>was instigated by you on '.$serverName.' - Panel.<br><br><hr>IMPORTANT!<hr><br>
			If you did not request this email change,please IGNORE and DELETE this<br>
			email immediately. Only continue if you wish your email to be changed !<br><br>
			<hr>
			Email change Instructions Below
			<hr><br>
			Simply click on the link below to change your email.<br>
			<a href="'.$serverURL.'/activate.php?email='.$_SESSION['Email'].'&key='.$token.'" target="_blank">'.$serverURL.'/activate.php?email='.$_SESSION['Email'].'&key='.$token.'</a> <br><br>
			Note that this link expires in 1 hour.</body>';
	$mail->AltBody = '';
	$mail->send();

	mysqli_query($db, "INSERT INTO emaiverification (Email,Token,ExpirationTime) VALUES ('".$_SESSION['Email']."','".$token."', DATE_ADD(now(), INTERVAL 1 HOUR))");
	$_SESSION["NEW_EMAIL"] = $new_email;
	$_SESSION['CONFIRMATION_EMAIL'] = 1;
	header('Location: user/'.$_SESSION['Username']);
}else{
	echo "<meta http-equiv=\"refresh\" content=\"0; url=/user/".$_SESSION['Username']."\">";
}
